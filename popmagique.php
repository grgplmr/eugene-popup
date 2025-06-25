<?php
/**
 * Plugin Name: PopMagique
 * Plugin URI: https://popmagique.com
 * Description: Système de double popup intelligent avec design glassmorphism pour WordPress. Popup d'entrée publicitaire et popup de sortie newsletter avec détection exit intent.
 * Version: 1.0.0
 * Author: PopMagique
 * Author URI: https://popmagique.com
 * Text Domain: popmagique
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

// Définir les constantes du plugin
define('POPMAGIQUE_VERSION', '1.0.0');
define('POPMAGIQUE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('POPMAGIQUE_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * Classe principale du plugin PopMagique
 */
class PopMagique {
    
    /**
     * Instance unique du plugin
     */
    private static $instance = null;
    
    /**
     * Options par défaut
     */
    private $default_options = array(
        'entry_popup' => array(
            'enabled' => true,
            'delay' => 3000,
            'title' => '🎉 Offre Spéciale !',
            'content' => 'Découvrez nos produits avec 20% de réduction pour les nouveaux visiteurs. Une occasion unique à ne pas manquer !',
            'button_text' => 'Profiter de l\'offre',
            'button_color' => '#EC4899',
            'button_url' => '#',
            'background_color' => 'rgba(255, 255, 255, 0.1)',
            'text_color' => '#1F2937',
            'font_size' => '16px',
            'font_family' => 'Inter, sans-serif',
            'image_url' => ''
        ),
        'exit_popup' => array(
            'enabled' => true,
            'title' => '✋ Attendez !',
            'content' => 'Ne partez pas sans vous abonner à notre newsletter pour recevoir nos meilleures offres et conseils exclusifs.',
            'button_text' => 'S\'abonner maintenant',
            'button_color' => '#3B82F6',
            'background_color' => 'rgba(255, 255, 255, 0.1)',
            'text_color' => '#1F2937',
            'font_size' => '16px',
            'font_family' => 'Inter, sans-serif',
            'email_placeholder' => 'Votre adresse email...',
            'success_message' => '🎉 Merci ! Vous êtes maintenant abonné(e) à notre newsletter.',
            'mailchimp_api_key' => '',
            'mailchimp_list_id' => ''
        )
    );
    
    /**
     * Obtenir l'instance unique du plugin
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructeur privé
     */
    private function __construct() {
        add_action('init', array($this, 'init'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    /**
     * Initialisation du plugin
     */
    public function init() {
        // Charger la traduction
        load_plugin_textdomain('popmagique', false, dirname(plugin_basename(__FILE__)) . '/languages');
        
        // Hooks d'administration
        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_admin_menu'));
            add_action('admin_init', array($this, 'admin_init'));
            add_action('wp_ajax_popmagique_save_settings', array($this, 'save_settings'));
            add_action('wp_ajax_popmagique_subscribe_email', array($this, 'subscribe_email'));
        }
        
        // Hooks frontend
        if (!is_admin()) {
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
            add_action('wp_footer', array($this, 'render_popups'));
        }
        
        // AJAX pour les utilisateurs non connectés
        add_action('wp_ajax_nopriv_popmagique_subscribe_email', array($this, 'subscribe_email'));
    }
    
    /**
     * Activation du plugin
     */
    public function activate() {
        // Créer les options par défaut
        if (!get_option('popmagique_options')) {
            add_option('popmagique_options', $this->default_options);
        }
        
        // Créer la table pour les emails si nécessaire
        $this->create_subscribers_table();
    }
    
    /**
     * Désactivation du plugin
     */
    public function deactivate() {
        // Nettoyer les tâches programmées si nécessaire
    }
    
    /**
     * Créer la table des abonnés
     */
    private function create_subscribers_table() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'popmagique_subscribers';
        
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            email varchar(100) NOT NULL,
            date_subscribed datetime DEFAULT CURRENT_TIMESTAMP,
            ip_address varchar(45),
            user_agent text,
            PRIMARY KEY (id),
            UNIQUE KEY email (email)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    /**
     * Ajouter le menu d'administration
     */
    public function add_admin_menu() {
        add_menu_page(
            'PopMagique',
            'PopMagique',
            'manage_options',
            'popmagique',
            array($this, 'admin_page'),
            'dashicons-visibility',
            30
        );
        
        add_submenu_page(
            'popmagique',
            'Paramètres PopMagique',
            'Paramètres',
            'manage_options',
            'popmagique',
            array($this, 'admin_page')
        );
        
        add_submenu_page(
            'popmagique',
            'Abonnés Newsletter',
            'Abonnés',
            'manage_options',
            'popmagique-subscribers',
            array($this, 'subscribers_page')
        );
    }
    
    /**
     * Initialisation de l'administration
     */
    public function admin_init() {
        wp_enqueue_style('popmagique-admin', POPMAGIQUE_PLUGIN_URL . 'assets/admin.css', array(), POPMAGIQUE_VERSION);
        wp_enqueue_script('popmagique-admin', POPMAGIQUE_PLUGIN_URL . 'assets/admin.js', array('jquery'), POPMAGIQUE_VERSION, true);
        
        wp_localize_script('popmagique-admin', 'popmagique_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('popmagique_nonce')
        ));
    }
    
    /**
     * Charger les scripts frontend
     */
    public function enqueue_scripts() {
        wp_enqueue_style('popmagique-frontend', POPMAGIQUE_PLUGIN_URL . 'assets/frontend.css', array(), POPMAGIQUE_VERSION);
        wp_enqueue_script('popmagique-frontend', POPMAGIQUE_PLUGIN_URL . 'assets/frontend.js', array('jquery'), POPMAGIQUE_VERSION, true);
        
        $options = get_option('popmagique_options', $this->default_options);
        
        wp_localize_script('popmagique-frontend', 'popmagique_config', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('popmagique_nonce'),
            'entry_popup' => $options['entry_popup'],
            'exit_popup' => $options['exit_popup']
        ));
    }
    
    /**
     * Rendre les popups dans le footer
     */
    public function render_popups() {
        $options = get_option('popmagique_options', $this->default_options);
        include POPMAGIQUE_PLUGIN_PATH . 'templates/popups.php';
    }
    
    /**
     * Page d'administration principale
     */
    public function admin_page() {
        $options = get_option('popmagique_options', $this->default_options);
        include POPMAGIQUE_PLUGIN_PATH . 'templates/admin-page.php';
    }
    
    /**
     * Page des abonnés
     */
    public function subscribers_page() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'popmagique_subscribers';
        $subscribers = $wpdb->get_results("SELECT * FROM $table_name ORDER BY date_subscribed DESC");
        include POPMAGIQUE_PLUGIN_PATH . 'templates/subscribers-page.php';
    }
    
    /**
     * Sauvegarder les paramètres via AJAX
     */
    public function save_settings() {
        check_ajax_referer('popmagique_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_die('Accès non autorisé');
        }
        
        $settings = $_POST['settings'];
        
        // Nettoyer et valider les données
        $clean_settings = $this->sanitize_settings($settings);
        
        update_option('popmagique_options', $clean_settings);
        
        wp_send_json_success('Paramètres sauvegardés avec succès !');
    }
    
    /**
     * Gérer l'inscription email via AJAX
     */
    public function subscribe_email() {
        check_ajax_referer('popmagique_nonce', 'nonce');
        
        $email = sanitize_email($_POST['email']);
        
        if (!is_email($email)) {
            wp_send_json_error('Adresse email invalide');
        }
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'popmagique_subscribers';
        
        // Vérifier si l'email existe déjà
        $existing = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE email = %s",
            $email
        ));
        
        if ($existing > 0) {
            wp_send_json_error('Cette adresse email est déjà inscrite');
        }
        
        // Insérer le nouvel abonné
        $result = $wpdb->insert(
            $table_name,
            array(
                'email' => $email,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            ),
            array('%s', '%s', '%s')
        );
        
        if ($result === false) {
            wp_send_json_error('Erreur lors de l\'inscription');
        }
        
        // Intégration Mailchimp si configurée
        $options = get_option('popmagique_options', $this->default_options);
        if (!empty($options['exit_popup']['mailchimp_api_key']) && !empty($options['exit_popup']['mailchimp_list_id'])) {
            $this->add_to_mailchimp($email, $options['exit_popup']);
        }
        
        wp_send_json_success('Inscription réussie !');
    }
    
    /**
     * Ajouter un email à Mailchimp
     */
    private function add_to_mailchimp($email, $settings) {
        $api_key = $settings['mailchimp_api_key'];
        $list_id = $settings['mailchimp_list_id'];
        
        $datacenter = substr($api_key, strpos($api_key, '-') + 1);
        $url = "https://{$datacenter}.api.mailchimp.com/3.0/lists/{$list_id}/members";
        
        $data = array(
            'email_address' => $email,
            'status' => 'subscribed'
        );
        
        $args = array(
            'method' => 'POST',
            'headers' => array(
                'Authorization' => 'Basic ' . base64_encode('user:' . $api_key),
                'Content-Type' => 'application/json'
            ),
            'body' => json_encode($data)
        );
        
        wp_remote_post($url, $args);
    }
    
    /**
     * Nettoyer les paramètres
     */
    private function sanitize_settings($settings) {
        $clean = array();
        
        // Popup d'entrée
        $clean['entry_popup'] = array(
            'enabled' => isset($settings['entry_popup']['enabled']) ? (bool)$settings['entry_popup']['enabled'] : false,
            'delay' => absint($settings['entry_popup']['delay']),
            'title' => sanitize_text_field($settings['entry_popup']['title']),
            'content' => sanitize_textarea_field($settings['entry_popup']['content']),
            'button_text' => sanitize_text_field($settings['entry_popup']['button_text']),
            'button_color' => sanitize_hex_color($settings['entry_popup']['button_color']),
            'button_url' => esc_url_raw($settings['entry_popup']['button_url']),
            'background_color' => sanitize_text_field($settings['entry_popup']['background_color']),
            'text_color' => sanitize_hex_color($settings['entry_popup']['text_color']),
            'font_size' => sanitize_text_field($settings['entry_popup']['font_size']),
            'font_family' => sanitize_text_field($settings['entry_popup']['font_family']),
            'image_url' => esc_url_raw($settings['entry_popup']['image_url'])
        );
        
        // Popup de sortie
        $clean['exit_popup'] = array(
            'enabled' => isset($settings['exit_popup']['enabled']) ? (bool)$settings['exit_popup']['enabled'] : false,
            'title' => sanitize_text_field($settings['exit_popup']['title']),
            'content' => sanitize_textarea_field($settings['exit_popup']['content']),
            'button_text' => sanitize_text_field($settings['exit_popup']['button_text']),
            'button_color' => sanitize_hex_color($settings['exit_popup']['button_color']),
            'background_color' => sanitize_text_field($settings['exit_popup']['background_color']),
            'text_color' => sanitize_hex_color($settings['exit_popup']['text_color']),
            'font_size' => sanitize_text_field($settings['exit_popup']['font_size']),
            'font_family' => sanitize_text_field($settings['exit_popup']['font_family']),
            'email_placeholder' => sanitize_text_field($settings['exit_popup']['email_placeholder']),
            'success_message' => sanitize_text_field($settings['exit_popup']['success_message']),
            'mailchimp_api_key' => sanitize_text_field($settings['exit_popup']['mailchimp_api_key']),
            'mailchimp_list_id' => sanitize_text_field($settings['exit_popup']['mailchimp_list_id'])
        );
        
        return $clean;
    }
}

// Initialiser le plugin
PopMagique::get_instance();

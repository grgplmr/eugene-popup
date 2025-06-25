<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap popmagique-admin">
    <h1>🎛️ Configuration PopMagique</h1>
    
    <div class="popmagique-header">
        <div class="popmagique-logo">
            <h2>✨ PopMagique</h2>
            <p>Système de double popup intelligent avec design glassmorphism</p>
        </div>
        <div class="popmagique-actions">
            <button type="button" class="button button-primary" id="save-settings">
                💾 Enregistrer les paramètres
            </button>
            <button type="button" class="button" id="reset-settings">
                🔄 Réinitialiser
            </button>
        </div>
    </div>

    <div class="popmagique-tabs">
        <nav class="nav-tab-wrapper">
            <a href="#entry-popup" class="nav-tab nav-tab-active">🎯 Popup d'Entrée</a>
            <a href="#exit-popup" class="nav-tab">✋ Popup de Sortie</a>
            <a href="#advanced" class="nav-tab">⚙️ Avancé</a>
        </nav>

        <!-- Popup d'Entrée -->
        <div id="entry-popup" class="tab-content active">
            <div class="postbox">
                <h2 class="hndle">Configuration du Popup d'Entrée</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Activer le popup</th>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="entry_popup[enabled]" <?php checked($options['entry_popup']['enabled']); ?>>
                                    <span class="slider"></span>
                                </label>
                                <p class="description">Activer ou désactiver le popup d'entrée</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Délai d'affichage</th>
                            <td>
                                <input type="number" name="entry_popup[delay]" value="<?php echo esc_attr($options['entry_popup']['delay']); ?>" min="0" step="1000" class="regular-text">
                                <p class="description">Délai en millisecondes avant l'affichage (3000 = 3 secondes)</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Titre</th>
                            <td>
                                <input type="text" name="entry_popup[title]" value="<?php echo esc_attr($options['entry_popup']['title']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Contenu</th>
                            <td>
                                <textarea name="entry_popup[content]" rows="4" class="large-text"><?php echo esc_textarea($options['entry_popup']['content']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">URL de l'image</th>
                            <td>
                                <input type="url" name="entry_popup[image_url]" value="<?php echo esc_attr($options['entry_popup']['image_url']); ?>" class="regular-text">
                                <button type="button" class="button upload-image">📷 Choisir une image</button>
                                <p class="description">Image optionnelle à afficher dans le popup</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Texte du bouton</th>
                            <td>
                                <input type="text" name="entry_popup[button_text]" value="<?php echo esc_attr($options['entry_popup']['button_text']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">URL du bouton</th>
                            <td>
                                <input type="url" name="entry_popup[button_url]" value="<?php echo esc_attr($options['entry_popup']['button_url']); ?>" class="regular-text">
                                <p class="description">URL vers laquelle le bouton redirige</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Couleur du bouton</th>
                            <td>
                                <input type="color" name="entry_popup[button_color]" value="<?php echo esc_attr($options['entry_popup']['button_color']); ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="postbox">
                <h2 class="hndle">Style et Apparence</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Couleur de fond</th>
                            <td>
                                <input type="text" name="entry_popup[background_color]" value="<?php echo esc_attr($options['entry_popup']['background_color']); ?>" class="regular-text">
                                <p class="description">Format RGBA recommandé : rgba(255, 255, 255, 0.1)</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Couleur du texte</th>
                            <td>
                                <input type="color" name="entry_popup[text_color]" value="<?php echo esc_attr($options['entry_popup']['text_color']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Taille de police</th>
                            <td>
                                <select name="entry_popup[font_size]">
                                    <option value="14px" <?php selected($options['entry_popup']['font_size'], '14px'); ?>>Petite (14px)</option>
                                    <option value="16px" <?php selected($options['entry_popup']['font_size'], '16px'); ?>>Normale (16px)</option>
                                    <option value="18px" <?php selected($options['entry_popup']['font_size'], '18px'); ?>>Grande (18px)</option>
                                    <option value="20px" <?php selected($options['entry_popup']['font_size'], '20px'); ?>>Très grande (20px)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Police</th>
                            <td>
                                <select name="entry_popup[font_family]">
                                    <option value="Inter, sans-serif" <?php selected($options['entry_popup']['font_family'], 'Inter, sans-serif'); ?>>Inter</option>
                                    <option value="Arial, sans-serif" <?php selected($options['entry_popup']['font_family'], 'Arial, sans-serif'); ?>>Arial</option>
                                    <option value="Georgia, serif" <?php selected($options['entry_popup']['font_family'], 'Georgia, serif'); ?>>Georgia</option>
                                    <option value="'Times New Roman', serif" <?php selected($options['entry_popup']['font_family'], "'Times New Roman', serif"); ?>>Times New Roman</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Popup de Sortie -->
        <div id="exit-popup" class="tab-content">
            <div class="postbox">
                <h2 class="hndle">Configuration du Popup de Sortie</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Activer le popup</th>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="exit_popup[enabled]" <?php checked($options['exit_popup']['enabled']); ?>>
                                    <span class="slider"></span>
                                </label>
                                <p class="description">Activer ou désactiver le popup de sortie</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Titre</th>
                            <td>
                                <input type="text" name="exit_popup[title]" value="<?php echo esc_attr($options['exit_popup']['title']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Contenu</th>
                            <td>
                                <textarea name="exit_popup[content]" rows="4" class="large-text"><?php echo esc_textarea($options['exit_popup']['content']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Placeholder email</th>
                            <td>
                                <input type="text" name="exit_popup[email_placeholder]" value="<?php echo esc_attr($options['exit_popup']['email_placeholder']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Texte du bouton</th>
                            <td>
                                <input type="text" name="exit_popup[button_text]" value="<?php echo esc_attr($options['exit_popup']['button_text']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Couleur du bouton</th>
                            <td>
                                <input type="color" name="exit_popup[button_color]" value="<?php echo esc_attr($options['exit_popup']['button_color']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Message de succès</th>
                            <td>
                                <input type="text" name="exit_popup[success_message]" value="<?php echo esc_attr($options['exit_popup']['success_message']); ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="postbox">
                <h2 class="hndle">Intégration Mailchimp</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Clé API Mailchimp</th>
                            <td>
                                <input type="text" name="exit_popup[mailchimp_api_key]" value="<?php echo esc_attr($options['exit_popup']['mailchimp_api_key']); ?>" class="regular-text">
                                <p class="description">Optionnel : Clé API pour synchroniser avec Mailchimp</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">ID de liste Mailchimp</th>
                            <td>
                                <input type="text" name="exit_popup[mailchimp_list_id]" value="<?php echo esc_attr($options['exit_popup']['mailchimp_list_id']); ?>" class="regular-text">
                                <p class="description">ID de la liste Mailchimp où ajouter les abonnés</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="postbox">
                <h2 class="hndle">Style et Apparence</h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Couleur de fond</th>
                            <td>
                                <input type="text" name="exit_popup[background_color]" value="<?php echo esc_attr($options['exit_popup']['background_color']); ?>" class="regular-text">
                                <p class="description">Format RGBA recommandé : rgba(255, 255, 255, 0.1)</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Couleur du texte</th>
                            <td>
                                <input type="color" name="exit_popup[text_color]" value="<?php echo esc_attr($options['exit_popup']['text_color']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Taille de police</th>
                            <td>
                                <select name="exit_popup[font_size]">
                                    <option value="14px" <?php selected($options['exit_popup']['font_size'], '14px'); ?>>Petite (14px)</option>
                                    <option value="16px" <?php selected($options['exit_popup']['font_size'], '16px'); ?>>Normale (16px)</option>
                                    <option value="18px" <?php selected($options['exit_popup']['font_size'], '18px'); ?>>Grande (18px)</option>
                                    <option value="20px" <?php selected($options['exit_popup']['font_size'], '20px'); ?>>Très grande (20px)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Police</th>
                            <td>
                                <select name="exit_popup[font_family]">
                                    <option value="Inter, sans-serif" <?php selected($options['exit_popup']['font_family'], 'Inter, sans-serif'); ?>>Inter</option>
                                    <option value="Arial, sans-serif" <?php selected($options['exit_popup']['font_family'], 'Arial, sans-serif'); ?>>Arial</option>
                                    <option value="Georgia, serif" <?php selected($options['exit_popup']['font_family'], 'Georgia, serif'); ?>>Georgia</option>
                                    <option value="'Times New Roman', serif" <?php selected($options['exit_popup']['font_family'], "'Times New Roman', serif"); ?>>Times New Roman</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Avancé -->
        <div id="advanced" class="tab-content">
            <div class="postbox">
                <h2 class="hndle">Paramètres Avancés</h2>
                <div class="inside">
                    <h3>🎨 Aperçu des Popups</h3>
                    <p>Testez vos popups avant de les publier :</p>
                    <div class="preview-buttons">
                        <button type="button" class="button button-secondary" id="preview-entry">👁️ Aperçu Popup d'Entrée</button>
                        <button type="button" class="button button-secondary" id="preview-exit">👁️ Aperçu Popup de Sortie</button>
                    </div>
                    
                    <hr>
                    
                    <h3>📊 Statistiques</h3>
                    <div class="stats-grid">
                        <div class="stat-box">
                            <div class="stat-number"><?php echo wp_count_posts()->publish; ?></div>
                            <div class="stat-label">Articles publiés</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number"><?php 
                                global $wpdb;
                                $table_name = $wpdb->prefix . 'popmagique_subscribers';
                                echo $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
                            ?></div>
                            <div class="stat-label">Abonnés newsletter</div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h3>🔧 Outils</h3>
                    <p>
                        <em>Fonctionnalités d'import/export à venir.</em>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="popmagique-footer">
        <p>
            <strong>PopMagique v<?php echo POPMAGIQUE_VERSION; ?></strong> - 
            Plugin WordPress de popups intelligents avec design glassmorphism
        </p>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    // Gestion des onglets
    $('.nav-tab').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        
        $('.tab-content').removeClass('active');
        $(target).addClass('active');
    });
    
    // Sauvegarde des paramètres
    $('#save-settings').on('click', function() {
        var settings = {};
        
        // Collecter tous les champs du formulaire
        $('input, textarea, select').each(function() {
            var name = $(this).attr('name');
            if (name) {
                var value = $(this).is(':checkbox') ? $(this).is(':checked') : $(this).val();
                
                // Construire l'objet settings
                var keys = name.replace(/\]/g, '').split('[');
                var current = settings;
                
                for (var i = 0; i < keys.length - 1; i++) {
                    if (!current[keys[i]]) {
                        current[keys[i]] = {};
                    }
                    current = current[keys[i]];
                }
                
                current[keys[keys.length - 1]] = value;
            }
        });
        
        // Envoyer via AJAX
        $.post(popmagique_ajax.ajax_url, {
            action: 'popmagique_save_settings',
            nonce: popmagique_ajax.nonce,
            settings: settings
        }, function(response) {
            if (response.success) {
                $('<div class="notice notice-success is-dismissible"><p>' + response.data + '</p></div>')
                    .insertAfter('.popmagique-header')
                    .delay(3000)
                    .fadeOut();
            } else {
                $('<div class="notice notice-error is-dismissible"><p>Erreur : ' + response.data + '</p></div>')
                    .insertAfter('.popmagique-header');
            }
        });
    });
    
    // Réinitialiser les paramètres
    $('#reset-settings').on('click', function() {
        if (confirm('Êtes-vous sûr de vouloir réinitialiser tous les paramètres ?')) {
            location.reload();
        }
    });
    
    // Upload d'image
    $('.upload-image').on('click', function() {
        var button = $(this);
        var input = button.prev('input');
        
        var frame = wp.media({
            title: 'Choisir une image',
            button: { text: 'Utiliser cette image' },
            multiple: false
        });
        
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            input.val(attachment.url);
        });
        
        frame.open();
    });
});
</script>
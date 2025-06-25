<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap popmagique-admin">
    <h1><?php esc_html_e('🎛️ Configuration PopMagique', 'popmagique'); ?></h1>
    
    <div class="popmagique-header">
        <div class="popmagique-logo">
            <h2><?php esc_html_e('✨ PopMagique', 'popmagique'); ?></h2>
            <p><?php esc_html_e('Système de double popup intelligent avec design glassmorphism', 'popmagique'); ?></p>
        </div>
        <div class="popmagique-actions">
            <button type="button" class="button button-primary" id="save-settings">
                <?php esc_html_e('💾 Enregistrer les paramètres', 'popmagique'); ?>
            </button>
            <button type="button" class="button" id="reset-settings">
                <?php esc_html_e('🔄 Réinitialiser', 'popmagique'); ?>
            </button>
        </div>
    </div>

    <div class="popmagique-tabs">
        <nav class="nav-tab-wrapper">
            <a href="#entry-popup" class="nav-tab nav-tab-active"><?php esc_html_e('🎯 Popup d\'Entrée', 'popmagique'); ?></a>
            <a href="#exit-popup" class="nav-tab"><?php esc_html_e('✋ Popup de Sortie', 'popmagique'); ?></a>
        </nav>

        <!-- Popup d'Entrée -->
        <div id="entry-popup" class="tab-content active">
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e("Configuration du Popup d'Entrée", 'popmagique'); ?></h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Activer le popup', 'popmagique'); ?></th>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="entry_popup[enabled]" <?php checked($options['entry_popup']['enabled']); ?>>
                                    <span class="slider"></span>
                                </label>
                                <p class="description"><?php esc_html_e("Activer ou désactiver le popup d'entrée", 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e("Délai d'affichage", 'popmagique'); ?></th>
                            <td>
                                <input type="number" name="entry_popup[delay]" value="<?php echo esc_attr($options['entry_popup']['delay']); ?>" min="0" step="1000" class="regular-text">
                                <p class="description"><?php esc_html_e("Délai en millisecondes avant l'affichage (3000 = 3 secondes)", 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Contenu', 'popmagique'); ?></th>
                            <td>
                                <textarea name="entry_popup[content]" rows="4" class="large-text"><?php echo esc_textarea($options['entry_popup']['content']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e("URL de l'image", 'popmagique'); ?></th>
                            <td>
                                <input type="url" name="entry_popup[image_url]" value="<?php echo esc_attr($options['entry_popup']['image_url']); ?>" class="regular-text">
                                <button type="button" class="button upload-image"><?php esc_html_e('📷 Choisir une image', 'popmagique'); ?></button>
                                <p class="description"><?php esc_html_e('Image optionnelle à afficher dans le popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Style et Apparence', 'popmagique'); ?></h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Couleur de fond', 'popmagique'); ?></th>
                            <td>
                                <input type="text" name="entry_popup[background_color]" value="<?php echo esc_attr($options['entry_popup']['background_color']); ?>" class="regular-text color-picker">
                                <p class="description"><?php esc_html_e('Format RGBA recommandé : rgba(255, 255, 255, 0.1)', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Couleur du texte', 'popmagique'); ?></th>
                            <td>
                                <input type="color" name="entry_popup[text_color]" value="<?php echo esc_attr($options['entry_popup']['text_color']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Alignement du texte', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[text_align]">
                                    <option value="left" <?php selected($options['entry_popup']['text_align'], 'left'); ?>><?php esc_html_e('Gauche', 'popmagique'); ?></option>
                                    <option value="center" <?php selected($options['entry_popup']['text_align'], 'center'); ?>><?php esc_html_e('Centre', 'popmagique'); ?></option>
                                    <option value="right" <?php selected($options['entry_popup']['text_align'], 'right'); ?>><?php esc_html_e('Droite', 'popmagique'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Taille de police', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[font_size]">
                                    <option value="14px" <?php selected($options['entry_popup']['font_size'], '14px'); ?>><?php esc_html_e('Petite (14px)', 'popmagique'); ?></option>
                                    <option value="16px" <?php selected($options['entry_popup']['font_size'], '16px'); ?>><?php esc_html_e('Normale (16px)', 'popmagique'); ?></option>
                                    <option value="18px" <?php selected($options['entry_popup']['font_size'], '18px'); ?>><?php esc_html_e('Grande (18px)', 'popmagique'); ?></option>
                                    <option value="20px" <?php selected($options['entry_popup']['font_size'], '20px'); ?>><?php esc_html_e('Très grande (20px)', 'popmagique'); ?></option>
                                    <option value="22px" <?php selected($options['entry_popup']['font_size'], '22px'); ?>>22px</option>
                                    <option value="24px" <?php selected($options['entry_popup']['font_size'], '24px'); ?>>24px</option>
                                    <option value="26px" <?php selected($options['entry_popup']['font_size'], '26px'); ?>>26px</option>
                                    <option value="28px" <?php selected($options['entry_popup']['font_size'], '28px'); ?>>28px</option>
                                    <option value="30px" <?php selected($options['entry_popup']['font_size'], '30px'); ?>>30px</option>
                                    <option value="32px" <?php selected($options['entry_popup']['font_size'], '32px'); ?>>32px</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Police', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[font_family]">
                                    <option value="Inter, sans-serif" <?php selected($options['entry_popup']['font_family'], 'Inter, sans-serif'); ?>>Inter</option>
                                    <option value="Arial, sans-serif" <?php selected($options['entry_popup']['font_family'], 'Arial, sans-serif'); ?>>Arial</option>
                                    <option value="Georgia, serif" <?php selected($options['entry_popup']['font_family'], 'Georgia, serif'); ?>>Georgia</option>
                                    <option value="'Times New Roman', serif" <?php selected($options['entry_popup']['font_family'], "'Times New Roman', serif"); ?>>Times New Roman</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Graisse de police', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[font_weight]">
                                    <option value="normal" <?php selected($options['entry_popup']['font_weight'], 'normal'); ?>>Normal</option>
                                    <option value="bold" <?php selected($options['entry_popup']['font_weight'], 'bold'); ?>>Gras</option>
                                </select>
                                <p class="description"><?php esc_html_e('Épaisseur du texte du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Style de police', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[font_style]">
                                    <option value="normal" <?php selected($options['entry_popup']['font_style'], 'normal'); ?>>Normal</option>
                                    <option value="italic" <?php selected($options['entry_popup']['font_style'], 'italic'); ?>>Italique</option>
                                </select>
                                <p class="description"><?php esc_html_e('Style du texte du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Transformation du texte', 'popmagique'); ?></th>
                            <td>
                                <select name="entry_popup[text_transform]">
                                    <option value="none" <?php selected($options['entry_popup']['text_transform'], 'none'); ?>><?php esc_html_e('Aucune', 'popmagique'); ?></option>
                                    <option value="uppercase" <?php selected($options['entry_popup']['text_transform'], 'uppercase'); ?>><?php esc_html_e('MAJUSCULES', 'popmagique'); ?></option>
                                    <option value="lowercase" <?php selected($options['entry_popup']['text_transform'], 'lowercase'); ?>><?php esc_html_e('minuscules', 'popmagique'); ?></option>
                                    <option value="capitalize" <?php selected($options['entry_popup']['text_transform'], 'capitalize'); ?>><?php esc_html_e('Capitalize', 'popmagique'); ?></option>
                                </select>
                                <p class="description"><?php esc_html_e('Transformation appliquée au texte', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Largeur max', 'popmagique'); ?></th>
                            <td>
                                <input type="number" name="entry_popup[width]" value="<?php echo esc_attr($options['entry_popup']['width']); ?>" min="200" step="10" class="small-text"> px
                                <p class="description"><?php esc_html_e('Largeur maximale du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Popup de Sortie -->
        <div id="exit-popup" class="tab-content">
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Configuration du Popup de Sortie', 'popmagique'); ?></h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Activer le popup', 'popmagique'); ?></th>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" name="exit_popup[enabled]" <?php checked($options['exit_popup']['enabled']); ?>>
                                    <span class="slider"></span>
                                </label>
                                <p class="description"><?php esc_html_e('Activer ou désactiver le popup de sortie', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Contenu', 'popmagique'); ?></th>
                            <td>
                                <textarea name="exit_popup[content]" rows="4" class="large-text"><?php echo esc_textarea($options['exit_popup']['content']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Texte du bouton', 'popmagique'); ?></th>
                            <td>
                                <input type="text" name="exit_popup[button_text]" value="<?php echo esc_attr($options['exit_popup']['button_text']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('URL du bouton', 'popmagique'); ?></th>
                            <td>
                                <input type="url" name="exit_popup[button_url]" value="<?php echo esc_attr($options['exit_popup']['button_url']); ?>" class="regular-text">
                                <p class="description"><?php esc_html_e('URL vers laquelle le bouton redirige', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Couleur du bouton', 'popmagique'); ?></th>
                            <td>
                                <input type="color" name="exit_popup[button_color]" value="<?php echo esc_attr($options['exit_popup']['button_color']); ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Style et Apparence', 'popmagique'); ?></h2>
                <div class="inside">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Couleur de fond', 'popmagique'); ?></th>
                            <td>
                                <input type="text" name="exit_popup[background_color]" value="<?php echo esc_attr($options['exit_popup']['background_color']); ?>" class="regular-text color-picker">
                                <p class="description"><?php esc_html_e('Format RGBA recommandé : rgba(255, 255, 255, 0.1)', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Couleur du texte', 'popmagique'); ?></th>
                            <td>
                                <input type="color" name="exit_popup[text_color]" value="<?php echo esc_attr($options['exit_popup']['text_color']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Alignement du texte', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[text_align]">
                                    <option value="left" <?php selected($options['exit_popup']['text_align'], 'left'); ?>><?php esc_html_e('Gauche', 'popmagique'); ?></option>
                                    <option value="center" <?php selected($options['exit_popup']['text_align'], 'center'); ?>><?php esc_html_e('Centre', 'popmagique'); ?></option>
                                    <option value="right" <?php selected($options['exit_popup']['text_align'], 'right'); ?>><?php esc_html_e('Droite', 'popmagique'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Taille de police', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[font_size]">
                                    <option value="14px" <?php selected($options['exit_popup']['font_size'], '14px'); ?>><?php esc_html_e('Petite (14px)', 'popmagique'); ?></option>
                                    <option value="16px" <?php selected($options['exit_popup']['font_size'], '16px'); ?>><?php esc_html_e('Normale (16px)', 'popmagique'); ?></option>
                                    <option value="18px" <?php selected($options['exit_popup']['font_size'], '18px'); ?>><?php esc_html_e('Grande (18px)', 'popmagique'); ?></option>
                                    <option value="20px" <?php selected($options['exit_popup']['font_size'], '20px'); ?>><?php esc_html_e('Très grande (20px)', 'popmagique'); ?></option>
                                    <option value="22px" <?php selected($options['exit_popup']['font_size'], '22px'); ?>>22px</option>
                                    <option value="24px" <?php selected($options['exit_popup']['font_size'], '24px'); ?>>24px</option>
                                    <option value="26px" <?php selected($options['exit_popup']['font_size'], '26px'); ?>>26px</option>
                                    <option value="28px" <?php selected($options['exit_popup']['font_size'], '28px'); ?>>28px</option>
                                    <option value="30px" <?php selected($options['exit_popup']['font_size'], '30px'); ?>>30px</option>
                                    <option value="32px" <?php selected($options['exit_popup']['font_size'], '32px'); ?>>32px</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Police', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[font_family]">
                                    <option value="Inter, sans-serif" <?php selected($options['exit_popup']['font_family'], 'Inter, sans-serif'); ?>>Inter</option>
                                    <option value="Arial, sans-serif" <?php selected($options['exit_popup']['font_family'], 'Arial, sans-serif'); ?>>Arial</option>
                                    <option value="Georgia, serif" <?php selected($options['exit_popup']['font_family'], 'Georgia, serif'); ?>>Georgia</option>
                                    <option value="'Times New Roman', serif" <?php selected($options['exit_popup']['font_family'], "'Times New Roman', serif"); ?>>Times New Roman</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Graisse de police', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[font_weight]">
                                    <option value="normal" <?php selected($options['exit_popup']['font_weight'], 'normal'); ?>>Normal</option>
                                    <option value="bold" <?php selected($options['exit_popup']['font_weight'], 'bold'); ?>>Gras</option>
                                </select>
                                <p class="description"><?php esc_html_e('Épaisseur du texte du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Style de police', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[font_style]">
                                    <option value="normal" <?php selected($options['exit_popup']['font_style'], 'normal'); ?>>Normal</option>
                                    <option value="italic" <?php selected($options['exit_popup']['font_style'], 'italic'); ?>>Italique</option>
                                </select>
                                <p class="description"><?php esc_html_e('Style du texte du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Transformation du texte', 'popmagique'); ?></th>
                            <td>
                                <select name="exit_popup[text_transform]">
                                    <option value="none" <?php selected($options['exit_popup']['text_transform'], 'none'); ?>><?php esc_html_e('Aucune', 'popmagique'); ?></option>
                                    <option value="uppercase" <?php selected($options['exit_popup']['text_transform'], 'uppercase'); ?>><?php esc_html_e('MAJUSCULES', 'popmagique'); ?></option>
                                    <option value="lowercase" <?php selected($options['exit_popup']['text_transform'], 'lowercase'); ?>><?php esc_html_e('minuscules', 'popmagique'); ?></option>
                                    <option value="capitalize" <?php selected($options['exit_popup']['text_transform'], 'capitalize'); ?>><?php esc_html_e('Capitalize', 'popmagique'); ?></option>
                                </select>
                                <p class="description"><?php esc_html_e('Transformation appliquée au texte', 'popmagique'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Largeur max', 'popmagique'); ?></th>
                            <td>
                                <input type="number" name="exit_popup[width]" value="<?php echo esc_attr($options['exit_popup']['width']); ?>" min="200" step="10" class="small-text"> px
                                <p class="description"><?php esc_html_e('Largeur maximale du popup', 'popmagique'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="popmagique-footer">
        <p>
            <strong><?php printf(esc_html__('PopMagique v%s', 'popmagique'), esc_html(POPMAGIQUE_VERSION)); ?></strong> -
            <?php esc_html_e('Plugin WordPress de popups intelligents avec design glassmorphism', 'popmagique'); ?>
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
        if (confirm('<?php echo esc_js(__('Êtes-vous sûr de vouloir réinitialiser tous les paramètres ?', 'popmagique')); ?>')) {
            location.reload();
        }
    });
    
    // Upload d'image
    $('.upload-image').on('click', function() {
        var button = $(this);
        var input = button.prev('input');
        
        var frame = wp.media({
            title: '<?php echo esc_js(__('Choisir une image', 'popmagique')); ?>',
            button: { text: '<?php echo esc_js(__('Utiliser cette image', 'popmagique')); ?>' },
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
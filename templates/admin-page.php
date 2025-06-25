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
                                <input type="text" name="entry_popup[background_color]" value="<?php echo esc_attr($options['entry_popup']['background_color']); ?>" class="regular-text color-picker">
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
                            <th scope="row">Alignement du texte</th>
                            <td>
                                <select name="entry_popup[text_align]">
                                    <option value="left" <?php selected($options['entry_popup']['text_align'], 'left'); ?>>Gauche</option>
                                    <option value="center" <?php selected($options['entry_popup']['text_align'], 'center'); ?>>Centre</option>
                                    <option value="right" <?php selected($options['entry_popup']['text_align'], 'right'); ?>>Droite</option>
                                </select>
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
                        <tr>
                            <th scope="row">Graisse de police</th>
                            <td>
                                <select name="entry_popup[font_weight]">
                                    <option value="normal" <?php selected($options['entry_popup']['font_weight'], 'normal'); ?>>Normal</option>
                                    <option value="bold" <?php selected($options['entry_popup']['font_weight'], 'bold'); ?>>Gras</option>
                                </select>
                                <p class="description">Épaisseur du texte du popup</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Style de police</th>
                            <td>
                                <select name="entry_popup[font_style]">
                                    <option value="normal" <?php selected($options['entry_popup']['font_style'], 'normal'); ?>>Normal</option>
                                    <option value="italic" <?php selected($options['entry_popup']['font_style'], 'italic'); ?>>Italique</option>
                                </select>
                                <p class="description">Style du texte du popup</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Transformation du texte</th>
                            <td>
                                <select name="entry_popup[text_transform]">
                                    <option value="none" <?php selected($options['entry_popup']['text_transform'], 'none'); ?>>Aucune</option>
                                    <option value="uppercase" <?php selected($options['entry_popup']['text_transform'], 'uppercase'); ?>>MAJUSCULES</option>
                                    <option value="lowercase" <?php selected($options['entry_popup']['text_transform'], 'lowercase'); ?>>minuscules</option>
                                    <option value="capitalize" <?php selected($options['entry_popup']['text_transform'], 'capitalize'); ?>>Capitalize</option>
                                </select>
                                <p class="description">Transformation appliquée au texte</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Largeur max</th>
                            <td>
                                <input type="number" name="entry_popup[width]" value="<?php echo esc_attr($options['entry_popup']['width']); ?>" min="200" step="10" class="small-text"> px
                                <p class="description">Largeur maximale du popup</p>
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
                            <th scope="row">Contenu</th>
                            <td>
                                <textarea name="exit_popup[content]" rows="4" class="large-text"><?php echo esc_textarea($options['exit_popup']['content']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Texte du bouton</th>
                            <td>
                                <input type="text" name="exit_popup[button_text]" value="<?php echo esc_attr($options['exit_popup']['button_text']); ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">URL du bouton</th>
                            <td>
                                <input type="url" name="exit_popup[button_url]" value="<?php echo esc_attr($options['exit_popup']['button_url']); ?>" class="regular-text">
                                <p class="description">URL vers laquelle le bouton redirige</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Couleur du bouton</th>
                            <td>
                                <input type="color" name="exit_popup[button_color]" value="<?php echo esc_attr($options['exit_popup']['button_color']); ?>">
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
                                <input type="text" name="exit_popup[background_color]" value="<?php echo esc_attr($options['exit_popup']['background_color']); ?>" class="regular-text color-picker">
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
                            <th scope="row">Alignement du texte</th>
                            <td>
                                <select name="exit_popup[text_align]">
                                    <option value="left" <?php selected($options['exit_popup']['text_align'], 'left'); ?>>Gauche</option>
                                    <option value="center" <?php selected($options['exit_popup']['text_align'], 'center'); ?>>Centre</option>
                                    <option value="right" <?php selected($options['exit_popup']['text_align'], 'right'); ?>>Droite</option>
                                </select>
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
                        <tr>
                            <th scope="row">Graisse de police</th>
                            <td>
                                <select name="exit_popup[font_weight]">
                                    <option value="normal" <?php selected($options['exit_popup']['font_weight'], 'normal'); ?>>Normal</option>
                                    <option value="bold" <?php selected($options['exit_popup']['font_weight'], 'bold'); ?>>Gras</option>
                                </select>
                                <p class="description">Épaisseur du texte du popup</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Style de police</th>
                            <td>
                                <select name="exit_popup[font_style]">
                                    <option value="normal" <?php selected($options['exit_popup']['font_style'], 'normal'); ?>>Normal</option>
                                    <option value="italic" <?php selected($options['exit_popup']['font_style'], 'italic'); ?>>Italique</option>
                                </select>
                                <p class="description">Style du texte du popup</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Transformation du texte</th>
                            <td>
                                <select name="exit_popup[text_transform]">
                                    <option value="none" <?php selected($options['exit_popup']['text_transform'], 'none'); ?>>Aucune</option>
                                    <option value="uppercase" <?php selected($options['exit_popup']['text_transform'], 'uppercase'); ?>>MAJUSCULES</option>
                                    <option value="lowercase" <?php selected($options['exit_popup']['text_transform'], 'lowercase'); ?>>minuscules</option>
                                    <option value="capitalize" <?php selected($options['exit_popup']['text_transform'], 'capitalize'); ?>>Capitalize</option>
                                </select>
                                <p class="description">Transformation appliquée au texte</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Largeur max</th>
                            <td>
                                <input type="number" name="exit_popup[width]" value="<?php echo esc_attr($options['exit_popup']['width']); ?>" min="200" step="10" class="small-text"> px
                                <p class="description">Largeur maximale du popup</p>
                            </td>
                        </tr>
                    </table>
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

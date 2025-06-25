<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- PopMagique Popups -->
<div id="popmagique-container">
    <!-- Popup d'Entrée -->
    <?php if ($options['entry_popup']['enabled']): ?>
    <div id="popmagique-entry-popup" class="popmagique-popup" style="display: none;">
        <div class="popmagique-backdrop"></div>
        <div class="popmagique-modal popmagique-entry-modal"
             style="background: <?php echo esc_attr($options['entry_popup']['background_color']); ?>;
                    color: <?php echo esc_attr($options['entry_popup']['text_color']); ?>;
                    font-family: <?php echo esc_attr($options['entry_popup']['font_family']); ?>;
                    font-size: <?php echo esc_attr($options['entry_popup']['font_size']); ?>;
                    font-weight: <?php echo esc_attr($options['entry_popup']['font_weight']); ?>;
                    font-style: <?php echo esc_attr($options['entry_popup']['font_style']); ?>;
                    text-transform: <?php echo esc_attr($options['entry_popup']['text_transform']); ?>;
                    text-align: <?php echo esc_attr($options['entry_popup']['text_align']); ?>;">
            
            <button class="popmagique-close" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="popmagique-content">
                <?php if (!empty($options['entry_popup']['image_url'])): ?>
                <div class="popmagique-image">
                    <img src="<?php echo esc_url($options['entry_popup']['image_url']); ?>" alt="">
                </div>
                <?php endif; ?>
                
                <p class="popmagique-text">
                    <?php echo wp_kses_post($options['entry_popup']['content']); ?>
                </p>
                
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Popup de Sortie -->
    <?php if ($options['exit_popup']['enabled']): ?>
    <div id="popmagique-exit-popup" class="popmagique-popup" style="display: none;">
        <div class="popmagique-backdrop"></div>
        <div class="popmagique-modal popmagique-exit-modal"
             style="background: <?php echo esc_attr($options['exit_popup']['background_color']); ?>;
                    color: <?php echo esc_attr($options['exit_popup']['text_color']); ?>;
                    font-family: <?php echo esc_attr($options['exit_popup']['font_family']); ?>;
                    font-size: <?php echo esc_attr($options['exit_popup']['font_size']); ?>;
                    font-weight: <?php echo esc_attr($options['exit_popup']['font_weight']); ?>;
                    font-style: <?php echo esc_attr($options['exit_popup']['font_style']); ?>;
                    text-transform: <?php echo esc_attr($options['exit_popup']['text_transform']); ?>;
                    text-align: <?php echo esc_attr($options['exit_popup']['text_align']); ?>;">
            
            <button class="popmagique-close" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="popmagique-content">
                <p class="popmagique-text">
                    <?php echo wp_kses_post($options['exit_popup']['content']); ?>
                </p>

                <div class="popmagique-actions">
                    <a href="<?php echo esc_url($options['exit_popup']['button_url']); ?>"
                       class="popmagique-button popmagique-button-primary"
                       style="background-color: <?php echo esc_attr($options['exit_popup']['button_color']); ?>;"
                       target="_blank">
                        <?php echo esc_html($options['exit_popup']['button_text']); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

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
                    font-size: <?php echo esc_attr($options['entry_popup']['font_size']); ?>;">
            
            <button class="popmagique-close" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="popmagique-content">
                <?php if (!empty($options['entry_popup']['image_url'])): ?>
                <div class="popmagique-image">
                    <img src="<?php echo esc_url($options['entry_popup']['image_url']); ?>" 
                         alt="<?php echo esc_attr($options['entry_popup']['title']); ?>">
                </div>
                <?php endif; ?>
                
                <h2 class="popmagique-title">
                    <?php echo esc_html($options['entry_popup']['title']); ?>
                </h2>
                
                <p class="popmagique-text">
                    <?php echo esc_html($options['entry_popup']['content']); ?>
                </p>
                
                <div class="popmagique-actions">
                    <a href="<?php echo esc_url($options['entry_popup']['button_url']); ?>" 
                       class="popmagique-button popmagique-button-primary"
                       style="background-color: <?php echo esc_attr($options['entry_popup']['button_color']); ?>;"
                       target="_blank">
                        <?php echo esc_html($options['entry_popup']['button_text']); ?>
                    </a>
                </div>
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
                    font-size: <?php echo esc_attr($options['exit_popup']['font_size']); ?>;">
            
            <button class="popmagique-close" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            <div class="popmagique-content">
                <div id="popmagique-newsletter-form">
                    <h2 class="popmagique-title">
                        <?php echo esc_html($options['exit_popup']['title']); ?>
                    </h2>
                    
                    <p class="popmagique-text">
                        <?php echo esc_html($options['exit_popup']['content']); ?>
                    </p>
                    
                    <form id="popmagique-subscribe-form" class="popmagique-form">
                        <div class="popmagique-form-group">
                            <div class="popmagique-input-wrapper">
                                <svg class="popmagique-input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <input type="email" 
                                       name="email" 
                                       placeholder="<?php echo esc_attr($options['exit_popup']['email_placeholder']); ?>" 
                                       required 
                                       class="popmagique-input">
                            </div>
                        </div>
                        
                        <div class="popmagique-actions">
                            <button type="submit" 
                                    class="popmagique-button popmagique-button-primary"
                                    style="background-color: <?php echo esc_attr($options['exit_popup']['button_color']); ?>;">
                                <span class="button-text"><?php echo esc_html($options['exit_popup']['button_text']); ?></span>
                                <span class="button-loading" style="display: none;">
                                    <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 12a9 9 0 11-6.219-8.56"/>
                                    </svg>
                                    Inscription...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div id="popmagique-success-message" style="display: none;">
                    <div class="popmagique-success-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22,4 12,14.01 9,11.01"></polyline>
                        </svg>
                    </div>
                    <h2 class="popmagique-title">
                        <?php echo esc_html($options['exit_popup']['success_message']); ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
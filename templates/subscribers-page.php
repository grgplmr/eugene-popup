<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap popmagique-subscribers">
    <h1><?php esc_html_e('📧 Abonnés Newsletter - PopMagique', 'popmagique'); ?></h1>
    
    <div class="popmagique-header">
        <div class="stats-summary">
            <div class="stat-item">
                <span class="stat-number"><?php echo count($subscribers); ?></span>
                <span class="stat-label"><?php esc_html_e('Total des abonnés', 'popmagique'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?php 
                    $recent = array_filter($subscribers, function($sub) {
                        return strtotime($sub->date_subscribed) > strtotime('-7 days');
                    });
                    echo count($recent);
                ?></span>
                <span class="stat-label"><?php esc_html_e('Cette semaine', 'popmagique'); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number"><?php 
                    $today = array_filter($subscribers, function($sub) {
                        return date('Y-m-d', strtotime($sub->date_subscribed)) === date('Y-m-d');
                    });
                    echo count($today);
                ?></span>
                <span class="stat-label"><?php esc_html_e("Aujourd'hui", 'popmagique'); ?></span>
            </div>
        </div>
        
        <div class="actions">
            <button type="button" class="button button-primary" id="export-subscribers">
                <?php esc_html_e('📤 Exporter en CSV', 'popmagique'); ?>
            </button>
        </div>
    </div>

    <?php if (empty($subscribers)): ?>
        <div class="no-subscribers">
            <div class="no-subscribers-icon">📭</div>
            <h2><?php esc_html_e('Aucun abonné pour le moment', 'popmagique'); ?></h2>
            <p><?php esc_html_e('Les adresses email collectées via le popup de sortie apparaîtront ici.', 'popmagique'); ?></p>
        </div>
    <?php else: ?>
        <div class="subscribers-table-container">
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th scope="col" class="manage-column"><?php esc_html_e('📧 Email', 'popmagique'); ?></th>
                        <th scope="col" class="manage-column"><?php esc_html_e("📅 Date d'inscription", 'popmagique'); ?></th>
                        <th scope="col" class="manage-column"><?php esc_html_e('🌐 Adresse IP', 'popmagique'); ?></th>
                        <th scope="col" class="manage-column"><?php esc_html_e('🔧 Actions', 'popmagique'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subscribers as $subscriber): ?>
                        <tr>
                            <td>
                                <strong><?php echo esc_html($subscriber->email); ?></strong>
                            </td>
                            <td>
                                <?php echo date_i18n('d/m/Y à H:i', strtotime($subscriber->date_subscribed)); ?>
                                <br>
                                <small class="description">
                                    <?php 
                                    $diff = human_time_diff(strtotime($subscriber->date_subscribed), current_time('timestamp'));
                                    echo sprintf(esc_html__('Il y a %s', 'popmagique'), $diff);
                                    ?>
                                </small>
                            </td>
                            <td>
                                <code><?php echo esc_html($subscriber->ip_address); ?></code>
                            </td>
                            <td>
                                <button type="button" class="button button-small delete-subscriber" 
                                        data-id="<?php echo $subscriber->id; ?>" 
                                        data-email="<?php echo esc_attr($subscriber->email); ?>">
                                    <?php esc_html_e('🗑️ Supprimer', 'popmagique'); ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    // Exporter les abonnés en CSV
    $('#export-subscribers').on('click', function() {
        var csvContent = "data:text/csv;charset=utf-8,";
        csvContent += "Email,Date d'inscription,Adresse IP\n";
        
        <?php foreach ($subscribers as $subscriber): ?>
        csvContent += "<?php echo esc_js($subscriber->email); ?>,<?php echo esc_js($subscriber->date_subscribed); ?>,<?php echo esc_js($subscriber->ip_address); ?>\n";
        <?php endforeach; ?>
        
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "popmagique-subscribers-" + new Date().toISOString().slice(0,10) + ".csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
    
    // Supprimer un abonné
    $('.delete-subscriber').on('click', function() {
        var button = $(this);
        var id = button.data('id');
        var email = button.data('email');
        
          if (confirm('<?php echo esc_js(__('Êtes-vous sûr de vouloir supprimer l\'abonné ', 'popmagique')); ?>' + email + ' ?')) {
            $.post(ajaxurl, {
                action: 'popmagique_delete_subscriber',
                nonce: '<?php echo wp_create_nonce('popmagique_nonce'); ?>',
                id: id
            }, function(response) {
                if (response.success) {
                    button.closest('tr').fadeOut(function() {
                        $(this).remove();
                    });
                } else {
                    alert('<?php echo esc_js(__('Erreur lors de la suppression : ', 'popmagique')); ?>' + response.data);
                }
            });
        }
    });
});
</script>
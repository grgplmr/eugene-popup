<?php
/**
 * Uninstall script for PopMagique
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete plugin options
delete_option('popmagique_options');

// Drop subscribers table
global $wpdb;
$table_name = $wpdb->prefix . 'popmagique_subscribers';
$wpdb->query("DROP TABLE IF EXISTS $table_name");


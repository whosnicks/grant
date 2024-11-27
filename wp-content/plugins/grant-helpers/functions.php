<?php
// FIXME: Not working as expected
// Enqueue Styles for Admin Panel
function enqueue_styles_and_scripts()
{
    $plugin_url = plugin_dir_url(__FILE__);

    // Enqueue stats css
    wp_enqueue_style('stats-css', $plugin_url . 'assets/css/stats.css', array(), '1.0', 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_styles_and_scripts');

<?php

class Grant_Helper_Menu
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_grant_helper_menu'));
    }

    public function add_grant_helper_menu()
    {
        // Add 'Sliders' submenu under 'Grant Custom Menu'
        add_submenu_page(
            'themes.php',
            'Sliders',
            'Sliders',
            'manage_options',
            'edit.php?post_type=grant_sliders'
        );

        // Add 'Logos' submenu under 'Grant Custom Menu'
        add_submenu_page(
            'themes.php',
            'Logos',
            'Logos',
            'manage_options',
            'edit.php?post_type=grant_logos'
        );

        // Add 'Team' submenu under 'Grant Custom Menu'
        add_submenu_page(
            'themes.php',
            'Team',
            'Team',
            'manage_options',
            'edit.php?post_type=grant_team'
        );

        // Add 'Stats' submenu under 'Grant Custom Menu'
        add_submenu_page(
            'themes.php',
            'Stats',
            'Stats',
            'manage_options',
            'edit.php?post_type=grant_stats'
        );
    }
}

new Grant_Helper_Menu();

<?php

class Grant_Register_Post_Types
{

    public function register_slider_post_type()
    {
        $labels = [
            'name'               => _x('Sliders', 'post type general name'),
            'singular_name'      => _x('Slider', 'post type singular name'),
            'menu_name'          => _x('Sliders', 'admin menu'),
            'name_admin_bar'     => _x('Slider', 'add new on admin bar'),
            'add_new'            => _x('Add New Slider', 'slider'),
            'add_new_item'       => __('Add New Slider'),
            'edit_item'          => __('Edit Slider'),
            // 'view_item'          => __('View Slider'),
            'all_items'          => __('All Sliders'),
            'search_items'       => __('Search Sliders'),
            'parent_item_colon'  => __('Parent Sliders:'),
            'not_found'          => __('No sliders found.'),
            'not_found_in_trash' => __('No sliders found in trash.'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'slider'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-slides',
            'supports'           => ['title', 'editor', 'thumbnail', 'custom-fields']
        ];

        register_post_type('grant_sliders', $args);
    }

    public function register_logos_post_type()
    {
        $labels = [
            'name'               => _x('Logos', 'post type general name'),
            'singular_name'      => _x('Logo', 'post type singular name'),
            'menu_name'          => _x('Logos', 'admin menu'),
            'name_admin_bar'     => _x('Logo', 'add new on admin bar'),
            'add_new'            => _x('Add New Logo', 'logo'),
            'add_new_item'       => __('Add New Logo'),
            'edit_item'          => __('Edit Logo'),
            'view_item'          => __('View Logo'),
            'all_items'          => __('All Logos'),
            'search_items'       => __('Search Logos'),
            'parent_item_colon'  => __('Parent Logos:'),
            'not_found'          => __('No logos found.'),
            'not_found_in_trash' => __('No logos found in trash.'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'logo'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-format-image',
            'supports'           => ['title', 'thumbnail',]
        ];

        register_post_type('grant_logos', $args);
    }

    public function register_team_post_type()
    {
        $labels = [
            'name'               => _x('Team', 'post type general name'),
            'singular_name'      => _x('Team Member', 'post type singular name'),
            'menu_name'          => _x('Team', 'admin menu'),
            'name_admin_bar'     => _x('Team Member', 'add new on admin bar'),
            'add_new'            => _x('Add New Member', 'team'),
            'add_new_item'       => __('Add New Team Member'),
            'edit_item'          => __('Edit Team Member'),
            'view_item'          => __('View Team Member'),
            'all_items'          => __('All Team Members'),
            'search_items'       => __('Search Team Members'),
            'parent_item_colon'  => __('Parent Team Member:'),
            'not_found'          => __('No team members found.'),
            'not_found_in_trash' => __('No team members found in trash.'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'team'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-groups',
            'supports'           => ['title', 'thumbnail',]
        ];

        register_post_type('grant_team', $args);
    }

    // FIXME: Not working as expected
    public function register_stats_post_type()
    {
        $labels = [
            'name'               => _x('Stats', 'post type general name'),
            'singular_name'      => _x('Stat', 'post type singular name'),
            'menu_name'          => _x('Stats', 'admin menu'),
            'name_admin_bar'     => _x('Stats', 'add new on admin bar'),
            'all_items'          => __('All Stats'),
            'search_items'       => __('Search Stats'),
            'not_found'          => __('No stats found.'),
            'not_found_in_trash' => __('No stats found in trash.'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,  // Disables front-end query
            'show_ui'            => true,
            'show_in_menu'       => false,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'stats'],
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-chart-line',
            'supports'           => ['title'],
        ];

        register_post_type('grant_stats', $args);
    }
}

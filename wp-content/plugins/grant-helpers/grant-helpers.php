<?php

/*
* Plugin Name: Grant Helpers
* Description: Configure your website text and images.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
 * Author: Nick Gabe
 * Author URI: https://nickgabe.com/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: nis_helpers
* Domain Path: /languages
* Requires Plugins:
*/


if (! defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/cpt-register.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes/team-meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes/stats-meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/menu.php';



$post_types = new Grant_Register_Post_Types();
$meta_boxes_team = new Grant_Team_Meta_Box();
$meta_boxes_stats = new Grant_Stats_Meta_Boxes();



add_action('init', array($post_types, 'register_slider_post_type'));
add_action('init', array($post_types, 'register_logos_post_type'));
add_action('init', array($post_types, 'register_team_post_type'));
add_action('init', array($post_types, 'register_stats_post_type'));

add_action('add_meta_boxes', array($meta_boxes_team, 'add_team_meta_box'));
add_action('save_post_grant_team', array($meta_boxes_team, 'save_team_meta_data'));

add_action('add_meta_boxes', array($meta_boxes_stats, 'add_stats_meta_box'));
add_action('save_post_grant_stats', array($meta_boxes_stats, 'save_stats_meta_data'));

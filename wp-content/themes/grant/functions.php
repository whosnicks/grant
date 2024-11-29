<?php

/**
 * Add theme features.
 */
add_theme_support('post-thumbnails');
add_theme_support('site-icon');

function grant_custom_logo()
{
    $defaults = array(
        'height'               => 150,
        'width'                => 150,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'grant_custom_logo');



/**
 * Register main menu
 **/
if (!function_exists('grant_register_main_menu')) {
    function grant_register_main_menu()
    {
        register_nav_menus(
            array(
                'primary_menu' => __('Primary Menu', 'primary_meny'),
                'footer_menu'  => __('Footer Menu', 'footer_menu'),
            )
        );
    }
    add_action('after_setup_theme', 'grant_register_main_menu');
}

/**
 * Add theme styles
 */

function enqueue_styles_and_scripts()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/output.css', array(), '1.0', 'all');
    wp_enqueue_style('headercss', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0', 'all');
    wp_enqueue_style('contactcss', get_template_directory_uri() . '/assets/css/contact-form.css', array(), '1.0', 'all');
    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array(), '1.0', true);
    wp_enqueue_script('flowbite', get_template_directory_uri() . '/node_modules/flowbite/dist/flowbite.min.js', array(), '1.0', true);
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/dabad9c33d.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');

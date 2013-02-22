<?php

function chestnut_adsense_template_setup() {
    
    if (function_exists('add_theme_support')) 
    {
        add_theme_support('menus');
        register_nav_menu('primary', __('primary', 'chestnut-adsense'));  
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(80, 80);
    };
     
    if (!defined('CHAD_LOGO')) {
        define('CHAD_LOGO', get_bloginfo('template_directory').'/image/logo.png');
    }
    if (!defined('CHAD_FAVICON')) {
        define('CHAD_FAVICON', get_bloginfo('template_directory').'/image/favicon.ico');
    }
    if (!defined('CHAD_CAST_SHADOW')) {
        define('CHAD_CAST_SHADOW', '1');
    }
    if (!defined('CHAD_BANNER_FONT')) {
        define('CHAD_BANNER_FONT', 'greyscale');
    }
    if (!defined('CHAD_HEADER_FONT')) {
        define('CHAD_HEADER_FONT', 'greyscale');
    }
    if (!defined('CHAD_BODY_FONT')) {
        define('CHAD_BODY_FONT', 'gudea');
    }
    if (!defined('CHAD_BACKGROUND_COLOR')) {
        define('CHAD_BACKGROUND_COLOR', '#1E2C35');
    }
    if (!defined('CHAD_BACKGROUND_TILE_IMAGE')) {
        define('CHAD_BACKGROUND_TILE_IMAGE', get_bloginfo('template_directory').'/image/tile-light.png');
    }
    if (!defined('CHAD_BANNER_COLOR')) {
        define('CHAD_BANNER_COLOR', '#ffffff');
    }
    if (!defined('CHAD_HEADER_SHADOW_COLOR')) {
        define('CHAD_HEADER_SHADOW_COLOR', '#000000');
    }
    if (!defined('CHAD_CAST_SHADOW_UNDER_HEADER')) {
        define('CHAD_CAST_SHADOW_UNDER_HEADER', '1');
    }
    if (!defined('CHAD_LINK_COLOR_NORMAL')) {
        define('CHAD_LINK_COLOR_NORMAL', '#102552');
    }
    if (!defined('CHAD_LINK_COLOR_HOVER')) {
        define('CHAD_LINK_COLOR_HOVER', '#22b7dd');
    }
    if (!defined('CHAD_BANNER_COLOR_1')) {
        define('CHAD_BANNER_COLOR_1', '#D18EA3');
    }
    if (!defined('CHAD_BANNER_COLOR_2')) {
        define('CHAD_BANNER_COLOR_2', '#EC80A4');
    }
    if (!defined('CHAD_MENU_COLOR_NORMAL_1')) {
        define('CHAD_MENU_COLOR_NORMAL_1', '#555555');
    }
    if (!defined('CHAD_MENU_COLOR_NORMAL_2')) {
        define('CHAD_MENU_COLOR_NORMAL_2', '#666666');
    }
    if (!defined('CHAD_MENU_COLOR_HOVER_1')) {
        define('CHAD_MENU_COLOR_HOVER_1', '#333333');
    }
    if (!defined('CHAD_MENU_COLOR_HOVER_2')) {
        define('CHAD_MENU_COLOR_HOVER_2', '#555555');
    }
    if (!defined('CHAD_MENU_COLOR_SELECTED_1')) {
        define('CHAD_MENU_COLOR_SELECTED_1', '#3C0B1D');
    }
    if (!defined('CHAD_MENU_COLOR_SELECTED_2')) {
        define('CHAD_MENU_COLOR_SELECTED_2', '#6A2344');
    }
    if (!defined('CHAD_BUTTON_COLOR')) {
        define('CHAD_BUTTON_COLOR', '#EC80A4');
    }
    if (!defined('CHAD_BULLET_ICON')) {
        define('CHAD_BULLET_ICON', get_bloginfo('template_directory').'/image/bullet.png');
    }
}

<?php

function chestnutty_template_setup() {
    
    if (function_exists('add_theme_support')) 
    {
        add_theme_support('menus');
        register_nav_menu('primary', __('primary', 'chestnutty'));  
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(80, 80);
    };
     
    if (!defined('CHESTNUTTY_LOGO')) {
        define('CHESTNUTTY_LOGO', get_bloginfo('template_directory').'/image/logo.png');
    }
    if (!defined('CHESTNUTTY_FAVICON')) {
        define('CHESTNUTTY_FAVICON', get_bloginfo('template_directory').'/image/favicon.ico');
    }
    if (!defined('CHESTNUTTY_CAST_SHADOW')) {
        define('CHESTNUTTY_CAST_SHADOW', '1');
    }
    if (!defined('CHESTNUTTY_BANNER_FONT')) {
        define('CHESTNUTTY_BANNER_FONT', 'greyscale');
    }
    if (!defined('CHESTNUTTY_HEADER_FONT')) {
        define('CHESTNUTTY_HEADER_FONT', 'greyscale');
    }
    if (!defined('CHESTNUTTY_BODY_FONT')) {
        define('CHESTNUTTY_BODY_FONT', 'gudea');
    }
    if (!defined('CHESTNUTTY_BACKGROUND_COLOR')) {
        define('CHESTNUTTY_BACKGROUND_COLOR', '#1E2C35');
    }
    if (!defined('CHESTNUTTY_BACKGROUND_TILE_IMAGE')) {
        define('CHESTNUTTY_BACKGROUND_TILE_IMAGE', get_bloginfo('template_directory').'/image/tile-light.png');
    }
    if (!defined('CHESTNUTTY_BANNER_COLOR')) {
        define('CHESTNUTTY_BANNER_COLOR', '#ffffff');
    }
    if (!defined('CHESTNUTTY_HEADER_SHADOW_COLOR')) {
        define('CHESTNUTTY_HEADER_SHADOW_COLOR', '#000000');
    }
    if (!defined('CHESTNUTTY_CAST_SHADOW_UNDER_HEADER')) {
        define('CHESTNUTTY_CAST_SHADOW_UNDER_HEADER', '1');
    }
    if (!defined('CHESTNUTTY_LINK_COLOR_NORMAL')) {
        define('CHESTNUTTY_LINK_COLOR_NORMAL', '#102552');
    }
    if (!defined('CHESTNUTTY_LINK_COLOR_HOVER')) {
        define('CHESTNUTTY_LINK_COLOR_HOVER', '#22b7dd');
    }
    if (!defined('CHESTNUTTY_BANNER_COLOR_1')) {
        define('CHESTNUTTY_BANNER_COLOR_1', '#D18EA3');
    }
    if (!defined('CHESTNUTTY_BANNER_COLOR_2')) {
        define('CHESTNUTTY_BANNER_COLOR_2', '#EC80A4');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_NORMAL_1')) {
        define('CHESTNUTTY_MENU_COLOR_NORMAL_1', '#555555');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_NORMAL_2')) {
        define('CHESTNUTTY_MENU_COLOR_NORMAL_2', '#666666');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_HOVER_1')) {
        define('CHESTNUTTY_MENU_COLOR_HOVER_1', '#333333');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_HOVER_2')) {
        define('CHESTNUTTY_MENU_COLOR_HOVER_2', '#555555');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_SELECTED_1')) {
        define('CHESTNUTTY_MENU_COLOR_SELECTED_1', '#3C0B1D');
    }
    if (!defined('CHESTNUTTY_MENU_COLOR_SELECTED_2')) {
        define('CHESTNUTTY_MENU_COLOR_SELECTED_2', '#6A2344');
    }
    if (!defined('CHESTNUTTY_BUTTON_COLOR')) {
        define('CHESTNUTTY_BUTTON_COLOR', '#EC80A4');
    }
    if (!defined('CHESTNUTTY_BULLET_ICON')) {
        define('CHESTNUTTY_BULLET_ICON', get_bloginfo('template_directory').'/image/bullet.png');
    }
}

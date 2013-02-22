<?php

require_once('include/setup.php');
require_once('include/form.php');
require_once('include/header.php');
require_once('include/helper.php');

if (function_exists('register_sidebar'))
{
    register_sidebar
    (
        array
        (
            'name'=>'Page Sub Navigation',
            'id'=>'main-sidebar',
            'before_widget'=>'<div id="%1$s" class="widget %2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h2 class="widgettitle">',
            'after_title'=>'</h2>',
        )
    );
    
    register_sidebar
    (
        array
        (
            'name'=>'Page Footer Navigation',
            'id'=>'footer-sidebar',
            'before_widget'=>'<div id="%1$s" class="widget %2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h2 class="widgettitle">',
            'after_title'=>'</h2>',
        )
    );
}


function chestnutty_get_option($optionName, $default = null)
{
    return stripslashes(get_option($optionName, $default));
};

add_action('wpmu_activate_blog','chestnutty_create_default_pages');

function chestnutty_create_default_page($title, $templateFileName) {
    $privacyPage = array
    (
        'post_title' => $title,
        'post_content' => 'This is the '.$title.' page.',
        'post_status' => 'publish',
        'post_type' => 'page',
    );
    $newPostId = wp_insert_post($newPost);
    if($newPostId) {
        update_post_meta($newPostId, '_wp_page_template', $templateFileName);
    }
}

function chestnutty_create_default_pages(){
    chestnutty_create_default_page('Privacy Policy', 'privacy.php');
    chestnutty_create_default_page('Terms and Conditions', 'term.php');
    chestnutty_create_default_page('Contact', 'contact-form-template.php');
}

add_action('after_setup_theme', 'chestnutty_template_setup');
add_action('admin_init', 'chestnutty_admin_head');
function chestnutty_admin_head() {
    $templateDir = get_bloginfo('template_directory');
    
    wp_enqueue_style('chestnutty-admin-css', $templateDir.'/admin.css');
    wp_enqueue_style('uploadify-css', $templateDir.'/script/lib/uploadify/uploadify.css');
    wp_enqueue_style('farbtastic');
    wp_enqueue_script('farbtastic');
    wp_enqueue_script('jquery');
    wp_enqueue_script('uploadify-swfojbect', $templateDir.'/script/lib/uploadify/swfobject.js');
    wp_enqueue_script('uploadify-uploadify', $templateDir.'/script/lib/uploadify/jquery.uploadify.v2.1.4.min.js');
    wp_enqueue_script('stlib', $templateDir.'/script/stlib.js');
}

add_action('wp_head', 'chestnutty_head');

add_action('admin_menu', 'chestnutty_admin_menu');
function chestnutty_admin_menu() {
    $themePage = add_theme_page(__("Options", 'chestnutty'), __("Options", 'chestnutty'), 'edit_theme_options', 'chestnutty_general_options_page', 'chestnutty_general_options_page');
    add_action( "admin_head-{$themePage}", 'chestnutty_setup_uploadify');
};

?>
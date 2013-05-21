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
function chestnutty_get_ad($width, $height, $class = '') {
    $unit = array('width' => $width, 'height' => $height);

    if (!empty($class)) {
        $class = ' '.$class;
    }

    $content = <<<HTML
                        <div class="ad{$class}">
                            <div style="display: inline-block; width: {$unit['width']}px; height: {$unit['height']}px; color: #fff; text-align: center; line-height: {$unit['height']}px; background-color: #8888ff;">{$unit['width']} x {$unit['height']}</div>
                        </div>
HTML;
    echo $content;
}
if (!function_exists('chestnutty_get_social_links')):
function chestnutty_get_social_links($link) {
    $content = <<<HTML
<div class="social">
    <h2 class="social-title">Share This Post</h2>
    <ul class="social-list">
        <li class="social-link-item">
            <a class="social-link social-link-twitter" href="http://twitter.com/home/?status={$link}" title="Share On Twitter">L</a>
        </li>
        <li class="social-link-item">
            <a class="social-link social-link-facebook" href="http://www.facebook.com/sharer.php?u={$link}" title="Share On Facebook">F</a>
        </li>
        <li class="social-link-item">
            <a class="social-link social-link-googleplus" href="https://plus.google.com/share?url={$link}" title="Share On Google+">G</a>
        </li>
        <li class="social-link-item">
            <a class="social-link social-link-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url={$link}" title="Share On LinkedIn">I</a>
        </li>
    </ul>
</div>
HTML;
    echo $content;
}
endif;

if (!function_exists('chestnutty_get_content_nav')):
function chestnutty_get_content_nav() {
    global $wp_query;

    if ($wp_query->max_num_pages > 1):
?>
        <nav class="content-nav">
            <div class="content-nav-previous"><?php next_posts_link('Older Posts'); ?></div>
            <div class="content-nav-next"><?php previous_posts_link('Newer Posts'); ?></div>
        </nav>
<?php
    endif;
}
endif;
function chestnutty_get_hot_deals() {
    $content = <<<HTML
                <section class="hot-deal feature-post">
                    <header class="feature-post-header">
                        <h2 class="feature-post-title">Hot Deals</h2>
                    </header>
                    <ul class="feature-post-list row-fluid">
                        <li class="post-item span3">
                            <a class="post-thumbnail-link" href="#">
                                <img src="http://ecx.images-amazon.com/images/I/5177rLAGSoL._SY445_.jpg" alt="GEORGE BRIDE Beaded High-Neck Halter Keyhole Open Back Detachable Chiffon Sweep/Brush Train" />
                            </a>
                            <div class="caption">
                                <h3 class="post-title">
                                   <a href="#">GEORGE BRIDE Beaded High-Neck Halter Keyhole Open Back Detachable Chiffon Sweep/Brush Train</a>
                                </h3>
                                <div class="post-meta">
                                    George Bride
                                </div>
                                <p class="post-action">
                                    <span class="post-price">$226.00</span>
                                    <a href="#" class="btn-amazon">Buy</a>
                                </p>
                            </div>
                        </li>
                        <li class="post-item span3">
                               <a class="post-thumbnail-link" href="#">
                                   <img src="http://ecx.images-amazon.com/images/I/51L6BpKERQL._SX342_.jpg" alt="GEORGE BRIDE Exquisite A Line Fitted Bodice Open Back Court Train Taffeta Wedding Dress" />
                                </a>
                                <div class="caption">
                                    <h3 class="post-title">
                                       <a href="#">GEORGE BRIDE Exquisite A Line Fitted Bodice Open Back Court Train Taffeta Wedding Dress</a>
                                    </h3>
                                    <div class="post-meta">
                                        George Bride
                                    </div>
                                    <p class="post-action">
                                        <span class="post-price">$168.00</span>
                                        <a href="#" class="btn-amazon">Buy</a>
                                    </p>
                                </div>
                        </li>
                        <li class="post-item span3">
                               <a class="post-thumbnail-link" href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnutty'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
                                   <img src="http://ecx.images-amazon.com/images/I/51VaChpfFNL._SX342_.jpg" alt="GEORGE BRIDE Glamorous A Line Spaghetti Straps Open Back Sweep/Brush Train Satin Wedding Dress" />
                                </a>
                                <div class="caption">
                                    <h3 class="post-title">
                                       <a href="#">GEORGE BRIDE Glamorous A Line Spaghetti Straps Open Back Sweep/Brush Train Satin Wedding Dress</a>
                                    </h3>
                                    <div class="post-meta">
                                        George Bride
                                    </div>
                                    <p class="post-action">
                                        <span class="post-price">$162.00</span>
                                        <a href="#" class="btn-amazon">Buy</a>
                                    </p>
                                </div>
                        </li>
                        <li class="post-item span3">
                           <a class="post-thumbnail-link" href="#">
                               <img src="http://ecx.images-amazon.com/images/I/51IQn4i8FIL._SY445_.jpg" alt="Winey Bridal Satin Spaghett Strap Informal Ankle Length White Low Back Sexy Bridal Wedding Dresses" />
                            </a>
                            <div class="caption">
                                <h3 class="post-title">
                                       <a href="#">Winey Bridal Satin Spaghett Strap Informal Ankle Length White Low Back Sexy Bridal Wedding Dresses</a>
                                    </h3>
                                    <div class="post-meta">
                                        Winey Bridal
                                    </div>
                                    <p class="post-action">
                                        <span class="post-price">$139.99</span>
                                        <a href="#" class="btn-amazon">Buy</a>
                                    </p>
                                </div>
                        </li>
                    </ul>
                </section>
HTML;
    echo $content;
}
function chestnutty_get_recommended_products() {
    $content = <<<HTML
                        <div class="recommended-product sidebar-item">
                            <header class="sidebar-header">
                                <h2 class="sidebar-title">Hot Deals</h2>
                            </header>
                            <ul class="post-list">
                                <li class="post-item">
                                    <a href="#" class="post-thumbnail-link">
                                        <img src="http://ecx.images-amazon.com/images/I/5177rLAGSoL._SY445_.jpg" alt="" />
                                    </a>
                                    <h3 class="post-title">
                                       <a href="#">GEORGE BRIDE Beaded High-Neck Halter Keyhole Open Back Detachable Chiffon Sweep/Brush Train</a>
                                    </h3>
                                    <div class="post-meta">
                                        George Bride
                                    </div>
                                    <p class="post-action">
                                        <span class="post-price">$226.00</span>
                                        <a href="#" class="btn-amazon">Buy</a>
                                    </p>
                                </li>
                                <li class="post-item">
                                    <a href="#" class="post-thumbnail-link">
                                        <img src="http://ecx.images-amazon.com/images/I/51VaChpfFNL._SX342_.jpg" alt="" />
                                    </a>
                                    <h3 class="post-title">
                                       <a href="#">GEORGE BRIDE Glamorous A Line Spaghetti Straps Open Back Sweep/Brush Train Satin Wedding Dress</a>
                                    </h3>
                                    <div class="post-meta">
                                        George Bride
                                    </div>
                                    <p class="post-action">
                                        <span class="post-price">$162.00</span>
                                        <a href="#" class="btn-amazon">Buy</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
HTML;
    echo $content;
}
function chestnutty_string_limit_words($string, $wordLimit) {
    $words = explode(' ', $string, ($wordLimit + 1));
    $output = '';

    if(count($words) > $wordLimit) {
        array_pop($words);
        $output = implode(' ', $words).'...';
    }
    else {
        $output = $string;
    }
    return $output;
}
add_action('after_setup_theme', 'chestnutty_template_setup');
add_action('admin_init', 'chestnutty_admin_head');
function chestnutty_admin_head() {
    $templateDir = get_bloginfo('template_directory');
    
    wp_enqueue_style('chestnutty-admin-css', $templateDir.'/admin.css');
    wp_enqueue_style('uploadify-css', $templateDir.'/js/uploadify/uploadify.css');
    wp_enqueue_style('farbtastic');
    wp_enqueue_script('farbtastic');
    wp_enqueue_script('jquery');
    wp_enqueue_script('uploadify-swfojbect', $templateDir.'/js/uploadify/swfobject.js');
    wp_enqueue_script('uploadify-uploadify', $templateDir.'/js/uploadify/jquery.uploadify.v2.1.4.min.js');
    wp_enqueue_script('stlib', $templateDir.'/js/stlib.js');
}

add_action('admin_menu', 'chestnutty_admin_menu');
function chestnutty_admin_menu() {
    $themePage = add_theme_page(__("Options", 'chestnutty'), __("Options", 'chestnutty'), 'edit_theme_options', 'chestnutty_general_options_page', 'chestnutty_general_options_page');
    add_action( "admin_head-{$themePage}", 'chestnutty_setup_uploadify');
};

?>
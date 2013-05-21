<!DOCTYPE html>
<html>
    <head>
        <title>
<?php
        wp_title('-', true, 'right');
        bloginfo('name');
?>
        </title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
        wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style('theme-stylesheet', get_bloginfo('stylesheet_url'));
        wp_head();
?>
    </head>
    <body <?php body_class(); ?>>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                    <div class="nav-collapse collapse">
                        <?php wp_nav_menu(array('menu_class' => 'nav')); ?>
                    </div>
                </div>
            </div>
        </div>
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php
                wp_title('-', true, 'right');
                bloginfo('name');
            ?>
        </title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <script src="<?php bloginfo('template_directory'); ?>/script/lib/respond.js"></script>
        <!--[if lte IE 8]>
        <script src="<?php bloginfo('template_directory'); ?>/script/lib/html5.js"></script>
        <![endif]-->
        <?php
            wp_enqueue_script('jquery');
            wp_head();
            flush();
        ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="body-inner">
            <div id="wrapper">
                <header id="banner" role="banner">
                    <div class="banner-inner">
                        <hgroup>
                            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                            <h2><?php bloginfo('description'); ?></h2>
                        </hgroup>
                    </div>
                    <nav class="menu">
                        <?php
                            wp_nav_menu();
                        ?>
                    </nav>
                </header>
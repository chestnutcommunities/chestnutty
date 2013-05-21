<?php get_header(); ?>
        <div class="page-grid">
            <div class="container">
                <div class="page-content">
                    <div class="row-fluid">
<?php
                        if (have_posts()):
?>
                        <div class="main-post span8">
                            <div class="archive">
                                <header class="archive-header">
                                    <h1 class="archive-title">
                                        Category: <b><?php echo single_cat_title('', false); ?></b>
                                    </h1>
<?php
                                    if (category_description()):
?>
                                    <div class="archive-meta"><p><?php echo category_description(); ?></p></div>
<?php
                                    endif;
?>
                                </header>
                                <ul class="post-list">
<?php

                                    while (have_posts()): the_post();
?>
                                    <li class="post-item">
                                        <div class="row-fluid">
                                            <a class="post-thumbnail-link span3" href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnutty'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
<?php
                                                if (function_exists('wp_rp_get_post_thumbnail_img')):
                                                    $id = get_the_id();
                                                    $img = wp_rp_get_post_thumbnail_img(get_post($id));
                                                    echo $img;
                                                endif;
?>
                                            </a>
                                            <div class="post-caption span9">
                                                <h3 class="post-title">
                                                    <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnutty'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
<?php
                                                        $title = get_the_title();
                                                        echo chestnutty_string_limit_words($title, 8);
?>
                                                    </a>
                                                </h3>
                                                <div class="post-meta">
                                                    <p class="post-date">
                                                        <span class="icon-calendar"></span> <?php the_time(get_option('date_format')); ?>
                                                    </p>
                                                    <p class="post-excerpt">
<?php
                                                        $excerpt = get_the_excerpt();
                                                        echo chestnutty_string_limit_words($excerpt, 28);
?>
                                                        <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
<?php
                                    endwhile; // while (have_posts()): the_post();
?>
                                </ul>
                            </div>
                            <?php chestnutty_get_ad(200, 90); ?>
                        </div>
<?php
                        else:
?>
<?php
                        endif;

                        wp_reset_query();
?>
                        <div class="sidebar span4">
                            <div class="tag-cloud sidebar-item">
                                <?php the_widget( 'WP_Widget_Tag_Cloud', 'title='.__('Tags', 'chestnutty')); ?>  
                            </div>
                            <?php chestnutty_get_ad(200, 200, 'sidebar-item'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>

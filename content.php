<?php
/*
 * Template for single
 */

?>
        <div class="page-grid">
            <div class="container">
                <div class="page-content">
                    <div class="row-fluid">
<?php
                        while (have_posts()) : the_post();
?>
                        <article class="main-post span8">
                            <header class="main-post-header">
                                <h1 class="main-post-title"><?php the_title(); ?></h1>
                                <div class="main-post-meta">
                                    <div class="main-post-meta-date">
                                        <span class="icon-calendar"></span> <?php the_time(get_option('date_format')); ?>
                                    </div>
                                </div>
                            </header>
                            <div class="main-post-content">
<?php
                                if (has_post_thumbnail()):
?>
                                <div class="feature-image">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
<?php
                                endif;

                                chestnutty_get_ad(250, 250, 'opening');
                                the_content();
?>
                            </div>
                            <div class="main-post-meta">
<?php
                                // Render tags for the post in a list
                                if (get_the_tag_list()):
?>  
                                <div class="main-post-meta-tag">
                                    <span class="icon-tags"></span> <?php echo get_the_tag_list('', ', ', ''); ?>
                                </div>
<?php
                                endif;
?>
                            </div>
                            <?php chestnutty_get_ad(200, 90); ?>
<?php
                            // Render social media links
                            chestnutty_get_social_links(get_permalink());
?>
                            <div class="related-post">
<?php
                                if (function_exists('wp_related_posts')):
                                    wp_related_posts();
                                endif;
?>
                            </div>
<?php
                            comments_template('', true);
?>
                        </article>
<?php
                        endwhile;
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
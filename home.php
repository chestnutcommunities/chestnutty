<?php
    get_header();
?>
        <div class="page-grid">
            <section class="feature-content">
                <div class="active item feature-content-item">
                    <div class="container">
                        <h1><?php bloginfo('name'); ?></h1>
                        <p>
                            <?php bloginfo('description'); ?>
                        </p>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="page-content">
                    <section class="feature-post">
                        <header class="feature-post-header">
                            <h2 class="feature-post-title">Latest Posts</h2>
                        </header>
                        <ul class="feature-post-list row-fluid">
<?php
                            $latestPosts = new WP_Query();
                            $latestPosts->query('showposts=3');

                            while ($latestPosts->have_posts()): $latestPosts->the_post();
?>
                            <li class="post-item span4">
                               <a class="post-thumbnail-link" href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnutty'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
<?php
                                   if (function_exists('wp_rp_get_post_thumbnail_img')):
                                       $id = get_the_id();
                                       $img = wp_rp_get_post_thumbnail_img(get_post($id));
                                       echo $img;
                                   endif;
?>
                                </a>
                                <div class="post-caption">
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
                            </li>
<?php
                            endwhile; // while ($latestPosts->have_posts()): $latestPosts->the_post();

                            wp_reset_query();
?>
                        </ul>
                    </section>
<?php
                    chestnutty_get_hot_deals();
?>
                    <section class="ad-panel">
                        <div class="row-fluid">
                            <div class="ad-content offset2 span8">
                                <div class="row-fluid">
                                    <?php chestnutty_get_ad(200, 90, 'span6'); ?>
                                    <?php chestnutty_get_ad(200, 90, 'span6'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
<?php
    get_footer();
?>

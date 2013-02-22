<?php
    get_header();
?>
<div id="content-wrapper">
<div id="content" class="content" role="main">
<?php
    get_ad('468x60');
    
    while (have_posts()) : the_post();
        if (is_single() || is_page()):
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
<?php
        else:
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
<?php
        endif;
        if (!is_single() && !is_page()):
            if (function_exists('wp_rp_get_post_thumbnail_img')) {
                $id = get_the_id();
                $img = wp_rp_get_post_thumbnail_img(get_post($id));
                echo '<div class="thumbnail">'.$img.'</div>';
            }
        endif;
        
        if (!is_page()):
?>
        <div class="post-info">
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnut-adsense'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
                    <?php if (trim(get_the_title()) != '') { the_title(); } else { echo '&nbsp;'; }; ?>
                </a>
            </h1>
            <div class="meta">  
                <?php _e('Date', 'chestnut-adsense'); ?>: <?php the_time(get_option('date_format')); ?>
            </div>
<?php
        endif; // if (!is_page()):
        
        // Render the content of the post
?>
            <div class="post-content">
<?php 
        if (!is_single() && !is_page()):
            the_excerpt();
        else: 
            if (has_post_thumbnail()):
?>
                <div class="feature-image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
<?php
            endif;
            // render content of the post
            the_content();
        endif; // if (!is_single() && !is_page()):
?>
            </div>
<?php
        // Render supporting links. Read more, Leave a comment etc.
        if (!is_single() && !is_page()):
?>
            <div class="read-more">
                <a href="<?php the_permalink() ?>#more" class="more-link"><?php _e('Read more', 'chestnut-adsense'); ?></a>
            </div>
            <div class="add-comment">
                <?php comments_popup_link(__('No Comments', 'chestnut-adsense'), __('1 Comment', 'chestnut-adsense'), __('% Comments', 'chestnut-adsense')); ?>
            </div>  
<?php
        else:
            wp_link_pages(array('before' => '<div class="page-link">'.__( 'Pages:', 'chestnut-adsense' ), 'after' => '</div>'));
        endif; // if (!is_single() && !is_page()):

        // Render tags for the post in a list
        if (get_the_tag_list()):
?>  
            <div class="tag-list">  
                <?php _e('Tags', 'chestnut-adsense'); ?>: <?php echo get_the_tag_list('', ', ', ''); ?>
            </div>  
<?php
        endif; // if (get_the_tag_list()):
?>
        </div>
    </div>  
<?php
    endwhile; // while ( have_posts() ) : the_post();
    
    // If there are more than one page of posts, display nav links
    if ($wp_query->max_num_pages > 1):
?>
<nav id="nav-below">
    <ul>
        <li><?php next_posts_link(__('Older posts', 'chestnut-adsense')); ?></li>
        <li><?php previous_posts_link(__('Newer posts', 'chestnut-adsense')); ?></li>
    </ul>
</nav>
<?php
    endif; // if ($wp_query->max_num_pages > 1):
    
    get_ad('468x15');
    
    wp_reset_query();
    
    comments_template( '', true );
?>
</div>
<?php
    get_sidebar();
?>
</div>
<?php
    get_footer();
?>

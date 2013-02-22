<div id="content" class="content" role="main">
<?php
    
if (have_posts()):

    if (is_search()) {
        get_ad('468x60');
        echo '<h1>';
        printf(__('Search Results for: %s', 'chestnutty' ), '<span class="search-keyword">'.get_search_query().'</span>');
        echo '</h1>';
    }
    // Show the tag selected if a tag has been selected
    if (is_tag()) {
        get_ad('468x60');
        echo '<h1>';
        printf(__('Tag Archives: %s', 'chestnutty' ), '<span class="tag">'.single_tag_title('', false).'</span>');
        echo '</h1>';
    }
    
    if (!is_tag() && !is_search() && !is_single() && !is_page()) {
        get_ad('468x60');
    }
    
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
                <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__( 'Permalink to %s', 'chestnutty'), the_title_attribute('echo=0' )); ?>" rel="bookmark">
                    <?php if (trim(get_the_title()) != '') { the_title(); } else { echo '&nbsp;'; }; ?>
                </a>
            </h1>
            <div class="meta">
                <?php _e('Date', 'chestnutty'); ?>: <?php the_time(get_option('date_format')); ?>
            </div>
<?php
        endif; // if (!is_page()):
        
        // not tag
        // not search
        // not a list of posts
        if (!is_tag() && !is_search() && (is_single() || is_page())):
            get_ad('468x60');
        endif;
        
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
                <a href="<?php the_permalink() ?>#more" class="more-link"><?php _e('Read more', 'chestnutty'); ?></a>
            </div>
            <div class="add-comment">
                <?php comments_popup_link(__('No Comments', 'chestnutty'), __('1 Comment', 'chestnutty'), __('% Comments', 'chestnutty')); ?>
            </div>  
<?php
        else:
            wp_link_pages(array('before' => '<div class="page-link">'.__( 'Pages:', 'chestnutty' ), 'after' => '</div>'));
        endif; // if (!is_single() && !is_page()):

        // Render tags for the post in a list
        if (get_the_tag_list()):
?>  
            <div class="tag-list">  
                <?php _e('Tags', 'chestnutty'); ?>: <?php echo get_the_tag_list('', ', ', ''); ?>
            </div>  
<?php
        endif; // if (get_the_tag_list()):
        
        if (is_single() || is_page()):
            if (function_exists('wp_related_posts')):
                wp_related_posts();
            endif;
            
            get_ad('468x15');
        endif;
?>
        </div>
    </div>  
<?php
    endwhile; // while ( have_posts() ) : the_post();
    
    if (is_tag() || is_search()) {
        get_ad('468x15');
    }
    // If there are more than one page of posts, display nav links
    if ($wp_query->max_num_pages > 1):
?>
<nav id="nav-below">
    <ul>
        <li><?php next_posts_link(__('Older posts', 'chestnutty')); ?></li>
        <li><?php previous_posts_link(__('Newer posts', 'chestnutty')); ?></li>
    </ul>
</nav>
<?php
    endif; // if ($wp_query->max_num_pages > 1):

    comments_template( '', true );
    
else:
    // When search has no match
    if (is_search()):
        get_ad('468x60');
?>
    <div class="post">
        <h1 class="entry-title">
            Search Results for: <span class="search-keyword"><?php echo get_search_query(); ?></span>
        </h1>
        <div class="post-content no-content">
            <p>
                <?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'chestnutty'); ?>
            </p>
        </div>
    </div>
<?php
    endif; // if (is_search()):

    get_ad('468x15');
    
    wp_reset_query();
endif;

?>
</div>
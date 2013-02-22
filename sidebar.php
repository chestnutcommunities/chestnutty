<div id="sidebar">
    <div class="search">
        <?php the_widget('WP_Widget_Search'); ?> 
    </div>
<?php
if (function_exists('ac_post_search')):
    if (ac_validate_settings()):
?>
<div class="affiliate">
<?php
        if (is_single() || is_page()):
?>
    <h2>Related Products <span class="affiliate">at Amazon</span></h2>
<?php
            $id = get_the_id();
            ac_post_search($id, 5, false);
        else:
?>
    <h2>Products <span class="affiliate">at Amazon</span></h2>
<?php
            ac_sitewide_search(5, false);
        endif;
?>
</div>
<?php
    endif;
endif;
?>
    <?php get_ad('300x250'); ?>
    <div class="tag-cloud">
        <?php the_widget( 'WP_Widget_Tag_Cloud', 'title='.__('Tags', 'chestnutty')); ?>  
    </div>
</div>
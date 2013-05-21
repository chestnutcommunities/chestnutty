<?php
/*
 * Template for single posts
 */
    get_header();
    get_template_part('content', get_post_format());
    get_footer();
?>
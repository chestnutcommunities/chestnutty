<?php
/*
 Template Name: Contact Form
 */

get_header();
?>
<div id="content-wrapper">
    <div id="content" class="content" role="main">
        <h1 class="entry-title">
<?php
            the_title();
?>
        </h1>
        <div class="post-content">
<?php
            if (function_exists('contactingo_contact_form')) {
                contactingo_contact_form();
            }
            else {
?>
            Plugin <strong>Contactingo</strong> is not installed.
<?php
            }
?>
        </div>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

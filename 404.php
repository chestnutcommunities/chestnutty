<?php
/*
 * Template for single
 */

     get_header();
?>
        <div class="page-grid">
            <div class="page-content container error404">
                <article class="main-post">
                    <header class="main-post-header">
                        <h1 class="main-post-title">This is somewhat embarrassing, isn&rsquo;t it?</h1>
                    </header>
                    <div class="main-post-content">
                        <p>
                            It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.
                        </p>
                        <?php get_search_form(); ?>
                    </div>
                </article>
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
<?php get_footer(); ?>

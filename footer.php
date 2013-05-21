        <footer class="footer">
            <div class="container footer-link-groups">
                <div class="row-fluid">
                    <div class="footer-column span3 offset1">
                        <h2 class="title">Navigation</h2>
                        <?php wp_nav_menu(array('menu' => 'Nav')); ?>
                    </div>
                    <div class="footer-column span3">
                        <h2 class="title">Legal</h2>
                        <?php wp_nav_menu(array('menu' => 'Legal')); ?>
                    </div>
                    <div class="footer-column span4">
                        <h2 class="title">Affiliate Disclosure</h2>
                        <p>
                            <?php bloginfo('name'); ?> is a participant in the Amazon Services LLC Associates
                            Program, an affiliate advertising program designed to provide a means for sites 
                            to earn advertising fees by advertising and linking to amazon.com.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container footer-copyright">
                <p>
                    &copy; <?php bloginfo('name'); ?> 2013. All rights reserved.
                </p>
                <?php
                    wp_enqueue_script('jquery');
                    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');
                    wp_footer();
                ?>
               <script>
                   jQuery(function($) {
                       $(".social .social-link, .image-gallery .image-item-link").tooltip();
                   });
                </script>
            </div>
        </footer>
    </body>
</html>
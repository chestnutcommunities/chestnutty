            <footer id="contentinfo" role="contentinfo">
                <section id="footer-link-group">
                    <?php wp_nav_menu(array('menu' => 'Nav')); ?>
                    <?php wp_nav_menu( array('menu' => 'Legal'));
?>
                    <small>
                        &copy; <?php bloginfo('name'); ?> 2012. All rights reserved.
                    </small>
<?php
if (function_exists('ac_sitewide_search')):
    $acSettingsAreValid = ac_validate_settings();
    if ($acSettingsAreValid):
?>
                    <small>
                        <b>Affiliate Disclosure</b>: <?php bloginfo('name'); ?> is a participant in the <br />
                        Amazon Services LLC Associates Program, an affiliate advertising program designed <br /> 
                        to provide a means for sites to earn advertising fees by advertising and linking to amazon.<?php echo ac_get_locale(); ?>.
                    </small>
<?php
    endif;
endif;
?>
            </footer>
        </div>
    </div>
<?php
wp_footer();
?>
</body>
</html>

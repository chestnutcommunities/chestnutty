<?php

function chestnut_adsense_setup_uploadify() {
    $uploadPathInfo = wp_upload_dir();
    $wpThemeUrl = str_replace(site_url(), '', get_bloginfo('template_directory'));

    $path = $uploadPathInfo['path'];
    $indexOfWpContent = strpos($path, '/wp-content');
    $path = substr($path, $indexOfWpContent, strlen($path) - $indexOfWpContent);
    
    $content = <<<JAVASCRIPT
<script type="text/javascript">
// <![CDATA[
jQuery(document).ready(function() {
    var defaultSettings = {
        "uploader": "{$wpThemeUrl}/script/lib/uploadify/uploadify.swf",
        "script": "{$wpThemeUrl}/script//lib/uploadify/uploadify.php",
        "cancelImg": "{$wpThemeUrl}/script/lib/uploadify/cancel.png",
        "buttonImg": "{$wpThemeUrl}/script/lib/uploadify/button.png",
        "width": 88,
        "height": 18,
        "folder": "{$path}",
        "auto": true,
        "rollover": true,
        "onInit": function() {
            function delayed() {
                if (jQuery("#chad-logo-filename").val() !== "") {
                    jQuery("#chad-logoUploader").css("display", "none");
                }
                if (jQuery("#chad-favicon-filename").val() !== "") {
                    jQuery("#chad-faviconUploader").css("display", "none");
                }
                if (jQuery("#chad-background-tile-image-filename").val() !== "") {
                    jQuery("#chad-background-tile-imageUploader").css("display", "none");
                }
                if (jQuery("#chad-bullet-icon-filename").val() !== "") {
                    jQuery("#chad-bullet-iconUploader").css("display", "none");
                }
            }
            setTimeout(delayed, 100);
        }
    },
    logoUploaderSettings = stlib.utility.makeCopy(defaultSettings),
    faviconUploaderSettings = stlib.utility.makeCopy(defaultSettings),
    tileUploaderSettings = stlib.utility.makeCopy(defaultSettings),
    bulletUploaderSettings = stlib.utility.makeCopy(defaultSettings);
    
    function getOnComplete(idKey) {
        var removeId = idKey + "-remove",
            displayId = idKey + "-display",
            filenameId = idKey + "-filename",
            uploaderId = idKey + "Uploader";
        
        return function(event, id, obj, response, data) {
            if (response === "UNACCEPTED_TYPE") {
                alert("Sorry we do not accept the type of file you just uploaded.");
            }
            else if (response === "OVERSIZED") {
                alert("Sorry we do not accept a file that is over 2MB.");
            }
            else {
                jQuery(uploaderId).css("display", "none");
                jQuery(removeId).stop().fadeIn();
                jQuery(displayId).stop().attr("src", response).fadeIn();
                jQuery(filenameId).val(response);
            }
        };
    }
    function prepareUploaderReset(idKey) {
        var removeId = idKey + "-remove",
            displayId = idKey + "-display",
            filenameId = idKey + "-filename",
            uploaderId = idKey + "Uploader";
        
        jQuery(removeId).click(function(e) {
            e.preventDefault();
            jQuery(displayId).stop().fadeOut();
            jQuery(filenameId).val("");
            jQuery(this).stop().fadeOut(function() {
                jQuery(uploaderId).css("display", "");
            });
        });
    }
    
    logoUploaderSettings["onComplete"] = getOnComplete("#chad-logo");
    faviconUploaderSettings["onComplete"] = getOnComplete("#chad-favicon");
    tileUploaderSettings["onComplete"] = getOnComplete("#chad-background-tile-image");
    bulletUploaderSettings["onComplete"] = getOnComplete("#chad-bullet-icon");
    
    // initialise uploadify
    jQuery("#chad-logo").uploadify(logoUploaderSettings);
    jQuery("#chad-favicon").uploadify(faviconUploaderSettings);
    jQuery("#chad-background-tile-image").uploadify(tileUploaderSettings);
    jQuery("#chad-bullet-icon").uploadify(bulletUploaderSettings);
    
    prepareUploaderReset("#chad-logo");
    prepareUploaderReset("#chad-favicon");
    prepareUploaderReset("#chad-background-tile-image");
    prepareUploaderReset("#chad-bullet-icon");
});

// ]]>
</script>
JAVASCRIPT;

    echo $content;
}

function chestnut_adsense_show_color_picker($name, $label, $value) {
    $label = __($label, 'chestnut-adsense');
    $picker = $name.'-picker';
    
    $content = <<<HTML
<div class="row color" id="section-{$name}">
    <label for="{$name}">{$label}</label>
    <input type="text" name="{$name}" id="{$name}" value="{$value}" />
    <div id="{$picker}"></div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#{$picker}").hide();
        jQuery("#{$picker}").farbtastic("#{$name}");
        jQuery("#{$name}").click(function(){ jQuery("#{$picker}").slideToggle(); });
    });
</script>
HTML;

    echo $content;
}

function chestnut_adsense_general_options_update() {
    update_option('chad-account-id', trim($_POST['chad-account-id']));
    update_option('chad-id-728x90', trim($_POST['chad-id-728x90']));
    update_option('chad-id-468x60', trim($_POST['chad-id-468x60']));
    update_option('chad-id-468x15', trim($_POST['chad-id-468x15']));
    update_option('chad-id-200x90', trim($_POST['chad-id-200x90']));
    update_option('chad-id-300x250', trim($_POST['chad-id-300x250']));
    update_option('chad-banner-font', $_POST['chad-banner-font']);
    update_option('chad-header-font', $_POST['chad-header-font']);
    update_option('chad-body-font', $_POST['chad-body-font']);
    update_option('chad-logo', $_POST['chad-logo-filename']);
    update_option('chad-favicon', $_POST['chad-favicon-filename']);
    update_option('chad-cast-shadow', $_POST['chad-cast-shadow']);
    update_option('chad-background-color', $_POST['chad-background-color']);
    update_option('chad-background-tile-image', $_POST['chad-background-tile-image-filename']);
    update_option('chad-banner-color', $_POST['chad-banner-color']);
    update_option('chad-cast-shadow-under-header', $_POST['chad-cast-shadow-under-header']);
    update_option('chad-header-shadow-color', $_POST['chad-header-shadow-color']);
    update_option('chad-link-color-normal', $_POST['chad-link-color-normal']);
    update_option('chad-link-color-hover', $_POST['chad-link-color-hover']);
    update_option('chad-banner-color-1', $_POST['chad-banner-color-1']);
    update_option('chad-banner-color-2', $_POST['chad-banner-color-2']);
    update_option('chad-menu-color-normal-1', $_POST['chad-menu-color-normal-1']);
    update_option('chad-menu-color-normal-2', $_POST['chad-menu-color-normal-2']);
    update_option('chad-menu-color-hover-1', $_POST['chad-menu-color-hover-1']);
    update_option('chad-menu-color-hover-2', $_POST['chad-menu-color-hover-2']);
    update_option('chad-menu-color-selected-1', $_POST['chad-menu-color-selected-1']);
    update_option('chad-menu-color-selected-2', $_POST['chad-menu-color-selected-2']);
    update_option('chad-button-color', $_POST['chad-button-color']);
    update_option('chad-bullet-icon', $_POST['chad-bullet-icon-filename']);
}

function chestnut_adsense_general_options_page() {
    $updated = false;
    
    if (isset($_POST['submit-to-update'])) {
        chestnut_adsense_general_options_update();
        $updated = true;
    }
?>
<div class="wrap">
<?php
    if ($updated) {
?>
    <div class="updated"><p>Options updated.</p></div>
<?php
    }
    
    $bannerFont = get_option('chad-banner-font', CHAD_BANNER_FONT);
    $headerFont = get_option('chad-header-font', CHAD_HEADER_FONT);
    $bodyFont = get_option('chad-body-font', CHAD_BODY_FONT);
    $logo = get_option('chad-logo', CHAD_LOGO);
    $favicon = get_option('chad-favicon', CHAD_FAVICON);
    $tile = get_option('chad-background-tile-image', CHAD_BACKGROUND_TILE_IMAGE);
    $bullet = get_option('chad-bullet-icon', CHAD_BULLET_ICON);
    $castShadow = get_option('chad-cast-shadow', CHAD_CAST_SHADOW);
    $castShadowUnderHeader = get_option('chad-cast-shadow-under-header', CHAD_CAST_SHADOW_UNDER_HEADER);
    
    $logoDisplay = $logo ? '' : ' style="display: none;"';
    $faviconDisplay = $favicon ? '' : ' style="display: none;"';
    $tileDisplay = $tile ? '' : ' style="display: none;"';
    $bulletDisplay = $bullet ? '' : ' style="display: none;"';
    
    $castShadowChecked = $castShadow == '1' ? ' checked="checked"' : '';
    $castShadowUnderHeaderChecked = $castShadowUnderHeader == '1' ? ' checked="checked"' : '';
    
?>
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2><?php _e('Chestnut Adsense Theme Options', 'chestnut-adsense'); ?></h2>
    
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="form">
        <div class="head">
            <h3><?php _e('AdSense account', 'chestnut-adsense'); ?></h3>
        </div>
        <div class="row text" id="section-chad-account-id">
            <label for="chad-account-id">
                <?php _e('ID', 'chestnut-adsense'); ?> <span class="note"><?php _e('(leave blank to disable)', 'chestnut-adsense'); ?></span>:
            </label>
            <input type="text" name="chad-account-id" id="chad-account-id" value="<?php echo get_option('chad-account-id', '') ?>" />
        </div>
        <div class="head">
            <h3><?php _e('Ad units', 'chestnut-adsense'); ?></h3>
        </div>
        <div class="row text" id="section-chad-id-728x90">
            <label for="chad-id-728x90">
                <?php _e('Leaderboard (728 x 90):', 'chestnut-adsense'); ?>
            </label>
            <input type="text" name="chad-id-728x90" id="chad-id-728x90" value="<?php echo get_option('chad-id-728x90', '') ?>" />
        </div>
        <div class="row text" id="section-chad-id-468x60">
            <label for="chad-id-468x60">
                <?php _e('Banner (468 x 60):', 'chestnut-adsense'); ?>
            </label>
            <input type="text" name="chad-id-468x60" id="chad-id-468x60" value="<?php echo get_option('chad-id-468x60', '') ?>" />
        </div>
        <div class="row text" id="section-chad-id-468x15">
            <label for="chad-id-468x15">
                <?php _e('Horizontal Medium (468 x 15):', 'chestnut-adsense'); ?>
            </label>
            <input type="text" name="chad-id-468x15" id="chad-id-468x15" value="<?php echo get_option('chad-id-468x15', '') ?>" />
        </div>
        <div class="row text" id="section-chad-id-200x90">
            <label for="chad-id-200x90">
                <?php _e('Vertical X-Large (200 x 90):', 'chestnut-adsense'); ?>
            </label>
            <input type="text" name="chad-id-200x90" id="chad-id-200x90" value="<?php echo get_option('chad-id-200x90', '') ?>" />
        </div>
        <div class="row text" id="section-chad-id-300x250">
            <label for="chad-id-300x250">
                <?php _e('Medium Recetangle (300 x 250):', 'chestnut-adsense'); ?>
            </label>
            <input type="text" name="chad-id-300x250" id="chad-id-300x250" value="<?php echo get_option('chad-id-300x250', '') ?>" />
        </div>
        <div class="head">
            <h3><?php _e('Theme Customizations', 'chestnut-adsense'); ?></h3>
        </div>
        <div class="row file">
            <label>
                <?php _e('Logo', 'chestnut-adsense'); ?> <span class="note"><?php _e('(80 x 80)', 'chestnut-adsense'); ?></span>:
            </label>
            <img class="uploaded-image" id="chad-logo-display" src="<?php echo get_option('chad-logo', CHAD_LOGO) ?>"<?php echo $logoDisplay ?> />
            <input type="button" id="chad-logo-remove" class="remove-file"<?php echo $logoDisplay ?> />
            <input type="file" name="chad-logo" id="chad-logo" />
            <input type="hidden" name="chad-logo-filename" id="chad-logo-filename" value="<?php echo get_option('chad-logo', CHAD_LOGO) ?>" />
        </div>
        <div class="row file">
            <label>
                <?php _e('Favicon', 'chestnut-adsense'); ?> <span class="note"><?php _e('(16 x 16)', 'chestnut-adsense'); ?></span>:
            </label>
            <img class="uploaded-image" id="chad-logo-display" src="<?php echo get_option('chad-favicon', CHAD_FAVICON) ?>"<?php echo $faviconDisplay ?> />
            <input type="button" id="chad-favicon-remove" class="remove-file"<?php echo $faviconDisplay ?> />
            <input type="file" name="chad-favicon" id="chad-favicon" />
            <input type="hidden" name="chad-favicon-filename" id="chad-favicon-filename" value="<?php echo get_option('chad-favicon', CHAD_FAVICON) ?>" />
        </div>
        <div class="row file">
            <label>
                <?php _e('Background tile image', 'chestnut-adsense'); ?> <span class="note"><?php _e('(2MB max.)', 'chestnut-adsense'); ?></span>:
            </label>
            <img class="uploaded-image" id="chad-background-tile-image-display" src="<?php echo get_option('chad-background-tile-image', CHAD_BACKGROUND_TILE_IMAGE) ?>"<?php echo $tileDisplay ?> />
            <input type="button" id="chad-background-tile-image-remove" class="remove-file"<?php echo $tileDisplay ?> />
            <input type="file" name="chad-background-tile-image" id="chad-background-tile-image" />
            <input type="hidden" name="chad-background-tile-image-filename" id="chad-background-tile-image-filename" value="<?php echo get_option('chad-background-tile-image', CHAD_BACKGROUND_TILE_IMAGE) ?>" />
        </div>
        
        <?php chestnut_adsense_show_color_picker('chad-background-color', 'Background color', get_option('chad-background-color', CHAD_BACKGROUND_COLOR)); ?>
        
        <div class="row checkbox">
            <input type="checkbox" value="1" id="chad-cast-shadow" name="chad-cast-shadow"<?php echo $castShadowChecked; ?> />
            <label for="chad-cast-shadow">
                <?php _e('Cast a shadow around the wrapper', 'chestnut-adsense'); ?>
            </label>
        </div>
        
        <div class="row radio" id="section-chad-banner-font">
            <label for="chad-banner-font">
                Banner font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chad-banner-font-comfortaa"<?php if ($bannerFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="comfortaa" />
                        <label for="chad-banner-font-comfortaa">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-commando"<?php if ($bannerFont == 'commando') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="commando" />
                        <label for="chad-banner-font-commando">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-days"<?php if ($bannerFont == 'days') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="days" />
                        <label for="chad-banner-font-days">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-gudea"<?php if ($bannerFont == 'gudea') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="gudea" />
                        <label for="chad-banner-font-gudea">Gudea</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-journal"<?php if ($bannerFont == 'journal') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="journal" />
                        <label for="chad-banner-font-journal">Journal</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-medio"<?php if ($bannerFont == 'medio') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="medio" />
                        <label for="chad-banner-font-medio">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-pacifico"<?php if ($bannerFont == 'pacifico') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="pacifico" />
                        <label for="chad-banner-font-pacifico">Pacifico</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-spincycle"<?php if ($bannerFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="spincycle" />
                        <label for="chad-banner-font-spincycle">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-spincycle3d"<?php if ($bannerFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="spincycle3d" />
                        <label for="chad-banner-font-spincycle3d">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-banner-font-greyscale"<?php if ($bannerFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chad-banner-font" value="greyscale" />
                        <label for="chad-banner-font-greyscale">Greyscale (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row radio" id="section-chad-header-font">
            <label for="chad-header-font">
                Header font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chad-header-font-comfortaa"<?php if ($headerFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chad-header-font" value="comfortaa" />
                        <label for="chad-header-font-comfortaa">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-commando"<?php if ($headerFont == 'commando') { echo ' checked="checked"'; } ?> name="chad-header-font" value="commando" />
                        <label for="chad-header-font-commando">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-days"<?php if ($headerFont == 'days') { echo ' checked="checked"'; } ?> name="chad-header-font" value="days" />
                        <label for="chad-header-font-days">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-gudea"<?php if ($headerFont == 'gudea') { echo ' checked="checked"'; } ?> name="chad-header-font" value="gudea" />
                        <label for="chad-header-font-gudea">Gudea</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-journal"<?php if ($headerFont == 'journal') { echo ' checked="checked"'; } ?> name="chad-header-font" value="journal" />
                        <label for="chad-header-font-journal">Journal</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-medio"<?php if ($headerFont == 'medio') { echo ' checked="checked"'; } ?> name="chad-header-font" value="medio" />
                        <label for="chad-header-font-medio">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-pacifico"<?php if ($headerFont == 'pacifico') { echo ' checked="checked"'; } ?> name="chad-header-font" value="pacifico" />
                        <label for="chad-header-font-pacifico">Pacifico</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-spincycle"<?php if ($headerFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chad-header-font" value="spincycle" />
                        <label for="chad-header-font-spincycle">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-spincycle3d"<?php if ($headerFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chad-header-font" value="spincycle3d" />
                        <label for="chad-header-font-spincycle3d">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-header-font-greyscale"<?php if ($headerFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chad-header-font" value="greyscale" />
                        <label for="chad-header-font-greyscale">Greyscale (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row radio" id="section-chad-body-font">
            <label for="chad-body-font">
                Body font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chad-body-font-1"<?php if ($bodyFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chad-body-font" value="comfortaa" />
                        <label for="chad-body-font-1">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-2"<?php if ($bodyFont == 'commando') { echo ' checked="checked"'; } ?> name="chad-body-font" value="commando" />
                        <label for="chad-body-font-2">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-3"<?php if ($bodyFont == 'days') { echo ' checked="checked"'; } ?> name="chad-body-font" value="days" />
                        <label for="chad-body-font-3">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-4"<?php if ($bodyFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chad-body-font" value="greyscale" />
                        <label for="chad-body-font-4">Greyscale</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-5"<?php if ($bodyFont == 'medio') { echo ' checked="checked"'; } ?> name="chad-body-font" value="medio" />
                        <label for="chad-body-font-5">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-6"<?php if ($bodyFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chad-body-font" value="spincycle" />
                        <label for="chad-body-font-6">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-7"<?php if ($bodyFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chad-body-font" value="spincycle3d" />
                        <label for="chad-body-font-7">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chad-body-font-8"<?php if ($bodyFont == 'gudea') { echo ' checked="checked"'; } ?> name="chad-body-font" value="gudea" />
                        <label for="chad-body-font-8">Gudea (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        
        <?php chestnut_adsense_show_color_picker('chad-banner-color', 'Banner/Footer font color', get_option('chad-banner-color', CHAD_BANNER_COLOR)); ?>
        
        <div class="row checkbox">
            <input type="checkbox" value="1" id="chad-cast-shadow-under-header" name="chad-cast-shadow-under-header"<?php echo $castShadowUnderHeaderChecked; ?> />
            <label for="chad-cast-shadow-under-header">
                <?php _e('Cast a shadow under the header in the banner', 'chestnut-adsense'); ?>
            </label>
        </div>
        
        <?php chestnut_adsense_show_color_picker('chad-header-shadow-color', 'Header shadow color', get_option('chad-header-shadow-color', CHAD_HEADER_SHADOW_COLOR)); ?>
        <?php chestnut_adsense_show_color_picker('chad-link-color-normal', 'Link color', get_option('chad-link-color-normal', CHAD_LINK_COLOR_NORMAL)); ?>
        <?php chestnut_adsense_show_color_picker('chad-link-color-hover', 'Link hover color', get_option('chad-link-color-hover', CHAD_LINK_COLOR_HOVER)); ?>
        <?php chestnut_adsense_show_color_picker('chad-banner-color-1', 'Header and Footer background color 1', get_option('chad-banner-color-1', CHAD_BANNER_COLOR_1)); ?>
        <?php chestnut_adsense_show_color_picker('chad-banner-color-2', 'Header and Footer background color 2', get_option('chad-banner-color-2', CHAD_BANNER_COLOR_2)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-normal-1', 'Menu color 1', get_option('chad-menu-color-normal-1', CHAD_MENU_COLOR_NORMAL_1)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-normal-2', 'Menu color 2', get_option('chad-menu-color-normal-2', CHAD_MENU_COLOR_NORMAL_2)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-hover-1', 'Menu hover color 1', get_option('chad-menu-color-hover-1', CHAD_MENU_COLOR_HOVER_1)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-hover-2', 'Menu hover color 2', get_option('chad-menu-color-hover-2', CHAD_MENU_COLOR_HOVER_2)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-selected-1', 'Menu selected color 1', get_option('chad-menu-color-selected-1', CHAD_MENU_COLOR_SELECTED_1)); ?>
        <?php chestnut_adsense_show_color_picker('chad-menu-color-selected-2', 'Menu selected color 2', get_option('chad-menu-color-selected-2', CHAD_MENU_COLOR_SELECTED_2)); ?>
        <?php chestnut_adsense_show_color_picker('chad-button-color', 'Button color', get_option('chad-button-color', CHAD_BUTTON_COLOR)); ?>
        
        <div class="row file">
            <label>
                <?php _e('Bullet list item icon', 'chestnut-adsense'); ?> <span class="note"><?php _e('(14 x 14)', 'chestnut-adsense'); ?></span>:
            </label>
            <img class="uploaded-image" id="chad-bullet-icon-display" src="<?php echo get_option('chad-bullet-icon', CHAD_BULLET_ICON) ?>"<?php echo $bulletDisplay ?> />
            <input type="button" id="chad-bullet-icon-remove" class="remove-file"<?php echo $bulletDisplay ?> />
            <input type="file" name="chad-bullet-icon" id="chad-bullet-icon" />
            <input type="hidden" name="chad-bullet-icon-filename" id="chad-bullet-icon-filename" value="<?php echo get_option('chad-bullet-icon', CHAD_BULLET_ICON) ?>" />
        </div>
        <div class="form-action">
            <input type="submit" name="submit-to-update" value="<?php _e('Save', 'chestnut-adsense'); ?>" />
        </div>
    </div>
    </form>
</div>
<?php
};
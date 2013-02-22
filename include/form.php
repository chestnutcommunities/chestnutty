<?php

function chestnutty_setup_uploadify() {
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
                if (jQuery("#chestnutty-logo-filename").val() !== "") {
                    jQuery("#chestnutty-logoUploader").css("display", "none");
                }
                if (jQuery("#chestnutty-favicon-filename").val() !== "") {
                    jQuery("#chestnutty-faviconUploader").css("display", "none");
                }
                if (jQuery("#chestnutty-background-tile-image-filename").val() !== "") {
                    jQuery("#chestnutty-background-tile-imageUploader").css("display", "none");
                }
                if (jQuery("#chestnutty-bullet-icon-filename").val() !== "") {
                    jQuery("#chestnutty-bullet-iconUploader").css("display", "none");
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
    
    logoUploaderSettings["onComplete"] = getOnComplete("#chestnutty-logo");
    faviconUploaderSettings["onComplete"] = getOnComplete("#chestnutty-favicon");
    tileUploaderSettings["onComplete"] = getOnComplete("#chestnutty-background-tile-image");
    bulletUploaderSettings["onComplete"] = getOnComplete("#chestnutty-bullet-icon");
    
    // initialise uploadify
    jQuery("#chestnutty-logo").uploadify(logoUploaderSettings);
    jQuery("#chestnutty-favicon").uploadify(faviconUploaderSettings);
    jQuery("#chestnutty-background-tile-image").uploadify(tileUploaderSettings);
    jQuery("#chestnutty-bullet-icon").uploadify(bulletUploaderSettings);
    
    prepareUploaderReset("#chestnutty-logo");
    prepareUploaderReset("#chestnutty-favicon");
    prepareUploaderReset("#chestnutty-background-tile-image");
    prepareUploaderReset("#chestnutty-bullet-icon");
});

// ]]>
</script>
JAVASCRIPT;

    echo $content;
}

function chestnutty_show_color_picker($name, $label, $value) {
    $label = __($label, 'chestnutty');
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

function chestnutty_general_options_update() {
    update_option('chestnutty-account-id', trim($_POST['chestnutty-account-id']));
    update_option('chestnutty-id-728x90', trim($_POST['chestnutty-id-728x90']));
    update_option('chestnutty-id-468x60', trim($_POST['chestnutty-id-468x60']));
    update_option('chestnutty-id-468x15', trim($_POST['chestnutty-id-468x15']));
    update_option('chestnutty-id-200x90', trim($_POST['chestnutty-id-200x90']));
    update_option('chestnutty-id-300x250', trim($_POST['chestnutty-id-300x250']));
    update_option('chestnutty-banner-font', $_POST['chestnutty-banner-font']);
    update_option('chestnutty-header-font', $_POST['chestnutty-header-font']);
    update_option('chestnutty-body-font', $_POST['chestnutty-body-font']);
    update_option('chestnutty-logo', $_POST['chestnutty-logo-filename']);
    update_option('chestnutty-favicon', $_POST['chestnutty-favicon-filename']);
    update_option('chestnutty-cast-shadow', $_POST['chestnutty-cast-shadow']);
    update_option('chestnutty-background-color', $_POST['chestnutty-background-color']);
    update_option('chestnutty-background-tile-image', $_POST['chestnutty-background-tile-image-filename']);
    update_option('chestnutty-banner-color', $_POST['chestnutty-banner-color']);
    update_option('chestnutty-cast-shadow-under-header', $_POST['chestnutty-cast-shadow-under-header']);
    update_option('chestnutty-header-shadow-color', $_POST['chestnutty-header-shadow-color']);
    update_option('chestnutty-link-color-normal', $_POST['chestnutty-link-color-normal']);
    update_option('chestnutty-link-color-hover', $_POST['chestnutty-link-color-hover']);
    update_option('chestnutty-banner-color-1', $_POST['chestnutty-banner-color-1']);
    update_option('chestnutty-banner-color-2', $_POST['chestnutty-banner-color-2']);
    update_option('chestnutty-menu-color-normal-1', $_POST['chestnutty-menu-color-normal-1']);
    update_option('chestnutty-menu-color-normal-2', $_POST['chestnutty-menu-color-normal-2']);
    update_option('chestnutty-menu-color-hover-1', $_POST['chestnutty-menu-color-hover-1']);
    update_option('chestnutty-menu-color-hover-2', $_POST['chestnutty-menu-color-hover-2']);
    update_option('chestnutty-menu-color-selected-1', $_POST['chestnutty-menu-color-selected-1']);
    update_option('chestnutty-menu-color-selected-2', $_POST['chestnutty-menu-color-selected-2']);
    update_option('chestnutty-button-color', $_POST['chestnutty-button-color']);
    update_option('chestnutty-bullet-icon', $_POST['chestnutty-bullet-icon-filename']);
}

function chestnutty_general_options_page() {
    $updated = false;
    
    if (isset($_POST['submit-to-update'])) {
        chestnutty_general_options_update();
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
    
    $bannerFont = get_option('chestnutty-banner-font', CHESTNUTTY_BANNER_FONT);
    $headerFont = get_option('chestnutty-header-font', CHESTNUTTY_HEADER_FONT);
    $bodyFont = get_option('chestnutty-body-font', CHESTNUTTY_BODY_FONT);
    $logo = get_option('chestnutty-logo', CHESTNUTTY_LOGO);
    $favicon = get_option('chestnutty-favicon', CHESTNUTTY_FAVICON);
    $tile = get_option('chestnutty-background-tile-image', CHESTNUTTY_BACKGROUND_TILE_IMAGE);
    $bullet = get_option('chestnutty-bullet-icon', CHESTNUTTY_BULLET_ICON);
    $castShadow = get_option('chestnutty-cast-shadow', CHESTNUTTY_CAST_SHADOW);
    $castShadowUnderHeader = get_option('chestnutty-cast-shadow-under-header', CHESTNUTTY_CAST_SHADOW_UNDER_HEADER);
    
    $logoDisplay = $logo ? '' : ' style="display: none;"';
    $faviconDisplay = $favicon ? '' : ' style="display: none;"';
    $tileDisplay = $tile ? '' : ' style="display: none;"';
    $bulletDisplay = $bullet ? '' : ' style="display: none;"';
    
    $castShadowChecked = $castShadow == '1' ? ' checked="checked"' : '';
    $castShadowUnderHeaderChecked = $castShadowUnderHeader == '1' ? ' checked="checked"' : '';
    
?>
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2><?php _e('Chestnut Adsense Theme Options', 'chestnutty'); ?></h2>
    
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="form">
        <div class="head">
            <h3><?php _e('AdSense account', 'chestnutty'); ?></h3>
        </div>
        <div class="row text" id="section-chestnutty-account-id">
            <label for="chestnutty-account-id">
                <?php _e('ID', 'chestnutty'); ?> <span class="note"><?php _e('(leave blank to disable)', 'chestnutty'); ?></span>:
            </label>
            <input type="text" name="chestnutty-account-id" id="chestnutty-account-id" value="<?php echo get_option('chestnutty-account-id', '') ?>" />
        </div>
        <div class="head">
            <h3><?php _e('Ad units', 'chestnutty'); ?></h3>
        </div>
        <div class="row text" id="section-chestnutty-id-728x90">
            <label for="chestnutty-id-728x90">
                <?php _e('Leaderboard (728 x 90):', 'chestnutty'); ?>
            </label>
            <input type="text" name="chestnutty-id-728x90" id="chestnutty-id-728x90" value="<?php echo get_option('chestnutty-id-728x90', '') ?>" />
        </div>
        <div class="row text" id="section-chestnutty-id-468x60">
            <label for="chestnutty-id-468x60">
                <?php _e('Banner (468 x 60):', 'chestnutty'); ?>
            </label>
            <input type="text" name="chestnutty-id-468x60" id="chestnutty-id-468x60" value="<?php echo get_option('chestnutty-id-468x60', '') ?>" />
        </div>
        <div class="row text" id="section-chestnutty-id-468x15">
            <label for="chestnutty-id-468x15">
                <?php _e('Horizontal Medium (468 x 15):', 'chestnutty'); ?>
            </label>
            <input type="text" name="chestnutty-id-468x15" id="chestnutty-id-468x15" value="<?php echo get_option('chestnutty-id-468x15', '') ?>" />
        </div>
        <div class="row text" id="section-chestnutty-id-200x90">
            <label for="chestnutty-id-200x90">
                <?php _e('Vertical X-Large (200 x 90):', 'chestnutty'); ?>
            </label>
            <input type="text" name="chestnutty-id-200x90" id="chestnutty-id-200x90" value="<?php echo get_option('chestnutty-id-200x90', '') ?>" />
        </div>
        <div class="row text" id="section-chestnutty-id-300x250">
            <label for="chestnutty-id-300x250">
                <?php _e('Medium Recetangle (300 x 250):', 'chestnutty'); ?>
            </label>
            <input type="text" name="chestnutty-id-300x250" id="chestnutty-id-300x250" value="<?php echo get_option('chestnutty-id-300x250', '') ?>" />
        </div>
        <div class="head">
            <h3><?php _e('Theme Customizations', 'chestnutty'); ?></h3>
        </div>
        <div class="row file">
            <label>
                <?php _e('Logo', 'chestnutty'); ?> <span class="note"><?php _e('(80 x 80)', 'chestnutty'); ?></span>:
            </label>
            <img class="uploaded-image" id="chestnutty-logo-display" src="<?php echo get_option('chestnutty-logo', CHESTNUTTY_LOGO) ?>"<?php echo $logoDisplay ?> />
            <input type="button" id="chestnutty-logo-remove" class="remove-file"<?php echo $logoDisplay ?> />
            <input type="file" name="chestnutty-logo" id="chestnutty-logo" />
            <input type="hidden" name="chestnutty-logo-filename" id="chestnutty-logo-filename" value="<?php echo get_option('chestnutty-logo', CHESTNUTTY_LOGO) ?>" />
        </div>
        <div class="row file">
            <label>
                <?php _e('Favicon', 'chestnutty'); ?> <span class="note"><?php _e('(16 x 16)', 'chestnutty'); ?></span>:
            </label>
            <img class="uploaded-image" id="chestnutty-logo-display" src="<?php echo get_option('chestnutty-favicon', CHESTNUTTY_FAVICON) ?>"<?php echo $faviconDisplay ?> />
            <input type="button" id="chestnutty-favicon-remove" class="remove-file"<?php echo $faviconDisplay ?> />
            <input type="file" name="chestnutty-favicon" id="chestnutty-favicon" />
            <input type="hidden" name="chestnutty-favicon-filename" id="chestnutty-favicon-filename" value="<?php echo get_option('chestnutty-favicon', CHESTNUTTY_FAVICON) ?>" />
        </div>
        <div class="row file">
            <label>
                <?php _e('Background tile image', 'chestnutty'); ?> <span class="note"><?php _e('(2MB max.)', 'chestnutty'); ?></span>:
            </label>
            <img class="uploaded-image" id="chestnutty-background-tile-image-display" src="<?php echo get_option('chestnutty-background-tile-image', CHESTNUTTY_BACKGROUND_TILE_IMAGE) ?>"<?php echo $tileDisplay ?> />
            <input type="button" id="chestnutty-background-tile-image-remove" class="remove-file"<?php echo $tileDisplay ?> />
            <input type="file" name="chestnutty-background-tile-image" id="chestnutty-background-tile-image" />
            <input type="hidden" name="chestnutty-background-tile-image-filename" id="chestnutty-background-tile-image-filename" value="<?php echo get_option('chestnutty-background-tile-image', CHESTNUTTY_BACKGROUND_TILE_IMAGE) ?>" />
        </div>
        
        <?php chestnutty_show_color_picker('chestnutty-background-color', 'Background color', get_option('chestnutty-background-color', CHESTNUTTY_BACKGROUND_COLOR)); ?>
        
        <div class="row checkbox">
            <input type="checkbox" value="1" id="chestnutty-cast-shadow" name="chestnutty-cast-shadow"<?php echo $castShadowChecked; ?> />
            <label for="chestnutty-cast-shadow">
                <?php _e('Cast a shadow around the wrapper', 'chestnutty'); ?>
            </label>
        </div>
        
        <div class="row radio" id="section-chestnutty-banner-font">
            <label for="chestnutty-banner-font">
                Banner font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-comfortaa"<?php if ($bannerFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="comfortaa" />
                        <label for="chestnutty-banner-font-comfortaa">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-commando"<?php if ($bannerFont == 'commando') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="commando" />
                        <label for="chestnutty-banner-font-commando">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-days"<?php if ($bannerFont == 'days') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="days" />
                        <label for="chestnutty-banner-font-days">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-gudea"<?php if ($bannerFont == 'gudea') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="gudea" />
                        <label for="chestnutty-banner-font-gudea">Gudea</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-journal"<?php if ($bannerFont == 'journal') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="journal" />
                        <label for="chestnutty-banner-font-journal">Journal</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-medio"<?php if ($bannerFont == 'medio') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="medio" />
                        <label for="chestnutty-banner-font-medio">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-pacifico"<?php if ($bannerFont == 'pacifico') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="pacifico" />
                        <label for="chestnutty-banner-font-pacifico">Pacifico</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-spincycle"<?php if ($bannerFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="spincycle" />
                        <label for="chestnutty-banner-font-spincycle">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-spincycle3d"<?php if ($bannerFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="spincycle3d" />
                        <label for="chestnutty-banner-font-spincycle3d">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-banner-font-greyscale"<?php if ($bannerFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chestnutty-banner-font" value="greyscale" />
                        <label for="chestnutty-banner-font-greyscale">Greyscale (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row radio" id="section-chestnutty-header-font">
            <label for="chestnutty-header-font">
                Header font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chestnutty-header-font-comfortaa"<?php if ($headerFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="comfortaa" />
                        <label for="chestnutty-header-font-comfortaa">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-commando"<?php if ($headerFont == 'commando') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="commando" />
                        <label for="chestnutty-header-font-commando">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-days"<?php if ($headerFont == 'days') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="days" />
                        <label for="chestnutty-header-font-days">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-gudea"<?php if ($headerFont == 'gudea') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="gudea" />
                        <label for="chestnutty-header-font-gudea">Gudea</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-journal"<?php if ($headerFont == 'journal') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="journal" />
                        <label for="chestnutty-header-font-journal">Journal</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-medio"<?php if ($headerFont == 'medio') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="medio" />
                        <label for="chestnutty-header-font-medio">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-pacifico"<?php if ($headerFont == 'pacifico') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="pacifico" />
                        <label for="chestnutty-header-font-pacifico">Pacifico</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-spincycle"<?php if ($headerFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="spincycle" />
                        <label for="chestnutty-header-font-spincycle">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-spincycle3d"<?php if ($headerFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="spincycle3d" />
                        <label for="chestnutty-header-font-spincycle3d">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-header-font-greyscale"<?php if ($headerFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chestnutty-header-font" value="greyscale" />
                        <label for="chestnutty-header-font-greyscale">Greyscale (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row radio" id="section-chestnutty-body-font">
            <label for="chestnutty-body-font">
                Body font:
            </label>
            <div class="radio-list">
                <ul>
                    <li>
                        <input type="radio" id="chestnutty-body-font-1"<?php if ($bodyFont == 'comfortaa') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="comfortaa" />
                        <label for="chestnutty-body-font-1">Comfortaa</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-2"<?php if ($bodyFont == 'commando') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="commando" />
                        <label for="chestnutty-body-font-2">Commando</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-3"<?php if ($bodyFont == 'days') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="days" />
                        <label for="chestnutty-body-font-3">Days</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-4"<?php if ($bodyFont == 'greyscale') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="greyscale" />
                        <label for="chestnutty-body-font-4">Greyscale</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-5"<?php if ($bodyFont == 'medio') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="medio" />
                        <label for="chestnutty-body-font-5">Medio</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-6"<?php if ($bodyFont == 'spincycle') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="spincycle" />
                        <label for="chestnutty-body-font-6">Spincycle</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-7"<?php if ($bodyFont == 'spincycle3d') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="spincycle3d" />
                        <label for="chestnutty-body-font-7">Spincycle 3D</label>
                    </li>
                    <li>
                        <input type="radio" id="chestnutty-body-font-8"<?php if ($bodyFont == 'gudea') { echo ' checked="checked"'; } ?> name="chestnutty-body-font" value="gudea" />
                        <label for="chestnutty-body-font-8">Gudea (default)</label>
                    </li>
                </ul>
            </div>
        </div>
        
        <?php chestnutty_show_color_picker('chestnutty-banner-color', 'Banner/Footer font color', get_option('chestnutty-banner-color', CHESTNUTTY_BANNER_COLOR)); ?>
        
        <div class="row checkbox">
            <input type="checkbox" value="1" id="chestnutty-cast-shadow-under-header" name="chestnutty-cast-shadow-under-header"<?php echo $castShadowUnderHeaderChecked; ?> />
            <label for="chestnutty-cast-shadow-under-header">
                <?php _e('Cast a shadow under the header in the banner', 'chestnutty'); ?>
            </label>
        </div>
        
        <?php chestnutty_show_color_picker('chestnutty-header-shadow-color', 'Header shadow color', get_option('chestnutty-header-shadow-color', CHESTNUTTY_HEADER_SHADOW_COLOR)); ?>
        <?php chestnutty_show_color_picker('chestnutty-link-color-normal', 'Link color', get_option('chestnutty-link-color-normal', CHESTNUTTY_LINK_COLOR_NORMAL)); ?>
        <?php chestnutty_show_color_picker('chestnutty-link-color-hover', 'Link hover color', get_option('chestnutty-link-color-hover', CHESTNUTTY_LINK_COLOR_HOVER)); ?>
        <?php chestnutty_show_color_picker('chestnutty-banner-color-1', 'Header and Footer background color 1', get_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1)); ?>
        <?php chestnutty_show_color_picker('chestnutty-banner-color-2', 'Header and Footer background color 2', get_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-normal-1', 'Menu color 1', get_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-normal-2', 'Menu color 2', get_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-hover-1', 'Menu hover color 1', get_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-hover-2', 'Menu hover color 2', get_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-selected-1', 'Menu selected color 1', get_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1)); ?>
        <?php chestnutty_show_color_picker('chestnutty-menu-color-selected-2', 'Menu selected color 2', get_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2)); ?>
        <?php chestnutty_show_color_picker('chestnutty-button-color', 'Button color', get_option('chestnutty-button-color', CHESTNUTTY_BUTTON_COLOR)); ?>
        
        <div class="row file">
            <label>
                <?php _e('Bullet list item icon', 'chestnutty'); ?> <span class="note"><?php _e('(14 x 14)', 'chestnutty'); ?></span>:
            </label>
            <img class="uploaded-image" id="chestnutty-bullet-icon-display" src="<?php echo get_option('chestnutty-bullet-icon', CHESTNUTTY_BULLET_ICON) ?>"<?php echo $bulletDisplay ?> />
            <input type="button" id="chestnutty-bullet-icon-remove" class="remove-file"<?php echo $bulletDisplay ?> />
            <input type="file" name="chestnutty-bullet-icon" id="chestnutty-bullet-icon" />
            <input type="hidden" name="chestnutty-bullet-icon-filename" id="chestnutty-bullet-icon-filename" value="<?php echo get_option('chestnutty-bullet-icon', CHESTNUTTY_BULLET_ICON) ?>" />
        </div>
        <div class="form-action">
            <input type="submit" name="submit-to-update" value="<?php _e('Save', 'chestnutty'); ?>" />
        </div>
    </div>
    </form>
</div>
<?php
};
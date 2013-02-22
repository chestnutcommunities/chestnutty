<?php

function chestnutty_head() {
    /* define font faces */
    $themeDir = get_bloginfo('template_directory');
    
    $fontFaceComfortaaRegular = <<<FONTFACE
@font-face {
    font-family: 'ComfortaaRegular';
    src: url('{$themeDir}/font/comfortaa/Comfortaa_Regular-webfont.eot');
    src: url('{$themeDir}/font/comfortaa/Comfortaa_Regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Regular-webfont.woff') format('woff'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Regular-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Regular-webfont.svg#ComfortaaRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceComfortaaBold = <<<FONTFACE
@font-face {
    font-family: 'ComfortaaBold';
    src: url('{$themeDir}/font/comfortaa/Comfortaa_Bold-webfont.eot');
    src: url('{$themeDir}/font/comfortaa/Comfortaa_Bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Bold-webfont.woff') format('woff'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Bold-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/comfortaa/Comfortaa_Bold-webfont.svg#ComfortaaBold') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceCommandoCommando = <<<FONTFACE
@font-face {
    font-family: 'CommandoCommando';
    src: url('{$themeDir}/font/commando/commando-webfont.eot');
    src: url('{$themeDir}/font/commando/commando-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/commando/commando-webfont.woff') format('woff'),
         url('{$themeDir}/font/commando/commando-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/commando/commando-webfont.svg#CommandoCommando') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceGreyscaleBasicBold = <<<FONTFACE
@font-face {
    font-family: 'GreyscaleBasicBold';
    src: url('{$themeDir}/font/greyscale/Greyscale_Basic_Bold-webfont.eot');
    src: url('{$themeDir}/font/greyscale/Greyscale_Basic_Bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Bold-webfont.woff') format('woff'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Bold-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Bold-webfont.svg#GreyscaleBasicBold') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceGreyscaleBasicRegular = <<<FONTFACE
@font-face {
    font-family: 'GreyscaleBasicRegular';
    src: url('{$themeDir}/font/greyscale/Greyscale_Basic_Regular-webfont.eot');
    src: url('{$themeDir}/font/greyscale/Greyscale_Basic_Regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Regular-webfont.woff') format('woff'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Regular-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/greyscale/Greyscale_Basic_Regular-webfont.svg#GreyscaleBasicRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceGudeaRegular = <<<FONTFACE
@font-face {
    font-family: 'GudeaRegular';
    src: url('{$themeDir}/font/gudea/Gudea-Regular-webfont.eot');
    src: url('{$themeDir}/font/gudea/Gudea-Regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/gudea/Gudea-Regular-webfont.woff') format('woff'),
         url('{$themeDir}/font/gudea/Gudea-Regular-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/gudea/Gudea-Regular-webfont.svg#GudeaRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceGudeaBold = <<<FONTFACE
@font-face {
    font-family: 'GudeaBold';
    src: url('{$themeDir}/font/gudea/Gudea-Bold-webfont.eot');
    src: url('{$themeDir}/font/gudea/Gudea-Bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/gudea/Gudea-Bold-webfont.woff') format('woff'),
         url('{$themeDir}/font/gudea/Gudea-Bold-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/gudea/Gudea-Bold-webfont.svg#GudeaBold') format('svg');
    font-weight: normal;
    font-style: normal;
}

FONTFACE;
    $fontFaceDaysRegular = <<<FONTFACE
@font-face {
    font-family: 'DaysRegular';
    src: url('{$themeDir}/font/days/Days-webfont.eot');
    src: url('{$themeDir}/font/days/Days-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/days/Days-webfont.woff') format('woff'),
         url('{$themeDir}/font/days/Days-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/days/Days-webfont.svg#DaysRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceMedioRegular = <<<FONTFACE
@font-face {
    font-family: 'MedioRegular';
    src: url('{$themeDir}/font/medio/Medio-webfont.eot');
    src: url('{$themeDir}/font/medio/Medio-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/medio/Medio-webfont.woff') format('woff'),
         url('{$themeDir}/font/medio/Medio-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/medio/Medio-webfont.svg#MedioRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceSpinCycleOTRegular = <<<FONTFACE
@font-face {
    font-family: 'SpinCycleOTRegular';
    src: url('{$themeDir}/font/spincycle/spincycle_ot-webfont.eot');
    src: url('{$themeDir}/font/spincycle/spincycle_ot-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/spincycle/spincycle_ot-webfont.woff') format('woff'),
         url('{$themeDir}/font/spincycle/spincycle_ot-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/spincycle/spincycle_ot-webfont.svg#SpinCycleOTRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceSpinCycle3DOTRegular = <<<FONTFACE
@font-face {
    font-family: 'SpinCycle3DOTRegular';
    src: url('{$themeDir}/font/spincycle/spincycle_3d_ot-webfont.eot');
    src: url('{$themeDir}/font/spincycle/spincycle_3d_ot-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/spincycle/spincycle_3d_ot-webfont.woff') format('woff'),
         url('{$themeDir}/font/spincycle/spincycle_3d_ot-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/spincycle/spincycle_3d_ot-webfont.svg#SpinCycle3DOTRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFaceJournalRegular = <<<FONTFACE
@font-face {
    font-family: 'JournalRegular';
    src: url('{$themeDir}/font/journal/journal-webfont.eot');
    src: url('{$themeDir}/font/journal/journal-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/journal/journal-webfont.woff') format('woff'),
         url('{$themeDir}/font/journal/journal-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/journal/journal-webfont.svg#JournalRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $fontFacePacificoRegular = <<<FONTFACE
@font-face {
    font-family: 'PacificoRegular';
    src: url('{$themeDir}/font/pacifico/Pacifico-webfont.eot');
    src: url('{$themeDir}/font/pacifico/Pacifico-webfont.eot?#iefix') format('embedded-opentype'),
         url('{$themeDir}/font/pacifico/Pacifico-webfont.woff') format('woff'),
         url('{$themeDir}/font/pacifico/Pacifico-webfont.ttf') format('truetype'),
         url('{$themeDir}/font/pacifico/Pacifico-webfont.svg#PacificoRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
FONTFACE;

    $bannerFontFace = '';
    $headerFontFace = '';
    $bodyFontFace = '';
    $bannerFont = '';
    $headerFont = '';
    $bodyFont = '';
    $styleAdjustment = '';
    $subHeaderAdjustment = '';
    
    switch (get_option('chestnutty-banner-font', CHESTNUTTY_BANNER_FONT)) {
        case 'comfortaa':
            $bannerFontFace = $fontFaceComfortaaBold;
            $bannerFont = "'ComfortaaBold', sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1.1428571428571428571428571428571em; /* 16/14 = 1.1428571428571428571428571428571em */
    }
ADJUSTMENT;
            break;
        case 'commando':
            $bannerFontFace = $fontFaceCommandoCommando;
            $bannerFont = "'CommandoCommando', sans-serif";
            break;
        case 'days':
            $bannerFontFace = $fontFaceDaysRegular;
            $bannerFont = "'DaysRegular', sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.25em; /* 36/14 = 2.25em */
    }
    #banner h2 {
        font-size: 1em; /* 14/14 = 1em */
    }
ADJUSTMENT;
            break;
        case 'gudea':
            $bannerFontFace = $fontFaceGudeaBold;
            $bannerFont = "'GudeaBold', sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1.1428571428571428571428571428571em; /* 16/14 = 1.1428571428571428571428571428571em */
    }
ADJUSTMENT;
            break;
        case 'medio':
            $bannerFontFace = $fontFaceMedioRegular;
            $bannerFont = "'MedioRegular', sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1.1428571428571428571428571428571em; /* 16/14 = 1.1428571428571428571428571428571em */
    }
ADJUSTMENT;
            break;
        case 'spincycle':
            $bannerFontFace = $fontFaceSpinCycleOTRegular;
            $bannerFont = "'SpinCycleOTRegular', Arial, sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1.1428571428571428571428571428571em; /* 16/14 = 1.1428571428571428571428571428571em */
    }
ADJUSTMENT;
            break;
        case 'spincycle3d':
            $bannerFontFace = $fontFaceSpinCycle3DOTRegular;
            $bannerFont = "'SpinCycle3DOTRegular', Arial, sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1.1428571428571428571428571428571em; /* 16/14 = 1.1428571428571428571428571428571em */
    }
ADJUSTMENT;
            break;
        case 'journal':
            $bannerFontFace = $fontFaceJournalRegular;
            $bannerFont = "'JournalRegular', Arial, sans-serif;";
            break;
        case 'pacifico':
            $bannerFontFace = $fontFacePacificoRegular;
            $bannerFont = "'PacificoRegular', Arial, sans-serif;";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.5714285714285714285714285714286em; /* 36/14 = 2.5714285714285714285714285714286em */
    }
    #banner h2 {
        margin-top: .4em;
        font-size: 0.92857142857142857142857142857143em; /* 13/14 = 0.92857142857142857142857142857143em */
    }
ADJUSTMENT;
            break;
        default:
            $bannerFontFace = $fontFaceGreyscaleBasicBold;
            $bannerFont = "'GreyscaleBasicBold', sans-serif";
            $styleAdjustment = <<<ADJUSTMENT
    #banner h1 {
        font-size: 2.8571428571428571428571428571429em; /* 40/14 = 2.8571428571428571428571428571429em */
    }
    #banner h2 {
        font-size: 1em; /* 14/14 = 1em */
    }
ADJUSTMENT;
    }
    
    switch (get_option('chestnutty-header-font', CHESTNUTTY_HEADER_FONT)) {
        case 'comfortaa':
            $headerFontFace = $fontFaceComfortaaBold;
            $headerFont = "'ComfortaaBold', sans-serif";
            break;
        case 'commando':
            $headerFontFace = $fontFaceCommandoCommando;
            $headerFont = "'CommandoCommando', sans-serif";
            $subHeaderAdjustment = <<<ADJUSTMENT
#sidebar .recent-post .post-info h3,
#content .affiliate .post-info h3,
#sidebar .affiliate .post-info h3 {
    font-size: 1.0714285714285714285714285714286em; /* 15/14 = 1.0714285714285714285714285714286em */
}
ADJUSTMENT;
            break;
        case 'days':
            $headerFontFace = $fontFaceDaysRegular;
            $headerFont = "'DaysRegular', sans-serif";
            $subHeaderAdjustment = <<<ADJUSTMENT
#sidebar .recent-post .post-info h3,
#content .affiliate .post-info h3,
#sidebar .affiliate .post-info h3 {
    font-size: 0.92857142857142857142857142857143em; /* 13/14 = 0.92857142857142857142857142857143em */
}
ADJUSTMENT;
            break;
        case 'gudea':
            $headerFontFace = $fontFaceGudeaBold;
            $headerFont = "'GudeaBold', sans-serif";
            break;
        case 'medio':
            $headerFontFace = $fontFaceMedioRegular;
            $headerFont = "'MedioRegular', sans-serif";
            break;
        case 'spincycle':
            $headerFontFace = $fontFaceSpinCycleOTRegular;
            $headerFont = "'SpinCycleOTRegular', Arial, sans-serif";
            break;
        case 'spincycle3d':
            $headerFontFace = $fontFaceSpinCycle3DOTRegular;
            $headerFont = "'SpinCycle3DOTRegular', Arial, sans-serif";
            break;
        case 'journal':
            $headerFontFace = $fontFaceJournalRegular;
            $headerFont = "'JournalRegular', Arial, sans-serif;";
            $subHeaderAdjustment = <<<ADJUSTMENT
#content h1.entry-title {
    font-size: 2.5714285714285714285714285714286em; /* 36/14 = 2.5714285714285714285714285714286em */
    text-shadow: 0 0 1px #cccccc;
}
#content .post-item .entry-title {
    font-weight: bold;
    font-size: 1.7142857142857142857142857142857em; /* 24/14 = 1.7142857142857142857142857142857em */
    text-shadow: 0 0 1px #cccccc;
}
#sidebar .recent-post .post-info h3,
#content .affiliate .post-info h3,
#sidebar .affiliate .post-info h3 {
    font-size: 1.2857142857142857142857142857143em; /* 18/14 = 1.2857142857142857142857142857143em */
    text-shadow: 0 0 1px #cccccc;
}
ADJUSTMENT;
            break;
        case 'pacifico':
            $headerFontFace = $fontFacePacificoRegular;
            $headerFont = "'PacificoRegular', Arial, sans-serif;";
            break;
        default:
            $headerFontFace = $fontFaceGreyscaleBasicBold;
            $headerFont = "'GreyscaleBasicBold', sans-serif";
    }
    
    switch (get_option('chestnutty-body-font', CHESTNUTTY_BODY_FONT)) {
        case 'comfortaa':
            $bodyFontFace = $fontFaceComfortaaRegular;
            $bodyFont = "'ComfortaaRegular', sans-serif";
            break;
        case 'commando':
            $bodyFontFace = $fontFaceCommandoCommando;
            $bodyFont = "'CommandoCommando', sans-serif";
            break;
        case 'days':
            $bodyFontFace = $fontFaceDaysRegular;
            $bodyFont = "'DaysRegular', sans-serif";
            break;
        case 'greyscale':
            $bodyFontFace = $fontFaceGreyscaleBasicRegular;
            $bodyFont = "'GreyscaleBasicRegular', sans-serif";
            break;
        case 'medio':
            $bodyFontFace = $fontFaceMedioRegular;
            $bodyFont = "'MedioRegular', sans-serif";
            break;
        case 'spincycle':
            $bodyFontFace = $fontFaceSpinCycleOTRegular;
            $bodyFont = "'SpinCycleOTRegular', Arial, sans-serif";
            break;
        case 'spincycle3d':
            $bodyFontFace = $fontFaceSpinCycle3DOTRegular;
            $bodyFont = "'SpinCycle3DOTRegular', Arial, sans-serif";
            break;
        default:
            $bodyFontFace = $fontFaceGudeaRegular;
            $bodyFont = "'GudeaRegular', sans-serif";
    }
?>
<link rel="icon" type="image/x-icon" href="<?php render_option('chestnutty-favicon', CHESTNUTTY_FAVICON); ?>" />
<style type="text/css">
    <?php echo $bannerFontFace; ?>
    <?php echo $headerFontFace; ?>
    <?php echo $bodyFontFace; ?>
    
    body {
        font-family: <?php echo $bodyFont; ?>;
        background: <?php render_option('chestnutty-background-color', CHESTNUTTY_BACKGROUND_COLOR); ?> url("<?php render_option('chestnutty-background-tile-image', CHESTNUTTY_BACKGROUND_TILE_IMAGE); ?>") repeat 0 0;
    }
    
    h1, h2, h3 {
        font-family: <?php echo $headerFont; ?>;
    }
<?php
    if (get_option('chestnutty-cast-shadow', CHESTNUTTY_CAST_SHADOW) == '1'):
?>
    #banner {
        box-shadow: -5px 0 5px rgba(0, 0, 0, .1),
            5px 0 5px rgba(0, 0, 0, .1),
            0 -5px 5px rgba(0, 0, 0, .1),
            0 0 0 transparent;
    }
    #content-wrapper {
        box-shadow: -5px 0 5px rgba(0, 0, 0, .1),
            5px 0 5px rgba(0, 0, 0, .1),
            0 -5px 5px rgba(0, 0, 0, .1),
            0 5px 5px rgba(0, 0, 0, .1);
    }
    #contentinfo {
        box-shadow: -5px 0 5px rgba(0, 0, 0, .1),
            5px 0 5px rgba(0, 0, 0, .1),
            0 0 0 transparent,
            0 5px 5px rgba(0, 0, 0, .1);
    }
<?php
    else:
        //remove margin on the bottom
?>
    #contentinfo { margin-bottom: 0; }
<?php
    endif;
?>
    #banner h1, #banner h2 {
        font-family: <?php echo $bannerFont; ?>;
    }
    #banner h2 {
        color: <?php render_option('chestnutty-banner-color', CHESTNUTTY_BANNER_COLOR); ?>;
    }
    #contentinfo,
    #contentinfo a {
        color: <?php render_option('chestnutty-banner-color', CHESTNUTTY_BANNER_COLOR); ?>;
    }
<?php echo $styleAdjustment ?>
    #banner a {
        color: <?php render_option('chestnutty-banner-color', CHESTNUTTY_BANNER_COLOR); ?>;
<?php
    if (get_option('chestnutty-cast-shadow-under-header', CHESTNUTTY_CAST_SHADOW_UNDER) == '1'):
?>
        text-shadow: 1px 1px 0 <?php render_option('chestnutty-header-shadow-color', CHESTNUTTY_HEADER_SHADOW_COLOR); ?>;
<?php
    endif;
?>
    }
    #banner hgroup {
        /* 96/14 = 6.8571428571428571428571428571429em */
        padding: 1em 0 1em 6.8571428571428571428571428571429em;
        background: transparent url("<?php render_option('chestnutty-logo', CHESTNUTTY_LOGO); ?>") no-repeat .57142857142857142857142857142857em center; /* 8/14 = 0.57142857142857142857142857142857em */
    }
    
    #content .legal section h1,
    #content header strong {
        font-family: <?php echo $headerFont; ?>;
    }
    /* link colors */
    a { color: <?php render_option('chestnutty-link-color-normal', CHESTNUTTY_LINK_COLOR_NORMAL); ?>; }
    a:hover { color: <?php render_option('chestnutty-link-color-hover', CHESTNUTTY_LINK_COLOR_HOVER); ?>; }
    
    /* header + footer */
    #banner, #contentinfo {
        background-color: <?php render_option('chestnutty-banner-color-1', '') ?>;
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php render_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1); ?>), to(<?php render_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2); ?>));
        background-image: -webkit-linear-gradient(left, <?php render_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1); ?>, <?php render_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2); ?>);
        background-image: -moz-linear-gradient(left, <?php render_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1); ?>, <?php render_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2); ?>);
        background-image: -ms-linear-gradient(left, <?php render_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1); ?>, <?php render_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2); ?>);
        background-image: -o-linear-gradient(left, <?php render_option('chestnutty-banner-color-1', CHESTNUTTY_BANNER_COLOR_1); ?>, <?php render_option('chestnutty-banner-color-2', CHESTNUTTY_BANNER_COLOR_2); ?>);
    }
    
    /* header menu */
    #banner .menu {
        background-color: <?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1) ?>;
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1); ?>), to(<?php render_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2); ?>));
        background-image: -webkit-linear-gradient(top, <?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1); ?>, <?php render_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2); ?>);
        background-image: -moz-linear-gradient(top, <?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1); ?>, <?php render_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2); ?>);
        background-image: -ms-linear-gradient(top, <?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1); ?>, <?php render_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2); ?>);
        background-image: -o-linear-gradient(top, <?php render_option('chestnutty-menu-color-normal-1', CHESTNUTTY_MENU_COLOR_NORMAL_1); ?>, <?php render_option('chestnutty-menu-color-normal-2', CHESTNUTTY_MENU_COLOR_NORMAL_2); ?>);
    }
    
    /* header menu item hover */
    #banner .menu a:hover {
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php render_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1) ?>), to(<?php render_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2) ?>));
        background-image: -webkit-linear-gradient(top, <?php render_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1) ?>, <?php render_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2) ?>);
        background-image: -moz-linear-gradient(top, <?php render_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1) ?>, <?php render_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2) ?>);
        background-image: -ms-linear-gradient(top, <?php render_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1) ?>, <?php render_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2) ?>);
        background-image: -o-linear-gradient(top, <?php render_option('chestnutty-menu-color-hover-1', CHESTNUTTY_MENU_COLOR_HOVER_1) ?>, <?php render_option('chestnutty-menu-color-hover-2', CHESTNUTTY_MENU_COLOR_HOVER_2) ?>);
    }
    
    /* header menu currently selected item */
    #banner .current_page_item a,
    #banner .current-menu-item a {
        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php render_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1) ?>), to(<?php render_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2) ?>));
        background-image: -webkit-linear-gradient(top, <?php render_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1) ?>, <?php render_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2) ?>);
        background-image: -moz-linear-gradient(top, <?php render_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1) ?>, <?php render_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2) ?>);
        background-image: -ms-linear-gradient(top, <?php render_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1) ?>, <?php render_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2) ?>);
        background-image: -o-linear-gradient(top, <?php render_option('chestnutty-menu-color-selected-1', CHESTNUTTY_MENU_COLOR_SELECTED_1) ?>, <?php render_option('chestnutty-menu-color-selected-2', CHESTNUTTY_MENU_COLOR_SELECTED_2) ?>);
    }
    
    /* bullet list item image */
    #content-wrapper li {
        background: transparent url("<?php render_option('chestnutty-bullet-icon', CHESTNUTTY_BULLET_ICON) ?>") no-repeat 0 0;
        padding-left: 18px;
    }
    
    /* button colors */
    #searchform #searchsubmit,
    #commentform #submit,
    #contact #contact-create,
    #sidebar .online-poll .action input {
        background-color: <?php render_option('chestnutty-button-color', CHESTNUTTY_BUTTON_COLOR) ?>;
        border-color: <?php render_option('chestnutty-button-color', CHESTNUTTY_BUTTON_COLOR) ?>;
    }
    
    /* button color */
    #content .more-link {
        background-color: <?php render_option('chestnutty-button-color', CHESTNUTTY_BUTTON_COLOR) ?>;
    }
<?php echo $subHeaderAdjustment; ?>
</style>
<?php
}
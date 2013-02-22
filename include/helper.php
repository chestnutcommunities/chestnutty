<?php

function get_ad($name = '') {
    if ($name == '') { return; }
    
    $client = get_option('chad-account-id', '');
    
    if ($client == '') {
        return '';
    }
    
    $units = array
    (
        '728x90' => 
            array
            (
                'slot' => get_option('chad-id-728x90', ''),
                'width' => '728',
                'height' => "90"
            ),
        '468x60' => 
            array
            (
                'slot' => get_option('chad-id-468x60', ''),
                'width' => '468',
                'height' => "60"
            ),
        '468x15' => 
            array
            (
                'slot' => get_option('chad-id-468x15', ''),
                'width' => '468',
                'height' => "15"
            ),
        '200x90' => 
            array
            (
                'slot' => get_option('chad-id-200x90', ''),
                'width' => '200',
                'height' => "90"
            ),
        '300x250' => 
            array
            (
                'slot' => get_option('chad-id-300x250', ''),
                'width' => '300',
                'height' => "250"
            )
    );
    
    $unit = $units[$name];
    
    $content = '';
    // don't insert google adsense code if localhost
    if (substr($_SERVER['REMOTE_ADDR'], 0, 4) == '127.' || $_SERVER['REMOTE_ADDR'] == '::1') {
        $content = <<<HTML
<aside class="ad ad-{$name}">
    <div style="display: inline-block; width: {$unit['width']}px; height: {$unit['height']}px; color: #fff; text-align: center; line-height: {$unit['height']}px; background-color: #8888ff;">{$unit['slot']}</div>
</aside>
HTML;
    }
    else {
        $content = <<<HTML
<aside class="ad ad-{$name}">
    <script type="text/javascript">
        google_ad_client = "{$client}";
        google_ad_slot = "{$unit['slot']}";
        google_ad_width = {$unit['width']};
        google_ad_height = {$unit['height']};
    //-->
    </script>
    <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</aside>
HTML;
    }
    echo $content;
}

function render_option($name, $default = null) {
    echo get_option($name, $default);
}

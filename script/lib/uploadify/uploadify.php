<?php

// addition from chestnut adsense
function chestnut_adsense_uploadify_create_guid() {
    $result = '';

    if (function_exists('com_create_guid')) {
        $result = substr(com_create_guid(), 1, 36);
    }
    else {
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));

        $guid = substr($charid, 0, 8).'-'.
        substr($charid, 8, 4).'-'.
        substr($charid, 12, 4).'-'.
        substr($charid, 16, 4).'-'.
        substr($charid, 20, 12);

        $result = $guid;
    }
    return $result;
}

/*
 Uploadify v2.1.4
 Release Date: November 8, 2010
 Copyright (c) 2010 Ronnie Garcia, Travis Nickels
 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.
 */
if (! empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'].$_REQUEST['folder'].'/';
    $size = $_FILES['Filedata']['size'];
    $pathinfo = pathinfo($_FILES['Filedata']['name']);
    $extension = strtolower($pathinfo['extension']);

    static $accepted = array ('jpeg', 'jpg', 'pjpeg', 'gif', 'png', 'tiff', 'bmp', 'ico');

    if (!in_array($extension, $accepted)) {
        echo 'UNACCEPTED_TYPE';
    }
    else if ($size > 2097152) {
        echo 'OVERSIZED';
    }
    else {
        $guid = chestnut_adsense_uploadify_create_guid();
        $guid = str_replace('{', '', $guid);
        $guid = str_replace('}', '', $guid);
        $guid = strtolower($guid);
        $targetFile = str_replace('//', '/', $targetPath).$guid.'.'.$extension;

        move_uploaded_file($tempFile, $targetFile);
        echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $targetFile);
    }
}
?>

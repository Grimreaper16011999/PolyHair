<?php
// Các biến đường dẫn
$ROOT_URL = "/DUAN1_WEBSITE_CAT_TOC";
$CSS_URL = "$ROOT_URL/resources/css";
$IMG_URL = "$ROOT_URL/resources/img";
$JS_URL = "$ROOT_URL/resources/js";
$ADMIN_URL = "$ROOT_URL/Admin";
$STAFF_URL = "$ROOT_URL/NhanVien";


function exist_param($filename)
{
    return array_key_exists($filename, $_REQUEST);
}

<?php
require "../global.php";
extract($_REQUEST);
if (exist_param("dat_lich")) {
    $VIEW_NAME = "dat_lich.php";
}
elseif(exist_param("home")){
    $VIEW_NAME = "home.php";
}
elseif(exist_param("dich_vu")){
    $VIEW_NAME = "dich_vu.php";
}
elseif(exist_param("bai_viet")){
    $VIEW_NAME = "bai_viet.php";
}
elseif(exist_param("store")){
    $VIEW_NAME = "store.php";
}
elseif(exist_param("login")){
    $VIEW_NAME = "login.php";
}
elseif(exist_param("chi_tiet")){
    $VIEW_NAME = "chi_tiet.php";
}
elseif(exist_param("khuyen_mai")){
    $VIEW_NAME = "khuyen_mai.php";
}
elseif(exist_param("style")){
    $VIEW_NAME = "style.php";
}
else {
    $VIEW_NAME = "home.php";
}
include_once "layout.php";

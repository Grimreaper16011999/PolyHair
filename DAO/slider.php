<?php
require_once "pdo.php";

// Thêm slider
function slider_insert($hinh_anh,$tieu_de,$noi_dung,$trang_thai){
    $sql = "INSERT INTO slider(hinh_anh,tieu_de,noi_dung,trang_thai) VALUES (?,?,?,?)";
    pdo_excute($sql,$hinh_anh,$tieu_de,$noi_dung,$trang_thai);
}

// Sửa slider
function slider_update($hinh_anh,$tieu_de,$noi_dung,$trang_thai, $ma_anh){
    $sql = "UPDATE slider SET hinh_anh=?,tieu_de=?,noi_dung=?,trang_thai=? WHERE ma_anh =?";
    pdo_excute($sql,$hinh_anh,$tieu_de,$noi_dung,$trang_thai, $ma_anh);
}

// Xoá slider
function slider_delete($ma_anh)
{
    $sql = "DELETE FROM slider WHERE ma_anh=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_anh)) {
        foreach ($ma_anh as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_anh);
    }
}

//chọn tất cả
function slider_select_All(){
    $sql = "SELECT *FROM slider";
    return pdo_query($sql);
}
function slider_select_All_bat(){
    $sql = "SELECT *FROM slider WHERE trang_thai=1";
    return pdo_query($sql);
}
// Chọn theo mã
function slider_select_by_id($ma_anh)
{
    $sql = "SELECT *FROM slider WHERE ma_anh=?";
    return pdo_query_one($sql, $ma_anh);
}
function slider_count(){
    $sql = "SELECT COUNT(ma_anh) as total FROM slider";
    return pdo_query_one($sql);
}
<?php
require_once "pdo.php";

// Thêm khung giờ
function kg_insert($thoi_gian){
    $sql = "INSERT INTO khung_gio(thoi_gian) VALUES (?)";
    pdo_excute($sql,$thoi_gian);
}
// kg_insert('9h00 - 9h30');
function kg_update($thoi_gian, $ma_khung_gio){
    $sql = "UPDATE khung_gioi SET thoi_gian =? WHERE ma_khung_gio = ?";
    pdo_excute($sql,$thoi_gian, $ma_khung_gio);
}

// Xoá

function kg_delete($ma_khung_gio)
{
    $sql = "DELETE FROM khung_gio WHERE ma_khung_gio=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_khung_gio)) {
        foreach ($ma_khung_gio as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_khung_gio);
    }
}

// Select All
function kg_select_All(){
    $sql = "SELECT *FROM khung_gio";
    return pdo_query($sql);
}

// Truy vấn 1 bản ghi theo mã loại
function kg_select_by_id($ma_khung_gio)
{
    $sql = "SELECT *FROM khung_gio WHERE ma_khung_gio=?";
    return pdo_query_one($sql, $ma_khung_gio);
}

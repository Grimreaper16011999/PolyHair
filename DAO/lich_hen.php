<?php
require_once "pdo.php";

// Thêm mới lịch hẹn

function lich_hen_insert($ma_tai_khoan, $so_dien_thoai, $ma_co_so, $ma_nhan_vien, $ngay_cat, $ma_khung_gio, $ma_dich_vu, $ma_khuyen_mai, $ghi_chu)
{
    $sql = "INSERT INTO dat_lich(ma_tai_khoan, so_dien_thoai, ma_co_so, ma_nhan_vien, ngay_cat, ma_khung_gio, ma_dich_vu, ma_khuyen_mai, ghi_chu) VALUE (?,?,?,?,?,?,?,?,?)";
    pdo_excute($sql, $ma_tai_khoan, $so_dien_thoai, $ma_co_so, $ma_nhan_vien, $ngay_cat, $ma_khung_gio, $ma_dich_vu, $ma_khuyen_mai, $ghi_chu);
}

//Update trạng thái đơn
function lich_hen_update_status($trang_thai, $ma_don)
{
    $sql = "UPDATE dat_lich SET trang_thai=? WHERE ma_don=?";
    pdo_excute($sql, $trang_thai, $ma_don);
}

function lich_hen_delete($ma_don)
{
    $sql = "DELETE FROM dat_lich WHERE ma_don=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_don)) {
        foreach ($ma_don as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_don);
    }
}

function lich_hen_select_All()
{
    $sql = "SELECT *FROM dat_lich";
    return pdo_query($sql);
}
function lich_hen_select_by_ma_tk($ma_nhan_vien)
{
    $sql = "SELECT *FROM dat_lich WHERE ma_nhan_vien=?";
    return pdo_query($sql);
}
function lich_hen_select_All_limit($firstindex, $limit)
{
    $sql = "SELECT *FROM dat_lich LIMIT $firstindex,$limit";
    return pdo_query($sql);
}
function lich_hen_select_by_tk($ma_tai_khoan, $firstindex, $limit)
{
    $sql = "SELECT *FROM dat_lich WHERE ma_tai_khoan=? LIMIT $firstindex,$limit";
    return pdo_query($sql, $ma_tai_khoan);
}

function lich_hen_select_by_ma_tk_limit($ma_nhan_vien, $firstindex, $limit)
{
    $sql = "SELECT *FROM dat_lich WHERE ma_nhan_vien=?  LIMIT $firstindex,$limit";
    return pdo_query($sql, $ma_nhan_vien);
}
// Truy vấn theo mã nhân viên
function lich_hen_select_by_id($ma_don)
{
    $sql = "SELECT *FROM dat_lich WHERE ma_don=?";
    return pdo_query_one($sql, $ma_don);
}
function lh_count()
{
    $sql = "SELECT COUNT(ma_don) as total FROM dat_lich";
    return pdo_query_one($sql);
}

// Lịch hẹn hôm nay 

function lich_hen_date_now($ngay_cat, $firstIndex, $limit)
{

    $sql = "SELECT *FROM dat_lich WHERE ngay_cat=? LIMIT $firstIndex,$limit";
    return pdo_query($sql, $ngay_cat);
}

// Lịch hẹn 1 tuần tới
function lich_hen_week($date_now,$week,$firstIndex, $limit)
{
    $sql = "SELECT *FROM dat_lich WHERE ngay_cat>=? AND ngay_cat <= ? LIMIT $firstIndex,$limit";
    return pdo_query($sql,$date_now,$week);
}

function lich_hen_date_now_nv($ma_nhan_vien,$ngay_cat, $firstIndex, $limit)
{

    $sql = "SELECT *FROM dat_lich WHERE ma_nhan_vien=? AND ngay_cat=? LIMIT $firstIndex,$limit";
    return pdo_query($sql,$ma_nhan_vien ,$ngay_cat);
}

// Lịch hẹn 1 tuần tới
function lich_hen_week_nv($ma_nhan_vien,$date_now,$week,$firstIndex, $limit)
{
    $sql = "SELECT *FROM dat_lich WHERE ma_nhan_vien=? AND ngay_cat>=? AND ngay_cat <= ? LIMIT $firstIndex,$limit";
    return pdo_query($sql,$ma_nhan_vien,$date_now,$week);
}


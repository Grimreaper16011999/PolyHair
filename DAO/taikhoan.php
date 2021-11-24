<?php
require_once "pdo.php";

// Thêm tài khoản
function tk_insert($ten_tai_khoan,$ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai){
    $sql = "INSERT INTO tai_khoan(ten_tai_khoan,ho_ten, hinh_anh, mat_khau, email, trang_thai) VALUES(?,?,?,?,?,?)";
    pdo_excute($sql,$ten_tai_khoan,$ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai);
}


// Update tài khoản
function tk_update($ten_tai_khoan,$ho_ten, $hinh_anh, $email, $trang_thai,$ma_tai_khoan){
    $sql = "UPDATE tai_khoan SET ten_tai_khoan=?, ho_ten=?, hinh_anh=?, email=?, trang_thai=?  WHERE ma_tai_khoan=?";
    pdo_excute($sql,$ten_tai_khoan,$ho_ten, $hinh_anh, $email, $trang_thai,$ma_tai_khoan);
}

// Xoá tài khoản
function tk_delete($ma_tai_khoan)
{
    $sql = "DELETE FROM tai_khoan WHERE ma_tai_khoan=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_tai_khoan)) {
        foreach ($ma_tai_khoan as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_tai_khoan);
    }
}

function tk_select_All(){
    $sql = "SELECT *FROM tai_khoan";
    return pdo_query($sql);
}
function tk_select_All_limit($firstindex,$limit){
    $sql = "SELECT *FROM tai_khoan LIMIT $firstindex,$limit ";
    return pdo_query($sql);
}
// Truy vấn theo mã nhân viên
function tk_select_by_id($ma_tai_khoan)
{
    $sql = "SELECT *FROM tai_khoan WHERE ma_tai_khoan=?";
    return pdo_query_one($sql, $ma_tai_khoan);
}
function tk_count(){
    $sql = "SELECT COUNT(ma_tai_khoan) as total FROM tai_khoan";
    return pdo_query_one($sql);
}

function tai_khoan_exist($ten_tai_khoan)
{
    $sql = "SELECT count(*) FROM tai_khoan WHERE ten_tai_khoan=?";
    return pdo_query_value($sql, $ten_tai_khoan) > 0;
}
function tai_khoan_select_by_tk($ten_tai_khoan)
{
    $sql = "SELECT *FROM tai_khoan WHERE ten_tai_khoan=?";
    return pdo_query_one($sql, $ten_tai_khoan);
}
// Hàm thay đổi mật khẩu
function tai_khoan_change_password($mat_khau, $ma_tai_khoan)
{
    $sql = "UPDATE tai_khoan SET mat_khau=? WHERE ma_tai_khoan=?";
    pdo_excute($sql, $mat_khau, $ma_tai_khoan);
}
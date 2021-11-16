<?php
require_once "pdo.php";
// Thêm mới cơ sỏ
function coso_insert($ten_co_so, $dia_chi, $so_dien_thoai, $url)
{
    $sql = "INSERT INTO co_so(ten_co_so, dia_chi, so_dien_thoai, url) VALUES (?,?,?,?)";
    pdo_excute($sql, $ten_co_so, $dia_chi, $so_dien_thoai, $url);
}


// Update cơ sở
function coso_update($ten_co_so, $dia_chi, $so_dien_thoai, $url, $ma_co_so)
{
    $ngay_sua =  date('Y-m-d H:i:s');
    $sql = "UPDATE co_so SET ten_co_so=?, dia_chi =?, so_dien_thoai=?, url=? WHERE ma_co_so=?";
    pdo_excute($sql, $ten_co_so, $dia_chi, $so_dien_thoai, $url, $ma_co_so);
}

// Xoá cơ sở
// Xoá hàng hoá
function coso_delete($ma_co_so)
{
    $sql = "DELETE FROM co_so WHERE ma_co_so=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_co_so)) {
        foreach ($ma_co_so as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_co_so);
    }
}


// Chọn tất cả cơ sở
function coso_select_All()
{
    $sql = "SELECT *FROM co_so";
    return pdo_query($sql);
}

// Truy vấn 1 bản ghi theo mã loại
function coso_select_by_id($ma_co_so)
{
    $sql = "SELECT *FROM co_so WHERE ma_co_so=?";
    return pdo_query_one($sql, $ma_co_so);
}

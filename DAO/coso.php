<?php
// require "pdo.php";
function loai_select_All()
{
    $sql = "SELECT *FROM coso";
    return pdo_query($sql);
}

// Truy vấn 1 bản ghi theo mã loại
function loai_select_by_id($ma_co_so)
{
    $sql = "SELECT *FROM loai WHERE ma_co_so=?";
    return pdo_query_one($sql, $ma_co_so);
}
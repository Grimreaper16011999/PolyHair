<?php
require_once "pdo.php";
// Thêm mới quản trị

function qt_insert($username, $password, $email, $vaitro){
    $sql = "INSERT INTO quan_tri(username, password, email, vaitro)  VALUES(?,?,?,?)";
    pdo_excute($sql,$username, $password, $email, $vaitro);
}

// Edit 


function qt_select_All(){
    $sql = "SELECT *FROM quan_tri";
    return pdo_query($sql);
}

function qt_delete($ma_so)
{
    $sql = "DELETE FROM quan_tri WHERE ma_so=?";
    // Nếu mã loại là 1 mảng
    if (is_array($ma_so)) {
        foreach ($ma_so as $ma) {
            pdo_excute($sql, $ma);
        }
    } else {
        pdo_excute($sql, $ma_so);
    }
}
function quan_tri_exist($username)
{
    $sql = "SELECT count(*) FROM quan_tri WHERE username=?";
    return pdo_query_value($sql, $username) > 0;
}
function quan_tri_select_by_tk($username)
{
    $sql = "SELECT *FROM quan_tri WHERE username=?";
    return pdo_query_one($sql, $username);
}
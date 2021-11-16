<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
// Kết nối database
function pdo_get_connection()
{
    $conn = new PDO("mysql: host=localhost; dbname=poly_hair; charset=utf8", "root", "");
    // $conn = new PDO("mysql: host=sql302.byethost5.com; dbname=b5_29713039_Xshop; charset=utf8", "b5_29713039", "locloc1601");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
// hàm lấy thực hiện câu lệnh sql (Insert, update, delete)
function pdo_excute($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
// hàm lấy nhiều dữ liệu
// Trả về danh sách bản ghi
function pdo_query($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra" . $e->getMessage();
    } finally {
        unset($conn);
    }
}

// Trả về 1 bản ghi
function pdo_query_one($sql)
{
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra" . $e->getMessage();
    } finally {
        unset($conn);
    }
}

// Đếm số phần tử
function pdo_query_value($sql){
    $args = array_slice(func_get_args(),1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra" . $e->getMessage();
    }
    finally{
        unset($conn);
    }
}

// Demo

/* $sql = "SELECT *from loai WHERE cate_name like ?";
$cate_name = "%n%";
$list = pdo_query($sql,$cate_name);
foreach ($list as $key => $value) {
    echo $value['cate_id'];
    echo $value['cate_name'] . "<br>";
} */

/* $sql = "SELECT count(*) FROM categories";
echo pdo_query_value($sql); */
<?php
session_start();
require "../global.php";
require "../DAO/coso.php";
require "../DAO/taikhoan.php";
require "../DAO/nhanvien.php";
require "../DAO/khunggio.php";
require "../DAO/dichvu.php";
require "../DAO/khuyenmai.php";
require "../DAO/lich_hen.php";
require "../DAO/baiviet.php";
require "../DAO/kieutoc.php";
require "../DAO/sanpham.php";
require "../DAO/binhluan.php";
require "../DAO/slider.php";






extract($_REQUEST);
if (exist_param("dat_lich")) {
    $VIEW_NAME = "dat_lich.php";
    if (!isset($_SESSION['user'])) {
        $MESSAGE = "Bạn cần đăng nhập để đặt lịch";
        header('location: index.php?login&msg=' . $MESSAGE);
    }
    if (isset($_POST['btn_dat_lich'])) {
        extract($_POST);
        $errors = [
            'so_dien_thoai' => '',
            'ma_co_so' => '',
            'ngay_cat' => '',
            'ma_khung_gio' => ''
        ];
        if ($so_dien_thoai == null) {
            $errors['so_dien_thoai'] = 'Dữ liệu không để trống';
        } else {
            if (!preg_match('/^(09|03|07|08|05)+([0-9]{8})$/', $so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
            }
        }
        if (!isset($ma_co_so)) {
            $errors['ma_co_so'] = 'bạn phải chọn cơ sỏ';
        }
        if (!isset($ma_khung_gio)) {
            $errors['ma_khung_gio'] = 'bạn phải chọn khung giờ';
        }
        if ($ngay_cat == null) {
            $errors['ngay_cat'] = 'bạn phải chọn ngày cắt';
        }
        if (!array_filter($errors)) {
            lich_hen_insert($ma_tai_khoan,  $so_dien_thoai,  $ma_co_so,  $ma_nhan_vien, $ngay_cat,  $ma_khung_gio,  $ma_dich_vu,  $ma_khuyen_mai,  $ghi_chu);
            $MESSAGE = "Bạn đã đặt lịch thành công vui lòng xem chi tiết đặt lịch tại phần tài khoản -> lịch sử đơn hàng";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("home")) {
    $VIEW_NAME = "home.php";
} elseif (exist_param("dich_vu")) {
    $VIEW_NAME = "dich_vu.php";
} elseif (exist_param("bai_viet")) {
    $VIEW_NAME = "bai_viet.php";
} elseif (exist_param("store")) {
    $VIEW_NAME = "store.php";
} elseif (exist_param("login")) {
    $VIEW_NAME = "login.php";
    if (isset($_POST['btn_DangNhap'])) {
        extract($_POST);
        $errors = [
            'ten_tai_khoan' => '',
            'mat_khau' => ''
        ];
        $mat_khau = md5($mat_khau);
        if ($ten_tai_khoan == null) {
            $errors['ten_tai_khoan'] = 'Số điện thoại để trống';
        } else {
            if (!preg_match('/^(09|03|07|08|05)+([0-9]{8})$/', $ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Số điện thoại không hợp lệ';
            } else {
                if (!tai_khoan_exist($ten_tai_khoan)) {
                    $errors['ten_tai_khoan'] = "Tên tài khoản không tồn tại";
                } else {
                    $item = tai_khoan_select_by_tk($ten_tai_khoan);
                    if ($mat_khau != $item['mat_khau']) {
                        $errors['mat_khau'] = "Mật khẩu bạn nhập không chinh xác";
                    }
                    if (!array_filter($errors)) {
                        $_SESSION['user'] = $item['ten_tai_khoan'];
                        $_SESSION['id_user'] = $item['ma_tai_khoan'];
                        $MESSAGE = "Đăng nhập thành công";
                        header("location: index.php?dat_lich");
                    }
                }
            }
        }
    }
} elseif (exist_param("logout")) {
    unset($_SESSION['user']);
    unset($_SESSION['id_user']);
    header("location: index.php");
} elseif (exist_param("chi_tiet")) {
    $VIEW_NAME = "chi_tiet.php";
} elseif (exist_param("quanlyuser")) {
    $VIEW_NAME = "quanlyuser.php";
    $tk = tk_select_by_id($_SESSION['id_user']);
    if (isset($_POST['btn_edit'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_tai_khoan' => '',
            'mat_khau' => '',
            're_mat_khau' => '',
            'hinh_anh' => '',
            'email' => '',
            'ho_ten' => ''
        ];

        if ($_FILES['hinh']['size'] > 0) {
            $file = $_FILES['hinh'];
            $hinh_anh = '';
            if ($file['size'] > 0 && $file['size'] <= 2 * 1024 * 1024) {
                $hinh_anh = $file['name'];
                $ext = pathinfo($hinh_anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $ext_img)) {
                    $errors['hinh_anh'] = "Bạn phải chọn file png hoặc jpg";
                }
            } else {
                $errors['hinh_anh'] = "Bạn phải chọn file <=2MB";
            }
        } else {
            $hinh_anh = $tk['hinh_anh'];
        }
        if ($ten_tai_khoan == null) {
            $errors['ten_tai_khoan'] = 'Dữ liệu không được để trống';
        }
        if ($ho_ten == null) {
            $errors['ho_ten'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        if (!preg_match($regex, $email)) {
            $errors['email'] = 'sai định dạng email';
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = 'Dữ liệu không được để trống';
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_mat_khau'] = 'Mật khẩu xác nhận không trùng khớp';
        }

        if (!array_filter($errors)) {
            tk_update($ten_tai_khoan, $ho_ten, $hinh_anh, $email, $trang_thai, $ma_tai_khoan);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../resources/img/taikhoan/" . $hinh_anh);
            }
            $MESSAGE = "Sửa dữ liệu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("changepass")) {
    $VIEW_NAME = "changepass.php";
    if (isset($_POST['btn-change_pass'])) {
        extract($_POST);
        $errors = [
            'mk_old' => '',
            'mat_khau' => '',
            're_pass' => ''
        ];

        $kh = tk_select_by_id($_SESSION['id_user']);
        $mat_khau_old = md5($mat_khau_old);
        if ($kh['mat_khau'] != $mat_khau_old || $mat_khau_old == null) {

            $errors['mk_old'] = "mật khẩu cũ không đúng";
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = "mật khẩu không được để trông";
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_pass'] = "mật khẩu không trùng khớp";
        }
        if (!array_filter($errors)) {
            $mat_khau = md5($mat_khau);
            tai_khoan_change_password($mat_khau, $_SESSION['id_user']);
            $MESSAGE = "Thay đổi mật khẩu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("forgotpass")) {
    $VIEW_NAME = "forgotpass.php";
    if (isset($_POST['btn_forgot'])) {
        extract($_POST);
        $errors = [
            'ten_tai_khoan' => '',
            'email' => ''
        ];
        if (tai_khoan_select_by_tk($ten_tai_khoan) == false) {
            $errors['ten_tai_khoan'] = "Tài khoản không tồn tại";
        } else {
            $kh = tai_khoan_select_by_tk($ten_tai_khoan);
            if ($kh['email'] != $email) {
                $errors['email'] = "Bạn nhập sai địa chỉ email";
            }
        }
        if (!array_filter($errors)) {
            $id = tai_khoan_select_by_tk($ten_tai_khoan)['ma_tai_khoan'];
            header('location: index.php?changepass2&id=' . $id);
        }
    }
} elseif (exist_param("changepass2")) {
    $VIEW_NAME = "changepass2.php";
    if (isset($_POST['btn-change_pass'])) {
        extract($_POST);
        $errors = [
            'mat_khau' => '',
            're_pass' => ''
        ];
        if ($mat_khau == null) {
            $errors['mat_khau'] = "mật khẩu không được để trông";
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_pass'] = "mật khẩu không trùng khớp";
        }
        if (!array_filter($errors)) {
            $mat_khau = md5($mat_khau);
            $id = $_GET['id'];
            tai_khoan_change_password($mat_khau, $id);
            $MESSAGE = "Thay đổi mật khẩu thành công";
            header('location: index.php?msg=' . $MESSAGE);
        }
    }
} elseif (exist_param("lichsudon")) {
    $VIEW_NAME = "lichsudon.php";
} elseif (exist_param("chi_tiet_dv")) {
    $VIEW_NAME = "chi_tiet_dich_vu.php";
} elseif (exist_param("chi_tiet_mt")) {
    $VIEW_NAME = "chi_tiet_mau_toc.php";
} elseif (exist_param("chi_tiet_bai_viet")) {
    $VIEW_NAME = "chi_tiet_bai_viet.php";
} elseif (exist_param("chi_tiet_kieutoc")) {
    $VIEW_NAME = "chi_tiet_kieu_toc.php";
} elseif (exist_param("chi_tiet_khuyenmai")) {
    $VIEW_NAME = "chi_tiet_khuyenmai.php";
} elseif (exist_param("khuyen_mai")) {
    $VIEW_NAME = "khuyen_mai.php";
} elseif (exist_param("style")) {
    $VIEW_NAME = "style.php";
} elseif (exist_param("dien_dan")) {
    $VIEW_NAME = "dien_dan.php";
    try {
        $limit = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if ($page <= 0) {
            $page = 1;
        }
        $firstIndex = ($page - 1) * $limit;

        $list_nv = bl_select_All_limit($firstIndex, $limit);
        // Phân trang lấy số trang 
        $sql = "SELECT count(ma_binh_luan) as total FROM binh_luan";
        $countResult = pdo_query_one($sql);
        $count = $countResult['total'];
        $number = ceil($count / $limit);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    if (isset($_POST['btn_binhluan'])) {
        extract($_POST);
        $errors = [
            'noidung' => ''
        ];
        if ($noi_dung == null) {
            $errors['noidung'] = "Nội dung bình luận không để trống";
        }
        if (!array_filter($errors)) {
            bl_insert($noi_dung, $_SESSION['id_user']);
            header("location: index.php?dien_dan");
        }
    }
} elseif (exist_param("register")) {
    $VIEW_NAME = "register.php";
    if (isset($_POST['btn_insert'])) {
        extract($_POST);
        $ext_img = ['jpg', 'png'];
        $errors = [
            'ten_tai_khoan' => '',
            'mat_khau' => '',
            're_mat_khau' => '',
            'hinh_anh' => '',
            'email' => '',
            'ho_ten' => ''
        ];

        if ($_FILES['hinh']['size'] > 0) {
            $file = $_FILES['hinh'];
            $hinh_anh = '';
            if ($file['size'] > 0 && $file['size'] <= 2 * 1024 * 1024) {
                $hinh_anh = $file['name'];
                $ext = pathinfo($hinh_anh, PATHINFO_EXTENSION);
                if (!in_array($ext, $ext_img)) {
                    $errors['hinh_anh'] = "Bạn phải chọn file png hoặc jpg";
                }
            } else {
                $errors['hinh_anh'] = "Bạn phải chọn file <=2MB";
            }
        } else {
            $hinh_anh = 'tk.jpg';
        }
        if (!preg_match('/^(09|03|07|08|05)+([0-9]{8})$/', $ten_tai_khoan)) {
            $errors['ten_tai_khoan'] = 'Số điện thoại không hợp lệ';
        } else {
            if (tai_khoan_exist($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Tên tài khoản đã tồn tại';
            }
        }
        if ($ho_ten == null) {
            $errors['ho_ten'] = 'Dữ liệu không được để trống';
        }
        if ($ten_tai_khoan == null) {
            $errors['ten_tai_khoan'] = 'Dữ liệu không được để trống';
        }
        if ($email == null) {
            $errors['email'] = 'Dữ liệu không được để trống';
        }
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        if (!preg_match($regex, $email)) {
            $errors['email'] = 'sai định dạng email';
        }
        if ($mat_khau == null) {
            $errors['mat_khau'] = 'Dữ liệu không được để trống';
        }
        if ($re_mat_khau != $mat_khau) {
            $errors['re_mat_khau'] = 'Mật khẩu xác nhận không trùng khớp';
        }

        if (!array_filter($errors)) {
            $mat_khau = md5($mat_khau);
            tk_insert($ten_tai_khoan, $ho_ten, $hinh_anh, $mat_khau, $email, $trang_thai);
            if ($file['size'] != 0) {
                move_uploaded_file($file['tmp_name'], "../resources/img/taikhoan/" . $hinh_anh);
            }
            $MESSAGE = "Đăng ký tài khoản thành công";
            header('location: index.php?login&msg=' . $MESSAGE);
        }
    }
} else {
    $VIEW_NAME = "home.php";
}
include_once "layout.php";

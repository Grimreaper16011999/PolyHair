<?php
session_start();
require_once "../global.php";
require_once "../DAO/quantri.php";
if (isset($_POST['btn_DangNhap'])) {
    extract($_POST);
    $errors = [
        'tai_khoan' => '',
        'mat_khau' => ''
    ];
    if (!quan_tri_exist($tai_khoan)) {
        $errors['tai_khoan'] = "Tên tài khoản không tồn tại";
    } else {
        $item = quan_tri_select_by_tk($tai_khoan);
        $mat_khau = md5($mat_khau);
        if ($mat_khau != $item['password']) {
            $errors['mat_khau'] = "Mật khẩu bạn nhập không chinh xác";
        }
        if (!array_filter($errors)) {
            $_SESSION['admin'] = $item['username'];
            $_SESSION['id_admin'] = $item['ma_so'];
            header("location: trang_chinh");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('<?= $IMG_URL ?>/background.jpg');
            background-repeat: no-repeat;
            color: #fff;
            background-size: 100%;
        }
    </style>
</head>

<body>
    <div class="container main mt-5">
        <div class="row align-item-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 order-0 p-5 mt-5" style="border: 1px solid red;">
                <h4>Đăng nhập quản trị viên</h4>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="username" class="form-control" id="username" name="tai_khoan" value="<?= isset($tai_khoan) ? $tai_khoan : '' ?>">
                        <span style="color: red;"><?= isset($errors['tai_khoan']) ? $errors['tai_khoan'] : '' ?></span>
                        <div id="username" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="mat_khau">
                        <span style="color: red;"><?= isset($errors['mat_khau']) ? $errors['mat_khau'] : '' ?></span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="link_web mb-2">
                        <a href="<?= $FRONTEND_URL ?>">Vào lại website</a>
                    </div>
                    <?php if (isset($error)) : ?>
                        <div style="color: red">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary" name="btn_DangNhap">Đăng nhập</button>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
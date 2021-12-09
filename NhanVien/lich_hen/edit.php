<?php
$dh = lich_hen_select_by_id($_GET['id'])
?>
<h3 class="text-center">Thông tin chi tiết lịch đặt</h3>
<a href="index.php?list" class="btn btn-primary m-3">Danh sách lịch hẹn</a>
<div class="row container">
    <div class="col col-sm-8 border rounded p-3">
        <div class="row">
            <div class="col-sm-6  border-end">
                <div class="form-group">
                    <b>Tên khách hàng:</b> <?= tk_select_by_id($dh['ma_tai_khoan'])['ho_ten'] ?>
                </div>
                <div class="form-group">
                    <b>Số điện thoại:</b> <?= $dh['so_dien_thoai'] ?>
                </div>
                <div class="form-group">
                    <b>Dịch vụ:</b> <?= dv_select_by_id($dh['ma_dich_vu'])['ten_dich_vu'] ?>
                </div>
                <div class="form-group">
                    <b>Cơ sở:</b> <?= coso_select_by_id($dh['ma_co_so'])['dia_chi'] ?>
                </div>
                <div class="form-group">
                    <b>Stylist:</b> <?= nv_select_by_id($dh['ma_nhan_vien'])['ten_nhan_vien'] ?>
                </div>
                <div class="form-group">
                    <b>Ngày đặt:</b> <?= $dh['ngay_dat'] ?>
                </div>
                <div class="form-group">
                    <b>Ngày cắt:</b> <?= $dh['ngay_cat'] ?>
                </div>
                <div class="form-group">
                    <b>Giờ cắt:</b> <?= kg_select_by_id($dh['ma_khung_gio'])['thoi_gian'] ?>
                </div>
                <div class="form-group">
                    <b>Mã khuyến mãi:</b> <?= $dh['ma_khuyen_mai'] ?>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="">Ghi chú</label>
                <p>
                    <?= $dh['ghi_chu'] ?>
                </p>
            </div>
            <div class="col-sm-12 d-flex justify-content-between border-bottom">
                <h4>Tổng tiền</h4>
                <p class="text-right" style="color: red">
                    <?php
                    $tt = 0;
                    $tien_dich_vu = dv_select_by_id($dh['ma_dich_vu'])['gia'];
                    $tt += $tien_dich_vu;
                    if (km_exist($dh['ma_khuyen_mai'])) {
                        $tt += $tt * (1 - km_select_by_id($dh['ma_khuyen_mai'])['gia']) / 100;
                    }
                    echo $tt;
                    ?>
                    VNĐ</p>
            </div>
        </div>
    </div>
    <div class="col col-sm-4">
        <form action="" method="POST">
            <label for="name">Trạng thái đơn</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="0" <?= ($dh['trang_thai'] == 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="trang_thai1" style="color: #333;">
                    Chưa xác nhận
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="1" <?= ($dh['trang_thai'] == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: green;">
                    Đã xác nhận
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="4" <?= ($dh['trang_thai'] == 4) ? 'checked' : '' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: yellow;">
                    Đang cắt
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="2" <?= ($dh['trang_thai'] == 2) ? 'checked' : '' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: blue;">
                    Đã hoàn thành
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" value="3" <?= ($dh['trang_thai'] == 3) ? 'checked' : '' ?>>
                <label class="form-check-label" for="trang_thai2" style="color: red;">
                    Khách không tới
                </label>
            </div>
            <button type="submit" class="btn btn-success" name="btn_edit">Update</button>
        </form>
    </div>
</div>
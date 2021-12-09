<?php

$cs = coso_select_All();
$kg = kg_select_All();
$dv = dv_select_All();
$date_now = date('Y-m-d', time());
$week = strtotime(date("Y-m-d", strtotime($date_now)) . " +1 week");
$week = strftime("%Y-%m-%d", $week);
?>
<link rel="stylesheet" href="../resources/css/frontend/dat_lich.css">
<div class="test">
    <div class="container pt-5 pb-5">
        <h2 class="text-center">Đặt lịch cắt tóc</h2>
        <div class="row">
            <div class="col-12 col-sm-3"></div>
            <form action="" method="post" class="col-12 col-sm-6" class="border border-1">
                <div class="form-group mt-4">
                    <label for="">Mã tài khoản</label><br>
                    <input type="text" class="form-control" name="ma_tai_khoan" value="<?= $_SESSION['id_user'] ?>" readonly>
                </div>
                <div class="form-group mt-4">
                    <label for="">Số điện thoại</label><br>
                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="0xxxxxxxxxx" value="<?= tk_select_by_id($_SESSION['id_user'])['ten_tai_khoan'] ?>">
                    <span class="" style="color: red;"><?= isset($errors['so_dien_thoai']) ? $errors['so_dien_thoai'] : '' ?></span>
                </div>
                <div class="form-group mt-4">
                    <label for="">Chọn nơi cắt *</label>
                    <div class="row">
                        <?php foreach ($cs as $key => $value) : ?>
                            <div class="col-sm-6">
                                <input type="radio" class="" name="ma_co_so" value="<?= $value['ma_co_so'] ?>" onclick="handleClick(this);"> <?= $value['dia_chi'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <span class="" style="color: red;"><?= isset($errors['ma_co_so']) ? $errors['ma_co_so'] : '' ?></span>
                </div>
                <div class="form-group mt-4">
                    <label for="">Chọn stylist *</label><br>
                    <select class="form-select" aria-label="Default select example" name="ma_nhan_vien" id="select_nv">
                        <option value="">Mời bạn chọn cơ sở</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="">Ngày cắt *</label><br>
                    <input type="date" class="form-control" name="ngay_cat" min="<?= $date_now ?>" max="<?= $week ?>">
                    <span class="" style="color: red;"><?= isset($errors['ngay_cat']) ? $errors['ngay_cat'] : '' ?></span>

                </div>
                <div class="form-group mt-4">
                    <label for="">Giờ cắt *</label><br>
                    <div class="row">
                        <?php foreach ($kg as $key => $value) : ?>
                            <div class="col-sm-4 col-6">
                                <input type="radio" class="" name="ma_khung_gio" value="<?= $value['ma_khung_gio'] ?>"> <?= $value['thoi_gian'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <span class="" style="color: red;"><?= isset($errors['ma_khung_gio']) ? $errors['ma_khung_gio'] : '' ?></span>

                </div>
                <div class="form-group mt-4">
                    <label for="">Chọn loại dịch vụ</label>
                    <select class="form-select" aria-label="Default select example" name="ma_dich_vu">
                        <?php foreach ($dv as $key => $value) : ?>
                            <option value="<?= $value['ma_dich_vu'] ?>"><?= $value['ten_dich_vu'] ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group nt-4">
                    <label for="">Ghi chú</label>
                    <textarea name="ghi_chu" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group nt-4">
                    <label for="">Mã khuyến mãi</label>
                    <input type="text" name="ma_khuyen_mai" class="form-control" value="0" placeholder="nhập mã khuyến mãi ">
                </div>
                <button class="btn btn-danger mt-4 form-control" name="btn_dat_lich">Đặt lịch</button>
            </form>
            <div class="col-12 col-sm-3"></div>
        </div>
        <div class="container pt-4 pb-4">
            <span>Các cơ sở của PolyHair</span>
            <div class="row">
                <div class="col-sm-3">
                    <?php foreach ($cs as $key => $value) : ?>
                        <div class="mt-4">
                            Cơ sở <?=++$key?>
                            <div class="address mt-2">
                                Địa chỉ: <?= $value['dia_chi'] ?>
                            </div>
                            <div class="phone  mt-2">
                                Số điện thoại: <?= $value['so_dien_thoai'] ?>
                            </div>

                            <a target="_blank" class="  mt-2 btn btn-success" href="<?=$value['url']?>">Chỉ dẫn</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-9" style="min-height: 500px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59587.945831156634!2d105.80194400045046!3d21.022816135640994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1636112802850!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= $JS_URL ?>/dat_lich.js"></script>
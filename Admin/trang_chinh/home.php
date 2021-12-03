<div class="row container" style="color: #fff;">
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/co_so" class="col-12 btn btn-primary " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-laptop-house" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>cơ sở</h4>
                </div>
                <div class="col-12">
                    <h1><?= coso_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/nhan_vien" class="col-12 btn btn-secondary " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-users" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>nhân viên</h4>
                </div>
                <div class="col-12">
                    <h1><?= nv_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/dich_vu" class="col-12 btn btn-success " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fab fa-servicestack" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>dịch vụ</h4>
                </div>
                <div class="col-12">
                    <h1><?= dv_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/lich_hen" class="col-12 btn btn-danger " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-paper-plane" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>lịch hẹn</h4>
                </div>
                <div class="col-12">
                    <h1><?= lh_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/tai_khoan" class="col-12 btn btn-warning " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-user" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>tài khoản</h4>
                </div>
                <div class="col-12">
                    <h1><?= tk_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/san_pham" class="col-12 btn btn-info " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fab fa-product-hunt" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Sản phẩm</h4>
                </div>
                <div class="col-12">
                    <h1><?= sp_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/kieu_toc" class="col-12 btn btn-dark " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-cut" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Kiểu tóc</h4>
                </div>
                <div class="col-12">
                    <h1><?= kt_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/bai_viet" class="col-12 btn btn-primary " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-book" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Bài viết</h4>
                </div>
                <div class="col-12">
                    <h1><?= bv_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/khuyen_mai" class="col-12 btn btn-success " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-bahai" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Khuyến mãi</h4>
                </div>
                <div class="col-12">
                    <h1><?= km_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/binh_luan" class="col-12 btn btn-danger " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-comments" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Bình luận</h4>
                </div>
                <div class="col-12">
                    <h1><?= bl_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/khung_gio" class="col-12 btn btn-secondary " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-clock" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Khung giờ</h4>
                </div>
                <div class="col-12">
                    <h1><?= kg_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>
    <div class="col col-sm-3 mt-4">
        <a href="<?= $ADMIN_URL ?>/slider" class="col-12 btn btn-warning " style="height: 160px;">
            <div class="row">
                <div class="col-3 pb-4"><i class="fas fa-sliders-h" style="font-size: 50px;"></i></div>
                <div class="col-9">
                    <h4>Slider</h4>
                </div>
                <div class="col-12">
                    <h1><?= slider_count()['total'] ?></h1>
                </div>
            </div>
        </a>
    </div>

</div>
<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

try {
    $limit = 8;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if ($page <= 0) {
        $page = 1;
    }
    $firstIndex = ($page - 1) * $limit;

    $list_nv = lich_hen_select_All_limit($firstIndex, $limit);
    // Phân trang lấy số trang 
    $sql = "SELECT count(ma_don) as total FROM dat_lich";
    $countResult = pdo_query_one($sql);
    $count = $countResult['total'];
    $number = ceil($count / $limit);
} catch (PDOException $e) {
    die($e->getMessage());
}

//lịch hẹn hôm nay
$date_now = date('Y-m-d', time());


?>
<h3 class="text-center text-uppercase m-2">Quản lý lịch hẹn</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lịch hẹn hôm nay</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lịch hẹn tuần tới</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tất cả lịch hẹn</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <form action="" method="post">
            <table class="table table-hover table-bordered table-light">
                <thead style="color: red;">
                    <tr>
                        <th>
                            <input type="checkbox" id="selectall">
                        </th>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Cơ sở</th>
                        <th>Nhân viên</th>
                        <th>Dịch vụ</th>
                        <th>Ngày đặt</th>
                        <th>Ngày cắt</th>
                        <th>Giờ cắt</th>
                        <th>Trạng thái</th>
                        <th colspan="2" class="text-center">Tác vụ</th>
                    </tr>

                </thead>
                <?php
                foreach ($list_nv as $key => $row) : ?>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" name="ma_don[]" id="" value="<?= $row['ma_don'] ?>" class="checkbox1">
                            </td>
                            <td><?= ++$key ?></td>
                            <td><?= tk_select_by_id($row['ma_tai_khoan'])['ho_ten'] ?></td>
                            <td><?= $row['so_dien_thoai'] ?></td>
                            <td><?= coso_select_by_id($row['ma_co_so'])['ten_co_so'] ?></td>
                            <td><?= nv_select_by_id($row['ma_nhan_vien'])['ten_nhan_vien'] ?></td>
                            <td><?= dv_select_by_id($row['ma_dich_vu'])['ten_dich_vu'] ?></td>
                            <td><?= $row['ngay_dat'] ?></td>
                            <td><?= $row['ngay_cat'] ?></td>
                            <td><?= kg_select_by_id($row['ma_khung_gio'])['thoi_gian'] ?></td>
                            <td>
                                <?php
                                if ($row['trang_thai'] == 2) {
                                    echo '<span style="color: red">thất bại</span>';
                                } elseif ($row['trang_thai'] == 1) {
                                    echo '<span style="color: green">thành công</span>';
                                } else {
                                    echo '<span style="color: #333">Chưa xác nhận</span>';
                                }

                                ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?edit&id=<?= $row['ma_don'] ?>" class="btn btn-warning"><i class="far fa-edit" style="color: #fff;"></i></a>
                                <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger" href="index.php?delete&ma_don=<?= $row['ma_don'] ?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button>
        </form>
        <?php
        if ($number > 1) {
        ?>
            <ul class="pagination justify-content-end">
                <?php
                if ($page > 1) {
                    echo ' <li class="page-item"><a href="?page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
                }
                ?>

                <?php
                $avariablePage = [1, $page - 1, $page, $page + 1, $number];
                $isFirst = $isLast = false;
                for ($i = 0; $i < $number; $i++) {
                    if (!in_array($i + 1, $avariablePage)) {
                        if (!$isFirst && $page > 3) {
                            echo '<li class="page-item"><a href="?page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                            $isFirst = true;
                        }
                        if (!$isLast && $i > $page) {
                            echo '<li class="page-item"><a href="?page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                            $isLast = true;
                        }
                        continue;
                    }
                    if ($page == ($i + 1)) {
                        echo '<li class="page-item active"><a href="?page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    } else {
                        echo '<li class="page-item"><a href="?page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                    }
                }
                ?>
                <?php
                if ($page < $number) {
                    echo ' <li class="page-item"><a href="?page=' . ($page + 1) . '" class="page-link">Next</a></li>';
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#selectall").change(function() {
            $(".checkbox1").prop('checked', $(this).prop("checked"));
        });

    });
    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
<h3 class="text-center text-uppercase">Lịch sử cắt tóc của bạn</h3>
<div class="container mt-4 mb-4">
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

        $list_nv = lich_hen_select_by_tk($_SESSION['id_user'],$firstIndex, $limit);
        $ma_tk = $_SESSION['id_user'];
        // Phân trang lấy số trang 
        $sql = "SELECT count(ma_don) as total FROM dat_lich WHERE ma_tai_khoan=$ma_tk";
        $countResult = pdo_query_one($sql);
        $count = $countResult['total'];
        $number = ceil($count / $limit);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    ?>
   
        <table class="table table-hover table-bordered table-light">
            <thead style="color: red;">
                <tr>
                    
                    <th>STT</th>
                    <th>Cơ sở</th>
                    <th>Nhân viên</th>
                    <th>Dịch vụ</th>
                    <th>Ngày đặt</th>
                    <th>Ngày cắt</th>
                    <th>Giờ cắt</th>
                    <th>Trạng thái</th>
                    
                </tr>

            </thead>
            <?php
            foreach ($list_nv as $key => $row) : ?>
                <tbody>
                    <tr>
                        
                        <td><?= ++$key ?></td>
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
                       
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
        <!-- <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button> -->
    <?php
    if ($number > 1) {
    ?>
        <ul class="pagination justify-content-end">
            <?php
            if ($page > 1) {
                echo ' <li class="page-item"><a href="?lichsudon&page=' . ($page - 1) . '" class="page-link">Previous</a></li>';
            }
            ?>

            <?php
            $avariablePage = [1, $page - 1, $page, $page + 1, $number];
            $isFirst = $isLast = false;
            for ($i = 0; $i < $number; $i++) {
                if (!in_array($i + 1, $avariablePage)) {
                    if (!$isFirst && $page > 3) {
                        echo '<li class="page-item"><a href="?lichsudon&page=' . ($page - 2) . '" class="page-link">...</a></li> ';
                        $isFirst = true;
                    }
                    if (!$isLast && $i > $page) {
                        echo '<li class="page-item"><a href="?lichsudon&page=' . ($page + 2) . '" class="page-link">...</a></li> ';
                        $isLast = true;
                    }
                    continue;
                }
                if ($page == ($i + 1)) {
                    echo '<li class="page-item active"><a href="?lichsudon&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                } else {
                    echo '<li class="page-item"><a href="?lichsudon&page=' . ($i + 1) . '" class="page-link">' . ($i + 1) . '</a></li> ';
                }
            }
            ?>
            <?php
            if ($page < $number) {
                echo ' <li class="page-item"><a href="?lichsudon&page=' . ($page + 1) . '" class="page-link">Next</a></li>';
            }
            ?>
        </ul>
    <?php
    }
    ?>
   
</div>
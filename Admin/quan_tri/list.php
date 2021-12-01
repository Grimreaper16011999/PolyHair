<?php
if (isset($_GET['msg'])) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$list_nv = qt_select_All();

?>
<h3 class="text-center text-uppercase m-2">Quản trị admin</h3>
<!-- <a href="index.php?add" class="btn btn-success mb-4">Thêm mới admin</a> -->

<form action="" method="post">
    <table class="table table-hover table-bordered table-light">
        <thead style="color: red;">
            <tr>
               
                <th>STT</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Vai trò</th>
                <!-- <th colspan="2" class="text-center">Tác vụ</th> -->
            </tr>

        </thead>
        <?php
        foreach ($list_nv as $key => $row) : ?>
            <tbody>
                <tr>
                    
                    <td><?= ++$key ?></td>
                    <td><?= $row['username'] ?></td>

                    <td><?= $row['password'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= ($row['vaitro'] == 1) ? 'Quản trị viên tối cao' : '' ?></td>
                   
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <!-- <button onclick="return confirm('Bạn có chắc muốn xoá không?')" type="submit" class="btn btn-danger" name="delete">Xoá mục đã chọn</button> -->
</form>

<script>
    $(document).ready(function() {

        $("#selectall").change(function() {
            $(".checkbox1").prop('checked', $(this).prop("checked"));
        });

    });
</script>
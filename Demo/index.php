<?php
// Lấy thời gian hiện tại
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo date_default_timezone_get();
$date_now = date('Y-m-d', time());
echo $date_now . "<br>";
$hour_now = date('H', time());
$minutes_now = date('i',time());

echo $minutes_now . "<br>";
echo $hour_now . "<br>";
// 1 tháng sau
$month = strtotime(date("Y-m-d", strtotime($date_now)) . " +1 month");
$month = strftime("%Y-%m-%d", $month);
echo $month . "<br>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <label for="">Ngày cắt</label>
    <input type="date" name="date" id="" min="<?= $date_now ?>" max="<?= $month ?>">

    <label for="">Giờ cắt</label>
    <input type="radio" name="khung_gio" id="" <?php if($hour_now>9){echo 'disabled';}?>> 8h30: 9h00
    <input type="radio" name="khung_gio" id="" <?php if($hour_now>9){echo 'disabled';}?>> 9h00: 9h30
    <input type="radio" name="khung_gio" id=""> 9h30: 10h00
    <input type="radio" name="khung_gio" id=""> 10h00: 10h30
    <input type="radio" name="khung_gio" id=""> 10h30: 11h00
</body>

</html>
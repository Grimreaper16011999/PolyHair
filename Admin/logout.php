<?php
session_start();
// die();
unset($_SESSION['nhanvien']);
unset($_SESSION['id_nhanvien']);
header("Location: login.php");

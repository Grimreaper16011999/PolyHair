<?php
session_start();
// die();
unset($_SESSION['admin']);
unset($_SESSION['ma_so']);
header("Location: login.php");

<?php
session_start();
// die();
session_destroy();
header("Location: login.php");

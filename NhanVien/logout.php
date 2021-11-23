<?php
session_start();
// die();
session_destroy();
header("location: $ADMIN_URL");

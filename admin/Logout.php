<?php
session_start();

include "../database.php";

session_unset();
session_destroy();
header("location:http://localhost/Collage/Admin_login.php");
exit();
?>
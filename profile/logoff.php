<?php 
session_start();
$name = $_SESSION["name"];
session_destroy();
header("Location: /complete_login_system1/frontend/main_home_page.php?name=$name");
?>
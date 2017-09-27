<?php 
session_start();
$name = $_SESSION["name"];
session_destroy();
header("Location: goodbye.php?name=$name");
?>
<?php 
    $link = mysqli_connect("localhost","root", "ghksdl");
    mysqli_select_db($link, "lms");
?>

<?php 
ini_set('display_errors', 1);
error_reporting(~0);
?>
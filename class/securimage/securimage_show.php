<?php
include "securimage.php";
$img = new Securimage();
$img->imgid = $_GET["imgid"];
$img->show("bg.jpg"); // alternate use:  $img->show('/path/to/background.jpg');
?>

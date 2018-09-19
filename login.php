<?php
session_start();
echo "<pre>";
echo "SESSION:";
var_dump($_SESSION["login"]);
echo "POST:";
var_dump($_POST);

 ?>

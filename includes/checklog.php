<?php
session_start();
if(!$_SESSION["logged"] or !isset($_SESSION["logged"])){
  header("Location: login.php");
  die();
}

?>

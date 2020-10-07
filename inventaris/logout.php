<?php
require 'config/function.php';
$konek = new Login();
session_start();
if ($konek->setLogout()) {
  session_start();
  $_SESSION['logout'] = "Logout Berhasil";
}
?>

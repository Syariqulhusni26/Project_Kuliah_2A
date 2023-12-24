<?php
session_start();
session_destroy(); // untuk menghapus semua session
header('location:login');

?>
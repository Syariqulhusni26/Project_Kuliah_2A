<?php
session_start();
include "connect.php";

$id =  (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$passwordlama =  (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$passwordbaru =  (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$repasswordbaru =  (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username


if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$_SESSION[username_posac]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);

    if($hasil){
        if($passwordbaru == $repasswordbaru){
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[username_posac]'");
            if($query) {
                $message = '<script>alert("Password berhasil diubah");
                window.history.back()</script>
                <script>';
            }else{
                $message = '<script>alert("Password gagal diubah");
                window.history.back()</script>
                <script>';
                }
        }else{
                $message = '<script>alert("Password baru tidak sama");
                window.history.back()</script>
                <script>';
        }
    }else{  
                $message = '<script>alert("Password lama tidak sesuai");
                window.history.back()</script>
                <script>';
        }
    }else{
        header('location:../home');
    }
    echo $message;
?>
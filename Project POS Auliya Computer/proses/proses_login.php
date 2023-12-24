<?php
session_start();
include "connect.php";
$username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$password =  (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username

if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);

    if($hasil){
        $_SESSION['username_posac'] = $username;
        $_SESSION['level_posac'] = $hasil['level'];
        $_SESSION['id_posac'] = $hasil['id'];
        header('location:../home');
    }else{ ?>
<script>
alert("Username atau password yang anda masukkan salah");
window.location = '../login'
</script>

<?php
    }
}


?>
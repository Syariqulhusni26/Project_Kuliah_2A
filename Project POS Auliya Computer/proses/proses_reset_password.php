<?php
include "connect.php";
$id =  (isset($_POST['id'])) ? (htmlentities($_POST['id'])) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username


if(!empty($_POST['reset_password_validate'])){
$query = mysqli_query($conn, "UPDATE tb_user SET password='md5(password)' WHERE id ='$id'");
if($query) {
    $message = '<script>alert("Password Berhasil Direset");
                window.location="../user"</script>';
}else{
    $message = '<script>alert("Password Gagal Direset")</script>';
}
    }echo $message;
?>  
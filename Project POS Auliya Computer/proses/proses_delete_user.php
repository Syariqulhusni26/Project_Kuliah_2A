<?php
include "connect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username


if(!empty($_POST['delete_user_validate'])){
$query = mysqli_query($conn, "DELETE FROM tb_user WHERE id ='$id'");

if($query) {
    $message = '<script>alert("Data berhasil dihapus");
    window.location="../datauser"</script>
    <script>';

}else {
    $message = '<script>alert("Data gagal dihapus")</script>';
    }
}echo $message;
?>
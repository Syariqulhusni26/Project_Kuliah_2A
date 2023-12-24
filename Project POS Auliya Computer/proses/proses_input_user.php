<?php
include "connect.php";
$nama =  (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$username =  (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$alamat =  (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$nohp =  (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$level =  (isset($_POST['level'])) ? htmlentities($_POST['level']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$password =  md5('password');

if(!empty($_POST['input_user_validate'])){
$query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,alamat,nohp,level,password) values ('$nama','$username','$alamat','$nohp','$level','$password')");
if($query) {
    $message = '<script>alert("Data berhasil dimasukkan")
    window.location="../datauser"</script>';
    
}else {
    $message = '<script>alert("Data gagal dimasukkan")
    window.location="../datauser"</script>';
}

}echo $message;
?>
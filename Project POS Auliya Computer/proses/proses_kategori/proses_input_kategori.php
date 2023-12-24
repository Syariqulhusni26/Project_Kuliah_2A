<?php
include "../connect.php";
$id_kategori =  (isset($_POST['id_kategori'])) ? htmlentities($_POST['id_kategori']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$nama_kategori =  (isset($_POST['nama_kategori'])) ? htmlentities($_POST['nama_kategori']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username

if(!empty($_POST['input_kategori_validate'])){
    $query = mysqli_query($conn, "INSERT INTO tb_kategori (id_kategori,nama_kategori) values ('$id_kategori','$nama_kategori')");

    if($query) {
        $message = '<script>alert("Data berhasil dimasukkan")
        window.location="../../kategori"</script>'; // (../) artinya keluar dari satu folder
    }else {
        $message = '<script>alert("Data gagal dimasukkan")
        window.location="../../kategori"</script>';
    }
}echo $message;
?>
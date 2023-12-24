<?php
include "../connect.php";
$id_satuan =  (isset($_POST['id_satuan'])) ? htmlentities($_POST['id_satuan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$nama_satuan =  (isset($_POST['nama_satuan'])) ? htmlentities($_POST['nama_satuan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username

if(!empty($_POST['edit_satuan_validate'])){
$query = mysqli_query($conn, "UPDATE tb_satuan SET id_satuan='$id_satuan', nama_satuan='$nama_satuan' WHERE id_satuan='$id_satuan'");

if($query) {
    $message = '<script>alert("Data berhasil diupdate")
    window.location="../../satuan"</script>'; // (../) artinya keluar dari satu folder
    

}else{
    $message = '<script>alert("Data gagal diupdate")
    window.location="../../satuan"</script>'; // (../) artinya keluar dari satu folder
    }
}echo $message;
?>
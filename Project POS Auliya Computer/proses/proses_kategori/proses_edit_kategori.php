
<?php
include "../connect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$id_kategori =  (isset($_POST['id_kategori'])) ? htmlentities($_POST['id_kategori']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$nama_kategori =  (isset($_POST['nama_kategori'])) ? htmlentities($_POST['nama_kategori']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username

if(!empty($_POST['edit_kategori_validate'])){
$query = mysqli_query($conn, "UPDATE tb_kategori SET id_kategori='$id_kategori', nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");

if($query) {
    $message = '<script>alert("Data berhasil diupdate")
    window.location="../../kategori"</script>'; // (../) artinya keluar dari satu folder
    

}else{
    $message = '<script>alert("Data gagal diupdate")
    window.location="../../kategori"</script>'; // (../) artinya keluar dari satu folder
    }
}echo $message;
?>
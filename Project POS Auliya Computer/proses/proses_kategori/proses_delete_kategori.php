<?php
include "../connect.php";
$id_kategori =  (isset($_POST['id_kategori'])) ? htmlentities($_POST['id_kategori']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username


if(!empty($_POST['delete_kategori_validate'])){
$query = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori ='$id_kategori'");

if($query) {
    $message = '<script>alert("Data berhasil dihapus");
    window.location="../../kategori"</script>
    <script>';

}else {
    $message = '<script>alert("Data gagal dihapus")
    window.location="../../kategori"</script>';
    }
}echo $message;
?>
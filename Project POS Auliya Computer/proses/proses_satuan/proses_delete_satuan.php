<?php
include "../connect.php";
$id_satuan =  (isset($_POST['id_satuan'])) ? htmlentities($_POST['id_satuan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username


if(!empty($_POST['delete_satuan_validate'])){
$query = mysqli_query($conn, "DELETE FROM tb_satuan WHERE id_satuan ='$id_satuan'");

if($query) {
    $message = '<script>alert("Data berhasil dihapus");
    window.location="../../satuan"</script>
    <script>';

}else {
    $message = '<script>alert("Data gagal dihapus")
    window.location="../../satuan"</script>';
    }
}echo $message;
?>
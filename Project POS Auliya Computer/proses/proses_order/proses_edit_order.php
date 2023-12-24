<?php
session_start();
include "../connect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$tanggal =  (isset($_POST['tanggal'])) ? htmlentities($_POST['tanggal']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username




if(!empty($_POST['edit_order_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order'");

$query = mysqli_query($conn, "UPDATE tb_order SET pelanggan='$pelanggan', tgl_transaksi='$tanggal' WHERE id_order = '$kode_order'");

if($query) {
    $message = '<script>alert("Data order berhasil di edit")
    window.location="../../order"</script>';
    
}else {
    $message = '<script>alert("Data order gagal di edit")
    window.location="../../order"</script>';
}
    }
echo $message;
?>
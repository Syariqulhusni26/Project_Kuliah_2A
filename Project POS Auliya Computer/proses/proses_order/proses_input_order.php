<?php
session_start();
include "../connect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$pelanggan =  (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
// $catatan =  (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username
$tanggal =  (isset($_POST['tanggal'])) ? htmlentities($_POST['tanggal']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username




if(!empty($_POST['input_order_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order'");
    if(mysqli_num_rows($select) > 0) {

        $message = '<script>alert("Data order yang dimasukkan telah ada");
        window.location="../../order"</script>';
    }else{
$query = mysqli_query($conn, "INSERT INTO tb_order (id_order,pelanggan,id_karyawan,tgl_transaksi) values ('$kode_order','$pelanggan','$_SESSION[id_posac]','$tanggal')");

if($query) {
    $message = '<script>alert("Data berhasil dimasukkan")
    window.location="../../?x=orderitem&order='.$kode_order.'&pelanggan='.$pelanggan.'&tanggal='.$tanggal.'"</script>';
    
}else {
    $message = '<script>alert("Data gagal dimasukkan")
    window.location="../../order"</script>';
}
    }

}echo $message;
?>
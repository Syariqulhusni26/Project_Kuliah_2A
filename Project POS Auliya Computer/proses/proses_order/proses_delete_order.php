<?php
include "../connect.php";
$kode_order =  (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "" ;// Htmlentities digunakan untuk mencegah script yang dimasukkan user ke halaman password dan username

if(!empty($_POST['delete_order_validate'])){
$select = mysqli_query($conn, "SELECT kode_order FROM tb_list_order WHERE kode_order ='$kode_order'");

if(mysqli_num_rows($select) > 0) {
    $message = '<script>alert("Data Order telah memiliki item order, data order tidak dapat dihapus.");
    window.location="../../order"</script>
    <script>';
}else{
    $query = mysqli_query($conn, "DELETE FROM tb_order WHERE order ='$kode_order'");
    if($query) {
        $message = '<script>alert("Data order berhasil dihapus");
        window.location="../../order"</script>
        <script>';
    
    }else {
        $message = '<script>alert("Data order gagal dihapus")
        window.location="../../order"</script>
        </script>';
        }
    }
}echo $message;
?>
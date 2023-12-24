<?php 
    include "../connect.php";
    $id_produk = (isset($_POST['id_produk'])) ? htmlentities($_POST['id_produk']) : "" ;
    $foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "" ;

    if(!empty($_POST['input_user_validate'])){
        $query = mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk = '$id_produk'");
        if($query) {
            unlink("../../img/$foto");
            $message = '<script>alert("data berhasil dihapus");
                        window.location="../../produk"</script>';
            
        } else {
            $message = '<script>alert("data gagal dihapus")
                        window.location="../../produk"</script>';
        }
    }echo $message;
?>
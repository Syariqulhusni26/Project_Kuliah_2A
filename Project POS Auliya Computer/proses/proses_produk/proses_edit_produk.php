<?php
include "../connect.php";
$id_produk = (isset($_POST['id_produk'])) ?(htmlentities($_POST['id_produk'])) : "" ;
$kode_produk = (isset($_POST['kode_produk'])) ?(htmlentities($_POST['kode_produk'])) : "" ;
$nama_produk = (isset($_POST['nama_produk'])) ?(htmlentities($_POST['nama_produk'])) : "" ;
$id_kategori = (isset($_POST['id_kategori'])) ? htmlentities($_POST['id_kategori']) : "" ;
$harga = (isset($_POST['harga'])) ?(htmlentities($_POST['harga'])) : "" ;
$stok = (isset($_POST['stok'])) ?(htmlentities($_POST['stok'])) : "" ;
$id_satuan = (isset($_POST['id_satuan'])) ?(htmlentities($_POST['id_satuan'])) : "" ;



$kode_rand = rand(100000, 99999). "-";
$target_dir = "../../img/".$kode_rand; 
$target_file = $target_dir.basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(!empty($_POST['input_produk_validate'])){
//Cek apakah gambar atau bukan
$cek = getimagesize($_FILES['foto']['tmp_name']);
if($cek === false){
    $message = "Ini bukan file gambar";
    $statusUpload = 0;
}else{
    $statusUpload = 1;
    if(file_exists($target_file)) {
        $message = "Maaf, File yang Dimasukkan Telah Ada";
        $statusUpload = 0;
    }else{
        if($_FILES['foto']['size'] >  500000) {
            $message = "File Foto yang Diupload Terlalu Besar";
            $statusUpload = 0;
        }else {
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
                $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, GIF";
                $statusUpload = 0;
            }   
        }
    }
}

if( $statusUpload == 0) {
    $message =' <script>alert("'.$message.' Gambar Tidak Dapat Diupload");
                window.location="../../produk"</script>';
}else {
    $select = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk = '$nama_produk'");
    if(mysqli_num_rows($select) > 0){
        $message = '<scrip>alert("Nama Menu yang yang dimasukkan telah ada");
        window.location="../../produk"</script>';
    } else {
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $query = mysqli_query($conn, "UPDATE tb_produk SET foto='".$kode_rand.$_FILES['foto']['name']."', kode_produk='$kode_produk', nama_produk='$nama_produk', id_kategori='$id_kategori', harga='$harga', stok='$stok', id_satuan='$id_satuan' WHERE id_produk='$id_produk'");
            if($query) {
                $message = '<script>alert("Data berhasil dimasukkan");
                            window.location="../../produk"</script>';
            }else{
                $message = '<script>alert("Data gagal dimasukkan");
                            window.location="../../produk"</script>';
            }
        }else{
            $message = '<script>alert("Maaf, Terjadi kesalahan File Tidak Bisa Diupload");
                            window.location="../../produk"</script>';
        }
    }
}
} 
echo $message;
?>
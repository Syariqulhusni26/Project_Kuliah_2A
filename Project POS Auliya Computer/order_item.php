<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS total FROM tb_list_order
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
    LEFT JOIN tb_produk ON tb_produk.id_produk = tb_list_order.produk
    LEFT JOIN tb_user ON tb_user.id = tb_order.id_karyawan
    GROUP BY id_list_order
    HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$pelanggan = $_GET['pelanggan'];
$tanggal = $_GET['tanggal'];


while ($record = mysqli_fetch_array($query)) {  
    $result[] = $record;
    // $kode = $record['kode_order'];
    // $pelanggan = $record['pelanggan'];

    
}

$select_produk = mysqli_query($conn, "SELECT id_produk,nama_produk FROM tb_produk");

// $select_id_satuan = mysqli_query($conn, "SELECT id_satuan,nama_satuan FROM tb_satuan");
?>

<div class="col-lg-10">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Order Item</a>
            <a href="order"><button class="btn btn-outline-light" type="search"><i class="bi bi-arrow-bar-left"></i> Kembali</button></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-3">
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#TambahOrder"><i
                            class="bi bi-arrow-return-right"></i> Tambah Data Produk</a>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="kodeorder" value="<?php 
                            if(empty($kode)) {
                                echo "Tidak Ada Data";
                            }else{
                                echo $kode;
                            }
                            ?>
                            ">
                                    <label for="floatingInput">Kode Order</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="pelanggan" value="<?php 
                            if(empty($pelanggan)) {
                                echo "Tidak Ada Data";
                            }else{
                                echo $pelanggan;
                            }
                            ?>
                            ">
                                    <label for="floatingInput">Pelanggan</label>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="tgltransaksi" value="<?php 
                            if(empty($tanggal)) {
                                echo "Tidak Ada Data";
                            }else{
                                echo $tanggal;
                            }
                            ?>
                            ">
                                    <label for="floatingInput">Tanggal Transaksi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--(data-bs-target)Button Pemicu Modal-->
                    <div class="card-body">

                        <!-- Modal Tambah Produk -->
                        <div class="modal fade" id="TambahOrder" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate
                                            action="proses/proses_orderitem/proses_input_orderitem.php" method="POST">
                                            <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                            <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                            <input type="hidden" name="tgl_transaksi" value="<?php echo $tanggal ?>">

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" name="produk" id="">
                                                        <option selected hidden value="">Pilih Menu Produk</option>
                                                        <?php
                                                        foreach($select_produk as $value){
                                                            echo "<option value='$value[id_produk]'>$value[nama_produk]</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                        <label for="produk">Masukkan Produk</label>
                                                        <div class="invalid-feedback">
                                                            Pilih Data Produk
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput"
                                                            placeholder="Masukkan Jumlah Barang" name="jumlah"
                                                            required>
                                                        <label for="floatingInput">Jumlah Barang</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Jumlah Barang.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-warning"
                                                    name="input_orderitem_validate" value="12345">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Tambah Produk -->

                        <?php 
                if(empty($result)){
                    echo '<div class="text-center mb-4">
                    <img class="photo-right mt-3 " src="img/Data Kosong.jpg"
                            style="width : 350px; display:block; margin:auto; display:absolute;">
                            Data Tidak Ditemukan atau Kosong
                    </div>';
                }else{
                foreach($result as $row) {
                ?>
                        <!-- Modal View -->
                        <div class="modal fade" id="ModalView<?php echo $row['id_order'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate action="proses/proses_input_user.php"
                                            method="POST">

                                            <div class="text-center mb-4"
                                                style="width : 350px; display:block; margin:auto; display:absolute;">
                                                <img src="img/<?php echo $row['foto']?>" class="img-thumbnail"
                                                    alt="...">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="text" class="form-control"
                                                            id="floatingInput" placeholder="Masukkan Nama Produk"
                                                            name="nama" value="<?php echo $row['nama_produk']?>">
                                                        <label for="floatingInput">Nama</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled class="form-select"
                                                            aria-label="Default select example">
                                                            <option selected hidden value="">Pilih kategori Produk
                                                            </option>
                                                            <?php
                                                    foreach($select_id_kategori as $value){
                                                        if($row['nama_kategori']==$value['nama_kategori']){
                                                            echo "<option selected value=" .$value['id_kategori'] . "> $value[nama_kategori]</option>";
                                                        }else{
                                                            echo "<option value=" .$value['id_kategori'] . "> $value[nama_kategori]</option>";
                                                        }   
                                                    }
                                                    ?>
                                                        </select>
                                                        <label for="floatingInput">Kategori Produk</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="number" class="form-control"
                                                            id="floatingInput" value="<?php echo $row['stok']?>">
                                                        <label for="floatingInput">Stok</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Stok
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select disabled class="form-select"
                                                            aria-label="Default select example">
                                                            <option selected hidden value="">Pilih Satuan Produk
                                                            </option>
                                                            <?php
                                                    foreach($select_id_satuan as $value){
                                                        if($row['nama_satuan']==$value['nama_satuan']){
                                                            echo "<option selected value=" .$value['id_satuan'] . "> $value[nama_satuan]</option>";
                                                        }else{
                                                            echo "<option value=" .$value['id_satuan'] . "> $value[nama_satuan]</option>";
                                                        }   
                                                    }
                                                    ?>
                                                        </select>
                                                        <label for="floatingInput">Satuan Produk</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input disabled type="number" class="form-control"
                                                            id="floatingInput" value="<?php echo $row['harga']?>">
                                                        <label for="floatingInput">Harga</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Harga Produk
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal View -->

                        <!-- Modal Edit -->
                        <div class="modal fade" id="ModalEdit<?php echo $row['id_produk'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate
                                            action="proses/proses_produk/proses_edit_produk.php" method="POST"
                                            enctype="multipart/form-data">
                                            <input type="hidden" value="<?php echo $row['id_produk']?>"
                                                name="id_produk">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control py-3" id="uploadFoto"
                                                            placeholder="Your Name" name="foto" required>
                                                        <label class="input-group-text" for="uploadFoto">Upload Foto
                                                            Menu</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan File Foto Menu
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Masukkan Id Produk" name="kode_produk" required
                                                            value="<?php echo $row['kode_produk']?>">
                                                        <label for="floatingInput">Id Produk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Id Produk.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Masukkan Nama produk" name="nama_produk"
                                                            required value="<?php echo $row['nama_produk']?>">
                                                        <label for="floatingInput">Nama produk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama produk.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="id_kategori" required>
                                                            <option selected hidden value="">Pilih kategori Menu
                                                            </option>
                                                            <?php
                                                    foreach($select_id_kategori as $value){
                                                        echo "<option value=" .$value['id_kategori'] . "> $value[nama_kategori]</option>";
                                                    }
                                                    ?>
                                                        </select>
                                                        <label for="floatingPassword">Kategori Produk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Kategori Produk.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="id_satuan" required>
                                                            <option selected hidden value="">Pilih Satuan Produk
                                                            </option>
                                                            <?php
                                                    foreach($select_id_satuan as $value){
                                                        echo "<option value=" .$value['id_satuan'] . "> $value[nama_satuan]</option>";
                                                    }
                                                    ?>
                                                        </select>
                                                        <label for="floatingPassword">Satuan Produk</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Satuan Produk.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput"
                                                            placeholder="Stok" name="stok" required
                                                            value="<?php echo $row['stok']?>">
                                                        <label for="floatingInput">Stok</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Stok
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="floatingInput"
                                                            placeholder="Harga" name="harga" required
                                                            value="<?php echo $row['harga']?>">
                                                        <label for="floatingInput">Harga</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Harga Produk
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-warning"
                                                    name="input_produk_validate" value="12345">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Edit -->

                        <!-- Modal Delete -->
                        <div class="modal fade" id="ModalDelete<?php echo $row['id_produk'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-md-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="needs-validation" novalidate
                                            action="proses/proses_produk/proses_delete_produk.php" method="POST">
                                            <input type="hidden" value="<?php echo $row['id_produk']?>"
                                                name="id_produk">
                                            <input type="hidden" value="<?php echo $row['foto']?>" name="foto">
                                            <div class="col-lg-12">
                                                apakah anda ingin menghapus produk
                                                <b><?php echo $row['nama_produk'] ?></b>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="input_user_validate"
                                                    value="12345">hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Delete -->

                        <?php
                }
                        
                ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">Menu Order</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Id Barcode</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                
                            $total = 0;
                            foreach($result as $row) {
                            ?>
                                    <tr>
                                        <?php
                                ?>
                                        <td><?php echo $row['nama_produk'] ?></td>
                                        <!--dari tb produk-->
                                        <td> Rp. <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                        <!--dari tb produk-->
                                        <td><?php echo $row['jumlah'] ?></td>
                                        <!--dari tb list order-->
                                        <!--dari tb order-->
                                        <td><?php echo $row['id_barcode'] ?></td>
                                        <td class="d-flex">
                                            <button class="btn btn-sm btn-outline-info me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalView<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-eye"></i>
                                                Lihat</button>
                                            <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-pencil-square"></i>
                                                Edit</button>
                                            <button class="btn btn-sm btn-outline-danger me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-trash3"></i>
                                                Hapus</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $total +=$row['total'];
                            }
                        ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                }
                ?>
                    </div>
                </div>
                <!--AKhir card-->
            </div>
            <!--Awal Card Detail Transaksi-->
            <div class="col-md-4">
                <div class="card mt-3">
                    <h3 class="text-center mt-3"><b>Detail Transaksi</b></h3>
                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col-6 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="total"
                                        value=" Rp. <?php echo number_format($total, 0, ',', '.') ?>">
                                    <label for="floatingInput">Total Belanja</label>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="kodeorder"
                                        value="<?php  echo $row['nama']?>">
                                    <label for="floatingInput">Nama Kasir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="uangbayar">
                                    <label for="floatingInput">Uang Bayar</label>
                                </div>
                            </div>
                            <div class="col-6 mt-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="discount">
                                    <label for="floatingInput">Discount</label>
                                </div>
                            </div>
                            <?php
                            
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="discount">
                                    <label for="floatingInput">Kembalian</label>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-outline-danger mx-2" data-bs-toggle="modal" data-bs-target="#ModalCetak"><i class="bi bi-printer"></i> Cetak
                                        Struk</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ModalBayar"><i class="bi bi-currency-dollar"></i>
                                        Bayar</button>
                                </div>
                            </div>

                        </div>  

                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <!--AKhir card-->
            </div>
        </div>

    </div>
</div>
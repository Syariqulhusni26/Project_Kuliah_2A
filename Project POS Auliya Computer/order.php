<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,nama, SUM(harga*jumlah) AS total FROM tb_order
    LEFT JOIN tb_user ON tb_user.id = tb_order.id_karyawan
    LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
    LEFT JOIN tb_produk ON tb_produk.id_produk = tb_list_order.produk
    GROUP BY id_order
    ");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_id_user = mysqli_query($conn, "SELECT id,nama FROM tb_user");


                

// $select_id_satuan = mysqli_query($conn, "SELECT id_satuan,nama_satuan FROM tb_satuan");
?>

<div class="col-lg-10">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Order</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div>
        </div>
        <div class="card mt-3">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalTambahProduk"><i
                    class="bi bi-bag-plus"></i> Tambah Data Order</a>

            <!--(data-bs-target)Button Pemicu Modal-->
            <div class="card-body">

                <!-- Modal Tambah Order -->
                <div class="modal fade" id="ModalTambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_order/proses_input_order.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="kodeorder" name="kode_order"
                                                    value="<?php echo date('ymdHi').rand(100,999)?>" readonly>
                                                <label for="kodeorder">Kode Order</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Order
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan"
                                                    placeholder="Masukkan Nama Pelanggan" name="pelanggan" required>
                                                <label for="pelanggan">Nama Pelanggan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pelanggan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"></div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="datetime-local" class="form-control" id="tanggal"
                                                    placeholder="Masukkan Tanggal Transaksi" name="tanggal">
                                                <label for="catatan">Tanggal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-warning" name="input_order_validate"
                                            value="12345">Buat Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah Order -->

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
                

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="needs-validation" novalidate
                                    action="proses/proses_order/proses_edit_order.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="kodeorder" name="kode_order"
                                                    value="<?php echo $row['id_order']?>" readonly>
                                                <label for="kodeorder">Kode Order</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Order
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan"
                                                    placeholder="Masukkan Nama Pelanggan" name="pelanggan" required value="<?php echo $row['pelanggan']?>">
                                                <label for="pelanggan">Nama Pelanggan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pelanggan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="datetime-local" class="form-control" id="tanggal"
                                                    placeholder="Masukkan Tanggal Transaksi" name="tanggal" value="<?php echo $row['tgl_transaksi']?>">
                                                <label for="catatan">Tanggal</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-warning" name="edit_order_validate"
                                            value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1"
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
                                    action="proses/proses_order/proses_delete_order.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_order']?>" name="kode_order">
                                    <div class="col-lg-12 mb-3">
                                        apakah anda ingin menghapus data order atas <b><?php echo $row['pelanggan']?></b> dengan kode order <b><?php echo $row['id_order']?></b> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning" name="delete_order_validate"
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
                                <th scope="col">No</th>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Karyawan</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                            $no = 1;
                            foreach($result as $row) {
                            ?>
                            <tr>
                                <?php
                                ?>
                                <th scope="row"><?php echo $no++?></th>
                                <td><?php echo $row['id_order'] ?></td>
                                <td><?php echo $row['tgl_transaksi'] ?></td>
                                <td><?php echo $row['pelanggan'] ?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td> Rp. <?php echo number_format($row['total'], 0, ',', '.') ?></td>
                                <td class="d-flex">
                                    <a class="btn btn-sm btn-outline-info me-1"
                                        href="./?x=orderitem&order=<?php echo $row['id_order']."&pelanggan=".$row['pelanggan']."&tanggal=".$row['tgl_transaksi'] ?>"><i
                                            class="bi bi-eye"></i></a>
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
    </div>
</div>
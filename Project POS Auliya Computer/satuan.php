<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_satuan");

while($record = mysqli_fetch_array($query)){
$result[] = $record;
}
?>

<div class="col-lg-10">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Satuan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-3" >
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalTambahSatuan"><i
                    class="bi bi-arrow-return-right"></i> Tambah Satuan</a>
            <!--(data-bs-target)Button Pemicu Modal-->
            <div class="card-body">

                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="ModalTambahSatuan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Satuan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_satuan/proses_input_satuan.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Id Satuan" name="id_satuan" required>
                                                <label for="floatingInput">Id Satuan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Id Satuan.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Satuan" name="nama_satuan" required>
                                                <label for="floatingInput">Nama Satuan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Satuan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-warning" name="input_satuan_validate"
                                            value="12345">Simpan</button>
                                        <!--name dan value adalah pengaman supaya orang luar tidak bisa mengakses-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah Kategori -->

                <?php 
                foreach($result as $row) {
                ?>
                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEditSatuan<?php echo $row['id_satuan'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Satuan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_satuan/proses_edit_satuan.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Satuan" name="id_satuan"
                                                    value="<?php echo $row['id_satuan']?>" required>
                                                <label for="floatingInput">Id Satuan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Id Satuan.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Satuan" name="nama_satuan"
                                                    value="<?php echo $row['nama_satuan']?>" required>
                                                <label for=" floatingInput">Nama Satuan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Satuan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="edit_satuan_validate"
                                            value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDeleteSatuan<?php echo $row['id_satuan'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Satuan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_satuan/proses_delete_satuan.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_satuan']?>" name="id_satuan">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus satuan <b> <?php echo $row['nama_satuan']?> </b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="delete_satuan_validate"
                                            value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->

                <?php
                }
                if(empty($result)){
                    echo "Data User Tidak Ada";
                }else{
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id Satuan</th>
                                <th scope="col">Nama Satuan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($result as $row) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++?></th>
                                <td><?php echo $row['id_satuan'] ?></td>
                                <td><?php echo $row['nama_satuan'] ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalEditSatuan<?php echo $row['id_satuan'] ?>"><i
                                            class="bi bi-pencil-square"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-outline-danger me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalDeleteSatuan<?php echo $row['id_satuan'] ?>"><i
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
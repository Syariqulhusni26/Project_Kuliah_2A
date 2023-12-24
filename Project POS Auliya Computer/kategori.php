<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori");

while($record = mysqli_fetch_array($query)){
$result[] = $record;
}
?>

<div class="col-lg-10">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Kategori</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-3" >
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalTambahKategori"><i
                    class="bi bi-arrow-return-right"></i> Tambah Kategori</a>
            <!--(data-bs-target)Button Pemicu Modal-->
            <div class="card-body">

                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_kategori/proses_input_kategori.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Id Kategori" name="id_kategori" required>
                                                <label for="floatingInput">Id Kategori</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Id Kategori.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Kategori" name="nama_kategori" required>
                                                <label for="floatingInput">Nama Kategori</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Kategori.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-warning" name="input_kategori_validate"
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
                <div class="modal fade" id="ModalEditKategori<?php echo $row['id_kategori'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_kategori/proses_edit_kategori.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Kategori" name="id_kategori"
                                                    value="<?php echo $row['id_kategori']?>" required>
                                                <label for="floatingInput">Id Kategori</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Id Kategori.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama Kategori" name="nama_kategori"
                                                    value="<?php echo $row['nama_kategori']?>" required>
                                                <label for=" floatingInput">Nama Kategori</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Kategori.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="edit_kategori_validate"
                                            value="12345" id="edit_kategori">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDeleteKategori<?php echo $row['id_kategori'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kategori</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate
                                    action="proses/proses_kategori/proses_delete_kategori.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_kategori']?>" name="id_kategori">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus user <b> <?php echo $row['nama_kategori']?> </b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="delete_kategori_validate"
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
                                <th scope="col">Id Kategori</th>
                                <th scope="col">Nama Kategori</th>
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
                                <td><?php echo $row['id_kategori'] ?></td>
                                <td><?php echo $row['nama_kategori'] ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalEditKategori<?php echo $row['id_kategori'] ?>"><i
                                            class="bi bi-pencil-square"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-outline-danger me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalDeleteKategori<?php echo $row['id_kategori'] ?>"><i
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
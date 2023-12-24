<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");

while($record = mysqli_fetch_array($query)){
$result[] = $record;
}
?>

<div class="col-lg-10">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-lg">
            <a class="navbar-brand" href="#">Data Teknisi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-3">
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"><i
                    class="bi bi-arrow-return-right"></i> Tambah Teknisi</a>
            <!--(data-bs-target)Button Pemicu Modal-->
            <div class="card-body">

                <!-- Modal Tambah User -->
                <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Teknisi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_user.php"
                                    method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama" name="nama" required>
                                                <label for="floatingInput">Nama</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Nama.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Username" name="username" required>
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username.
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingPassword"
                                                    placeholder="Password" value="12345" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan No Hp" name="nohp" required>
                                                <label for="floatingInput">No Hp</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Nomor Hp.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="level">
                                                    <option selected hidden value="0">Pilih Level User</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Karyawan</option>
                                                </select>
                                                <label for="floatingPassword">level User</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Level.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="alamat" id="" style="height:100px;"
                                                    name="alamat" required></textarea>
                                                <label for="floatingInput">Alamat</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Alamat.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="input_user_validate"
                                            value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah User -->

                <?php 
                foreach($result as $row) {

                ?>
                <!-- Modal View -->
                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_user.php"
                                    method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama" name="nama"
                                                    value="<?php echo $row['nama']?>">
                                                <label for="floatingInput">Nama</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Nama.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Username" name="username"
                                                    value="<?php echo $row['username']?>">
                                                <label for=" floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan No Hp" name="nohp"
                                                    value="<?php echo $row['nohp']?>">
                                                <label for="floatingInput">No Hp</label>

                                                <div class="invalid-feedback">
                                                    Masukkan Nomor Hp.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" aria-label="Default select example"
                                                    required name="level" id="">
                                                    <?php
                                                $data = array("Admin", "User");
                                                foreach($data as $key => $value){
                                                    if($row['level'] == $key+1){
                                                        echo "<option selected value='$key'>$value</option>";
                                                    }else{
                                                        echo "<option value='$key'>$value</option>";
                                                    }
                                                }
                                                ?>
                                                    <label for=" floatingPassword">level User</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Level.
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <textarea disabled class="form-control" name="alamat" id=""
                                                    style="height:100px;" name="alamat"
                                                    required><?php echo $row['alamat']?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat.
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
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_user.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id']?>" name="id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Nama" name="nama"
                                                    value="<?php echo $row['nama']?>" required>
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan Username" name="username"
                                                    value="<?php echo $row['username']?>" required>
                                                <label for=" floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Username.
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Masukkan No Hp" name="nohp"
                                                    value="<?php echo $row['nohp']?>" required>
                                                <label for="floatingInput">No Hp</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nomor Hp.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required
                                                    name="level" id="">
                                                    <?php
                                                $data = array("Admin", "User");
                                                foreach($data as $key => $value){
                                                    if($row['level'] == $key+1){
                                                        echo "<option selected value=".($key+1).">$value</option>";
                                                    }else{
                                                        echo "<option value=".($key+1).">$value</option>";
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <label for=" floatingPassword">level User</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Level.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="alamat" id="" style="height:100px;"
                                                    name="alamat" required><?php echo $row['alamat']?></textarea>
                                                <label for="floatingInput">Alamat</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="edit_user_validate"
                                            value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_user.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id']?>" name="id">
                                    <div class="col-lg-12">
                                        <?php
                                    if ($row['username'] == $_SESSION['username_posac']) {
                                        echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun ini</div>";
                                    } else {
                                        echo "Apakah anda ingin menghapus user <b>" . $row['nama'] . "</b>";
                                    }
                                    ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="edit_user_validate"
                                            value="12345"
                                            <?php echo ($row['username'] == $_SESSION['username_posac']) ? 'disabled' : '' ; ?>>Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->

                <!-- Modal Reset Password -->
                <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_reset_password.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id']?>" name="id">
                                    <div class="col-lg-12">
                                        <?php
                                    if ($row['username'] == $_SESSION['username_posac']) {
                                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password akun ini</div>";
                                    } else {
                                        echo "Apakah anda ingin mereset password user <b>" . $row['nama'] . "</b> menjadi password bawaan sistem yaitu <b>password</b>";
                                    }
                                    ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-warning" name="reset_passsword_validate"
                                            value="12345"
                                            <?php echo ($row['username'] == $_SESSION['username_posac']) ? 'disabled' : '' ; ?>>Reset
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Reset Password -->
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
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Level</th>
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
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['alamat'] ?></td>
                                <td><?php echo $row['nohp'] ?></td>
                                <td><?php
                                    if($row['level'] == 1) {
                                        echo "Admin";
                                    }else{
                                        echo "User";
                                    }
                                    ?></td>
                                <td class="d-flex">
                                    <button class="btn btn-sm btn-outline-info me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i>
                                        Lihat</button>
                                    <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i
                                            class="bi bi-pencil-square"></i>
                                        Edit</button>
                                    <button class="btn btn-sm btn-outline-danger me-1" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i
                                            class="bi bi-trash3"></i>
                                        Hapus</button>
                                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i
                                            class="bi bi-repeat"></i> Reset Password
                                    </button>
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
<div class="col-lg-2">
    <nav class="navbar-expand-lg bg-body-tertiary" style="background-color: #141E46">
        <div class="container-fluid ">
            <!--style="background-color: #141E46"// ini untuk warna backgroun sidebar-->
            <div class="offcanvas offcanvas-end mb-0" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <!--Revisi-->
                <div class="offcanvas-body mx-2 ">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 " id="myNavPills">
                        <div>
                            <a href="."><img src="img/Logo.png" width="150px" style="display:block; margin:auto;"></a>

                        </div>
                        <li class="nav-item">
                            <a class="nav-link ps-2 mb-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?>"
                                aria-current="page" href="home"
                                <?php if (isset($_GET['x']) && $_GET['x'] == 'home') { echo 'style="background-color: #C70039;"'; } ?>><i
                                    class="bi bi-house-door"></i> Dashboard</a>


                        </li>
                        <!--Dropdown untuk transaksi-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle link-dark ps-2 mb-2" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Transaksi
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'order') ? 'active link-light' : 'link-dark' ; ?>"
                                        href="order"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'order') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-cart-plus"></i> Order</a></li>
                            </ul>
                        </li>
                        <!--Akhir Dropdown untuk transaksi-->
                        <?php if($hasil['level'] ==1){?>
                        <!--Dropdown untuk Master Data-->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle ps-2 mb-2 " href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Master Data
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'kategori') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="kategori"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'kategori') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-tags"></i> Kategori</a></li>
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'satuan') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="satuan"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'satuan') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-boxes"></i> Satuan</a></li>
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'produk') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="produk"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'produk') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-card-checklist"></i>Produk</a></li>
                            </ul>
                        </li>
                        <!--Akhir Dropdown untuk Master Data-->

                        <!--Dropdown untuk Data User-->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle ps-2  " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Data User
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'datauser') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="datauser"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'datauser') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-people"></i> Data User</a></li>
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'datateknisi') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="datateknisi"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'datateknisi') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-person-gear"></i> Data Teknisi</a>
                                </li>
                                <li><a class="dropdown-item nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporan') ? 'active link-light' : 'link-dark' ; ?> ps-2"
                                        href="laporan"
                                        <?php if (isset($_GET['x']) && $_GET['x'] == 'laporan') { echo 'style="background-color: #C70039;"'; } ?>><i
                                            class="bi bi-clipboard-data"></i> Laporan</a>
                                </li>
                            </ul>
                        </li>
                        <?php }?>
                        <!--Akhir Dropdown untuk Data User-->

                        <hr>
                        <ul class="navbar-nav" style="margin-bottom: 170%; ">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-center " href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle" style="font-size: 50px; "></i><span
                                        class="text-center"><br><?php echo $hasil['username'];?></span>
                                </a>
                                <ul class="dropdown-menu mt-2">
                                    <li><a class="dropdown-item nav-linkps-2" href="#"><i class="bi bi-person"></i>
                                            Profile</a></li>
                                    <li><a class="dropdown-item nav-link ps-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah
                                            Password</a></li>
                                    <li><a class="dropdown-item nav-link ps-2" href="logout"><i
                                                class="bi bi-box-arrow-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="floatingInput"
                                    placeholder="Masukkan Username" name="username"
                                    value="<?php echo $_SESSION['username_posac']?>" required>
                                <label for=" floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Masukkan Username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="passwordlama"
                                    required>
                                <label for=" floatingPassword">Password Lama</label>
                                <div class="invalid-feedback">
                                    Masukkan Password Lama.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="passwordbaru"
                                    required>
                                <label for=" floatingInput">Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan Password Baru
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="repasswordbaru"
                                    required>
                                <label for=" floatingPassword">Ulang Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukkan Ulang Password Baru.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning" name="ubah_password_validate"
                            value="12345">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Ubah Password -->
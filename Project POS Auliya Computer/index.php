<?php 
            session_start();
            // kondisi digunakan agar alamat url tidak terlalu panjang dan tidak tentan 
            //di hack
                if(isset($_GET['x']) && $_GET['x'] == 'home') {
                    $page = "home.php";
                    include "main.php";
                }elseif(isset($_GET['x']) && $_GET['x'] == 'order') {
                    $page = "order.php";
                    include "main.php";
                }elseif(isset($_GET['x']) && $_GET['x'] == 'kategori') {
                    if($_SESSION['level_posac']==1){
                        $page = "kategori.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'satuan') {
                    if($_SESSION['level_posac']==1){
                        $page = "satuan.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'produk') {
                    if($_SESSION['level_posac']==1){
                        $page = "produk.php";
                        include "main.php"; 
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'datauser') {
                    if($_SESSION['level_posac']==1){
                        $page = "datauser.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'datateknisi') {
                    if($_SESSION['level_posac']==1){
                        $page = "datateknisi.php";
                        include "main.php";                        
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'laporan') {
                    if($_SESSION['level_posac']==1){
                        $page = "laporan.php";
                        include "main.php";                        
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset($_GET['x']) && $_GET['x'] == 'login') {
                    include "login.php";
                }elseif(isset($_GET['x']) && $_GET['x'] == 'logout') {
                    include "proses/proses_logout.php";
                }elseif(isset($_GET['x']) && $_GET['x'] == 'logout') {
                    include "proses/proses_logout.php";
                }elseif(isset($_GET['x']) && $_GET['x'] == 'orderitem') {
                    $page = "order_item.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
            ?>
<!--Akhir Bagian Konten-->
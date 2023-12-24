<?php
if(empty($_SESSION['username_posac'])){
    header('location:login');
}

    include "proses/connect.php"; // untuk dapat mengakses database
    $query = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$_SESSION[username_posac]'"); // untuk memunculkan level user
    $hasil = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | POS Auliya Computer</title>
    <link rel="icon" href="img/Logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Link Icon Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!--Link css-->
    <link rel="stylesheet" href="css/index.css">

    <!--Font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>
    <!--Awal sidebar-->
    <div class="container-global">
        <div class="row g-0">
            <?php include "sidebar.php"?>
            <!--Akhir sidebar-->

            <!--Bagian Konten-->
            <?php 
            // kondisi digunakan agar alamat url tidak terlalu panjang dan tidak tentan 
            //di hack
                    include $page;
            ?>
            <!--Akhir Bagian Konten-->
        </div>

        <div class="fixed-bottom text-center mb-3">
            Copyright 2023 Auliya Computer
        </div>
    </div>

    <!--Js sweetalert2-->
    <script src="sweetalert2.all.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>

    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
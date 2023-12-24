<?php

if(!empty($_SESSION['username_posac'])){
    header('location:home');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In | POS Auliya Computer</title>
    <link rel="icon" href="img/Logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Link css-->
    <link rel="stylesheet" href="css/login.css">

    <!--Font google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="global-container">
        <dimay iv class="card login-form">
            <div class="card-body  flex-column text-center">
            </div>
            <div class="card-text">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="img/Logo.png" style="display:block; margin:auto;">
                        <h2 class="title text-center">Please Log in</h2>
                        <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
                            <div class="mb-3 ">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control form-control" id="username"
                                    aria-describedby="textHelp" required>
                                <!--Validate-->
                                <div class="invalid-feedback">
                                    Masukkan Username Anda.
                                </div>
                                <!--Akhir validate-->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control " id="exampleInputPassword1" required>
                                <!--Validate-->
                                <div class="invalid-feedback">
                                    Masukkan Password Anda.
                                </div>
                                <!--Akhir validate-->
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-danger center-block mt-4 w-100" style="display:block; margin:auto; background: rgb(55,55,55);
background: linear-gradient(320deg, rgba(55,55,55,1) 0%, rgba(255,0,0,1) 50%, rgba(70,70,70,1) 100%);" name="submit_validate" value="abc">Login</button>
                        </form>
                    </div>
                    <div class="display-right col-sm-6">
                        <img class="photo-right" src="img/Gambar login right.jpg"
                            style="display:block; margin:auto; display:absolute;">
                    </div>
                </div>
            </div>
        </dimay>
    </div>

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
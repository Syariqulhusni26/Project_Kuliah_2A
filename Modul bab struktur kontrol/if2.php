<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If else statement</title>
</head>
<body>
    <?php
    

    $d = date("D");
    if ($d == "Sat"){
        echo "Selamat akhir pekan";
    } elseif ($d == "Fri") {
            echo "kamu menunaikan sholat jumat bagi yang muslim";
    } else {
        echo "Selamat belajar !";
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database MySql</title>
</head>
<body>
    <h1>Demo Koneksi database MySql</h1>
    <?php
        $conn = mysqli_connect ("localhost","root","");
        if ($conn) {
            echo "Server terkoneksi";
        } else {
            echo "Server tidak terkoneksi";
        }
    ?>
</body>
</html>
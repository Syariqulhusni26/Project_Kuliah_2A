<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Input</title>
</head>
<body>
    <?php
    // Periksa apakah variabel bil1 dan bil2 ada dan memiliki nilai
    if (isset($_POST['bil1']) && isset($_POST['bil2'])) {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];    
    } else {
        echo "Data bilangan tidak ada atau tidak lengkap.";
        exit; // Keluar dari script jika data tidak lengkap
    }
    ?>

    <h1>Perbandingan bilangan</h1>
    <hr>
    Bil 1 : <?php echo $bil1 ?>
    <br>
    Bil 2 : <?php echo $bil2 ?>
    <br>

    <?php
    if ($bil1 < $bil2) {
        echo "$bil1 lebih kecil dari $bil2";
    } 
    elseif ($bil1 > $bil2) {
        echo "$bil1 lebih besar dari $bil2";
    } else {
        echo "$bil1 sama dengan $bil2";
    }
    ?>
</body>
</html>

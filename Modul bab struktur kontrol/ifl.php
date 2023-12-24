<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If else statement</title>
</head>
<body>
    <?php
    
    date_default_timezone_set('Asia/Jakarta');

    $d = date("D");
    $date = date("d-m-y H:i:s");

    if ($d == "Mon") {
        $d = "Senin";
        echo "Selamat belajar <br>";
    } else  
        echo "Ini hari $d <br>";
        echo $d . " " . $date; 
    ?>
</body>
</html>
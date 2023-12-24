<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If else statement</title>
</head>
<body>
    <?php
    
    echo "Mencari jumlah huruf vokal dalam suatu kata";

    echo "<br>";
    $jumlah = 0;
    $kata = "Belajar php";

    $huruf="a";
    
        if(substr($kata, $i, 1)==$huruf)
        {
            $jumlah ++;
        }
    

    echo "Jumlah huruf" . $huruf . " dalam kata" . $kata . " : ";

    echo "<br>";
    echo $jumlah;
    ?>
</body>
</html>
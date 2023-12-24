Ini adalah Proses dari PHP
<?php
    echo "<br>";

    if (isset( $_REQUEST['nilai1'])) { // isset memeriksa nilai pada variabel nilai1
        $nilai1 = $_REQUEST['nilai1'];
    } else {
        $nilai1 = 0;
    }

    if (!empty( $_REQUEST['nilai2'])) {
        $nilai2 = $_REQUEST['nilai2'];
    } else {
        $nilai2 = 0;
    }

    $nilai1 = $_REQUEST['nilai1'];
    $nilai2 = $_REQUEST['nilai2'];
    
    echo "Jumlah dari ". $nilai1 . " Ditambah dengan ". $nilai2 . " adalah ".$nilai1+$nilai2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $conn = mysqli_connect("Localhost","root","","db_saya") or die("Koneksi Gagal"); // Untuk membuat koneksi dengan perintah mysqli_connect
    $hasil = mysqli_query($conn, "SELECT * FROM liga"); // untuk menampilkan data dari tabel menggunakan perintah SQL

    while ($row = mysqli_fetch_array($hasil)){  // Mengambil data pada kolom field
        echo $row["Kode"]."<br>"; 
        echo $row["Negara"]."<br>"; 
        echo $row["Champion"]."<br>"."<br>"; 
    } 
    
    ?>
</body>
</html>
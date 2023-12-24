<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Input</title>
</head>
<body>
    <?php
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    else  {
        echo "Username dan password salah";
        exit;
    }

    ?>

    Username : <?echo $username ?>
    <br>        
    Password : <?echo $password ?>
    <br>
</body>
</html>
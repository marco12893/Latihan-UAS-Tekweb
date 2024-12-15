<?php
    require_once "connect.php"; 
    session_start();    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
            <div class="row bg-dark text-white contain">
                <h1 class="center">INSERT</h1>
            </div>
            <div class="row contain">
                <form action="insert.php" method="POST">
                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="text" name="password" id="password" >
                    <br>
                    <label for="nama_admin">Nama Admin</label>
                    <br>
                    <input type="text" name="nama_admin" id="nama_admin" >
                    <br>
                    <label for="status_aktif">Status Aktif</label>
                    <br>
                    <input type="text" name="status_aktif" id="status_aktif">
                    <br>
                    <input type="submit" name="submit" id="submit" placeholder="submit" class="bg-dark text-white">
                </form>
            </div>
        </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nama_admin']) && isset($_POST['status_aktif'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama_admin = $_POST['nama_admin'];
            $status_aktif = (int)$_POST['status_aktif'];
            $query = "INSERT INTO akun(username, password, nama_admin, status_aktif) VALUES('$username','$password','$nama_admin','$status_aktif')";
            $result = mysqli_query($conn, $query);
            header("Location: admin.php");
        }
    }
?>

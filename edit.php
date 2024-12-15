<?php
    require_once "connect.php"; 
    session_start();    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    $id = $_GET['id'];
    $query = "SELECT id, username, password, nama_admin, status_aktif FROM akun WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
    $username = $result['username'];
    $password = $result['password'];
    $nama_admin = $result['nama_admin'];
    $status_aktif = $result['status_aktif'];
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
                <h1 class="center">EDIT</h1>
            </div>
            <div class="row contain">
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="username">Username</label>
                    <br>
                    <input type="text" name="username" id="username" value="<?php echo $username?>">
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="text" name="password" id="password" value="<?php echo $password?>">
                    <br>
                    <label for="nama_admin">Nama Admin</label>
                    <br>
                    <input type="text" name="nama_admin" id="nama_admin" value="<?php echo $nama_admin?>">
                    <br>
                    <label for="status_aktif">Status Aktif</label>
                    <br>
                    <input type="text" name="status_aktif" id="status_aktif" value="<?php echo $status_aktif?>">
                    <br>
                    <input type="submit" name="submit" id="submit" placeholder="submit" class="bg-dark text-white">
                </form>
            </div>
        </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['nama_admin'])&&isset($_POST['status_aktif'])){
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama_admin = $_POST['nama_admin'];
            $status_aktif = $_POST['status_aktif'];
            $query = "UPDATE akun SET username = '$username', password = '$password', nama_admin = '$nama_admin', status_aktif = '$status_aktif' WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            header("Location: admin.php");
        }
    }
?>

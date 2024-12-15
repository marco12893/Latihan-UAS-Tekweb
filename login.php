<?php
    require_once "connect.php";
    session_start();
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
            <h1 class="center">WELCOME</h1>
        </div>
        <div class="row contain">

            <form action="login.php" method="POST">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" id="username">
                <br>
                <label for="password">Password</label>
                <br>
                <input type="text" name="password" id="password">
                <br>
                <input type="submit" name="submit" id="submit" value="Login" class="bg-dark text-white">
            </form>
        </div>
        <div class="row contain">
            <a href="index.php" class="bg-primary text-white">User mode</a>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT username, password, status_aktif FROM akun WHERE username = '$username'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                $result = mysqli_fetch_assoc($result);
                if($result['password'] === $password){
                    if($result['status_aktif'] == false){
                        echo "Akun tidak aktif";
                    }
                    else{
                        $_SESSION['id'] = $result['id'];
                        $_SESSION['username'] = $result['username'];
                        $_SESSION['logged_in'] = true;
                        header("Location: admin.php");
                    }
                }
                else{
                    echo "Password salah";
                }
            }
            else{
                echo "User tidak ditemukan";
            }
        }
        else{
            echo "Username/Password is missing";
        }
    }
?>
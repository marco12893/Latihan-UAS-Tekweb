<?php
    require_once "connect.php"; 
    session_start();    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    $resi = $_GET['resi'];
    $id = $_GET['id'];
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
                <h1 class="center">DELETE</h1>
            </div>
            <div class="row contain">
                <form action="delete3.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="resi" value="<?php echo $resi; ?>">
                    <input type="submit" name="delete" id="delete" placeholder="Delete" class="bg-dark text-white">
                    <a href="log.php">Cancel</a>
                </form>
            </div>
        </div>
</body>
</html>

<?php
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $resi = $_POST['resi'];
        $query = "DELETE FROM detail_log_pengiriman WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        header("Location: log.php?resi=".urlencode($resi));
    }
?>

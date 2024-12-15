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
    <?php include 'navbar.php'; ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>
                    id
                </th>
                <th>
                    username
                </th>
                <th>
                    password
                </th>
                <th>
                    nama_admin
                </th>
                <th>
                    status_aktif
                </th>
                <th>
                    action
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT id, username, password, nama_admin, status_aktif FROM akun";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>" .htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" .htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" .htmlspecialchars($row['password']) . "</td>";
                    echo "<td>" .htmlspecialchars($row['nama_admin']) . "</td>";
                    echo "<td>" .htmlspecialchars($row['status_aktif']) . "</td>";
                    echo "<td> <a href = 'edit.php?id=" . $row['id']. "' class = 'bg-primary text-white padding'> Edit </a> <a href = 'delete.php?id=" . $row['id'] . "' class = 'bg-primary text-white padding'> Delete </a></td>";
                }
            }
?>
        </tbody>
    </table>
    <div>
        <a href="insert.php" class="btn btn-success">Tambahkan admin</a>
    </div>
    
</body>
</html>


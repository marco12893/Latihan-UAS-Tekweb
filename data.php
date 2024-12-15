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
    <div>
        <div>
            <h2>Entry Nomer Resi</h2>
            <form action="data.php" method="POST">
                <label for="tanggal">Tanggal</label>
                <br>
                <input type="date" name="tanggal" id="tanggal">
                <br>
                <label for="resi">Nomor Resi</label>
                <br>
                <input type="text" name="resi" id="resi">
                <br>
                <input type="submit" name="submit" id="submit" value="Entry" class="bg-dark text-white">
                <br>
                <br>
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Nomor Resi</th>
                        <th>Tanggal Resi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT id, nomor_resi , tanggal_resi FROM transaksi_resi_pengiriman";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $nomor_resi = $row['nomor_resi'];
                                $tanggal_resi = date('d-m-Y', strtotime($row['tanggal_resi']));
                                echo "<tr> <td>".$id."</td>";
                                echo "<td>".$nomor_resi."</td>";
                                echo "<td>".$tanggal_resi."</td>";
                                echo "<td> <a href = 'log.php?resi=". $nomor_resi. "' class = 'bg-primary text-white'>Entry Log</a><a href = 'delete2.php?id=". $id. "' class = 'bg-danger text-white'>Hapus</a></td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['tanggal']) && !empty($_POST['resi'])){
            $nomor_resi = $_POST['resi'];
            $tanggal_resi = $_POST['tanggal'];
            $query = "INSERT INTO transaksi_resi_pengiriman(nomor_resi, tanggal_resi) VALUES('$nomor_resi','$tanggal_resi')";
            $result = mysqli_query($conn, $query);
            header("Location: data.php");
        }
    }
?>

<?php
    require_once "connect.php"; 
    session_start();   
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    $nomor_resi = $_GET['resi'] 
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
    <div>
        <div>
            <h2>Entry Nomer Resi</h2>
            <form action="log.php" method ="POST">
                <input type="hidden" name="resi" id="resi" value=<?php echo $nomor_resi;?>>
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal">
                <label for="kota">Kota</label>
                <input type="text" name="kota" id="kota">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan">
                <input type="submit" name="submit" id="submit">
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Nomor Resi</th>
                        <th>Tanggal</th>
                        <th>Kota</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT id, nomor_resi , tanggal, kota, keterangan FROM detail_log_pengiriman WHERE nomor_resi = '$nomor_resi'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $nomor_resi = $row['nomor_resi'];
                                $tanggal = date('d-m-Y', strtotime($row['tanggal']));
                                $kota = $row['kota'];
                                $keterangan = $row['keterangan'];
                                echo "<tr> <td>".$id."</td>";
                                echo "<td>".$nomor_resi."</td>";
                                echo "<td>".$tanggal."</td>";
                                echo "<td>".$kota."</td>";
                                echo "<td>".$keterangan."</td>";
                                echo "<td><a href = 'delete3.php?resi=".$nomor_resi. "&id=".$id."' class = 'bg-danger text-white'>Hapus</a></td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="data.php" class="bg-dark text-white">Back</a>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['resi']) && !empty($_POST['tanggal']) && !empty($_POST['kota']) && !empty($_POST['keterangan'])){
            $nomor_resi = $_POST['resi'];
            $tanggal = $_POST['tanggal'];
            $kota = $_POST['kota'];
            $keterangan = $_POST['keterangan'];
            $query = "INSERT INTO detail_log_pengiriman(nomor_resi, tanggal, kota, keterangan) VALUES('$nomor_resi','$tanggal', '$kota', '$keterangan')";
            $result = mysqli_query($conn, $query);
            header("Location: log.php?resi=".$nomor_resi);
        }
    }
?>
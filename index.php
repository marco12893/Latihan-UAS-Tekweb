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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid sticky">
        <div class="row bg-dark">
            <div class="text-white padding">
                Welcome!
            </div>
            <div class="text-secondary padding">
                <a href="login.php" class="text-secondary">Login Admin</a>
            </div>
        </div>
    </div>
        <div>
            <h2>Entry Nomer Resi</h2>
            <form action="index.php" method="POST" id="resiForm">
                <label for="resi">Nomor Resi</label>
                <input type="text" name="resi" id="resi">
                <input type="submit" name="submit" id="submit" value="Lihat" class="bg-dark text-white">
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kota</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id='dataBody'>

                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function () {
                $('#resiForm').on('submit', function (e) {
                    e.preventDefault();
                    var resi = $('#resi').val();
                    $('#dataBody').load('get_data.php', { resi: resi });
                });
            });
        </script>
</body>
</html>


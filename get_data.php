<?php
require_once "connect.php";

if (isset($_POST['resi'])) {
    $resi = $_POST['resi'];

    $query = "SELECT nomor_resi, tanggal, kota, keterangan 
              FROM detail_log_pengiriman 
              WHERE nomor_resi = '$resi' 
              ORDER BY tanggal ASC";
    $result = mysqli_query($conn, $query);

    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tanggal = date('d-m-Y', strtotime($row['tanggal']));
            $kota = $row['kota'];
            $keterangan = $row['keterangan'];
            $output .= "<tr>
                            <td>{$tanggal}</td>
                            <td>{$kota}</td>
                            <td>{$keterangan}</td>
                        </tr>";
        }
    } else {
        $output .= "<tr><td colspan='3'>No results found.</td></tr>";
    }

    echo $output;
}
?>

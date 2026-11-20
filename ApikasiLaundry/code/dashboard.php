<?php
include("koneksi.php");
session_start();

$query = "SELECT `nama`, `telepon`, `layanan`, `alamat`, `catatan`, 'status','tanggal_pesanan' FROM `pesanan`";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        #colom{
            background-color: skyblue;
        }
        #baris{
            background-color: grey;
        }
    </style>
</head>
<body>
    <h1>Selamat datang admin Laundry</h1>
    <div>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr id="colom">
                <th>no</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Layanan</th>
                <th>Alamat</th>
                <th>Catatan</th>
                <th>Status</th>
                <th>Tanggal Pesanan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            // pengechekan data
            if(mysqli_num_rows($result) > 0):
                // perulangan pengambilan
                while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr id="baris">
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['telepon']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['layanan']; ?></td>
                <td><?= $row['catatan']; ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['tanggal_pesanan']; ?></td>
                <td>
                    <a href="edit.php">Edit</a>
                    <a href="hapus.php">Hapus</a>
                </td>
            </tr>
            <?php
            endwhile;
            endif;
            ?>
        </table>
    </div>
</body>
</html>
<?php
session_start();
include("../admin/koneksi.php");

if (isset($_POST["submit"])) {
    $nama=$_POST["nama"];
    $telepon=$_POST["telepon"];
    $layanan=$_POST["layanan"];
    $alamat = $_POST["amalat"];
    $catatan = $_POST["catatan"];
    $waktu = date('Y-m-d H:i:s');

    $query = ("INSERT INTO pesanan (`id`, `nama`, `telepon`, `layanan`, `alamat`, `catatan`, `tanggal_pesanan`, `status`, `harga`) VALUES ('','$nama','$telepon','$layanan','$alamat','$catatan','Pending',now(),'')");

    if(mysqli_query($conn, $query)) {
        // berhasil di tambahkan
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href='pesanan.php';
              </script>";
    }
    else {
        // Jika gagal ditambahkan
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Laundry</title>
    <style>
        h1{
            text-align: center;
        }
        button {
            padding: 80;
            column-span: 30;
        }
    </style>
</head>
<body>
    <h1>Masukan Pesanan Anda</h1>
    <form action="pesanan.php" method="POST" align="center">
        <div>
            <label for="nama">Nama :</label> <br>
            <input type="text" name="nama" id="nama">
        </div>
        <br>
        <div>
            <label for="telepon">Nomor whastapp :</label> <br>
            <input type="text" name="telepon" id="whatsapp">
        </div>
        <br>
        <div>
            <label for="layanan">Pilih Layanan :</label> <br>
            <select name="layanan" id="layanan">
                <option value="">— Pilih layanan —</option>
                <option value="reguler">Cuci Kering Setrika (Reguler)</option>
                <option value="kilat">Laundry Kilat 6 Jam</option>
                <option value="dryclean">Dry Clean</option>
                <option value="sepatu">Cuci Sepatu / Tas</option>
                <option value="karpet">Cuci Karpet / Bed Cover</option>
                <option value="setrika">Setrika Saja</option>
            </select>
        </div>
        <br>
        <div>
            <label for="alamat">Alamat Penjemputan :</label><br>
            <textarea name="alamat" id="alamat" rows="3" placeholder="Masukan alamat lengkap (untuk penjemputan)">
            </textarea>
        </div>
        <br>
        <div>
            <label for="catatan">Catatan Tambahan :</label> <br>
            <textarea name="catatan" id="catatan" rows="10" placeholder="Masukan catatan tambahan"></textarea>
        </div>
        <br>
        <div>
            <button type="submit" name="submit">Pesan</button>
            <a href="../index.php">Kembali</a>
            
        </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
    <div>
        <div>
            <h3>Tambah Barang</h3>
        </div>
        
        <form action="tambah.php" method="post">
            <div>
                <label>Nama Barang</label>
                <input name="nama_barang" type="text" placeholder="Nama Barang" required>
            </div>
            <div>
                <label>Jumlah Barang</label>
                <input name="stok_barang" type="text" placeholder="Jumlah Barang" required>
            </div>
            <div>
                <label>Harga Satuan</label>
                <input name="harga_barang" type="text" placeholder="Harga Satuan" required>
            </div>
            <div>
                <button type="submit" name="simpan">Simpan</button>
                <a href="index.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
require "../database/config.php";

if(isset($_POST['simpan'])){

    $nama_barang = $_POST['nama_barang'];
    $stok_barang = $_POST['stok_barang'];
    $harga_barang = $_POST['harga_barang'];

    $pdo = koneksi::connect();
    $sql = "INSERT INTO barang (nama_barang,stok_barang,harga_barang) VALUES (?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nama_barang,$stok_barang,$harga_barang));

    koneksi::disconnect();
    header("Location: index.php");
}
?>

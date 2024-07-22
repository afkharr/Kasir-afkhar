<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
    <div>
        <div>
            <h3>Tambah Supplier</h3>
        </div>
        
        <form action="tambah.php" method="post">
            <div>
                <label>Nama Supplier</label>
                <input name="nama_supplier" type="text" placeholder="masukan nama" required>
            </div>
            <div>
                <label>Alamat Supplier</label>
                <input name="alamat_supplier" type="text" placeholder="masukan alamat" required>
            </div>
            <div>
                <label>No Tlp</label>
                <input name="no_telp" type="text" placeholder="masukan no telp" required>
            </div>
            <div>
                <label>No Rekening</label>
                <input name="no_rekening" type="text" placeholder="kembalian" required>
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

    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $no_telp = $_POST['no_telp'];
    $no_rekening = $_POST['no_rekening'];

    $pdo = koneksi::connect();
    $sql = "INSERT INTO supplier (nama_supplier,alamat_supplier,no_telp,no_rekening) VALUES (?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nama_supplier,$alamat_supplier,$no_telp,$no_rekening));

    koneksi::disconnect();
    header("Location: index.php");
}
?>

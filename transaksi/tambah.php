<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
    <div>
        <div>
            <h3>Tambah Transaksi</h3>
        </div>
        
        <form action="tambah.php" method="post">
            <div>
                <label>Nominal</label>
                <input name="nominal" type="text" placeholder="masukan nominal" required>
            </div>
            <div>
                <label>Total</label>
                <input name="total" type="text" placeholder="total" required>
            </div>
            <div>
                <label>Tgl Waktu</label>
                <input name="tgl_waktu" type="datetime-local" placeholder="tanggal waktu" required>
            </div>
            <div>
                <label>Kembalian</label>
                <input name="kembalian" type="text" placeholder="kembalian" required>
            </div>
            <div>
                <label>Total Diskon</label>
                <input name="total_diskon" type="text" placeholder="diskon" required>
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

    $nominal = $_POST['nominal'];
    $total = $_POST['total'];
    $tgl_waktu = $_POST['tgl_waktu'];
    $kembalian = $_POST['kembalian'];
    $total_diskon = $_POST['total_diskon'];

    $pdo = koneksi::connect();
    $sql = "INSERT INTO transaksi (nominal,total,tgl_waktu,kembalian,total_diskon) VALUES (?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nominal,$total,$tgl_waktu,$kembalian,$total_diskon));

    koneksi::disconnect();
    header("Location: index.php");
}
?>

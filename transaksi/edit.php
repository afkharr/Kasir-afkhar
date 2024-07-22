<?php 
require "../database/config.php";

if (empty($_GET['id_transaksi'])) {
    header("Location: index.php");
    exit();
}

$id_transaksi = $_GET['id_transaksi'];

if (isset($_POST['simpan'])) {

    $nominal = $_POST['nominal'];
    $total = $_POST['total'];
    $tgl_waktu = $_POST['tgl_waktu'];
    $kembalian = $_POST['kembalian'];
    $total_diskon = $_POST['total_diskon'];

    $pdo = koneksi::connect();
    $sql = "UPDATE transaksi SET nominal = ?, total = ?, tgl_waktu = ?, kembalian = ?, total_diskon = ? WHERE id_transaksi = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nominal, $total, $tgl_waktu, $kembalian, $total_diskon, $id_transaksi));
    koneksi::disconnect();

    header("Location: index.php");
    exit();
} else {
    $pdo = koneksi::connect();
    $sql = "SELECT * FROM transaksi WHERE id_transaksi = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id_transaksi));
    $data = $q->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        header("Location: index.php");
        exit();
    }
    $nominal = $data['nominal'];
    $total = $data['total'];
    $tgl_waktu = $data['tgl_waktu'];
    $kembalian = $data['kembalian'];
    $total_diskon = $data['total_diskon'];
    koneksi::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
</head>
<body>
    <div>
        <div>
            <h3>Edit Transaksi</h3>
        </div>
        <form action="edit.php?id_transaksi=<?php echo htmlspecialchars($id_transaksi); ?>" method="post">
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

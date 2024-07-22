<?php 
require "../database/config.php";

if (empty($_GET['id_barang'])) {
    header("Location: index.php");
    exit();
}

$id_barang = $_GET['id_barang'];

if (isset($_POST['simpan'])) {

    $nama_barang = $_POST['nama_barang'];
    $stok_barang = $_POST['stok_barang'];
    $harga_barang = $_POST['harga_barang'];

    $pdo = koneksi::connect();
    $sql = "UPDATE barang SET nama_barang = ?, stok_barang = ?, harga_barang = ? WHERE id_barang = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nama_barang, $stok_barang, $harga_barang, $id_barang));
    koneksi::disconnect();

    header("Location: index.php");
    exit();
} else {
    $pdo = koneksi::connect();
    $sql = "SELECT * FROM barang WHERE id_barang = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id_barang));
    $data = $q->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        header("Location: index.php");
        exit();
    }

    $nama_barang = $data['nama_barang'];
    $stok_barang = $data['stok_barang'];
    $harga_barang = $data['harga_barang'];
    koneksi::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>
    <div>
        <div>
            <h3>Edit Barang</h3>
        </div>
        <form action="edit.php?id_barang=<?php echo htmlspecialchars($id_barang); ?>" method="post">
            <div>
                <label>Nama Barang</label>
                <input name="nama_barang" type="text" placeholder="Nama Barang" required value="<?php echo htmlspecialchars($nama_barang); ?>">
            </div>
            <div>
                <label>Jumlah Barang</label>
                <input name="stok_barang" type="text" placeholder="Jumlah Barang" required value="<?php echo htmlspecialchars($stok_barang); ?>">
            </div>
            <div>
                <label>Harga Satuan</label>
                <input name="harga_barang" type="text" placeholder="Harga Satuan" required value="<?php echo htmlspecialchars($harga_barang); ?>">
            </div>
            <div>
                <button type="submit" name="simpan">Simpan</button>
                <a href="index.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>

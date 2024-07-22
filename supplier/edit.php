<?php 
require "../database/config.php";

if (empty($_GET['id_supplier'])) {
    header("Location: index.php");
    exit();
}

$id_supplier = $_GET['id_supplier'];

if (isset($_POST['simpan'])) {

    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $no_telp = $_POST['no_telp'];
    $no_rekening = $_POST['no_rekening'];

    $pdo = koneksi::connect();
    $sql = "UPDATE supplier SET nama_supplier = ?, alamat_supplier = ?, no_telp = ?, no_rekening = ? WHERE id_supplier = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nama_supplier, $alamat_supplier, $no_telp, $no_rekening, $id_supplier));
    koneksi::disconnect();

    header("Location: index.php");
    exit();
} else {
    $pdo = koneksi::connect();
    $sql = "SELECT * FROM supplier WHERE id_supplier = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id_supplier));
    $data = $q->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        header("Location: index.php");
        exit();
    }
    $nama_supplier = $data['nama_supplier'];
    $alamat_supplier = $data['alamat_supplier'];
    $no_telp = $data['no_telp'];
    $no_rekening = $data['no_rekening'];
    koneksi::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
</head>
<body>
    <div>
        <div>
            <h3>Edit Supplier</h3>
        </div>
        <form action="edit.php?id_supplier=<?php echo htmlspecialchars($id_supplier); ?>" method="post">
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

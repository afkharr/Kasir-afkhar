<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <div>
            <h3>barang</h3>
            <a href="tambah.php">Tambah Barang</a>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH BARANG</th>
                        <th>HARGA SATUAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../database/config.php';
                    $pdo = koneksi::connect();
                    $sql ='SELECT * FROM barang';
                    foreach ($pdo->query($sql) as $row) {
                    ?>  
                        <tr>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['stok_barang']; ?></td>
                            <td><?php echo $row['harga_barang']; ?></td>
                            <td>
                                <a href="edit.php?id_barang=<?php echo $row['id_barang'] ?>">Edit</a>
                                <a href="hapus.php?id_barang=<?php echo $row['id_barang'] ?>" onclick="return confirm('apakah anda ingin menghapus data ini ?')">Hapus</a>
                            </td>   
                        </tr>
                    <?php
                    }
                    koneksi::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

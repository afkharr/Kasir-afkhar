<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <div>
            <h3>Transaksi</h3>
            <a href="tambah.php">Tambah Transaksi</a>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nominal</th>
                        <th>Total</th>
                        <th>Tgl Waktu</th>
                        <th>Kembalian</th>
                        <th>Total Diskon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../database/config.php';
                    $pdo = koneksi::connect();
                    $sql ='SELECT * FROM transaksi';
                    foreach ($pdo->query($sql) as $row) {
                    ?>  
                        <tr>
                            <td><?php echo $row['nominal']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['tgl_waktu']; ?></td>
                            <td><?php echo $row['total_diskon']; ?></td>
                            <td><?php echo $row['kembalian']; ?></td>
                            <td>
                                <a href="edit.php?id_transaksi=<?php echo $row['id_transaksi'] ?>">Edit</a>
                                <a href="hapus.php?id_transaksi=<?php echo $row['id_transaksi'] ?>" onclick="return confirm('apakah anda ingin menghapus data ini ?')">Hapus</a>
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

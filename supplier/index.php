<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <div>
            <h3>Supplier</h3>
            <a href="tambah.php">Tambah Supplier</a>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nama Supplier</th>
                        <th>Alamat Supplier</th>
                        <th>No Tlp</th>
                        <th>No Rekekning</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../database/config.php';
                    $pdo = koneksi::connect();
                    $sql ='SELECT * FROM supplier';
                    foreach ($pdo->query($sql) as $row) {
                    ?>  
                        <tr>
                            <td><?php echo $row['nama_supplier']; ?></td>
                            <td><?php echo $row['alamat_supplier']; ?></td>
                            <td><?php echo $row['no_telp']; ?></td>
                            <td><?php echo $row['no_rekening']; ?></td>
                            <td>
                                <a href="edit.php?id_supplier=<?php echo $row['id_supplier'] ?>">Edit</a>
                                <a href="hapus.php?id_supplier=<?php echo $row['id_supplier'] ?>" onclick="return confirm('apakah anda ingin menghapus data ini ?')">Hapus</a>
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

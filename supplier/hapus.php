<?php
 require "../database/config.php";

 if(empty($_GET['id_supplier'])) header("Location: index.php");

 $id_supplier = $_GET['id_supplier'];

 $pdo = koneksi::connect();
 $sql = "DELETE FROM supplier WHERE id_supplier = ?";
 $q = $pdo->prepare($sql);
 $q->execute(array($id_supplier));
 koneksi::disconnect();
 header("Location: index.php");
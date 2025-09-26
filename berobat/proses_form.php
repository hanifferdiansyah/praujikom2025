<?php
############## PROSES TAMBAH DATA ###############
#1. koneksi ke database
include('../koneksi.php');

#2. mengambil value dari setiap input
$transaksi = $_POST['transaksi'];
$pasien = $_POST['pasien'];
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$tanggal = $thn."-".$bln."-".$tgl;
$dokter = $_POST['dokter'];
$keluhan = $_POST['keluhan'];
$administrasi = $_POST['administrasi'];

#3. menuliskan query tambah data ke tabel
$qry = mysqli_query ($koneksi,"INSERT INTO berobat (No_Transaksi,PasienKlinik_ID,Tanggal_Berobat,Dokter_ID,Keluhan_Pasien,Biaya_Adm) 
VALUES('$transaksi','$pasien','$tanggal','$dokter','$keluhan','$administrasi')");

#4. menjalanakan query di atas
#5. pengalihan halaman jika proses tambah selesaie
header("location:index.php");

?>

    


?>
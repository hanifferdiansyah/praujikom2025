<?php
############## PROSES TAMBAH DATA ###############
#1. koneksi ke database
include('../koneksi.php');

#2. mengambil value dari setiap input
$nama = $_POST['nama'];
$poli = $_POST['poli'];


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query ($koneksi,"INSERT INTO dokter (Nama_Dokter, Poli_ID) 
VALUES ('$nama', '$poli')");

#4. menjalanakan query di atas
#5. pengalihan halaman jika proses tambah selesaie
header("location:index.php");

?>

    


?>
<?php
############## PROSES TAMBAH DATA ###############
#1. koneksi ke database
include('../koneksi.php');

#2. mengambil value dari setiap input
$id = $_POST['idedit'];
$nama = $_POST['nama'];


#3. menuliskan query tambah data ke tabel
$qry = mysqli_query ($koneksi,"UPDATE poli SET Nama_Poli='$nama' 
WHERE Poli_ID='$id'");

#4. menjalanakan query di atas
#5. pengalihan halaman jika proses tambah selesaie
header("location:index.php");

?>

    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #D3DAD9;">
    <?php
    @include('../navbar.php')
        ?>


    <div class="container">

        <div class="row">
            <div class="col-15 m-auto mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>DATA BEROBAT</h3>
                    </div>

                    <div class="card-body">
                        <a href="form.php" class="btn btn-success mb-3">Add New</a>

                        <table class="table table-bordered ">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal </th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Nama Poli</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Biaya Administrasi</th>
                                    <th scope="col">Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include('../koneksi.php');

                                $qry = "SELECT * FROM berobat INNER JOIN pasien ON berobat.PasienKlinik_ID = pasien.PasienKlinik_ID
                                INNER JOIN dokter ON berobat.Dokter_ID = dokter.Dokter_ID
                                INNER JOIN poli ON dokter.Poli_ID = poli.Poli_ID ORDER BY berobat.No_Transaksi ASC";

                                $result = mysqli_query($koneksi, $qry);

                                $nomor = 1;
                                foreach ($result as $row) {
                                    //memformat ulang tanggal berobat
                                    $tgl_berobat = date_create($row['Tanggal_Berobat']);
                                    $tgl_berobat = date_format($tgl_berobat, 'd/m/Y');

                                    //membuat usia pasien
                                    $tanggal_lahir = new DateTime($row['Tanggal_LahirPasien']);
                                    $sekarang = new DateTime("today");
                                    $usia = $sekarang->diff($tanggal_lahir)->y;
                                    ?>

                                    <tr>
                                        <th scope="row"><?= $nomor++?></th>
                                        <td><?= $row['No_Transaksi']?></td>
                                        <td><?= $tgl_berobat ?></td>
                                        <td><?= $row['Nama_pasienKlinik']?></td> 
                                        <td><?= $usia ?> tahun</td>
                                        <td><?= $row['Jenis_KelaminPasien']?></td>
                                        <td><?= $row['Keluhan_Pasien']?></td>
                                        <td><?= $row['Nama_Poli']?></td>
                                        <td><?= $row['Nama_Dokter']?></td>
                                        <td><?= 'Rp ' . number_format($row['Biaya_Adm'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="edit.php?id=<?=$row['No_Transaksi'] ?>" class="btn btn-info btn-sm">edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?=$row['No_Transaksi'] ?>">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?=$row['No_Transaksi'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin data Pasien <b><?= $row['Nama_pasienKlinik'] ?></b> ingin dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="hapus.php?id=<?=$row['No_Transaksi'] ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                }

                                ?>




                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
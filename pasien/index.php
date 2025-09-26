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
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>DATA PASIEN</h3>
                    </div>

                    <div class="card-body">
                        <a href="form.php" class="btn btn-success mb-3">Tambah Data</a>

                        <table class="table table-bordered ">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Tanggal Lahir Pasien</th>
                                    <th scope="col">Jenis Kelamin Pasien</th>
                                    <th scope="col">Alamat Pasien</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include('../koneksi.php');

                                $qry = "SELECT * FROM pasien ORDER BY PasienKlinik_ID ASC";

                                $result = mysqli_query($koneksi, $qry);

                                $nomor = 1;
                                foreach ($result as $row) {
                                    $tgl_lahir = date_create($row['Tanggal_LahirPasien']);
                                    $tgl_lahir = date_format(object: $tgl_lahir, format: 'd F Y');
                                    ?>

                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $row['Nama_pasienKlinik'] ?></td>
                                        <td><?= $tgl_lahir ?></td>
                                        <td><?= $row['Jenis_KelaminPasien'] ?></td>
                                        <td><?= $row['Alamat_Pasien'] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row['PasienKlinik_ID']?>" class="btn btn-primary">Edit</a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalHapus<?= $row['PasienKlinik_ID']?>">
                                                Hapus
                                            </button>
                                        </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalHapus<?= $row['PasienKlinik_ID']?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin Data Pasien <b><?= $row['Nama_pasienKlinik'] ?></b> Ingin Dihapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a class="btn btn-danger" href="hapus.php?id=<?= $row['PasienKlinik_ID']?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
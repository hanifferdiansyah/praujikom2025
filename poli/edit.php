<?php
#################Menngambil data pasien berdasarkan ID terpilih################################

#1.membuat koneksi
include('../koneksi.php');

#2. mengambil value ID hapus
$id = $_GET['id'];

#3. menjalankan query hapus
$qry = mysqli_query($koneksi, "SELECT * FROM poli WHERE Poli_ID  = '$id'");

#4. memisahkan field/kolom tabel pasien menjadi data array
$row = mysqli_fetch_array($qry);

$nama = $row['Nama_Poli'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Preloader styles */
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Rocket animation */
        .rocket-container {
            position: relative;
            width: 70px;
            height: 120px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .rocket-icon {
            width: 70px;
            height: 70px;
            animation: rocket-fly 2s linear forwards;
        }

        .rocket-fire {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 20px;
            height: 40px;
            z-index: 1;
            animation: fire-flicker 0.3s infinite alternate;
        }

        @keyframes rocket-fly {
            0% {
                transform: translateY(0);
            }

            80% {
                transform: translateY(-60px);
            }

            100% {
                transform: translateY(-120px);
                opacity: 0;
            }
        }

        @keyframes fire-flicker {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0.6;
            }
        }
    </style>
</head>

<body style="background-color: #D3DAD9;">
    <!-- Preloader -->
    <div id="preloader">
        <div class="rocket-container">
            <!-- SVG Rocket -->
            <svg class="rocket-icon" viewBox="0 0 64 64" fill="none">
                <ellipse cx="32" cy="54" rx="8" ry="3" fill="#bbb" />
                <rect x="28" y="16" width="8" height="28" rx="4" fill="#0d6efd" />
                <polygon points="32,4 24,20 40,20" fill="#f44336" />
                <rect x="28" y="44" width="8" height="8" rx="4" fill="#fff" />
                <circle cx="32" cy="28" r="4" fill="#fff" />
                <circle cx="32" cy="28" r="2" fill="#0d6efd" />
            </svg>
            <!-- SVG Fire -->
            <svg class="rocket-fire" viewBox="0 0 20 40">
                <polygon points="10,0 0,40 20,40" fill="#ff9800" />
                <polygon points="10,10 5,40 15,40" fill="#fff176" />
            </svg>
        </div>
    </div>
    <?php
    @include('../navbar.php')
        ?>


    <div class="container">

        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header text-center bg-dark bg-gradient">
                        <h3 class="text-white">FORM EDIT DATA POLI</h3>
                    </div>

                    <div class="card-body">

                        <form method="post" action="proses_edit.php">
                            <input type="hidden" value="<?=$id?>" name="idedit" id="">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Poli</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                       value="<?=$nama?>" placeholder="Masukkan Nama Poli">
                                </div>
                            </div>

                            

                            <div class="d-flex justify-content-end ">
                                <a href="index.php" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preloader logic
        window.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('preloader').style.display = 'none';
            }, 1000); // Ubah dari 2000 ke 1000 (1 detik)
        });
    </script>
</body>

</html>
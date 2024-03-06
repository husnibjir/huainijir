<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            padding-top: 80px; /* Untuk memberi ruang di bagian atas untuk navbar */
        }
        h1 {
            text-align: center;
            font-size: 36px; /* Ukuran judul */
        }
        .container {
            margin-top: 30px;
        }
        .table {
            width: 100% !important;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #DCDCDC; /* Warna latar tabel */
            color: black; /* Warna teks */
            
        }
        .th, .td {
            padding: 8 !important;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #696969; /* Warna header */
        }
        img {
            max-width: 200px;
            height: auto;
        }

        .bdr{
            border-radius: 6px !important;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Halaman Gallery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php
                        session_start();
                        if(!isset($_SESSION['userid'])){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php
                        } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="album.php">Album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="foto.php">Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Halaman Gallery</h1>

        <!-- Table -->
        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Uploader</th>
                    <th>Jumlah Like</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
                    while($data=mysqli_fetch_array($sql)){
                ?>
                    <tr>
                        <td><?=$data['fotoid']?></td>
                        <td><?=$data['judulfoto']?></td>
                        <td><?=$data['deskripsifoto']?></td>
                        <td>
                            <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                        </td>
                        <td><?=$data['namalengkap']?></td>
                        <td>
                            <?php
                                $fotoid=$data['fotoid'];
                                $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($sql2);
                            ?>
                        </td>
                        <td>
                            <a href="like.php?fotoid=<?=$data['fotoid']?>" class="btn btn-primary">Like</a>
                            <a href="komentar.php?fotoid=<?=$data['fotoid']?>" class="btn btn-secondary">Komentar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery (place them at the end of the document for faster page loading) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

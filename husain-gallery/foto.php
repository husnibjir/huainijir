<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS Kustom */
        body {
            padding: 20px;
            background-color: #f8f9fa; /* Warna latar belakang */
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-bottom: 20px;
            color: #007bff; /* Warna teks */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            display: inline;
            margin-right: 10px;
        }
        form table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        form table td {
            padding: 8px;
        }
        form table input[type="text"],
        form table input[type="file"],
        form table select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-top: 4px;
        }
        form table input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            border: 1px solid #dee2e6;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        table img {
            max-width: 200px;
            height: auto;
        }
        .btn {
            padding: 6px 12px;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Halaman Foto</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsifoto"></td>
                </tr>
                <tr>
                    <td>Lokasi File</td>
                    <td><input type="file" name="lokasifile"></td>
                </tr>
                <tr>
                    <td>Album</td>
                    <td>
                        <select name="albumid">
                        <?php
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data=mysqli_fetch_array($sql)){
                        ?>
                                <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                        <?php
                            }
                        ?>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Unggah</th>
                    <th>Lokasi File</th>
                    <th>Album</th>
                    <th>Disukai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
                while($data=mysqli_fetch_array($sql)){
            ?>
                    <tr>
                        <td><?=$data['fotoid']?></td>
                        <td><?=$data['judulfoto']?></td>
                        <td><?=$data['deskripsifoto']?></td>
                        <td><?=$data['tanggalunggah']?></td>
                        <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                        </td>
                        <td><?=$data['namaalbum']?></td>
                        <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                        </td>
                        <td>
                            <a href="hapus_album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger">Hapus</a>
                            <a href="edit_album.php?albumid=<?=$data['albumid']?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
               

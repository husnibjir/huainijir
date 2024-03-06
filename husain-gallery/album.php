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
    <title>Halaman Album</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS Kustom */
        body {
            padding: 100px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            display: inline;
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: blue;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Halaman Album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php" class="btn btn-primary">Home</a></li>
        <li><a href="album.php" class="btn btn-primary">Album</a></li>
        <li><a href="foto.php" class="btn btn-primary">Foto</a></li>
        <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
    </ul>

    <form action="tambah_album.php" method="post">
        <div class="form-group">
            <label for="namaalbum">Nama Album</label>
            <input type="text" class="form-control" id="namaalbum" name="namaalbum">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                while($data=mysqli_fetch_array($sql)){
            ?>
                    <tr>
                        <td><?=$data['albumid']?></td>
                        <td><?=$data['namaalbum']?></td>
                        <td><?=$data['deskripsi']?></td>
                        <td><?=$data['tanggaldibuat']?></td>
                        <td>
                            <a href="hapus_album.php?albumid=<?=$data['albumid']?>" class="btn btn-danger">Hapus</a>
                            <a href="edit_album.php?albumid=<?=$data['albumid']?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>

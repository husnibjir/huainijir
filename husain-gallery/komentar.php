<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa; /* Warna latar belakang */
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
        form table input[type="file"] {
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
    </style>
</head>
<body>
    <h1>Halaman Komentar</h1>
  
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Komentar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "koneksi.php";
                
                $sql=mysqli_query($conn,"select * from komentarfoto,user where komentarfoto.userid=user.userid");
                while($data=mysqli_fetch_array($sql)){
            ?>
                <tr>
                    <td><?=$data['komentarid']?></td>
                    <td><?=$data['namalengkap']?></td>
                    <td><?=$data['isikomentar']?></td>
                    <td><?=$data['tanggalkomentar']?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>

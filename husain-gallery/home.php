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
    <title>Halaman Landing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS Kustom */
        body {
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Halaman Landing</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>

        <h2>Daftar Pengguna</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>User1</td>
                    <td>user1@example.com</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>User2</td>
                    <td>user2@example.com</td>
                </tr>
                <!-- Tambahkan data dari database di sini -->
            </tbody>
        </table>
    </div>
</body>
</html>

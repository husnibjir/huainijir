<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS Kustom */
        body {
            background-color: #2ecc71; /* Warna hijau tosca */
        }
        .container {
            margin-top: 100px;
            max-width: 400px;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #007bff; /* Warna biru */
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff; /* Warna biru */
            border-color: #007bff; /* Warna biru */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Warna biru lebih tua saat hover */
            border-color: #0056b3; /* Warna biru lebih tua saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Halaman Login</h1>
        <form action="proses_login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>

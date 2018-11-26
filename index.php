<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
    require 'functions.php';
    $mahasiswa=query("SELECT * FROM mahasiswa");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari button
    if(isset($_POST["cari"]))
    {
        // cari line 10 adalah function cari dan keyword adalah name dari inputan text
        $mahasiswa=cari($_POST["keyword"]);
    }
?>

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <title>Daftar Mahasiswa</title>
    </head>
    <body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Halaman Utama</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./tambah_data.php">Tambah Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./registrasi.php">Registrasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
        </li>
    </ul>
        <h1><center>Daftar Mahasiswa</h1>
        <div class="container">      
        <table class="table table-grey">
        <h1>Daftar Mahasiswa</h1>
    
    <form action="" method="POST">
        <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali inputan pada saat page di reload-->
        <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada textbox -->
        <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">

        <button type="submit" name=cari>Cari</button>
    </form>
    <br>

        <a href="tambah_data.php">Tambah Data Mahasiswa</a>
        <table border="1" cellpadding="10" cellspacing="0">
        <h1> Daftar Mahasiswa </h1>

        <a href="logout.php"> Logout </a>
        <a href="tambah_data.php">Tambah Data Mahasiswa </a>
        <br><br>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php $i=1 ?>
        <?php foreach($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td><img src="img/<?php echo $row["Gambar"]; ?>" alt="" scrset="" width="100" height="100"></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
        </table>        
    </body>
</html>
<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
    require 'functions.php';
    //cek apakah button submit sudah ditekan aatau belum
    if(isset($_POST['submit']))
    {
          //cek isi dari post menggunakan vardump
         // var_dump($_POST);
          //var_dump($_FILES);
          //die();

        if(tambah($_POST)>0)
        {

            echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='index.php';
            </script>

            ";
        }else{
            echo "
            <script>
                alert('Data Gagal Disimpan');
                document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" id="Nama" required>
        </li>
        <li>
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" id="Nim" required>
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" name="Email" id="Email" required>
        </li>
        <li>
            <label for="Jurusan">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan" required>
        </li>
        <li>
            <label for="Gambar">Gambar</label>
            <input type="file" name="Gambar" id="Gambar" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>
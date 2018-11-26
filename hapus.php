<?php
session_start();

if (!isset($_SESSION["login"])) 
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
require 'functions.php';

$id=$_GET["id"];

if(hapus($id)>0)
{
    echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href='index.php';
    </script>

    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus');
        document.location.href='index.php';
    </script>";
    echo "<br>";
    echo mysqli_error($conn);
}
?>
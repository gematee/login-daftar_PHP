<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        require ("koneksi.php");
        session_start();
        @$id =  $_SESSION['id'];
        $ambil_data = mysqli_query($koneksi,"select * from user where id='$id'");
        $data = mysqli_fetch_array($ambil_data);
        @$nama = $data['nama'];

        include "header.php"; 
        include "navleft.php";
    @$id =  $_SESSION['id'];
    $ambil_data = mysqli_query($koneksi,"select * from user where id='$id'");
    $data = mysqli_fetch_array($ambil_data);
    @$nama = $data['nama'];
?>
<div class="container">
    <?php 
          @$level = $data["level"];
        if ($level == "akses_admin") {
            echo 
            "<div class='butright'>
            <a href='tambahbuku.php'>Tambah</a>
            </div>";
        }
        $ambil_buku = mysqli_query($koneksi, "select* from buku where kategori='fiksi'");
    
        while($data_buku = mysqli_fetch_array($ambil_buku)):
        ?>
    <div class="wrap">
    <img src="<?php echo $data_buku['gambar'];?>" alt="buku" style="width:200px; height:300px; float:left">
    <table>
        <tr>
            <td>Kode Buku :<?php echo $data_buku['id_buku']?></td>
        </tr>
        <tr>
            <td>Judul Buku : <?php echo $data_buku['judul']?></td>
        </tr>
        <tr>
            <td>Pengarang :<?php echo $data_buku['pengarang']?></td>
        </tr>
        <tr>
            <td>Harga :<?php echo $data_buku['harga']?></td>
        </tr>
    </table>
    <?php 
        @$level = $data["level"];
        if ($level == "akses_admin") {
            echo "<div class='butright'>
            <a href='editbuku.php'>Edit</a>
            <a href='hapusbuku.php'>Hapus</a>
            </div>";
        } else if($level == "akses_user") {
            echo "<div class='butright'>
            <a href='belibuku.php'>Beli</a>
            </div>";
        } 
    ?>
    </div>
    <?php 
            endwhile;
        ?>
</div>
</body>
</html>
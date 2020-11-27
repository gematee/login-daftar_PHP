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
    ?>
    <div class="editbuku">
    <form action="#" method="post" enctype="multipart/form-data" class="datamain">
        <br><h1 align="center">Edit Buku</h1>
        <label for="judul">Judul Buku</label>
        <input type="text" name="judul" id="judul"> <br>
        <label for="pengarang">Pengarang</label>
        <input type="text" name="pengarang" id="pengarang"><br>
        <label for="harga">Harga Buku</label>
        <input type="text" name="harga" id="harga"><br>
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori">
            <option value="fiksi">Fiksi</option>
            <option value="nonfiksi">Non Fiksi</option>
            <option value="pelajaran">Pelajaran</option>
        </select><br>
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar"><br>
        <input type="submit" value="Edit" name="editbuku">
    </form>
    </div>
    <?php 
        if (isset($_POST['editbuku'])) {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $harga = $_POST['harga'];
            $kategori = $_POST['kategori'];
            $nama_foto = $_FILES['gambar']['name'];
            $temp_file = $_FILES['gambar']['tmp_name'];
            $lokasi = "images/buku/";
            $gambar = $lokasi.$nama_foto;

            if ($nama_foto==""){
                $query_ubah = mysqli_query($koneksi, "update buku set judul='$judul', gambar='$gambar', pengarang='$pengarang', harga='$harga', kategori='$kategori' where id_buku='$id'");
                if ($query_ubah) {
                    echo "<script>alert('Berhasil diubah!')
                    window.location.replace('index.php');
                    </script>";
                } else {
                    echo "<script>alert('Gagal diubah!')</script>";
                }
              }else {
                move_uploaded_file($temp_file,$lokasi.$nama_foto);
    
                $query_ubah = mysqli_query($koneksi, "update buku set judul='$judul', gambar='$gambar', pengarang='$pengarang', harga='$harga', kategori='$kategori' where id_buku='$id'");
                if ($query_ubah) {
                    echo "<script>alert('Berhasil diubah!')
                    window.location.replace('index.php');
                    </script>";
                } else {
                    echo "<script>alert('Gagal diubah!')</script>";
                }
              }
        }
    ?>
</body>
</html>
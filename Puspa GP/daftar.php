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
?>
    <div class="card">
        <div class="from">
      <form action="#" method="post" enctype="multipart/form-data">
            <h2>Daftar</h2><br>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" style="height:25px; width:160px;"><br>
            <label for="jenkel">Jenis Kelamin</label>
            <select name="jenkel" id="jenkel">
                <option value="wanita">Wanita</option>
                <option value="pria">Pria</option>
            </select><br> 
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" style="height:25px; width:160px;"><br>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" style="height:25px; width:160px;"><br>
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="akses_admin">Admin</option>
                <option value="akses_user">User</option>
            </select><br>
            <label for="gmb">Photo</label>
            <input type="file" name="gmb"><br><br>
            <input type="submit" name="submit" value="Daftar" style="width:80px; height:30px; color:#ffd5cd; background-color: #706897"><br><br>
            Sudah punya akun? Silahkan <a href="login.php">login!</a> 
      </form>
      </div>
    </div>
    <?php
        if (isset($_POST['submit'])) {
                $nama_foto = $_FILES['gmb']['name'];
                $temp_file = $_FILES['gmb']['tmp_name']; 
                $nama   = $_POST['nama'];
                $jenkel = $_POST['jenkel'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $level = $_POST['level'];
                $lokasi = "images/foto/";
                $lokasi_gambar = $lokasi.$nama_foto;

                $cek_user = mysqli_query($koneksi,"select * from user where username='$username'");
                if (mysqli_num_rows($cek_user) == 1) {
                    echo "<script>alert('User sudah ada, Silahkan buat Username lain!')</script>";
                }else {
                    move_uploaded_file($temp_file,$lokasi_gambar);
                    $add = mysqli_query($koneksi,"insert into user (nama,jenkel,email,username,password,level,foto) values ('$nama','$jenkel','$email','$username','$pass','$level','$lokasi_gambar')");
                    if($add == true) {
                        echo "<script>alert('Data Berhasil Disimpan')</script>";
                    } else {
                        die("gagal menyimpan");
                    }
                    }
                }
    ?>
</body>
</html>
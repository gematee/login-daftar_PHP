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
    <div class="edituser">
        <br>
        <h1 align="center" style="color:#424874">Edit User</h1>
        <div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama"><br>
      <label for="jenkel">Gender</label>
      <select name="jenkel" id="jenkel">
          <option value="Wanita">Wanita</option>
          <option value="Pria">Pria</option>
      </select><br>
      <label for="email">Email</label>
      <input type="text" name="email" id="email"><br>
      <label for="username">Username</label>
      <input type="text" name="username" id="username"><br>
      <label for="password">Password</label>
      <input type="password" name="password" id="password"><br>
      <label for="level">Level</label>
            <select name="level" id="level">
                <option value="akses_admin">Admin</option>
                <option value="akses_user">User</option>
            </select><br>
            <label for="gmb">Photo</label>
            <input type="file" name="gmb"><br><br>
      <input type="submit" name="edituser" value="Edit"> 
    </form>
    </div>
    </div>
   <?php
        if (isset($_POST['edituser'])) {
                $nama_foto = $_FILES['gmb']['name'];
                $temp_file = $_FILES['gmb']['tmp_name']; 
                $nama   = $_POST['nama'];
                $jenkel = $_POST['jenkel'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $level = $_POST['level'];
                $lokasi = "images/foto/";
                $lokasi_gambar = $lokasi.$nama_foto;

                if ($nama_foto==""){
                    $query_ubah = mysqli_query($koneksi, "update user set nama='$nama', jenkel='$jenkel', email='$email', username='$username', password='$password', level='$level' where id='$id'");
                    if ($query_ubah) {
                        echo "<script>alert('Berhasil diubah!')
                        window.location.replace('datauser.php');
                        </script>";
                    } else {
                        echo "<script>alert('Gagal diubah!')</script>";
                    }
                  }else {
                    move_uploaded_file($temp_file,$lokasi.$nama_foto);
        
                    $query_ubah = mysqli_query($koneksi, "update user set foto='$lokasi_gambar', nama='$nama', jenkel='$jenkel', email='$email', username='$username', password='$password', level='$level' where id='$id'");
                    if ($query_ubah) {
                        echo "<script>alert('Berhasil diubah!')
                        window.location.replace('datauser.php');
                        </script>";
                    } else {
                        echo "<script>alert('Gagal diubah!')</script>";
                    }
                  }
                }
    ?>
</body>
</html>
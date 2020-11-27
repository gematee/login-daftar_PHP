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
    $id = $_SESSION['id'];
    $ambil_data = mysqli_query($koneksi,"select * from user where id='$id'");
    $data = mysqli_fetch_assoc($ambil_data);
    $admin = $data['level'];
    if ($admin == 1) {
        echo "<script>
            alert('Halaman ini hanya boleh diakses oleh Admin, Silahkan login kembali');
            window.location.replace('index.php');
        </script>";
    }

        include "header.php";
        include "navleft.php";
        $query = mysqli_query($koneksi,"select* from user");
    ?>
    <div class="mainuser">
    <h1 align="center">Data User</h1>
    <p align="center">Jumlah User :
             <?php 
                $jumlah = mysqli_num_rows($query);
                echo $jumlah;
             ?>
    </p><br>
    <table id="tableuser">
        <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jenkel</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Edit/Hapus</th>
        </tr>
        <?php 
            while($data_user = mysqli_fetch_array($query)):
        ?>
        <tr>
             <td>
               <img src="<?= $data_user['foto']?>" alt="foto" width="100px" >
            </td>
            <td>
                <?= $data_user['nama']?>
            </td>
            <td>
                <?= $data_user['jenkel']?>
            </td>
            <td>
                <?= $data_user['email']?>
            </td>
            <td>
                <?= $data_user['username']?>
            </td>
            <td>
                <?= $data_user['password']?>
            </td>
            <td>
                <?= $data_user['level']?>
            </td>
            <td>
              <a href="edituser.php?id_edit=<?=$data_user['id']?>">Edit</a>
               <a href="hapususer.php?id_hapus=<?=$data_user['id']?>" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php 
            endwhile;
        ?>
    </table><br>
    </div>
    <?php
         include "footer.php";
    ?>
</body>
</html>
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
    <div class="datamain">
    <div class="maindata">
        <br><p>Selamat Datang, 
            <?php
                echo $data['nama']
            ?>
        </p><br>
         <p align="center" style="font-size: 24px;">Berikut Data Diri Anda :</p>
         </div>
     <table class="tabeldata">
            <tr>
            <td style="text-align: center" colspan="3">
               <img src="<?= $data_user['foto']?>" alt="foto" width="200px" >
            </td>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data['nama']?></td>
            </tr>
            <tr>
                <td>Jenkel</td>
                <td>:</td>
                <td><?php echo $data['jenkel']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $data['email']?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $data['username']?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?php echo $data['password']?></td>
            </tr>
      </table>
      <br><br>
     </div>
      <?php 
        include "footer.php";
      ?>
</body>
</html>
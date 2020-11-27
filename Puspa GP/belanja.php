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
        $id = $_SESSION["id"];
        $ambil_data = mysqli_query($koneksi,"select* from user where id='$id'");
        $data = mysqli_fetch_array($ambil_data);
        include "header.php";
        include "navleft.php";
    ?>
    <div class="maincart">
        <table id="tablecart">
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>

            <?php
             

                $sqlSemua     = "select* from belanja where id='$id'";
                $querySemua   = mysqli_query($koneksi, $sqlSemua);

                $total        = 0;

                while ($semua = mysqli_fetch_array($querySemua)) {
                    $total   += $semua["harga"];
            ?>

                    <tr>
                        <td><?= $semua["id_buku"]; ?></td>
                        <td><?= $semua["judul"]; ?></td>
                        <td><?= $semua["pengarang"]; ?></td>
                        <td>Rp.<?= $semua["harga"]; ?></td>
                        <td><a href="hapuspesanan.php?pesanan=<?= $semua['pesanan']; ?>">Hapus</a></td>
                    </tr>
            <?php
                 }      
             ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total yang harus dibayar:</td>
                <td>Rp.<?php echo $total; ?></td>
                <td></td>
            </tr>
        </table>
        <a href="#"><p align="center">Check Out</p></a> <br>
    </div>
   


<script>
document.getElementById('belanja');
</script>
</body>
</html>
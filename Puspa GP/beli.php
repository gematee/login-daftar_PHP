<?php 
    if(isset($_GET['id_buku'])) {
        session_start();

            if(isset($_SESSION['id']))  {
                if($_SESSION['id'] == 1) {
                    echo "<script>alert('anda harus masuk sebagai user');
                    history.back();
                    </script>
                    ";
                }else{
                    $id_buku = $_GET['id_buku'];
                    $id   = $_SESSION['id'];

                    require_once('koneksi.php');

                    $sqlbuku        = "select * from buku where id_buku='$id_buku'";
                    $querybuku      = mysqli_query($koneksi,$sqlbuku);
                    $buku           = mysqli_fetch_array($querybuku);
                    $judul          = $buku['judul'];
                    $pengarang      = $buku['pengarang'];
                    $harga          = $buku['harga'];


                    $sqlbeli        ="insert into belanja (id_buku, judul, pengarang, harga, id)
                                      value ('$id_buku','$judul','$pengarang','$harga','$id')";
                    $querybeli      = mysqli_query($koneksi,$sqlbeli);

                    header('location:belanja.php');
                    
                }
                }else{
                    echo"
                    <script>alert('Anda harus masuk terlebih dahulu');
                    history.back();
                    </script>";
                }               
            }
            
?>

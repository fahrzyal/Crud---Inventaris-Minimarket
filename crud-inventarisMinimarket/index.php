<?php
    //Pemanggilan koneksi
    require_once("function/koneksi.php");

    //Jika tombol simpan diklik
    if(isset($_POST['bsimpan'])) {

        //Uji apakah data akan di edit atau disimpan baru
        if(isset($_GET['hal'])== "edit") {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE tb_muhammadalfachrozi_brg SET
                                                    Id_brg = '$_POST[tid]',
                                                    Nama_brg = '$_POST[tnama]',
                                                    Stok = '$_POST[tstok]',
                                                    Jenis_brg = '$_POST[tjenis]',
                                                    Tgl_expired = '$_POST[ttanggal_expired]'
                                            WHERE Id_brg = '$_GET[id]'
                                            ");
         //Uji edit data jika sukses
         if($edit) {
            echo "<script>
                alert('Edit data Sukses');
                document.location='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Edit data Gagal');
                document.location='index.php';
            </script>";
        }
                                        
        } else {
            //Data akan disimpan baru
        $simpan = mysqli_query($koneksi, " INSERT INTO tb_muhammadalfachrozi_brg (Id_brg, Nama_brg, Stok, Jenis_brg, Tgl_expired)
                                            VALUE ('$_POST[tid]',
                                                    '$_POST[tnama]',
                                                    '$_POST[tstok]',
                                                    '$_POST[tjenis]',
                                                    '$_POST[ttanggal_expired]')
                                            ");

        //Uji simpan data jika sukses
        if($simpan) {
            echo "<script>
            alert('Simpan data Sukses');
            document.location='index.php';
            </script>";
        } else {
            echo "<script>
            alert('Simpan data Gagal');
            document.location='index.php';
            </script>";
        }
                } 

    }

//Deklarasi variabel untuk menampung data yang akan diedit
$vid = "";
$vnama = "";
$vstok = "";
$vjenis = "";
$vtanggal_expired = "";

//Uji jika tombol edit atau hapus diklik
if (isset($_GET['hal'])) {

    //Uji jika edit data
    if($_GET['hal'] == "edit") {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_muhammadalfachrozi_brg WHERE Id_brg = '$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if($data) {
            //jika data ditemukan maka data ditampung ke dalam variabel
            $vid = $data['Id_brg'];
            $vnama = $data['Nama_brg'];
            $vstok = $data['Stok'];
            $vjenis = $data['Jenis_brg'];
            $vtanggal_expired = $data['Tgl_expired'];
        }
    } else if ($_GET['hal'] == "hapus") {
        //Persiapan hapus data 
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_muhammadalfachrozi_brg WHERE Id_brg = '$_GET[id]'");
        //Uji simpan data jika sukses
        if($hapus) {
            echo "<script>
            alert('Hapus data Sukses');
            document.location='index.php';
            </script>";
        } else {
            echo "<script>
            alert('Hapus data Gagal');
            document.location='index.php';
            </script>";
        }
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Toko Indomerit</title>
    <link rel="stylesheet" href="asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--BoxIcons-->    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
  <body>
    <!--Awal Header--> 
        <div class="header">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <span class="project-name" style="font-weight: 700; font-size: 17px;"><span style="color: #D30000; font-size:25px"><i class='bx bx-store'></i>
                    </span>  <span><span style="color: #1E90FF;">Indo</span><span style="color: #FFD700; background-color:#1E90FF; border-color:#D30000; border-radius:3px">merit's</span> Store Management</span>
                </div>
            </nav>
        </div>
    <!--Akhir Header-->
      
        <div class="row" style="width: 95rem; height:81.9vh">
            <div class="col-md-12" style="display: flex;" >
            <!--Awal CARD Form Input-->
                <div class="card col-md-4" style="height:fit-content; border:none; width:20rem; margin-left:1rem" id="form-input">
                        <div class="card-body">
                            <!--Awal form-->
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label class="form-label">ID Barang</label>
                                    <input type="text"  name="tid" value="<?= $vid?>" class="form-control" placeholder="Masukan Kode Barang">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Barang</label>
                                    <input type="text"  name="tnama" value="<?= $vnama?>" class="form-control" placeholder="Masukan Nama Barang">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Stok</label>
                                            <input type="number"  name="tstok" value="<?= $vstok?>" class="form-control" placeholder="ex: 100">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Barang</label>
                                        
                                            <select class="form-select" name="tjenis">
                                                <option value="<?= $vjenis?>"><?= $vjenis?>-- Pilih Jenis --</option>
                                                <option value="Pecah Belah">Pecah Belah</option>
                                                <option value="Mainan">Mainan</option>
                                                <option value="Parabotan">Parabotan</option>
                                                <option value="Mebel">Mebel</option>
                                                <option value="Makanan">Makanan</option>    
                                                <option value="Lainnya">Lainnya</option>    
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal expired</label>
                                            <input type="date"  name="ttanggal_expired" value="<?= $vtanggal_expired?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn-simpan" name="bsimpan" type="submit" style="background-color: #1E90FF;" >Simpan</button>
                                        <button class="btn-hapus" name="bhapus" type="reset" style="background-color:#FFD700;">Hapus</button>
                                    </div>

                                    <div class="sidomar">
                                        <img src="asset/img/domar-flip.png" alt="" width="380px" style="margin-left: -60px">
                                    </div>
                                </div>
                            </form>
                            <!--Akhir Form-->
                        </div>
                </div>
             <!--Akhir CARD Form Input-->

            <!--Awal CARD Table-->
                    <div class="card-body" style="margin-left:1.5rem">
                        <div class="col-md-6 mx-auto" style="width:max-content;">
                            <form action="" method="POST" >
                                
                                <div class="input-group mb-3">
                                    <input type="text" style="border-color: #D30000;" class="form-search" name="tcari" value="<?= @$_POST['tcari']?>" placeholder="     Masukan kata kunci!">
                                       <div class="btn-search">
                                        <button class="btn-cari" name="bcari" type="submit" style="background-color: #1E90FF;"><i class='bx bx-search'></i></button>
                                        <button class="btn-riset" name="breset" type="submit" style="background-color:#FFD700;">Riset</button> 
                                       </div>
                                </div>
                                        
                            </form>
                        </div>
                        <table class="table table-hover" border="1">
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Jenis Barang</th>
                                <th>Tanggal Expired</th>
                                <th>Aksi</th>
                            </tr>

                            <?php
                                //Persiapan menampilkan data
                                $no = 1;

                                //Untuk pencarian data
                                //Jika tombol cari diklik
                                if(isset($_POST['bcari'])) {
                                    //tanpilkan data yang dicari
                                    $keyword = $_POST['tcari'];
                                    $q = "SELECT * FROM tb_muhammadalfachrozi_brg WHERE Id_brg LIKE '%$keyword%' OR Nama_brg LIKE '%$keyword%' 
                                    ORDER BY Id_brg desc";
                                } else {
                                    $q =  "SELECT * FROM tb_muhammadalfachrozi_brg order by Id_brg asc";
                                }

                                $tampil = mysqli_query($koneksi, $q);
                                while($data = mysqli_fetch_array($tampil)) : 
                            ?>

                            <tr>
                                <td><?= $data['Id_brg'] ?></td>
                                <td><?= $data['Nama_brg'] ?></td>
                                <td><?= $data['Stok'] ?> </td>
                                <td><?= $data['Jenis_brg'] ?></td>
                                <td><?= $data['Tgl_expired'] ?></td>
                                <td>
                                    <a href="index.php?hal=edit&id=<?= $data['Id_brg'] ?>" class="btn btn-warning" id="btn-edit"><i class='bx bxs-edit'></i></a>
                                    <a href="index.php?hal=hapus&id=<?= $data['Id_brg'] ?>" 
                                    class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan hapus data ini?')"><i class='bx bx-trash' ></i></a>
                                </td>
                            </tr>

                             <?php endwhile; ?>       

                        </table>
                    </div>
            <!--Awal CARD Table-->
            </div>
        </div>
    
    <footer>
        <div class="footer">
            &copy; Copyright 2024 | Muhammad Al Fachrozi
        </div>
    </footer>

    <!--Bootstrap-->       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
   
  </body>
</html>
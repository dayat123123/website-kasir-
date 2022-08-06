<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Transaksi
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Transaksi</li>
     
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Transaksi</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Kasir</label>
                    <select name="kategori" class="form-control" required="required">
                      <option value="semua">- Semua Kasir -</option>
                      <?php 
                      $kategori = mysqli_query($koneksi,"SELECT * FROM users where user_level ='kasir'");
                      while($k = mysqli_fetch_array($kategori)){
                        ?>
                        <option <?php if(isset($_GET['nama'])){ if($_GET['nama'] == $k['id']){echo "selected='selected'";}} ?>  value="<?php echo $k['id']; ?>"><?php echo $k['nama']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pemasukan & Pegeluaran</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $kategori = $_GET['kategori'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                    <tr>
                      <th>NAMA KASIR</th>
                      <th>:</th>
                      <td>
                        <?php 
                        if($kategori == "semua"){
                          echo "SEMUA KASIR";
                        }else{
                          $k = mysqli_query($koneksi,"select * from users where id='$kategori'");
                          $kk = mysqli_fetch_assoc($k);
                          echo $kk['nama'];
                        }
                        ?>

                      </td>
                    </tr>
                  </table>
                  
                </div>
              </div>
              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&kategori=<?php echo $kategori ?> " target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th width="2%">NO</th>
                      <th width="7%">NO. TRANSAKSI</th>
                      <th width="12%">TANGGAL</th>
                      <th width="15%">NAMA KASIR</th>
                      <th width="10%">OPSI</th>
                      
                      <th width="10%">TOTAL</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $total=0;
                    if($kategori == "semua"){
                      $data = mysqli_query($koneksi,"SELECT *from transaksi where date(tanggal_waktu)>='$tgl_dari' and date(tanggal_waktu)<='$tgl_sampai'");
                    }
                    elseif($kategori != "semua"){
                      $data = mysqli_query($koneksi,"SELECT transaksi.nomor, transaksi.tanggal_waktu, transaksi.total, transaksi.nama, transaksi.id_transaksi, users.nama, users.id from  transaksi  join users on transaksi.nama = users.nama where date(transaksi.tanggal_waktu)>='$tgl_dari' and date(transaksi.tanggal_waktu)<='$tgl_sampai' and users.id = $kategori");
                    }
                    // else{
                    //   $data = mysqli_query($koneksi,"SELECT transaksi.tanggal, bank.bank_nama, kategori.kategori, transaksi.keterangan, transaksi.jenis, transaksi.nominal  from transaksi join bank on transaksi.bank_id = bank.bank_id join kategori on transaksi.kategori_id = kategori.kategori_id where kategori.kategori=kategori.kategori and bank.bank_nama = bank.bank_nama  and date(transaksi.tanggal)>='$tgl_dari' and date(transaksi.tanggal)<='$tgl_sampai'");
                    // }

                    while($d = mysqli_fetch_array($data)){
                      $total += $d['total'];
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td> <?= $d['nomor'] ?> </td>
                        <td><?= $d['tanggal_waktu'] ?></td>
                        <td><?=$d['nama']?></td>
                        <td>
                          <a href="unduh_struk.php?idtrx=<?=$d['id_transaksi']?>" class="btn btn-primary">Lihat</a>
                      </td>

                        
                        <td><?php echo "Rp. ".number_format($d['total'])." ,-"; ?></td>                       
                       
                      </tr>
                      <?php 
                    }
                    ?>

                    <tr>
                      <th colspan="5" class="text-right">TOTAL</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total)." ,-"; ?></td>
                    </tr>
                  </tbody>
                </table>



              </div>

              <?php 
            }else{
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            }
            ?>
          
          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
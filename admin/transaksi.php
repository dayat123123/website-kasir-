<?php include 'header.php'; 
include '../koneksi.php';
?>

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
          <h3 class="box-title">Data Transaksi</h3>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Berdasarkan Kasir</label>
                    <select name="kasir" class="form-control" required="required">
                      <option value="semua">- Semua kasir -</option>
                      <?php 
                      $kategori = mysqli_query($koneksi,"SELECT * FROM users where user_level = 'kasir'");
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
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
            
            <div class="btn-group pull-right">            
            </div>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" >
                <thead>
                  <tr>
                    <th width="2%">ID</th>
                    <th width="7%">NO. TRANSAKSI</th>
                    <th width="12%">TANGGAL</th>
                    <th width="20%">TOTAL</th>
                    <th width="15%">NAMA KASIR</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $view = $koneksi->query("SELECT * FROM transaksi");
                  $no=1;
                  while ($row = $view->fetch_array()) { ?>
                  <tr>
                    <td align="center"><?= $no++?></td>
                      <td> <?= $row['nomor'] ?> </td>
                      <td><?= $row['tanggal_waktu'] ?></td>
                      <td><?php echo "Rp. ".number_format($row['total'])." ,-"; ?></td>
                      <td><?=$row['nama']?></td>
                      <td>
                          <a href="unduh_struk.php?idtrx=<?=$row['id_transaksi']?>" class="btn btn-primary">Lihat</a>
                      </td>
                  </tr>
          
                  <?php }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>

</div>




<?php include 'footer.php'; ?>
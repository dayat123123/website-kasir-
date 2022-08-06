<?php include 'header.php'; 
include '../koneksi.php';
$nama = $_SESSION['nama']; 
$view = $koneksi->query("SELECT * FROM transaksi where nama = '$nama'");
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
            <div class="btn-group pull-right">            
            </div>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
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
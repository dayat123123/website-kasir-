<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Barang
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Barang</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
           
            <div class="btn-group pull-right">            
            </div>
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">ID</th>
                    <th width="12%">KODE BARANG BARANG</th>
                    <th width="30%">NAMA BARANG</th>
                    <th width="15%">HARGA</th>
                    <th width="10%">STOK</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM barang");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kode_barang']; ?></td>
                    
                      <td><?php echo $d['nama_barang']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['harga_barang'])." ,-"; ?></td>
                      <td><?php echo $d['stok']; ?></td>
                     
                    </tr>
                    <?php 
                  }
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
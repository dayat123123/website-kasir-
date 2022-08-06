<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_waktu = date('Y-m-d');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(total) as total_pemasukan FROM transaksi WHERE date(tanggal_waktu)= '$tanggal_waktu'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            date_default_timezone_set('Asia/Jakarta');
            $bulan = date('m');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(total) as total_pemasukan FROM transaksi WHERE month(tanggal_waktu)='$bulan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            date_default_timezone_set('Asia/Jakarta');
            $tahun = date('Y');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(total) as total_pemasukan FROM transaksi WHERE year(tanggal_waktu)='$tahun'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php 
            $pemasukan = mysqli_query($koneksi,"SELECT sum(total) as total_pemasukan FROM transaksi");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Seluruh Pemasukan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


   
 

</div>

 <!-- Main row -->
 <div class="row">

<!-- Left col -->
<section class="col-lg-8">

  <div class="nav-tabs-custom">

    <ul class="nav nav-tabs pull-right">
      <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
      <li class="active"><a href="#tab1" data-toggle="tab">Penjualan Toko Arsya</a></li>
      <li class="pull-left header">Grafik</li>
    </ul>

    <div class="tab-content" style="padding: 20px">

      <div class="chart tab-pane active" id="tab1">

        
        <h4 class="text-center">Grafik Data Penjualan Per <b>Bulan</b></h4>
        <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

        <br/>
        <br/>
        <br/>

        <h4 class="text-center">Grafik Data Penjualan Per <b>Tahun</b></h4>
        <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

      </div>
      <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
        b
      </div>
    </div>

  </div>

</section>
<!-- /.Left col -->


<section class="col-lg-4">


  <!-- Calendar -->
  <div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <i class="fa fa-calendar"></i>
      <h3 class="box-title">Kalender</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <!--The calendar -->
      <div id="calendar" style="width: 100%"></div>
    </div>
    <!-- /.box-body -->
  </div>
  

</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->










</section>

</div>

















<?php include 'footer.php'; ?>
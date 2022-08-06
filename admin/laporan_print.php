<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Aplikasi Kasir</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 </head>
 <body>
<?php 
include('../koneksi.php')
?>
 	<center>
 		<h4>LAPORAN</h4>
 		<h4>APLIKASI KASIR RASYA</h4>
 	</center>


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
 						<td><?php echo date('d-m-Y',strtotime($tgl_dari)); ?></td>
 					</tr>
 					<tr>
 						<th>SAMPAI TANGGAL</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl_sampai)); ?></td>
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

		 <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th width="2%">NO</th>
                      <th width="7%">NO. TRANSAKSI</th>
                      <th width="12%">TANGGAL</th>
                      <th width="12%">NAMA KASIR</th>
                    
                      
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
                    }else{
                        $data = mysqli_query($koneksi,"SELECT transaksi.nomor, transaksi.tanggal_waktu, transaksi.total, transaksi.nama, transaksi.id_transaksi, users.nama, users.id from  transaksi  join users on transaksi.nama = users.nama where date(transaksi.tanggal_waktu)>='$tgl_dari' and date(transaksi.tanggal_waktu)<='$tgl_sampai' and users.id = $kategori");
                    }
                    while($d = mysqli_fetch_array($data)){

                        $total += $d['total'];
                      ?>
                    
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td> <?= $d['nomor'] ?> </td>
                        <td><?= $d['tanggal_waktu'] ?></td>
                        <td><?=$d['nama']?></td>
                        <td><?php echo "Rp. ".number_format($d['total'])." ,-"; ?></td>                       
                       
                      </tr>
                      <?php 
                    }
                    ?>
                    
                    <tr>
                      <th colspan="3" class="text-right">TOTAL KESELURUHAN </th>
                      <td colspan="3" class="text-center text-bold text-white bg-primary"><?php echo " Rp. ".number_format($total)." ,-"; ?></td>
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


 	<script>

 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>

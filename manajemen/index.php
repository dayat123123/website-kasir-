<?php include 'header.php'; 

include '../koneksi.php';
$barang = mysqli_query($koneksi, 'SELECT * FROM barang');
// print_r($_SESSION);

$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += ($value['harga_barang'] * $value['qty']) - $value['diskon'];
    }
}

?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Mesin Hitung
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mesin Hitung</li>
    </ol>
  </section><br>
  <div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="keranjang_reset.php">Reset Keranjang</a> |
			<a href="riwayat.php">Riwayat Transaksi</a>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-8">
			<form method="post" action="keranjang_act.php">
				<div class="form-group">
					<input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang"  required autofocus>
				</div>
			</form>
			<br>
			<form method="post" action="keranjang_update.php">
			<table class="table table-bordered">
				<tr>
					<th>Nama</th>
					<th>Harga</th>
					<th>Qty</th>
					<th>Sub Total</th>
					<th>OPSI</th>
				</tr>
				<?php if (isset($_SESSION['cart'])): ?>
				<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
					<tr>
						<td>
							<?=$value['nama_barang']?>
						</td>
						<td align="right"><?=number_format($value['harga_barang'])?></td>
						<td class="col-md-2">
							<input type="number" name="qty[<?=$key?>]" value="<?=$value['qty']?>" class="form-control">
						</td>
						<td align="right"><?=number_format(($value['qty'] * $value['harga_barang']))?></td>
						<td><a href="keranjang_hapus.php?id_barang=<?=$value['id_barang']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
				<?php } ?>
				<?php endif; ?>
			</table>    
			<button type="submit" class="btn btn-success">Perbaruhi</button>
			</form>
		</div>
		<div class="col-md-4">
			<h3>Total Rp. <?=number_format($sum)?></h3>
			<form action="transaksi_act.php" method="POST">
				<input type="hidden" name="total" value="<?=$sum?>">
			<div class="form-group">
				<label>Bayar</label>
				<input type="text" id="bayar" name="bayar" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Selesai</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

	//inisialisasi inputan
	var bayar = document.getElementById('bayar');

	bayar.addEventListener('keyup', function (e) {
        bayar.value = formatRupiah(this.value, 'Rp. ');
        // harga = cleanRupiah(dengan_rupiah.value);
        // calculate(harga,service.value);
    });

    //generate dari inputan angka menjadi format rupiah

	function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    //generate dari inputan rupiah menjadi angka

    function cleanRupiah(rupiah) {
        var clean = rupiah.replace(/\D/g, '');
        return clean;
        // console.log(clean);
    }
</script>

  <section class="content">

    

  </section>

</div>

















<?php include 'footer.php'; ?>
<?php
include '../koneksi.php';
session_start();

$id_trx = $_GET['idtrx'];

$data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_trx'");
$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($koneksi, "SELECT transaksi_detail.*, barang.nama_barang, barang.harga_barang FROM `transaksi_detail` INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Kasir Selesai</title>
	<style type="text/css">
		body{
			color: #a7a7a7;
		}
	</style>
</head>
<body>
	<div align="center">
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<th>Toko RASYA <br>
					Jl Bagan Batu Dekat Rumah Arya <br>
				Bagan Batu, Riau, 202020</th>
			</tr>
			<tr align="center"><td><hr></td></tr>
			<tr>
				<td>#<?=$trx['nomor']?> | <?=date('d-m-Y H:i:s', strtotime($trx['tanggal_waktu']))?> <?=$trx['nama']?></td>
			</tr>
			<tr><td><hr></td></tr>
		</table>
		<table width="500" border="0" cellpadding="3" cellspacing="0">
			<?php while ($row = mysqli_fetch_array($detail)) { ?>
			<tr>
				<td valign="top">
					<?=$row['nama_barang']?>
					<?php if ($row['diskon'] > 0): ?>
					<br>
					<small>Diskon</small>
					<?php endif; ?>
				</td>
				<td valign="top"><?=$row['qty']?></td>
				<td  valign="top" align="right"><?=number_format($row['harga_barang'])?></td>
				<td valign="top" align="right">
					<?=number_format($row['total'])?>
					<?php if ($row['diskon'] > 0): ?>
					<br>
					<small>-<?=number_format($row['diskon'])?></small>
					<?php endif; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Total</td>
				<td align="right"><?=number_format($trx['total'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Bayar</td>
				<td align="right"><?=number_format($trx['bayar'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Kembali</td>
				<td align="right"><?=number_format($trx['kembali'])?></td>
			</tr>
		</table>
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr><td><hr></td></tr>
			<tr>
				<th>Terimkasih, Selamat Belanja Kembali</th>
			</tr>
			<tr>
				<th>===== Layanan Konsumen ====</th>
			</tr>
			<tr>
				<th>SMS/CALL 082388623670 </th>
			</tr>
            <!-- <tr>
            <th><p align="center"><a href="index.php" style="color: #bdbdbd">Kembali Ke Kasir</a></p></th>
            </tr> -->
		</table><br>
       
	</div>
</body>
</html>
<?php 
header("location:unduh_struk.php?idtrx=".$id_trx);

?>
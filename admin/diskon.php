<?php include 'header.php'; 
$view = $koneksi->query('SELECT * FROM barang');?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Barang Diskon
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Barang Diskon</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data Barang Diskon</h3>
            <div class="btn-group pull-right">            
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Diskon &nbsp;&nbsp;&nbsp;
              </button>
            </div>
          </div>
          <div class="box-body">
<!-- tambah data bank dimulai dari sini -->
<form action="add_diskon.php" method="post">
              <div class="modal fade" id="exampleModal" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Diskon</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Barang Yang Di Diskon</label>
	                    <select name="barang_id" id="" class="form-control">
                        <?php while ($row = $view->fetch_array()): ?>
                        <option value="<?=$row['id_barang']?>"><?=$row['nama_barang']?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Qty (Jumlah)</label>
                        <input type="text" name="qty" class="form-control" placeholder="Batas Nominal">
                    </div>
                    <div class="form-group">
                        <label>Potongan</label>
                        <input type="text" name="potongan" class="form-control" placeholder="Jumlah Potongan">
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
<!-- tambah data bank sampai sini -->

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th width="12%">NAMA BARANG</th>
                    <th width="15%">QTY</th>
                    <th width="10%">POTONGAN</th>
                    <th width="10%">OPSI</th>
                   
			
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT disbarang.*, barang.nama_barang as barang FROM disbarang inner join barang ON disbarang.barang_id=barang.id_barang");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['barang']; ?></td>
                    
                      <td><?php echo $d['qty']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['potongan'])." ,-"; ?></td>
                      <td>    
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_diskon_<?php echo $d['id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>


                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_diskon_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="diskon_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
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
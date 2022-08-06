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
            <h3 class="box-title">Data Barang</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Barang &nbsp;&nbsp;&nbsp;
              </button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cetak_barcode.php?nama_barang=<?php echo $nama_barang ?>&kode_barang=<?php echo $kode_barang ?>&id_barang=<?php echo $id_barang ?> &stok=<?php echo $stok ?>" 
target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> &nbsp CETAK BARCODE</a>
            </div>
          </div>
          <div class="box-body">
<!-- tambah data bank dimulai dari sini -->
            <!-- Modal -->
            <form action="barang_act.php" method="post">
              <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang .." required autofocus>
                      </div>

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" required="required" class="form-control" placeholder="Nama Barang .."required>
                      </div>

                      <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" name="harga_barang" class="form-control" placeholder="Harga Barang .." required>
                      </div>

                      <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" required="required" class="form-control" placeholder="Stok .." required>
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
                    <th width="1%">ID</th>
                    <th width="12%">KODE BARANG BARANG</th>
                    <th width="30%">NAMA BARANG</th>
                    <th width="15%">HARGA</th>
                    <th width="10%">STOK</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM barang order by nama_barang asc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kode_barang']; ?></td>
                    
                      <td><?php echo $d['nama_barang']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['harga_barang'])." ,-"; ?></td>
                      <td><?php echo $d['stok']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['id_barang'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['id_barang'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>

                        <form action="barang_update.php" method="post">
                          <div class="modal fade" id="edit_barang_<?php echo $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Barang</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Kode Barang</label>
                                    <input type="hidden" name="kode_barang" required="required" class="form-control" placeholder="Kode Barang .." value="<?php echo $d['kode_barang']; ?>">
                                    <input type="text" name="kode_barang" style="width:100%" required="required" disabled class="form-control" placeholder="Kode Barang .." value="<?php echo $d['kode_barang']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama Barang</label>
                                    <input type="hidden" name="id_barang" required="required" class="form-control" placeholder="Nama Barang .." value="<?php echo $d['id_barang']; ?>">
                                    <input type="text" name="nama_barang" style="width:100%" required="required" class="form-control" placeholder="Nama Barang .." value="<?php echo $d['nama_barang']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Harga Barang</label>
                                    <input type="text" name="harga_barang" style="width:100%" class="form-control" placeholder="Harga Barang .." value="<?php echo $d['harga_barang']; ?>">
                                  </div>

                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>STOK</label>
                                    <input type="text" name="stok" style="width:100%" class="form-control" placeholder="Stok .." value="<?php echo $d['stok']; ?>">
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

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_barang_<?php echo $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="barang_hapus.php?id=<?php echo $d['id_barang'] ?>" class="btn btn-primary">Hapus</a>
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
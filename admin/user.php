<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data User
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data User</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah User
              </button>
            </div>
          </div>
          <div class="box-body">
<!-- tambah data bank dimulai dari sini -->
            <!-- Modal -->
            <form action="user_act.php" method="post">
              <div class="modal fade" id="exampleModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama" required="required" class="form-control" placeholder="Nama user ..">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user_username" class="form-control" placeholder="Username ..">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="Password ..">
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
                    <th width="12%">NAMA USER</th>
                    <th width="12%">USERNAME</th>
                    <th width="30%">PASSWORD</th>
                    <th width="15%">ROLE</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM users");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                    
                      <td><?php echo $d['user_username']; ?></td>
                      <td><?php echo $d['user_password']; ?></td>
                      <td><?php echo $d['user_level']; ?></td>
                      <td>    
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_user_<?php echo $d['id'] ?>">
                          <i class="fa fa-cog"></i>
                        </button>
                        <?php 
                        if($d['user_level'] != 'administrator'){
                          ?>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user_<?php echo $d['id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php
                        }
                        ?>

                        <form action="user_update.php" method="post">
                          <div class="modal fade" id="edit_user_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">Edit Users</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Nama</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="id .." value="<?php echo $d['id']; ?>">
                                    <input type="text" name="nama" style="width:100%" required="required"  class="form-control" placeholder="Nama .." value="<?php echo $d['nama']; ?>">
                                  </div>
                                
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Username</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="id .." value="<?php echo $d['id']; ?>">
                                    <input type="text" name="user_username" style="width:100%" class="form-control" placeholder="Username .." value="<?php echo $d['user_username']; ?>">
                                  </div>
                                
                                 
                                  <div class="form-group" style="margin-bottom:15px;width: 100%">
                                    <label>Password</label>
                                    <input type="password" name="user_password" style="width:100%" class="form-control" placeholder="Password .." value="<?php echo $d['user_password']; ?>">
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
                        <div class="modal fade" id="hapus_user_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="user_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-primary">Hapus</a>
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
  </section>

</div>




<?php include 'footer.php'; ?>
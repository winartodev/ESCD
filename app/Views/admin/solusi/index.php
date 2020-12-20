<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $second_title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $first_title; ?></a></li>
                        <li class="breadcrumb-item active"><?= $second_title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#tambahSolusi"><i class="fa fa-plus"></i> Tambah Solusi</a>

                    <!-- Menampilkan Flashdata jika berhasil di simpan di ubah atau di hapus -->
                    <?php if(session()->getFlashdata('pesan')):?>
                        <div class="alert alert-<?=session()->getFlashdata('alert-type')?> alert-dismissible fade show mt-3" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- End Menampilkan Flashdata jika berhasil di simpan di ubah atau di hapus  -->

                    <!-- Menampilkan pesan jika solusi sudah tersedia atau solusi belum di isi  -->
                    <?php if($validation->hasError('solusi')):?>
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong><?= $validation->getError('solusi'); ?> <?= old('solusi'); ?> Sudah Ada !</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif;?>
                    <!-- End Menampilkan pesan jika solusi sudah tersedia atau solusi belum di isi -->

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Data Solusi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Solusi</th>
                                        <th>Solusi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan Seluruh Data Solusi -->
                                    <?php foreach($data_solusi as $solusi): ?>
                                    <tr>
                                        <td><?= $solusi['id_solusi']; ?></td>
                                        <td><?= word_limiter(wordwrap($solusi['solusi'], 130, "<br />\n"),50); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-view-solusi" data-toggle="modal" data-target="#viewSolusi" data-id_solusi="<?= $solusi['id_solusi']; ?>" data-solusi="<?= $solusi['solusi']; ?>"><i class="fa fa-eye"></i> View</a>
                                            <a class="btn btn-warning btn-edit-solusi" data-toggle="modal" data-target="#editSolusi" data-id_solusi="<?= $solusi['id_solusi']; ?>" data-solusi="<?= $solusi['solusi']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="btn btn-danger btn-delete-solusi" data-toggle="modal" data-target="#deleteSolusi" data-id_solusi="<?= $solusi['id_solusi']; ?>" data-solusi="<?= $solusi['solusi']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- End Menampilkan Seluruh Data Solusi -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

   <!-- Modal Tambah Solusi-->
   <form action="/admin/solusi/save" method="post">
        <div class="modal fade" id="tambahSolusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Solusi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Solusi</label>
                            <input type="text" class="form-control" name="id_solusi" value="<?= $number; ?>" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Solusi</label>
                            <textarea id="summernote1" class="form-control" name="solusi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Tambah solusi-->

    <!-- Modal View Solusi-->
    <div class="modal fade" id="viewSolusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solusi <span class="id_solusi"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th scope="row">ID Solusi</th>
                            <td><p class="id_solusi"></p></td>
                        </tr>
                        <tr>
                            <th scope="row">Solusi</th>
                            <td><p class="solusi"></p></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View solusi-->

     <!-- Modal Edit Solusi-->
   <form action="/admin/solusi/update" method="post">
        <div class="modal fade" id="editSolusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Solusi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Solusi</label>
                            <input type="text" class="form-control id_solusi" name="id_solusi" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Solusi</label>
                            <textarea id="summernote2" class="solusi" name="solusi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Edit solusi-->

    <!-- Modal Delete Solusi-->
    <form action="/admin/solusi/delete" method="post">
        <div class="modal fade" id="deleteSolusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Solusi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">Delete Solusi  <span class="text_id_solusi"></span> ?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_solusi" class="id_solusi">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete Solusi-->

    

<?= $this->endSection(); ?>
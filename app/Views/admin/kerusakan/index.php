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
                    <a class="btn btn-primary" data-toggle="modal" data-target="#tambahKerusakan"><i class="fa fa-plus"></i> Tambah Kerusakan</a>

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

                    <!-- Menampilkan pesan jika Kerusakan sudah tersedia atau Kerusakan belum di isi  -->
                    <?php if($validation->hasError('kerusakan')):?>
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong><?= $validation->getError('kerusakan'); ?> <?= old('kerusakan'); ?> Sudah Ada !</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif;?>
                    <!-- End Menampilkan pesan jika Kerusakan sudah tersedia atau Kerusakan belum di isi -->

                    <!-- Menampilkan pesan jika Solusi sudah tersedia atau Kerusakan belum di isi  -->
                    <?php if($validation->hasError('id_solusi')):?>
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong><?= $validation->getError('id_solusi'); ?> <?= old('id_solusi'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif;?>
                    <!-- End Menampilkan pesan jika Solusi sudah tersedia atau Kerusakan belum di isi -->

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Data Kerusakan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Kerusakan</th>
                                        <th>Kerusakan</th>
                                        <th>Solusi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan Seluruh Data Kerusakan -->
                                    <?php foreach($data_kerusakan as $kerusakan): ?>
                                    <tr>
                                        <td><?= $kerusakan['id_kerusakan']; ?></td>
                                        <td><?= $kerusakan['kerusakan']; ?></td>
                                        <td><?= word_limiter(wordwrap($kerusakan['solusi'], 100, "<br />\n"),25); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-view-kerusakan" data-toggle="modal" data-target="#viewKerusakan" data-id_kerusakan="<?= $kerusakan['id_kerusakan']; ?>" data-kerusakan="<?= $kerusakan['kerusakan']; ?>"  data-id_solusi="<?= $kerusakan['id_solusi']; ?>" data-solusi="<?= $kerusakan['solusi']; ?>"><i class="fa fa-eye"></i> View</a>
                                            <a class="btn btn-warning btn-edit-kerusakan" data-toggle="modal" data-target="#editKerusakan" data-id_kerusakan="<?= $kerusakan['id_kerusakan']; ?>" data-kerusakan="<?= $kerusakan['kerusakan']; ?>"  data-id_solusi="<?= $kerusakan['id_solusi']; ?>"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="btn btn-danger btn-delete-kerusakan" data-toggle="modal" data-target="#deleteKerusakan" data-id_kerusakan="<?= $kerusakan['id_kerusakan']; ?>" data-kerusakan="<?= $kerusakan['kerusakan']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- End Menampilkan Seluruh Data Kerusakan -->
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

    <!-- Modal View Solusi-->
    <div class="modal fade" id="viewKerusakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kerusakan <span class="kerusakan"></span> (<span class="id_kerusakan"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th scope="row">ID Kerusakan</th>
                            <td><p class="id_kerusakan"></p></td>
                        </tr>
                        <tr>
                            <th scope="row">Kerusakan</th>
                            <td><p class="kerusakan"></p></td>
                        </tr>
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
    <!-- End View Kerusakan-->

     <!-- Modal Tambah Kerusakan-->
   <form action="/admin/kerusakan/save" method="post">
        <div class="modal fade" id="tambahKerusakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kerusakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Kerusakan</label>
                            <input type="text" class="form-control" name="id_kerusakan" value="<?= $number; ?>" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Kerusakan</label>
                            <input type="text" class="form-control" name="kerusakan">
                        </div>
                        
                        <div class="form-group">
                            <label>Solusi</label>
                            <select class="form-control option_tambah_solusi" style="width: 100%;"  name="id_solusi">
                                <option value="" selected="selected">Pilih Solusi</option>
                                <?php foreach($data_Solusi as $solusi):?>
                                    <option value="<?= $solusi['id_solusi']; ?>"><?= $solusi['id_solusi']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
    <!-- End Modal Tambah Kerusakan-->

     <!-- Modal Edit Kerusakan-->
   <form action="/admin/kerusakan/update" method="post">
        <div class="modal fade" id="editKerusakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kerusakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Kerusakan</label>
                            <input type="text" class="form-control id_kerusakan" name="id_kerusakan" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Kerusakan</label>
                            <input type="text" class="form-control kerusakan" name="kerusakan">
                        </div>
                        
                        <div class="form-group">
                            <label>Solusi</label>
                            <select class="form-control option_edit_solusi" style="width: 100%;" name="id_solusi">
                                <option value="">Pilih Solusi</option>
                                <?php foreach($data_Solusi as $solusi):?>
                                    <option value="<?= $solusi['id_solusi']; ?>"><?= $solusi['id_solusi']; ?></option>
                                <?php endforeach; ?>
                            </select>
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

    <!-- Modal Delete Kerusakan-->
   <form action="/admin/kerusakan/delete" method="post">
        <div class="modal fade" id="deleteKerusakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Kerusakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                       <h5 class="text-center">Hapus Kerusakan  <span class="kerusakan"></span> ?</h5>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control id_kerusakan" name="id_kerusakan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete solusi-->

<?= $this->endSection(); ?>
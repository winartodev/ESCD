<?= $this->extend('layout/admin/template'); ?>
<?= $this->section('content')?>
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
                    <a class="btn btn-primary" data-toggle="modal" data-target="#tambahGejala"><i class="fa fa-plus"></i> Tambah Gejala</a>
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

                    <!-- Menampilkan pesan jika gejala sudah tersedia atau gejala belum di isi  -->
                    <?php if($validation->hasError('gejala')):?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong><?= $validation->getError('gejala'); ?> <?= old('gejala'); ?> Sudah Ada !</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif;?>
                    <!-- End Menampilkan pesan jika gejala sudah tersedia atau gejala belum di isi -->
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Data Gejala</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Gejala</th>
                                        <th>Gejala</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan Seluruh Data Gejala -->
                                    <?php foreach($data_gejala as $gejala): ?>
                                    <tr>
                                        <td><?= $gejala['id_gejala']; ?></td>
                                        <td><?= $gejala['gejala']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-edit" data-id_gejala="<?= $gejala['id_gejala'];?>" data-gejala="<?= $gejala['gejala'];?>"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="btn btn-danger btn-delete" data-id_gejala="<?= $gejala['id_gejala'];?>" data-gejala="<?= $gejala['gejala'];?>" data-toggle="modal" data-target="#deleteGejala"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- End Menampilkan Seluruh Data Gejala -->
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

    <!-- Modal Tambah Gejala-->
    <form action="/admin/gejala/save" method="post">
        <div class="modal fade" id="tambahGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Gejala</label>
                            <input type="text" class="form-control" name="id_gejala" value="<?= $number; ?>" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Gejala</label>
                            <input type="text" class="form-control" id="gejala" name="gejala" name="gejala" placeholder="Gejala">
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
    <!-- End Modal Tambah Gejala-->

    <!-- Modal Edit Gejala-->
    <form action="/admin/gejala/update" method="post">
        <div class="modal fade" id="editGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>ID Gejala</label>
                            <input type="text" class="form-control id_gejala" name="id_gejala" placeholder="ID Gejala" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Gejala</label>
                            <input type="text" class="form-control gejala" name="gejala" placeholder="Gejala">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Edit Gejala-->

    <!-- Modal Delete Gejala-->
    <form action="/admin/gejala/delete" method="post">
        <div class="modal fade" id="deleteGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center">Delete Gejala?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_gejala" class="id_gejala">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete Gejala-->

    <?= $this->endSection(); ?>
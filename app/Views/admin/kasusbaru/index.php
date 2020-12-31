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
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Data Kerusakan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Kasus</th>
                                        <th>Gejala</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan Seluruh Data Kerusakan -->
                                    <?php 
                                        foreach($data_kasusBaru  as $kasusBaru):
                                        $row = $modelKasusBaru->jumlahGejala($kasusBaru['kode_kasus']) + 1;
                                    ?>
                                    <tr>
                                        <td rowspan="<?= $row; ?>">
                                            <?= $kasusBaru['kode_kasus']; ?>
                                            <?php if($row > 2): ?>
                                                <div class="mt-4">
                                                    <!-- <a class="btn btn-sm btn-success btn-delete-basiskasus" ><i class="fa fa-save"></i> Simpan <?= $kasusBaru['kode_kasus'] ?></a> -->
                                                    <a class="btn btn-sm btn-danger btn-delete-kasusbaru"data-toggle="modal" data-target="#deletelaKasusBaru" 
                                                    data-kode_kasus="<?= $kasusBaru['kode_kasus'] ?>" ><i class="fa fa-trash"></i> Delete <?= $kasusBaru['kode_kasus'] ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <?php foreach($data_gejala as $gejala):?>
                                            <?php if($kasusBaru['kode_kasus'] == $gejala['kode_kasus']):?>
                                                <tr>
                                                    <td><?= $gejala['gejala']; ?></td>
                                                    <td><?= $gejala['bobot']; ?></td>
                                                    <td>
                                                        <a class="btn btn-warning btn-edit-gejala-kasusbaru" data-toggle="modal" data-target="#editGejalaKasusBaru" 
                                                        data-id_kasus_Baru="<?= $gejala['id_kasus_baru'] ?>" 
                                                        data-kode_kasus="<?= $gejala['kode_kasus'] ?>" 
                                                        data-id_gejala="<?= $gejala['id_gejala'] ?>" 
                                                        data-gejala="<?= $gejala['gejala'] ?>" 
                                                        data-bobot="<?= $gejala['bobot'] ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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

<!-- Modal Edit Gejala-->
<form action="/admin/KasusBaru/update" method="post">
    <div class="modal fade" id="editGejalaKasusBaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="hidden" class="form-control id_kasus_baru" name="id_kasus_baru"
                            readonly="readonly">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control kode_kasus" name="kode_kasus"
                            readonly="readonly">
                    </div>

                    <div class="form-group">
                    <label>Gejala</label>
                        <input type="hidden" class="form-control id_gejala" name="id_gejala"
                        readonly="readonly">
                    <input type="text" class="form-control gejala" name="gejala"
                        readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label>Bobot</label>
                        <select class="form-control bobot"  style="width: 100%;" name="bobot">
                            <option value="0">0</option>
                            <option value="0.25">0.25</option>
                            <option value="0.75">0.75</option>
                            <option value="1">1</option>
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
<!-- End Modal Edit Gejala-->

<form action="/admin/KasusBaru/deleteKasusBaru" method="post">
    <div class="modal fade" id="deletelaKasusBaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Kasus Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" class="form-control kode_kasus" name="kode_kasus"
                            readonly="readonly">
                    </div>

                    <div class="modal-body">
                        <h5 class="text-center">Delete Kasus Baru <span class="kasus_baru text-capitalize"></span> ?</h5>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Delete Edit Gejala-->

<?= $this->endSection(); ?>
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
                    <a class="btn btn-primary" data-toggle="modal" data-target="#tambahBasisKasus"><i class="fa fa-plus"></i> Tambah Basis Kasus</a>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Data Basis Kasus</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='table_basisKasus' class="table table-bordered table-striped order-column" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Kasus</th>
                                        <th>Kerusakan</th>
                                        <th>Gejala</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan Seluruh Data BasisKasus -->
                                    <?php 
                                    $no = 1;
                                    foreach($data_basisKasus as $basisKasus):
                                        $row = $basisKasusModel->createRowSpan($basisKasus['kode_kasus']) + 1;?>
                                    <tr>
                                        <td rowspan="<?= $row; ?>"><?= $no++; ?></td>
                                        <td rowspan="<?= $row; ?>"><?= $basisKasus['kode_kasus']; ?></td>
                                        <td rowspan="<?= $row; ?>">
                                            <?= $basisKasus['kerusakan']; ?>
                                            <?php if($row > 2): ?>
                                            <div class="mt-4">
                                            <a class="btn btn-sm btn-success btn-tambah-gejala-basiskasus" data-toggle="modal" data-target="#tambahGejalaBasisKasus" data-kode_kasus="<?= $basisKasus['kode_kasus'] ?>" data-id_kerusakan="<?= $basisKasus['id_kerusakan'] ?>" data-kerusakan="<?= $basisKasus['kerusakan'] ?>"><i class="fa fa-plus"></i> Tambah Gejala</a>
                                                    <a class="btn btn-sm btn-danger btn-delete-basiskasus" data-toggle="modal" data-target="#hapusBasisKasus" data-kode_kasus="<?= $basisKasus['kode_kasus'] ?>" data-kerusakan="<?= $basisKasus['kerusakan'] ?>"><i class="fa fa-trash"></i> Delete Basis Kasus</a>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                        <?php foreach($data_gejala as $gejala):?>
                                            <?php if($basisKasus['kode_kasus'] == $gejala['kode_kasus']):?>
                                                <tr>
                                                    <td><?= $gejala['gejala']; ?></td>
                                                    <td><?= $gejala['bobot']; ?></td>
                                                    <td>
                                                        <a class="btn btn-warning btn-edit-gejala-basiskasus"  data-toggle="modal" data-target="#editGejalaBasisKasus" 
                                                            data-id_basiskasus="<?= $gejala['id_basis_kasus'] ?>" 
                                                            data-kode_kasus="<?= $gejala['kode_kasus'] ?>" 
                                                            data-id_kerusakan="<?= $gejala['id_kerusakan'] ?>" 
                                                            data-id_gejala="<?= $gejala['id_gejala'] ?>" 
                                                            data-bobot="<?= $gejala['bobot'] ?>"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-danger btn-delete-gejala-basiskasus" data-toggle="modal" data-target="#hapusGejalaBasisKasus" 
                                                            data-id_basiskasus="<?= $gejala['id_basis_kasus'] ?>" data-gejala="<?= $gejala['gejala'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- End Menampilkan Seluruh Data BasisKasus -->
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
 <form action="/admin/BasisKasus/save" method="post">
     <div class="modal fade" id="tambahBasisKasus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Basis Kasus</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">

                     <div class="form-group">
                         <label>Kode Kasus</label>
                         <input type="text" class="form-control" name="kode_kasus" value="<?= $number; ?>"
                             readonly="readonly">
                     </div>

                     <div class="form-group">
                         <label>Kerusakan</label>
                         <select class="form-control option_kerusakan" style="width: 100%;" name="id_kerusakan">
                             <option value="">Pilih Kerusakan </option>
                             <?php foreach($data_kerusakan as $kerusakan):?>
                             <option value="<?= $kerusakan['id_kerusakan']; ?>"><?= $kerusakan['kerusakan']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>

                     <div class="form-group">
                         <label>Gejala</label>
                         <select class="form-control option_gejala"  multiple="multiple" style="width: 100%;" name="id_gejala[]">
                             <option value="">Pilih Gejala </option>
                             <?php foreach($all_gejala as $gejala):?>
                             <option value="<?= $gejala['id_gejala']; ?>"><?= $gejala['gejala']; ?></option>
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
 <!-- End Modal Tambah Gejala-->

 <!-- Modal Edit Gejala-->
 <form action="/admin/BasisKasus/update" method="post">
     <div class="modal fade" id="editGejalaBasisKasus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                         <input type="hidden" class="form-control id_basiskasus" name="id_basiskasus"
                             readonly="readonly">
                     </div>

                     <div class="form-group">
                         <input type="hidden" class="form-control kode_kasus" name="kode_kasus"
                             readonly="readonly">
                     </div>

                     <div class="form-group">
                         <input type="hidden" class="form-control id_kerusakan" name="id_kerusakan"
                             readonly="readonly">
                     </div>

                     <div class="form-group">
                         <label>Gejala</label>
                         <select class="form-control option_edit_gejala" style="width: 100%;" name="id_gejala">
                             <option value="">Pilih Gejala </option>
                             <?php foreach($all_gejala as $gejala):?>
                             <option value="<?= $gejala['id_gejala']; ?>"><?= $gejala['gejala']; ?></option>
                             <?php endforeach; ?>
                         </select>
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

 <!-- Modal Delete Gejala-->
 <form action="/admin/BasisKasus/delete" method="post">
     <div class="modal fade" id="hapusGejalaBasisKasus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                 <h5 class="text-center">Delete Gejala <span class="gejala text-capitalize"></span> ?</h5>

                 </div>
                 <div class="modal-footer">

                    <input type="hidden" class="form-control id_basiskasus" name="id_basiskasus"
                            readonly="readonly">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                     <button type="submit" class="btn btn-primary">Yes</button>
                 </div>
             </div>
         </div>
     </div>
 </form>
 <!-- End Modal Delete Gejala-->

 <!-- Modal Tambah Gejala Basis Kasus-->
 <form action="/admin/BasisKasus/save" method="post">
     <div class="modal fade" id="tambahGejalaBasisKasus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                         <label>Kode Kasus</label>
                         <input type="text" class="form-control kode_kasus" name="kode_kasus" readonly="readonly">
                     </div>

                     <div class="form-group">
                        <label>Kerusakan</label>
                        <input type="hidden" class="form-control id_kerusakan" name="id_kerusakan" readonly="readonly">
                        <input type="text" class="form-control kerusakan" readonly="readonly">
                     </div>

                     <div class="form-group">
                         <label>Gejala</label>
                         <select class="form-control option_gejala"  multiple="multiple" style="width: 100%;" name="id_gejala[]">
                             <option value="">Pilih Gejala </option>
                             <?php foreach($all_gejala as $gejala):?>
                             <option value="<?= $gejala['id_gejala']; ?>"><?= $gejala['gejala']; ?></option>
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
 <!-- End Modal Tambah Gejala-->

 <!-- Modal Delete Basis Kasus-->
 <form action="/admin/BasisKasus/deleteBasisKasus" method="post">
     <div class="modal fade" id="hapusBasisKasus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete Basis Kasus</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                    <h5 class="text-center">Delete Kerusakan <span class="kerusakan text-capitalize"></span> ?</h5>
                 </div>
                 <div class="modal-footer">
                    <input type="hidden" class="form-control kode_kasus" name="kode_kasus"
                            readonly="readonly">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                     <button type="submit" class="btn btn-primary">Yes</button>
                 </div>
             </div>
         </div>
     </div>
 </form>
 <!-- End Modal Delete Basis Kasus-->

</div>
<?= $this->endSection(); ?>
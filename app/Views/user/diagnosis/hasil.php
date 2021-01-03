<?= $this->extend('layout/user/template'); ?>
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
                            <h3 class="card-title">Gejala Yang Di Pilih</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($data_diagnosis as $diagnosis):?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="text-center"><?= $diagnosis['gejala']; ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Diagnosis Dari Gejala yang Di Pilih</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Kasus</th>
                                        <th>Kerusakan</th>
                                        <th>Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($data_basisKasus as $basisKasus):
                                            $jumlahGejala = $model_basisKasus->createRowSpan($basisKasus['kode_kasus']);
                                            $gejalaCocok = 0;
                                            $nilaiSimilaritas = 0;
                                            $totalBobot = $model_basisKasus->total_bobot($basisKasus['kode_kasus'])[0]->bobot;
                                            foreach ($data_kasusLama as $kasuslama) {
                                                foreach ($data_kasusBaru as $kasusBaru) {
                                                    if ($basisKasus['kode_kasus'] == $kasuslama['kode_kasus']) {
                                                        if($kasuslama['id_gejala'] == $kasusBaru['id_gejala']) {
                                                            $gejalaCocok += 1;
                                                            $nilaiSimilaritas += (($kasuslama['bobot'] * 1) / $totalBobot);
                                                            $kerusakan[] = $basisKasus['kerusakan']; 
                                                        }
                                                    }
                                                }
                                            }
                                    ?>
                                    <tr>
                                        <td><?= $basisKasus['kode_kasus']; ?></td>
                                        <td><?= $basisKasus['kerusakan']; ?></td>
                                        <td><?= round($nilaiSimilaritas * 100, 2), '%' ; ?></td>
                                        <?php $data[][]= ['nilai'=>$nilaiSimilaritas, 'kerusakan'=>$basisKasus['kerusakan'], 'kode_kasus'=>$basisKasus['kode_kasus'], 'id_kerusakan'=>$basisKasus['solusi']];?> 
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="alert" role="alert">
                    <?php if (max($data)[0]['nilai'] != 0):?>
                        <h5 class="font-weight-bold text-center text-dark">  Dari Hasil Diagnosis anda mengalami kerusakan <span class="text-danger"><?= max($data)[0]['kerusakan']; ?></span> pada kasus <span class="text-danger"><?= max($data)[0]['kode_kasus']; ?></span> dengan nilai persentase kemiripan <span class="text-danger"><?= round(max($data)[0]['nilai'] * 100, 2), '%' ; ?></span></h5>
                        <h5 class="font-weight-bold text-center text-dark mt-4">  Solusi : </h5>
                        <h5 ><?= max($data)[0]['id_kerusakan']; ?></h5>
                    <?php else: ?>
                        <h6 class="font-weight-bold text-center text-danger">Hasil Diagnosis Tidak Di Temukan Kemiripan</h6>
                    <?php endif; ?>
                    </div> 
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><a class="btn btn-success d-block" data-toggle="modal" data-target="#saveKasusBaru"> <i class="fa fa-save"></i> Simpan Kasus Baru</a></td>
                                <td><a class="btn btn-danger d-block" data-toggle="modal" data-target="#deleteKasusBaru"> <i class="fa fa-trash"></i> Delete Kasus</a></td>
                                <td><a class="btn btn-info d-block perhitugnan"> <i class="fa fa-info-circle"></i> Perhitungan Kasus</a></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card mt-3" id="hasil-perhitungan">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Perhitungan Dari Gejala yang Di Pilih</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id='example2' class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Kasus</th>
                                        <th>Kerusakan</th>
                                        <th>Jumlah Gejala</th>
                                        <th>Gejala Cocok</th>
                                        <th>Bobot</th>
                                        <th>Perhitungan Kemiripan</th>
                                        <th>Persentase</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($data_basisKasus as $basisKasus):
                                            $jumlahGejala = $model_basisKasus->createRowSpan($basisKasus['kode_kasus']);
                                            $gejalaCocok = 0;
                                            $nilaiSimilaritas = 0;
                                            $jumlahBobotKasus = 0;
                                            $totalBobot = $model_basisKasus->total_bobot($basisKasus['kode_kasus'])[0]->bobot;
                                            foreach ($data_kasusLama as $kasuslama) {
                                                foreach ($data_kasusBaru as $kasusBaru) {
                                                    if ($basisKasus['kode_kasus'] == $kasuslama['kode_kasus']) {
                                                        if($kasuslama['id_gejala'] == $kasusBaru['id_gejala']) {
                                                            $gejalaCocok += 1;
                                                            $nilaiSimilaritas += (($kasuslama['bobot'] * 1) / $totalBobot);
                                                            $jumlahBobotKasus += $kasuslama['bobot'];
                                                            $kerusakan[] = $basisKasus['kerusakan']; 
                                                        }
                                                    }
                                                }
                                            }
                                    ?>
                                    <tr>
                                        <td><?= $basisKasus['kode_kasus']; ?></td>
                                        <td><?= $basisKasus['kerusakan']; ?></td>
                                        <td><?= $jumlahGejala; ?></td>
                                        <td><?= $gejalaCocok; ?></td>
                                        <td><?= $totalBobot; ?></td>
                                        <td><?= $jumlahBobotKasus.' / '.$totalBobot.' = '.$nilaiSimilaritas; ?></td>
                                        <td><?= round($nilaiSimilaritas * 100, 2), '%' ; ?></td>
                                        <?php $data[][]= ['nilai'=>$nilaiSimilaritas, 'kerusakan'=>$basisKasus['kerusakan'], 'kode_kasus'=>$basisKasus['kode_kasus']];?> 
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Modal Save Kasus Baru -->
    <div class="modal fade" id="saveKasusBaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Simpan Kasus Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/diagnosis/saveKasusBaru" method="post">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kode Kasus</label>
                            <input type="text" class="form-control" name="kode_kasus">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gejala</label>
                            <div class="form-check">
                                <?php
                                    $no = 1;
                                    foreach($data_diagnosis as $gejala):?>
                                    <input class="form-check-input" type="checkbox" value="<?= $gejala['id_gejala'] ?>" id="gejala" name="id_gejala[]" checked onclick="this.checked=!this.checked;">
                                    <label class="form-check-label" for="gejala">
                                        <?= $gejala['gejala']; ?>
                                    </label>
                                    <br>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal Delete Kasus Baru -->
     <div class="modal fade" id="deleteKasusBaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Kasus Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/diagnosis/delete" method="post">
                       
                       <h3 class="text-center">Delete Kasus ?</h3>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>
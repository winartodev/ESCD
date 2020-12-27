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
                            <h3 class="card-title">Data Gejala</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="/admin/diagnosis/save" method="POST">
                            <?php foreach($data_gejala as $gejala):?>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="<?= $gejala['id_gejala'] ?>" id="gejala" name="id_gejala[]">
                                <label class="form-check-label" for="gejala">
                                <?= $gejala['gejala']; ?>
                                </label>
                            </div>
                            <?php endforeach;?>
                            <button type="submit" class="btn btn-success mt-4 btn-cek-diagnosa" data-diagnosis="<?= $count; ?>"> <i class="fas fa-check"></i> Cek</button>
                            
                        </form>
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

  
   

<?= $this->endSection(); ?>
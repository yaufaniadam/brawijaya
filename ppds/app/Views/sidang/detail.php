<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <?php if (session('success')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <?php if (session('warning')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= session('warning'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 text-center">
                    <h1><?= $sidang->judul; ?></h1>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="text-center ml-auto mr-auto mt-3">
                            <div style="background-image: url('<?= base_url('images/profile/dummy.png'); ?>');width:200px;height:200px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;" class="ml-auto mr-auto">
                            </div>
                            <p class="mt-2"><b><?= $sidang->ppds; ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div style="border: solid #6C757D;border-width: 2px;" class="col-7 mr-auto ml-auto mt-3">
                        <p>Sidang dimulai pada : </p>
                        <div class="ml-4 mr-4 mb-4 mt-0">
                            <div class="col-12 text-center">
                                <h1 class><?= $sidang->jadwal_sidang; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 mr-auto ml-auto mt-5">
                        <div class="row">
                            <div class="mr-auto ml-auto text-center">
                                <p class="text-secondary"><?= $sidang->pj1; ?></p>
                                <h5>Penguji 1</h5>
                            </div>
                            <?php if ($sidang->jenis_tugas == 2) { ?>
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pj2; ?></p>
                                    <h5>Penguji 2</h5>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($sidang->jenis_tugas == 2) { ?>
                            <div class="row mt-5">
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pb1; ?></p>
                                    <h5>Pembimbing 1</h5>
                                </div>
                                <div class="mr-auto ml-auto text-center">
                                    <p class="text-secondary"><?= $sidang->pb2; ?></p>
                                    <h5>Pembimbing 2</h5>
                                </div>
                            </div>
                        <?php } ?>
                        <form action="<?= base_url('sidang/absen'); ?>" method="POST">
                            <input type="hidden" name="id_sidang" value="<?= $sidang->id; ?>">
                            <?php if (session('role') != 4) { ?>
                                <input type="submit" class="btn btn-flat btn-outline-dark mb-3" value="aktifkan qr-code">
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $('#dashboard').addClass('active');
</script>
<?= $this->endSection(); ?>
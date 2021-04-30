<?php helper('data_helper') ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="row">
        <!-- <div class="col-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="text-center">
                            <div style="background-image: url('<?= base_url('images/profile/dummy.png'); ?>');width:200px;height:200px;background-position:center center;background-size:100%;border-radius: 100%;background-repeat: no-repeat;" class="ml-auto mr-auto">
                            </div>
                            <p class="mt-2"><b><?= $spv->nama_lengkap; ?></b></p>
                        </div>
                        <div class="mt-3 ml-auto mr-auto">
                            <div class="form-group row">
                                <label class="col-sm-7 col-form-label">Stase</label>
                                <label class="col-sm-5 col-form-label text-right"><?= $spv->stase == 'temp' ? 'menunggu konfirmasi admin' : $spv->stase; ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-12 mt-5">
            <div class="col">
               
                <div class="card mb-4">
                    <div class="card-body pb-4">
                        <div class="row mr-1 mb-0">
                            <div class="col-md-7">
                                <h4 class="mt-2"><i class="ti-user"></i>&nbsp;<?= $spv->nama_lengkap; ?> </h4>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="col-sm-12 mt-4">
                                    <div id="headingOne">
                                        <h2 class="mb-0">
                                            <a href="#" class="btn btn-danger btn-block text-left" type="button" data-toggle="collapse" data-target="#detail" aria-expanded="true" aria-controls="detail">
                                                Detail Supervisor
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="detail" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                            <div id="headingOne">
                                                <table class="table">
                                                    <tr>
                                                        <th scope="col">Nama Lengkap</th>
                                                        <th scope="col"><?= $spv->nama_lengkap; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Usia</th>
                                                        <th scope="col"><?= $spv->usia; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Jenis Kelamin</th>
                                                        <th scope="col">
                                                            <?= $spv->jenis_kelamin == 'l' ? 'laki-laki' : 'perempuan'; ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">Alamat Asal</th>
                                                        <th scope="col"><?= $spv->alamat_asal; ?></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="headingOne">
                                        <h2 class="mb-0">
                                            <a href="#" class="btn btn-success btn-block text-left" type="button" data-toggle="collapse" data-target="#detail-spv" aria-expanded="true" aria-controls="detail-spv">
                                                PPDS Bimbingan
                                            </a>
                                        </h2>
                                    </div>
                                    <div id="detail-spv" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                            <div id="headingOne">
                                                <div class="data-tables datatable-dark">
                                                    <table id="dataTable3" class="table">
                                                        <thead class="text-capitalize">
                                                            <tr class="text-left">
                                                                <th style="width: 80%;">Nama Lengkap</th>
                                                                <th style="width: 10%;">Stase</th>
                                                                <th style="width: 10%;"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach (ppdsBimbingan($spv->id_spv) as $ppds) {
                                                            ?>
                                                                <tr class="text-left">
                                                                    <td>
                                                                        <?= $ppds['nama_lengkap']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $ppds['stase']; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="<?= base_url("admin/ppds/" . $ppds['id_ppds']); ?>" class="btn btn-flat btn-outline-success btn-xs"><span class="ti-eye"></span></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('data_table'); ?>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $(".tipe_btn").click(function() {
        getIdButton = this.id;
        $("#type_btn").val(getIdButton);
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>
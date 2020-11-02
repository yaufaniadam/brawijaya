<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div id="headingOne">
                            <h2 class="mb-0">
                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tahap 1
                                </a>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                <table class="table" style="border: solid #EAECEE;border-width: thin;">
                                    <thead>
                                        <tr style="background-color: #F8F9FB;">
                                            <th scope="col" style="width: 60%;">Stase</th>
                                            <th scope="col" style="width: 20%;">Tanggal Mulai</th>
                                            <th scope="col" style="width: 20%;">Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tahap_satu as $tahap_satu) { ?>
                                            <tr>
                                                <th><?= $tahap_satu['stase']; ?></th>
                                                <td><?= $tahap_satu['tanggal_mulai']; ?></td>
                                                <td><?= $tahap_satu['tanggal_selesai']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div id="headingTwo">
                            <h2 class="mb-0">
                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Tahap 2
                                </a>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                <table class="table" style="border: solid #EAECEE;border-width: thin;">
                                    <thead>
                                        <tr style="background-color: #F8F9FB;">
                                            <th scope="col" style="width: 60%;">Stase</th>
                                            <th scope="col" style="width: 20%;">Tanggal Mulai</th>
                                            <th scope="col" style="width: 20%;">Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tahap_dua as $tahap_dua) { ?>
                                            <tr>
                                                <th><?= $tahap_dua['stase']; ?></th>
                                                <td><?= $tahap_dua['tanggal_mulai']; ?></td>
                                                <td><?= $tahap_dua['tanggal_selesai']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div id="headingThree">
                            <h2 class="mb-0">
                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Tahap 3
                                </a>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                <table class="table" style="border: solid #EAECEE;border-width: thin;">
                                    <thead>
                                        <tr style="background-color: #F8F9FB;">
                                            <th scope="col" style="width: 60%;">Stase</th>
                                            <th scope="col" style="width: 20%;">Tanggal Mulai</th>
                                            <th scope="col" style="width: 20%;">Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tahap_tiga as $tahap_tiga) { ?>
                                            <tr>
                                                <th><?= $tahap_tiga['stase']; ?></th>
                                                <td><?= $tahap_tiga['tanggal_mulai']; ?></td>
                                                <td><?= $tahap_tiga['tanggal_selesai']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div id="headingFour">
                            <h2 class="mb-0">
                                <a href="#" class="btn btn-primary btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Tahap 4
                                </a>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body" style="border : solid #EFF1F2; border-top: none; border-bottom-left-radius: 5px; border-bottom-right-radius:5px;">
                                <table class="table" style="border: solid #EAECEE;border-width: thin;">
                                    <thead>
                                        <tr style="background-color: #F8F9FB;">
                                            <th scope="col" style="width: 60%;">Stase</th>
                                            <th scope="col" style="width: 20%;">Tanggal Mulai</th>
                                            <th scope="col" style="width: 20%;">Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tahap_empat as $tahap_empat) { ?>
                                            <tr>
                                                <th><?= $tahap_empat['stase']; ?></th>
                                                <td><?= $tahap_empat['tanggal_mulai']; ?></td>
                                                <td><?= $tahap_empat['tanggal_selesai']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
    $('#stase').addClass('active');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>
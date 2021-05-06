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

                <?php if (session('role') == 4) { ?>
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-flat btn-outline-dark btn-sm" href="<?= base_url('/logbook/tambah'); ?>">Tambah Logbook</a>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 mt-3">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable-export" class="text-center">
                            <thead class="bg-dark">
                                <tr>
                                    <th style="width: 30%;">Judul</th>
                                    <th style="width: 20%;">PPDS</th>
                                    <th style="width: 20%;">Stase</th>
                                    <th style="width: 20%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $logbook) { ?>
                                    <tr>
                                        <td><?= $logbook['judul']; ?></td>
                                        <td><?= $logbook['nama_lengkap']; ?></td>
                                        <td><?= $logbook['stase']; ?></td>
                                        <td>
                                            <!-- <a href="<?= base_url("logbook/" . $logbook['id_logbook']); ?>" class="btn btn-flat btn-outline-success btn-xs">
                                                <span class="ti-info"></span>
                                            </a> -->
                                            <a href="<?= base_url("ppds_logbook/" . $logbook['file']); ?>" class="btn btn-flat btn-outline-primary btn-xs">
                                                <span class="ti-download"></span>
                                            </a>
                                            <?php if ($logbook['id_ppds'] == session('user_id')) { ?>
                                                <form class="d-inline" action="<?= base_url('logbook/' . $logbook['id_logbook']); ?>" method="POST">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="" class="btn btn-flat btn-outline-danger btn-xs" onclick="return confirm('Hapus Ilmiah?')"><span class="ti-trash"></span></button>
                                                </form>
                                            <?php } ?>
                                        </td>
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
<?= $this->endSection(); ?>

<?= $this->section('data_table'); ?>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>


<!-- button untuk export data ke excel -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    //trigger menu
    $('#logbook').addClass('active');

    var table = $('#dataTable-export').DataTable({
            "dom": 'Bfrtip',
            "buttons": [
                'excel',
                'print'
            ]

        }

    );
    // $('#filter-stase').on('change', function() {
    //     table.columns(1).search(this.value).draw();
    // });
    $('#logbook').addClass('active');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<?= $this->endSection(); ?>
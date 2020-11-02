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
                <?php if (session('danger')) { ?>
                    <div class="alert-dismiss">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('danger'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
                <!-- <pre>
                    <?php print_r($_SESSION) ?>
                </pre> -->

                <div class="col-sm-2">
                    <a class="btn btn-flat btn-outline-dark mb-3 btn-sm" href="<?= base_url('/admin/users/show'); ?>">Tambah User</a>
                </div>

                <div class="col-12">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr class="text-left">
                                    <th style="width: 25%;">Nama Lengkap</th>
                                    <th style="width: 15%;">Role</th>
                                    <th style="width: 15%;">Username</th>
                                    <th style="width: 15%;">Tanggal Registrasi</th>
                                    <th style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $ppds) { ?>
                                    <tr class="text-left">
                                        <td>
                                            <?= $ppds['nama_lengkap']; ?>
                                        </td>
                                        <td>
                                            <?= $ppds['role']; ?>
                                        </td>
                                        <td>
                                            <?= $ppds['username']; ?>
                                        </td>
                                        <td>
                                            <?= $ppds['created_at']; ?>
                                        </td>
                                        <td class="text-center">
                                            <!-- <a href="<?= base_url('admin/users/edit/' . $ppds['id']); ?>" class="btn btn-warning btn-xs"><span class="ti-pencil"></span></a> -->
                                            <a href="<?= base_url("admin/users/" . $ppds['id_ppds']); ?>" class="btn btn-flat btn-outline-success btn-xs"><span class="ti-info"></span></a>
                                            <form class="d-inline" action="<?= base_url('admin/users/' . $ppds['id_ppds']); ?>" method="POST">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="" class="btn btn-flat btn-outline-danger btn-xs" onclick="return confirm('Hapus Ilmiah?')"><span class="ti-trash"></span></button>
                                            </form>
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
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    $('#dashboard').addClass('active');
</script>
<?= $this->endSection(); ?>

<?= $this->section('data_css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<?= $this->endSection(); ?>
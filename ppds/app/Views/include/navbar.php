<?php helper('data') ?>

<!-- header area start -->
<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span><?= countNotif(); ?></span>
                    </i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title"><?= countNotif(); ?> pemberitahuan
                        </span>
                        <div class="nofity-list">
                            <?php foreach (listNotif() as $notif) { ?>
                                <a href="#<?//= base_url('notification/' . $notif['id']); ?>" class="notify-item read" id="<?= $notif['id']; ?>" name="<?= $notif['isi']; ?>">
                                    <div class="notify-text">
                                        <p><?= substr($notif['title'], 0, 20); ?></p>
                                        <span><?= $notif['isi']; ?></span> <br>
                                        <span><?= $notif['tanggal']; ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- header area end -->
<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?= $page_header; ?></h4>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="<?= user_photo_profile() == '' ? base_url('assets/images/author/avatar.png') : base_url('users_profile_pic/' . user_photo_profile()); ?>" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= user_nama_lengkap(); ?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('/user/profile'); ?>">Profile</a>
                    <a class="dropdown-item" href="<?= base_url('/logout'); ?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js'); ?>
<script>
    $('.read').click(function() {
        // console.log("<?= base_url('notification'); ?>" + "/" + this.id);
        // console.log();
        var redirect = this.name;
        $.ajax({
            url: "<?= base_url('notification'); ?>" + "/" + this.id,
            success: function() {
                console.log(redirect);
                window.location.href = redirect;
            }
        })
    });
</script>
<?= $this->endSection(); ?>
<!-- page title area end -->
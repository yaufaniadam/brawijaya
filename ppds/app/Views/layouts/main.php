<?= $this->include('./include/header'); ?>

<!-- Main Content -->
<div class="page-container">

    <!-- navbar -->
    <?php if (session('role') == 1) {
        echo $this->include('./include/sidebar');
    } elseif (session('role') == 4) {
        echo $this->include('./include/residen_sidebar');
    } else {
        echo $this->include('./include/all_sidebar');
    } ?>

    <div class="main-content">
        <?= $this->include('./include/navbar'); ?>
        <?= $this->renderSection('content'); ?>
    </div>
    <footer>
        <div class="footer-area">
            <p>© Copyright 2018. All right reserved. Template by <a href="#">PPDS Brawijaya</a>.</p>
        </div>
    </footer>

</div>

<?= $this->include('./include/footer'); ?>
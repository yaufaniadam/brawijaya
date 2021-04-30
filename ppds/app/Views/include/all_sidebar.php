<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="#"><img src="<?= base_url('assets/images/icon/logomiokard.png'); ?>" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li id="dashboard">
                        <a href="<?= base_url('/'); ?>">
                            <i class="ti-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li id="menu_ppds">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>PPDS</span>
                        </a>
                        <ul class="collapse">
                            <li class="bimbingan_saya">
                                <a href="<?= base_url('supervisor/ppds_saya/'); ?>" aria-expanded="true">Bimbingan Saya</a>
                            </li>
                            <li class="stase_saya">
                                <a href="<?= base_url('supervisor/ppds_saya/stase'); ?>" aria-expanded="true">Stase Saya</a>
                            </li>
                        </ul>
                    </li>

                    <li id="tugas">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i>
                            <span>Tugas</span>
                        </a>
                        <ul class="collapse">
                            <li class="">
                                <a href="<?= base_url('tugas/bimbingansaya/ilmiah'); ?>" aria-expanded="true">Ilmiah</a>
                            </li>
                            <li>
                                <a href="<?= base_url('tugas/bimbingansaya/tugas_besar'); ?>" aria-expanded="true">Tugas Besar</a>
                            </li>
                        </ul>
                    </li>
                    <li id="dashboard">
                        <a href="<?= base_url('/sidang'); ?>">
                            <i class="ti-dashboard"></i> <span>Sidang</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
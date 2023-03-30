    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link <?= @$mn_dashboard ?>" href="<?= base_url() ?>admin/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link <?= @$mn_member ?>" href="<?= base_url() ?>admin/member">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Member
                        </a>
                        <a class="nav-link <?= @$mn_cost ?>" href="<?= base_url() ?>admin/cost">
                            <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                            TracklessBank Cost
                        </a>
                        <a class="nav-link <?= @$mn_fee ?>" href="<?= base_url() ?>admin/fee">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            <?=NAMETITLE?> Fee
                        </a>
                        <a class="nav-link" href="<?= base_url() ?>auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
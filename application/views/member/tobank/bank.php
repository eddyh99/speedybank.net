<div class="d-flex justify-content-center">
    <div class="col-12 col-sm-8 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 recive-bank  d-flex align-items-center flex-column text-center">
                        <?php if (@isset($_SESSION["failed"])) { ?>
                        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <?php } ?>
                        <?php if (@isset($_SESSION["success"])) { ?>
                        <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                            <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <?php } ?>

                        <a href="<?= base_url() ?>bank/local" class="col-8 py-3 my-2">Local bank</a>
                        <?php if (
                            ($_SESSION["currency"] == "USD") ||
                            ($_SESSION["currency"] == "EUR") ||
                            ($_SESSION["currency"] == "GBP")
                        ) { ?>
                        <a href="<?= base_url() ?>bank/inter" class="col-8 py-3 my-2">Outside Circuit</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
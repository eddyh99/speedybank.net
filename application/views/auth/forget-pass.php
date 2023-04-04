
<div class="login wrap-signup">
    <div class="row">
        <div class="col-7 d-none d-lg-block bg-signup position-relative">
            <div class="container position-absolute logo-login">
                <div class="row ">
                    <div class="col-6 mx-auto ">
                        <a href="<?= base_url()?>">
                            <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/logo-login.png" alt="logo-login">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-10 mx-auto mt-5 pt-5">
                        <a href="<?= base_url(); ?>auth/login" class="link-back">
                            <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                        </a>
                        <div class="mt-3 my-5 py-5">
                            <h2 class="fw-bold f-poppins">Forgot password ?</h2>
                        </div>
                        <div class="">
                            <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                                    action="<?= base_url(); ?>auth/resetpass">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <?php if (@isset($_SESSION["failed"])) { ?>
                                <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php } ?>
                                <?php if (@isset($_SESSION["success"])) { ?>
                                <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php } ?>
                                <div class="col-12 d-block d-lg-none mb-4 text-center">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url() ?>assets/img/speedybank/logoindex.png" alt="">
                                    </a>
                                </div>
                                <div class="col-12 mb-auto">
                                    <label for="email" class="form-label f-publicsans">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control f-publicsans" name="email" id="email"
                                            placeholder="Email" required>
                                        <div class="input-group-text">
                                            <span>
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-grid gap-2 mt-5">
                                    <button type="submit" class="btn btn-login f-roboto">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login bg-forgot-pass">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center justify-content-xl-start">
            <div class="col-10 col-sm-9 col-md-7 col-lg-5 box-form">
                <a href="<?= base_url(); ?>auth/changepass" class="link-back">
                    <img src="<?= base_url() ?>assets/img/back.png" alt="">
                </a>
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>auth/changepass">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
                    <div class="col-12 mb-4 text-center">
                        <span class="my-3 title f-poppins">Forgot Password</span>
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password1" class="form-label f-publicsans">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control f-publicsans" name="pass" id="password1"
                                placeholder="" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-eye" id="togglePassword1" style="cursor: pointer"
                                        toggle="#password1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password2" class="form-label f-publicsans">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control f-publicsans" name="confirmpass" id="password2"
                                placeholder="" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-eye" id="togglePassword2" style="cursor: pointer"
                                        toggle="#password2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <button type="submit" class="btn btn-login f-roboto">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
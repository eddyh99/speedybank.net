<div class="login bg-signup">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center justify-content-xl-start">
            <div class="col-10 col-sm-9 col-md-7 col-lg-5 hide-bg mx-auto text-center">
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>member">
                    <div class="mt-5">
                        <h1 class="text-white f-poppins fw-bold">Welcome to SpeedyBank</h1>
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url(); ?>assets/img/speedybank/logo-white.png" alt="logo-white" class="img-fluid">
                        </a>
                        <div class="text-white f-poppins">
                            To activate your <b translate="no"> SpeedyBank </b> account
                            click
                            the link receive in
                            your registration email
                            <br>
                            <b>ATTENTION:</b>
                            <div>You will received the email within 15 minutes</div>
                            <div> If you don’t see it check into the SPAM folder</div>
                        </div>
                    </div>
                    <div class="col-12 d-grid gap-2 mt-5">
                        <a href="<?= base_url() ?>" class="btn btn-login f-poppins">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
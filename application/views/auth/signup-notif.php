<div class="login bg-signin-succes">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center justify-content-xl-start">
            <div class="col-10 col-sm-9 col-md-7 col-lg-5 box-form hide-bg">
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>member">
                    <div class="col-12 mt-auto text-center my-auto">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url(); ?>assets/img/logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-12 d-grid gap-2 my-auto">
                        <p class="text-center f-roboto">To activate your <b translate="no"> ExchangeTailor </b> account
                            click
                            the link receive in
                            your registration email
                            <br><br>
                            <b>ATTENTION:</b>
                        </p>
                        <ul class="f-roboto">
                            <li>You will receive the email within 15 minutes</li>
                            <li>If you dont see it check into the SPAM folder</li>
                        </ul>
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <a href="<?= base_url() ?>auth/login" class="btn btn-login f-roboto">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
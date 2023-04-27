<!-- ======= Hero Section ======= -->
<section id="" class="hero d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>#contactus">
                        <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="col-12 mb-5 text-center">
                    <h2 class="text-white fw-bold">Contact us</h2>
                </div>
                <div class="col-12 col-md-8 col-lg-6 mx-auto mb-5 text-center text-white">
                    <p> Our support service is exclusively reserved to our clients. Register for free on the platform,
                        in few seconds, to request assistance or further information</p>
                </div>
                <div class="login">
                    <div class="col-12 col-md-8 col-lg-6 box-form mx-auto shadow-none px-0">
                        <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;"
                            method="POST" action="<?= base_url(); ?>link/mailproses">
                            <?php if (@isset($_SESSION["failed"])) { ?>
                            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= @$_SESSION["failed"] ?></span>
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
                            <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="col-12 mb-5">
                                <div class="input-group bg-black bg-disable py-2" id="email_div">
                                    <div class="input-group-text border-0 px-4">
                                        <span>
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control message-email f-publicsans border-0" name="email"
                                        id="email" placeholder="Email" value="<?= $email?>" readonly required >
                                </div>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="input-group bg-black py-2" id="question_div">
                                    <div class="input-group-text border-0 px-4 align-items-start pt-1">
                                        <span>
                                            <i class="fa fa-message"></i>
                                        </span>
                                    </div>
                                    <textarea type="text" class="form-control f-publicsans border-0" name="message"
                                        id="message" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn btn-login f-roboto rounded-pill px-5 py-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
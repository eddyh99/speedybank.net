
<div id="load" style="display: none;">
    <div class="img-load d-flex flex-column justify-content-center align-items-center">
        <img src="<?= base_url()?>assets/img/speedybank/logo.png" alt="img-load">
        <span class="pt-3">Loading</span>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 infobank-list-app f-jakarta my-4">
                        <div class="col-12">
                            <div class="text-center mt-4">
                                <span class="me-auto f-hahmlet text-blue-freedy fs-2 title-top-navbar">Confirmation</span>
                            </div>
                        </div>
                        <div class="col-8 mx-auto mt-4">
                            <div class="text-center">
                                <span class="me-auto f-hahmlet text-blue-freedy fs-5 title-top-navbar">Do you want to confirm the amount ?</span>
                            </div>
                        </div>
                        <div class="col-12 py-4">
                            <form method="POST" action="<?= base_url() ?>receive/localbank_notif" id="form_submit" onsubmit="return validate()">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Amount: </span>
                                    <span class="fs-6 text-blue-freedy"><?= $data["amount"] ?></span>
                                    <input type="text" class="form-control mb-4" name="amount" id="amount" placeholder="Amount" value="<?= $data["amount"] ?>" hidden>
                                </div>
                                <div class="col-12 d-flex flex-row mt-5">
                                    <a href="<?= base_url() ?>receive/localbank" class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
                                    <button class="btn btn-topup-support" type="submit" id="btnconfirm">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center top">
        <a href="<?= base_url() ?>receive/localbank" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0066FF" />
                            <stop offset="1" stop-color="#0053CF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>

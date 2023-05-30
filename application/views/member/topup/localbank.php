

<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                <?php if (@isset($_SESSION["failed"])) { ?>
                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-hahmlet text-blue-freedy title-top-navbar">
                                <?= $_SESSION["currency"] ?> - Top Up - Local bank</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app input-piggy-style my-4">
                        <div class="py-4">
                            <div class="noted-tutor">
                                <h6 class="mb-3 fw-semibold">                                     
                                    *In case you’ve written wrong Causal it is possible to manually recover the funds by clicking the button below:
                                </h6>
                                <div class="d-flex justify-content-center">
                                    <a>
                                        <button class="btn btn-topup-support">Top up support</button>
                                    </a>
                                </div>
                                <p class="my-3">                       
                                    (the manual recovery operation will cost 25 $) 
                                </p>
                            </div>   
                            <label class="mb-4">Min Top up :  <?=@number_format($bank->minimum,2)?> <?=$currency?> </label>
                            <form method="POST" action="<?= base_url() ?>receive/localbank_confirm" class="input-piggy-style" id="form_submit" onsubmit="return validate()">
                                <input type="hidden" id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <div class="my-3">
                                    <label class="ms-2 form-label">AMOUNT</label>
                                    <input type="text" class="form-control money-input" name="amount" id="amount"
                                        placeholder="Amount">
                                </div>
                                <div class="mb-5">
                                    <label class="ms-2 form-label">CONFIRM AMOUNT</label>
                                    <input type="text" class="form-control money-input" name="confirm_amount"
                                        id="confirm_amount" placeholder="Confirm Amount">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-card-confirm-nocard" id="btnload">
                                        Next
                                    </button>
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
        <a href="<?= base_url() ?>receive" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0066FF" />
                            <stop offset="1" stop-color="#0053CF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>


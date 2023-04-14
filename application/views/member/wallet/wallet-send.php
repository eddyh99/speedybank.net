<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-hahmlet title-top-navbar"><?= $_SESSION["currency"] ?> - Send Wallet
                                to Wallet</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="py-4">
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
                            <form method="POST" action="<?= base_url() ?>wallet/send_confirm" class="input-piggy-style" id="form_submit" onsubmit="return validate()">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="mb-3">
                                    <label class="ms-2 form-label">RECIPIENT’S UNIQUE CODE</label>
                                    <input type="text" class="form-control" name="ucode" id="ucode" value="<?= @$ucode ?>" <?php echo (empty($ucode) ? "" : "readonly") ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="ms-2 form-label">CONFIRM RECIPIENT’S UNIQUE CODE</label>
                                    <input type="text" class="form-control" name="confirm_ucode" id="confirm_ucode" value="<?= $ucode ?>" <?php echo (empty($ucode) ? "" : "readonly") ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="ms-2 form-label">AMOUNT ( max :
                                        <?= max_sendtowallet(balance($_SESSION['user_id'], $_SESSION["currency"]), $_SESSION["currency"]); ?>
                                        )</label>
                                    <input type="text" class="form-control money-input" name="amount" id="amount" placeholder="Amount (ex. 0.01)" value="<?= $amount ?>" <?php echo (empty($amount) ? "" : "readonly") ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="ms-2 form-label">CONFIRM AMOUNT</label>
                                    <input type="text" class="form-control money-input" name="confirm_amount" id="confirm_amount" placeholder="Confirm Amount (ex. 0.01)" value="<?= $amount ?>" <?php echo (empty($amount) ? "" : "readonly") ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="ms-2 form-label">Causal</label>
                                    <input type="text" class="form-control" name="causal" maxlength="10">
                                </div>
                                <div class="row">
                                    <div class="d-flex flex-row mt-4">
                                        <a href="<?= base_url() ?>wallet" class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
                                        <button class="btn btn-receive-bank px-5 py-2" type="submit" id="btnconfirm">OK</button>
                                    </div>
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
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center">
        <a href="<?= base_url() ?>wallet" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
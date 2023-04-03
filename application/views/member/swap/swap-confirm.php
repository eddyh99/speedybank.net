<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <span class="f-monserat title-top-navbar">Confirmation</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="col-12 py-4">
                            <form method="POST" action="<?= base_url() ?>swap/notif" onsubmit="return validate()"
                                id="form_submit">
                                <input type="hidden" id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="quoteid" value="<?= $data["quoteid"] ?>">
                                <input type="hidden" name="toswap" value="<?= $data["target"] ?>">
                                <input type="text" name="ucode" id="ucode" value="<?= $_SESSION['ucode'] ?>" hidden>
                                <input type="text" name="amount" id="amount" value="<?= $data["amount"] ?>" hidden>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Convert amount</span>
                                    <span><?= $_SESSION['symbol'] ?> <?= number_format($data['amount'],2) ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>transaction fee</span>
                                    <span><?= $_SESSION['symbol'] ?> <?= number_format(0, 2) ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>You receive</span>
                                    <span><?= $data['symbol'] ?> <?= number_format($data["amountget"],2) ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>New Balance</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $data["amount"], 2) ?></span>
                                </div>
                                <div class="col-12 d-flex flex-row mt-5">
                                    <a href="<?= base_url() ?>swap"
                                        class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
                                    <button class="btn btn-receive-bank px-5 py-2" id="btnconfirm"
                                        type="submit">OK</button>
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
        <a href="<?= base_url() ?>swap" class="d-flex align-items-center border-0">
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
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
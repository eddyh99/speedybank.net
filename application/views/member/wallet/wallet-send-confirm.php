<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <span class="me-auto f-hahmlet text-blue-freedy fs-2 title-top-navbar">Confirmation</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app f-jakarta my-4">
                        <div class="col-12 py-4">
                            <form method="POST" action="<?= base_url() ?>wallet/send_notif" id="form_submit" onsubmit="return validate()">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Recipients unique code</span>
                                    <span><?= $data["ucode"] ?></span>
                                    <input type="text" class="form-control mb-4" name="ucode" id="ucode" placeholder="Unique code" value="<?= $data["ucode"] ?>" hidden>
                                </div>

                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Causal</span>
                                    <span><?= @$data["causal"] ?></span>
                                    <input type="text" class="form-control mb-4" name="causal" id="causal" value="<?= $data["causal"] ?>" hidden>
                                </div>

                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Amount</span>
                                    <span><?= $_SESSION['symbol'] ?> <?= number_format($data["amount"], 2) ?></span>
                                    <input type="text" class="form-control mb-4" name="amount" id="amount" placeholder="Amount" value="<?= $data["amount"] ?>" hidden>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Transaction fee</span>
                                    <span><?= $_SESSION['symbol'] ?> <?= number_format($data["fee"], 2) ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Total Deducted</span>
                                    <span><?= $_SESSION['symbol'] ?> <?= number_format($data["deduct"], 2) ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>New Balance</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $data["deduct"], 2) ?></span>
                                </div>

                                <div class="attention-box p-3 text-center">
                                    <span class="title mb-3 d-inline-block">Attention</span>
                                    <p>Are you sure that the data are correct? Are you sure of the sending reason?</p>
                                    <p>The transaction is irrevesible and can not be cancelled after the confirmation.
                                    </p>
                                    <p>If you are sure to make this transaction click confirm</p>
                                </div>

                                <div class="col-12 d-flex flex-row mt-5">
                                    <a href="<?= base_url() ?>wallet" class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
                                    <button class="btn btn-receive-bank px-5 py-2" type="submit" id="btnconfirm">Confirm</button>
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
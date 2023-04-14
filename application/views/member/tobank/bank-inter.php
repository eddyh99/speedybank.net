<?php require_once("countries-list.php"); ?>
<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <?php if (file_exists(APPPATH . 'views/member/tobank/currency/' . $_SESSION['currency'] . '.php')) { ?>
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-monserat title-top-navbar"><?= $_SESSION["currency"] ?> - Wallet to
                                Bank -
                                International</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="py-4">
                            <?php if (@isset($_SESSION["failed"])) { ?>
                            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
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
                            <form action="<?= base_url() ?>bank/bankconfirm" method="post" id="form_submit"
                                onsubmit="return validate()" class="input-piggy-style">
                                <input type="hidden" id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="transfer_type" value="outside">
                                <input type="hidden" name="currencycode" id="currencycode" value="<?= $currencycode ?>">
                                <input type="hidden" name="url" value="inter">
                                <div class="tab-pane box-tab-bank" id="us">

                                    <div class="align-items-center my-3">
                                        <small class="text-blue-freedy">MAX
                                            : <?= $_SESSION["symbol"] ?>
                                            <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $fee,2) ?></small>
                                        <input class="form-control money-input me-2 my-2" type="text" name="amount"
                                            placeholder="Amount">
                                    </div>
                                    <div class="align-items-center my-3">
                                        <input class="form-control me-2" type="text" name="accountHolderName"
                                            placeholder="Recipient Name">
                                    </div>

                                    
                                    <?php 
                                        $data['type'] = "inter";
                                        $data['countries_list'] = $countries_list;
                                        $this->load->view('member/tobank/currency/' . @$_SESSION['currency'], $data) 
                                    ?>

                                    <div class="align-items-center my-3">
                                        <input class="form-control me-2" type="text" name="causal" placeholder="Causal"  maxlength="10">
                                    </div>

                                    <div class="col-12 d-flex justify-content-center flex-row mt-5">
                                        <a href="<?= base_url() ?>bank"
                                            class="btn btn-wallet-cancle py-2 ">Cancel</a>
                                        <button class="btn btn-receive-bank px-4 px-md-5 py-1" type="submit"
                                            id="btnconfirm">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-12 my-4">
                        <div class="col-12 py-4">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="<?= base_url() ?>assets/img/logo-2.png" alt="" style="width: 100px;"
                                    class="mt-5">
                                <span class="b-qr">Coming Soon!</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center">
        <a href="<?= base_url() ?>bank" class="d-flex align-items-center border-0">
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
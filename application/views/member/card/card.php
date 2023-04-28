<?php if($card == 'confirm') {?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <form method="POST" action="<?=base_url()?>card/topupproses">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="amount" value="<?=$detail["amount"]?>">
                <div class="container" style="margin-bottom: 8rem;">
                    <div class="app-container py-5 ">
                        <h3 class="text-center text-blue-freedy fw-bolder f-poppins mt-5 pt-5">Confirmation details</h3>
                        <div class="mt-5 wrap-border-topup p-3 p-md-4 col-12 col-md-10 mx-auto">
                            <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                                <span>Top up amount</span>
                                <span><?=$_SESSION["symbol"]?> <?=number_format($detail["amount"],2)?></span>
                            </div>
                            <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                                <span>Transaction Fee</span>
                                <span><?=$_SESSION["symbol"]?> <?=number_format($detail["fee"],2)?></span>
                            </div>
                            <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                                <span>Total deducted</span>
                                <span><?=$_SESSION["symbol"]?> <?=number_format($detail["deduct"],2)?></span>
                            </div>
                            <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                                <span>New balance</span>
                                <span><?=$_SESSION["symbol"]?> <?php echo number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $detail["deduct"], 2)?></span>
                            </div>
                            <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                <button type="submit"
                                    class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span class="f-lexend">Confirm</span>
                                </button>
                            </div>
                        </div>            
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } elseif($card == 'success'){?>
    <div class="d-flex justify-content-center align-items-center card-topup-success">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 d-flex flex-column justify-content-center align-items-center ">
                    <h1 class="text-center f-poppins text-blue-freedy my-5">SUCCESS</h1>
                    <img src="<?= base_url()?>assets/img/speedybank/check-success.png" alt="success">
                    <h1 class="text-center f-poppins text-blue-freedy my-5">YOUR CARD BALANCE WILL BE UPDATE WITHIN 2 WORKING DAYS</h1>
                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                        <a href="<?= base_url(); ?>card"
                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                            <span class="f-lexend">Done</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif($card == 'awaiting'){?>
    <div class="my-5 pt-2 d-flex justify-content-center align-items-center card-topup-success">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 d-flex flex-column justify-content-center align-items-center ">
                    <h1 class="text-center f-poppins text-blue-freedy my-5">YOUR CARD IS BEING SHIPPED</h1>
                    <h3 class="text-center f-poppins text-blue-freedy ">After arrival, please activate your card and contact us for linking to wallet</h3>
                </div>
            </div>
        </div>
    </div> 
<?php } else {?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 ">
                    <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                        <?php if($card == 'card'){?>
                        <div class="mt-5 f-poppins">
                            <div class="d-flex justify-content-between align-items-center card-balance my-1">
                                <div>
                                    <span>Card balance</span>
                                </div>
                                <div class="text-blue-freedy d-flex align-items-center justify-content-end">
                                    <input  id="text-secret" type="password" class="w-50 text-blue-freedy text-end mx-3 fw-semibold" value="<?php echo $_SESSION["symbol"]." ".number_format($detailcard->cardbalance,2);?>" readonly>
                                    <i id="eye-toggle" class="ri-eye-line text-blue-freedy pe-auto"></i>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between card-number my-1">
                                <div class="">
                                    <span>Card number</span>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="text" id="cardnumcopy" class="text-end mx-3 d-inline-block w-100" value="<?=$detailcard->cardnumber?>" readonly>
                                    <span id="btncardnumcopy">
                                        <img src="<?= base_url()?>assets/img/speedybank/copy.png" class="img-fluid" alt="copy">
                                    </span>

                                </div>
                            </div>

                            <div class="d-flex justify-content-between my-1 card-expire-date">
                                <div class="">
                                    <span>Expire date</span>
                                </div>
                                <div class="">
                                    <span class=""><?=$exp?></span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between my-1 card-cvv">
                                <div>
                                    <span>CVV</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <input id="text-secret2" type="password" class="w-50 text-end mx-3 fw-semibold" value="<?=$detailcard->cvv?>" readonly>
                                    <i id="eye-toggle2" class="ri-eye-line text-blue-freedy pe-auto"></i>
                                </div>
                            </div>

                            

                        </div>
                        <div class="d-flex flex-column mx-auto justify-content-center w-100">
                            <div style="height: 1px; width: 100%; background-color: #0C5FA4" class="mt-4"></div>
                        </div>
                        <div class="row my-4">
                            <a href="<?= base_url(); ?>card/topupcard" class="col-12 mx-auto card-topup d-flex align-items-center justify-content-center">
                                <span class="text-blue-freed fw-bold">
                                    Top Up Your Card
                                </span>
                            </a>
                            <a href="<?= base_url(); ?>card/historycard" class="col-12 mx-auto card-topup d-flex align-items-center justify-content-center mt-4">
                                <span class="text-blue-freed fw-bold">
                                    History
                                </span>
                            </a>
                        </div>
                        <?php }?>

                        <?php if($card == 'topup'){?>
                        <div class="my-5 row">
                            <div class="col-12 text-topup-card">
                                <?php if (@isset($_SESSION["failed"])) { ?>
                                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <h1 class="text-blue-freedy fw-bolder f-poppins text-center">
                                    Top up Card
                                </h1>
                                <p class="text-center fw-semibold f-lexend col-12 col-md-10 mx-auto">
                                    Your top up will arrive within 2 workings days, the fee it will be the the same as ‘’wallet to bank’’ cost.
                                    <br>
                                    The card top up can be done just in Euro currency, so make sure to have enough funds in Euro, in case you don’t have them, convert one of your <span translate="no">FIAT</span>  balances into Euro by using the swap function 
                                </p>
                            </div>
                            <div class="mt-5 wrap-border-topup p-3 p-md-4 col-10 mx-auto">
                                <span class="fw-semibold">Max amount : <?= $_SESSION["symbol"] ?>
                                                <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $fee, 2) ?></span>
                                <form method="POST" action="<?=base_url()?>card/topupconfirm">
                                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="mt-4">
                                        <span>Amount</span>
                                        <div class="form-topup-card d-flex flex-row align-items-center my-2" style="height: 70px;">
                                            <label for="amount"><?= $_SESSION["symbol"] ?></label>
                                            <input type="text" class="form-control money-input text-end" autocomplete="off" name="amount"
                                                id="amount" placeholder="0.00">
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <span>Confirm amount</span>
                                        <div class="form-topup-card d-flex flex-row align-items-center my-2" style="height: 70px;">
                                            <label for="confirmamount"><?= $_SESSION["symbol"] ?></label>
                                            <input type="text" class="form-control money-input text-end" autocomplete="off" name="confirmamount"
                                                id="confirmamount" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                        <button type="submit"
                                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span class="f-lexend">Confirm</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php }?>
                        <?php if($card == 'history'){?>
                            <div class="row d-flex justify-content-center">
                                <div class="col-12">
                                    <div class="col-12 recive-bank  d-flex align-items-center flex-column">
                                        <div class="col-12 mt-5">
                                            <div class="app-calendar mb-2">
                                                <form id="frmhistory">
                                                    <input type="hidden" id="token"
                                                        name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                    <input type="text" name="tgl" id="tgl" readonly class="border-0"
                                                        style="cursor: pointer;">
                                                </form>
                                            </div>
                                            <div class="col-12 box-transaction overflow-auto">
                                                <div id="history"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Already Card -->

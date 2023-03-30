<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <h2 class="f-hahmlet text-blue-freedy fw-bold text-center">Swap</h2>
                        <div class="col-12 recive-bank  d-flex align-items-center flex-column text-center">
                            <form method="POST" id="swapconfirm" action="<?= base_url() ?>swap/confirm"
                                class="swap text-center" onsubmit="return validate()">
                                <?php if (@isset($_SESSION["failed"])) { ?>
                                <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php } ?>

                                <div id="notifcalculate" class="col-12 alert alert-warning alert-dismissible fade show"
                                    role="alert">
                                    <span class="notif-login f-poppins" id="txtnotif"></span>
                                </div>

                                <input type="hidden" id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" id="amountget" name="amountget">
                                <input type="hidden" id="quoteid" name="quoteid">
                                <div class="swap-form-icon d-flex flex-row align-items-center my-4">
                                    <label for=""><?= $_SESSION["symbol"] ?></label>
                                    <input type="text" class="form-control money-input text-end" name="amount"
                                        id="amount" placeholder="0.00">
                                </div>

                                <div class="swap-selection">
                                    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="t-select">Convert to</span>
                                        <select name="toswap" id="toswap" class="form-select">
                                            <?php if ($_SESSION["currency"] != "USD") { ?>
                                            <option data-currency="&dollar;" value="USD">USD</option>
                                            <?php } ?>
                                            <?php if ($_SESSION["currency"] != "EUR") { ?>
                                            <option data-currency="&euro;" value="EUR">EUR</option>
                                            <?php } ?>
                                            <?php foreach ($currency as $dt) {
                                                if ($dt->status == 'active') {
                                                    if (($dt->currency != "USD") && ($dt->currency != "EUR") && ($_SESSION["currency"] != $dt->currency)) {
                                            ?>
                                            <option data-currency="<?= $dt->symbol ?>" value="<?= $dt->currency ?>"
                                                <?php echo ($_SESSION["currency"] == $dt->currency) ? "selected" : "" ?>>
                                                <?= $dt->currency ?></option>
                                            <?php       }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="swap-form-icon d-flex flex-row align-items-center my-4">
                                    <label for=""><span id="tocurrency"></span></label>
                                    <input type="text" class="form-control money-input text-end" name="receive"
                                        id="receive" placeholder="0.00" readonly>
                                </div>
                                <div class="row">
                                    <div class="d-flex flex-row mt-4">
                                        <button class="btn btn-receive-bank px-3 py-2 mx-auto" type="submit"
                                            id="btnconfirm">Convert</button>
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
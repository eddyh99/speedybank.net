<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-monserat title-top-navbar">Transfer Wallet to Bank</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="col-12 py-4">
                            <form action="<?= base_url() ?>bank/banknotif" method="post" id="form_submit" onsubmit="return validate()">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="transfer_type" value="<?= $data["transfer_type"] ?>">

                                <input type="hidden" name="amount" value="<?= $data["amount"] ?>">
                                <input type="hidden" name="accountHolderName" value="<?= $data["accountHolderName"] ?>">
                                <input type="hidden" name="causal" value="<?= $data["causal"] ?>">
                                <input type="hidden" name="accountNumber" value="<?= @$data["accountNumber"] ?>">
                                <input type="hidden" name="IBAN" value="<?= @$data["IBAN"] ?>">
                                <input type="hidden" name="accountType" value="<?= @$data["accountType"] ?>">
                                <input type="hidden" name="city" value="<?= @$data["city"] ?>">
                                <input type="hidden" name="postCode" value="<?= @$data["postCode"] ?>">
                                <input type="hidden" name="firstLine" value="<?= @$data["firstLine"] ?>">
                                <input type="hidden" name="state" value="<?= @$data["state"] ?>">
                                <input type="hidden" name="countryCode" value="<?= @$data["countryCode"] ?>">
                                <input type="hidden" name="abartn" value="<?= @$data["abartn"] ?>">
                                <input type="hidden" name="swiftCode" value="<?= @$data["swiftCode"] ?>">
                                <input type="hidden" name="bsbCode" value="<?= @$data["bsbCode"] ?>">
                                <input type="hidden" name="sortCode" value="<?= @$data["sortCode"] ?>">
                                <input type="hidden" name="bankCode" value="<?= @$data["bankCode"] ?>">
                                <input type="hidden" name="branchCode" value="<?= @$data["branchCode"] ?>">
                                <input type="hidden" name="institutionNumber" value="<?= @$data["institutionNumber"] ?>">
                                <input type="hidden" name="transitNumber" value="<?= @$data["transitNumber"] ?>">
                                <input type="hidden" name="taxId" value="<?= @$data["taxId"] ?>">
                                <input type="hidden" name="rut" value="<?= @$data["rut"] ?>">
                                <input type="hidden" name="phoneNumber" value="<?= @$data["phoneNumber"] ?>">
                                <input type="hidden" name="legalType" value="<?= @$data["legalType"] ?>">
                                <input type="hidden" name="type" value="<?= @$data["type"] ?>">
                                <input type="hidden" name="ifscCode" value="<?= @$data["ifscCode"] ?>">
                                <input type="hidden" name="clabe" value="<?= @$data["clabe"] ?>">
                                <input type="hidden" name="email" value="<?= @$data["email"] ?>">
                                <input type="hidden" name="interacAccount" value="<?= @$data["interacAccount"] ?>">
                                <input type="hidden" name="customerReferenceNumber" value="<?= @$data["customerReferenceNumber"] ?>">
                                <input type="hidden" name="billerCode" value="<?= @$data["billerCode"] ?>">
                                <input type="hidden" name="dateOfBirth" value="<?= date('Y-m-d', strtotime(@$data["dateOfBirth"])) ?>">

                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Recipient Name</span>
                                    <span><?= $data["accountHolderName"] ?></span>
                                </div>
                                <?php if (
                                    (
                                        ($_SESSION['currency'] == "EUR") &&
                                        ($data["transfer_type"] == "circuit")
                                    ) ||
                                    ($_SESSION['currency'] == "AED") ||
                                    ($_SESSION['currency'] == "DKK") ||
                                    ($_SESSION['currency'] == "EGP") ||
                                    (
                                        ($_SESSION['currency'] == "GBP") &&
                                        ($data["transfer_type"] == "outside")
                                    ) ||
                                    ($_SESSION['currency'] == "GEL") ||
                                    ($_SESSION['currency'] == "HRK") ||
                                    ($_SESSION['currency'] == "ILS") ||
                                    ($_SESSION['currency'] == "NOK") ||
                                    ($_SESSION['currency'] == "PKR") ||
                                    ($_SESSION['currency'] == "PLN") ||
                                    ($_SESSION['currency'] == "RON") ||
                                    ($_SESSION['currency'] == "SEK") ||
                                    ($_SESSION['currency'] == "TRY")
                                ) { ?>
                                    <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                        <span>IBAN</span>
                                        <span><?= @$data["IBAN"] ?></span>
                                    </div>
                                <?php } elseif (
                                    ($_SESSION['currency'] == "MXN")
                                ) { ?>
                                    <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                        <span>Clabe</span>
                                        <span><?= @$data["clabe"] ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                        <span>Account Number</span>
                                        <span><?= @$data["accountNumber"] ?></span>
                                    </div>
                                <?php } ?>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Amount</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format($data["amount"], 2, ".", ",") ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Transaction fee</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format($data["fee"], 2, ".", ",") ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>Total Deducted</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format($data["deduct"], 2, ".", ",") ?></span>
                                </div>
                                <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                                    <span>New Balance</span>
                                    <span><?= $_SESSION['symbol'] ?>
                                        <?= number_format(balance($_SESSION['user_id'], $_SESSION["currency"]) - $data["deduct"], 2, ".", ",")  ?></span>
                                </div>
                                <div class="attention-box p-3 text-center">
                                    <span class="title mb-3 d-inline-block">Attention</span>
                                    <p>Are you sure that the data are correct? Are you sure of the sending reason?</p>
                                    <p>The transaction is irrevesible and can not be cancelled after the confirmation.</p>
                                    <p>It is possible that additional costs, unknown to us, are applied by the reference bank</p>
                                    <p>If you are sure to make this transaction click confirm</p>
                                </div>
                                <p class="text-center text-primary pt-3">
                                    By clicking confirm, you authorize wise to withdraw the funds from your account and transfer them to the data you entered, relieving us of any responsibility as the successful completion of the operation will be at the sole discretion of wise
                                </p>
                                <div class="col-12 d-flex flex-row mt-5">
                                    <a href="<?= base_url() ?>bank" class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
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
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-center align-items-center">
        <a href="<?= base_url() ?>bank" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.875 9.5L10.125 1.25M1.875 9.5L10.125 17.75M1.875 9.5H21.125" stroke="#0F4E97" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </a>
    </div>
</div>
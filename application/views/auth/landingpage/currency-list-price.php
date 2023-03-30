<!-- ======= Hero Section ======= -->
<section id="" class="d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>link/lern_transparency">
                        <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-10 my-5 mx-auto">
                <div class="px-0 px-md-3">
                    <?php
                    foreach ($currency as $dtcurr) {
                        if ($dtcurr->currency == $getcurrency) {
                            if ($dtcurr->status == 'active') {
                    ?>
                    <h4 class="f-lexend text-start my-3 text-blue-freedy">
                        Account Service Fees:
                    </h4>
                    <ul class="list-group">
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Account with IBAN</span>
                            <span class="w-50 text-end text-blue-freedy">Free of charge</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Monthly fee</span>
                            <span class="w-50 text-end text-blue-freedy">Free of charge</span>
                        </li>
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Annual fee</span>
                            <span class="w-50 text-end text-blue-freedy">Free of charge</span>
                        </li>
                    </ul>

                    <h4 class="f-lexend text-start my-3 text-blue-freedy">
                        Bank transfers
                    </h4>
                    <ul class="list-group">
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">

                            <?php if (($getcurrency == "EUR")) { ?>
                            <span class="w-50 me-auto text-start">Receiving SEPA</span>
                            <?php } else { ?>
                            <span class="w-50 me-auto text-start">Receiving National</span>
                            <?php } ?>

                            <?php
                                        if (($getcurrency == "USD") ||
                                            ($getcurrency == "EUR") ||
                                            ($getcurrency == "AUD") ||
                                            ($getcurrency == "NZD") ||
                                            ($getcurrency == "CAD") ||
                                            ($getcurrency == "HUF") ||
                                            ($getcurrency == "SGD") ||
                                            ($getcurrency == "TRY") ||
                                            ($getcurrency == "GBP") ||
                                            ($getcurrency == "RON")
                                        ) { ?>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['topup_circuit_fxd'] + $fee['topup_circuit_fxd'] + $fee['referral_topup_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['topup_circuit_pct'] + $fee['topup_circuit_pct'] + $fee['referral_topup_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?>
                            </span>

                            <?php } else { ?>
                            <span class="w-50 text-end text-blue-freedy">Swap</span>
                            <?php } ?>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Receiving International</span>
                            <?php if (($getcurrency == "USD") || ($getcurrency == "EUR") || ($getcurrency == "GBP")) { ?>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['topup_outside_fxd'] + $fee['topup_outside_fxd'] + $fee['referral_topup_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['topup_outside_pct'] + $fee['topup_outside_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?></span>

                            <?php } else { ?>
                            <span class="w-50 text-end text-blue-freedy">Swap</span>
                            <?php } ?>
                        </li>
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Send Wallet to Wallet</span>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['wallet_sender_fxd'] + $fee['wallet_sender_fxd'] + $fee['referral_send_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['wallet_sender_pct'] + $fee['wallet_sender_pct'] + $fee['referral_send_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Receiving Wallet to Wallet</span>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['wallet_receiver_fxd'] + $fee['wallet_receiver_fxd'] + $fee['referral_receive_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['wallet_receiver_pct'] + $fee['wallet_receiver_pct'] + $fee['referral_receive_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?></span>
                        </li>
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">
                            <?php if (($getcurrency == "EUR")) { ?>
                            <span class="w-50 me-auto text-start">SEPA Transfer</span>
                            <?php } else { ?>
                            <span class="w-50 me-auto text-start">National Transfer</span>
                            <?php } ?>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['walletbank_circuit_fxd'] + $fee['walletbank_circuit_fxd'] + $fee['referral_bank_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['walletbank_circuit_pct'] + $fee['walletbank_circuit_pct'] + $fee['referral_bank_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">

                            <span class="w-50 me-auto text-start">International Transfer</span>
                            <?php if (($getcurrency == "USD") || ($getcurrency == "EUR") || ($getcurrency == "GBP")) { ?>
                            <span
                                class="w-50 text-end text-blue-freedy"><?= number_format(($cost['walletbank_outside_fxd'] + $fee['walletbank_outside_fxd'] + $fee['referral_bank_fxd']), 2, ".", ",") ?>
                                +
                                <?= number_format(($cost['walletbank_outside_pct'] + $fee['walletbank_outside_pct'] + $fee['referral_bank_pct']), 2, ".", ",") ?>%
                                <?= $dtcurr->symbol ?></span>
                            <?php } else { ?>
                            <span class="w-50 text-end text-blue-freedy">Swap</span>
                            <?php } ?>
                        </li>
                        <li
                            class="list-group-item list-group-item-grey-freedy text-dark d-flex justify-content-between align-items-center">
                            <span class="w-50 me-auto text-start">Swap Currencies</span>
                            <span class="w-50 text-end text-blue-freedy">0
                                <?= $dtcurr->symbol ?></span>
                        </li>
                    </ul>
                    <?php
                            } else {
                            ?>

                    <h4 class="f-lexend text-center my-3 text-blue-freedy">
                        Coming Soon!
                    </h4>
                    <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="col-12 receive-note d-flex justify-content-center text-start my-4">
                            <?php
                            if (
                                ($_SESSION["currency"] == "USD") ||
                                ($_SESSION["currency"] == "EUR") ||
                                ($_SESSION["currency"] == "AUD") ||
                                ($_SESSION["currency"] == "NZD") ||
                                ($_SESSION["currency"] == "CAD") ||
                                ($_SESSION["currency"] == "HUF") ||
                                ($_SESSION["currency"] == "SGD") ||
                                ($_SESSION["currency"] == "TRY") ||
                                ($_SESSION["currency"] == "GBP") ||
                                ($_SESSION["currency"] == "RON")
                            ) { ?>
                            <button type="button" class="receive-attention features-text d-flex flex-column text-center col-12 p-3"
                                data-bs-toggle="modal" data-bs-target="#attention">
                                <p class="fw-normal f-jakarta">
                                    To maximize the level of privacy,
                                        <b class="all-incoming">
                                            all incoming and outgoing transfers will be managed by a payment and collection gateway which will not custody the funds but will just transfer them.
                                        </b>
                                    <br>
                                    The bank details, of each currency, will be the same for all users;  excluding the ‘’causal’’ which identify the receiving wallet.
                                </p>
                            </button>
                            <?php } ?>
                        </div>
                        <div class="col-12 recive-bank  d-flex align-items-center flex-column text-center">
                            <?php
                            if (
                                ($_SESSION["currency"] == "USD") ||
                                ($_SESSION["currency"] == "EUR") ||
                                ($_SESSION["currency"] == "AUD") ||
                                ($_SESSION["currency"] == "NZD") ||
                                ($_SESSION["currency"] == "CAD") ||
                                ($_SESSION["currency"] == "HUF") ||
                                ($_SESSION["currency"] == "SGD") ||
                                ($_SESSION["currency"] == "TRY") ||
                                ($_SESSION["currency"] == "GBP") ||
                                ($_SESSION["currency"] == "RON")
                            ) { 
                                if ($_SESSION["currency"] == "EUR") {?>
                            <a href="<?= base_url() ?>receive/localbank" class="col-8 py-3 my-2">National SEPA
                                Circuit</a>
                            <?php } elseif ($_SESSION["currency"] == "USD") { ?>
                            <a href="<?= base_url() ?>receive/localbank" class="col-8 py-3 my-2">USA bank circuit</a>
                            <?php }else{?>
                            <a href="<?= base_url() ?>receive/localbank" class="col-8 py-3 my-2">Local bank</a>
                            <?php } 

                                if (($_SESSION["currency"] == "USD") ||
                                    ($_SESSION["currency"] == "EUR") ||
                                    ($_SESSION["currency"] == "GBP")
                                ) { 
                                    if ($_SESSION["currency"] == "EUR") {?>
                            <a href="<?= base_url() ?>receive/interbank" class="col-8 py-3 my-2">International
                                BIC/Swift</a>
                            <?php }else{?>
                            <a href="<?= base_url() ?>receive/interbank" class="col-8 py-3 my-2">International Swift</a>
                            <?php } 
                                } 
                            } else{ ?>
                            <div class="receive-note">
                                <span class="fw-bold title">To top up this currency you have to covert from another
                                    currency
                                    in <b>SWAP</b>
                                    section</span><br>
                                <hr>
                                <span class="text-blue-freedy">Or make an international bank transfer toward EURO or
                                    DOLLAR</span>
                                <hr>
                            </div>

                            <a href="<?= base_url() ?>receive/interbank?currency=USD" class="col-8 py-3 my-2">USD
                                International</a>
                            <a href="<?= base_url() ?>receive/interbank?currency=EUR" class="col-8 py-3 my-2">EUR
                                International</a>
                            <div class="receive-note">
                                <span class="text-blue-freedy">
                                    <b>ATTENTION:<br>
                                        UPON THE ARRIVAL OF THE BANK TRANSFER, THE SENT CURRENCY WILL BE CONVERTED INTO
                                        THE
                                        CHOSEN DESTINATION CURRENCY</b>
                                </span>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="login bg-signup">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center">
            <div class="col-10 col-sm-9 col-md-7 col-lg-5 box-form">
                <div class="col-12 text-center my-auto">
                    <h3 class="fw-bold text-blue-freedy">Request Wallet</h3>
                    <?php if ($amount) { ?>
                        <span>Amount : <?= $symbol->symbol ?> <?= number_format($amount, 2) ?></span>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <span class="d-block my-3">Choose your wallet to pay : </span>
                </div>
                <div class="row">
                    <?php foreach ($banks as $data) {
                        if ($data->is_comingsoon == 'no') {

                    ?>
                        <div class="col-auto m-auto">
                            <a href="<?= $data->site ?>/wallet/send?<?= base64_encode('cur=' . $curr . '&ucode=' . $ucode . @$urlamount . '&causal=' . @$causal ) ?>" class="payment-bank my-3 d-flex flex-column rounded text-center">
                                <img src="data:image/png;base64;<?= $data->logo ?>" alt="<?= $data->bank_name ?>" class="m-auto">
                            </a>
                        </div>

                    <?php 
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
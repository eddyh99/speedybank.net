<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">

                <div class="row" style="margin-top: 5rem;">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-12 box-code-freedy px-4 py-3">

                            <div class="d-flex  flex-row">
                                <div class="d-flex flex-column">
                                    <div class="copy-uqcode mt-3 mb-2 me-4 d-flex flex-row align-items-center">
                                        <span class="me-2">UNIQUE CODE : </span>
                                        <input class="me-2" type="text" name="" id="uqcode" value="<?= $_SESSION["ucode"] ?>" readonly>
                                        <a class="btn btn-copy me-2" id="btnuq">
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 2.95397C10.3249 2.96312 9.9197 3.0022 9.59202 3.16916C9.21569 3.36091 8.90973 3.66687 8.71799 4.04319C8.55103 4.37087 8.51194 4.77612 8.5028 5.45117M20 2.95397C20.6751 2.96312 21.0803 3.0022 21.408 3.16916C21.7843 3.36091 22.0903 3.66687 22.282 4.04319C22.449 4.37087 22.4881 4.77612 22.4972 5.45116M22.4972 14.4512C22.4881 15.1262 22.449 15.5315 22.282 15.8592C22.0903 16.2355 21.7843 16.5414 21.408 16.7332C21.0803 16.9001 20.6751 16.9392 20 16.9484M22.5 8.95117V10.9512M14.5001 2.95117H16.5M5.7 22.9512H13.3C14.4201 22.9512 14.9802 22.9512 15.408 22.7332C15.7843 22.5414 16.0903 22.2355 16.282 21.8592C16.5 21.4313 16.5 20.8713 16.5 19.7512V12.1512C16.5 11.0311 16.5 10.471 16.282 10.0432C16.0903 9.66687 15.7843 9.36091 15.408 9.16916C14.9802 8.95117 14.4201 8.95117 13.3 8.95117H5.7C4.5799 8.95117 4.01984 8.95117 3.59202 9.16916C3.21569 9.36091 2.90973 9.66687 2.71799 10.0432C2.5 10.471 2.5 11.0311 2.5 12.1512V19.7512C2.5 20.8713 2.5 21.4313 2.71799 21.8592C2.90973 22.2355 3.21569 22.5414 3.59202 22.7332C4.01984 22.9512 4.57989 22.9512 5.7 22.9512Z" stroke="url(#paint0_linear_46_19516)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_46_19516" x1="25.2621" y1="6.36696" x2="7.42858" y2="8.48342" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.212855" stop-color="#0F4E97"/>
                                                    <stop offset="1" stop-color="#00A7DC"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 my-2">Copy & share your referral link to earn money</span>
                                        <div class="copy-refcode d-flex flex-row justify-content-start mb-4">
                                            <input class="me-2 ps-2 py-2" type="text" name="" id="refcode" value="<?= base_url() ?>auth/signup?ref=<?= $_SESSION["referral"] ?>" readonly >
                                            <a class="btn btn-copy me-2" id="btnref">
                                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2.95397C10.3249 2.96312 9.9197 3.0022 9.59202 3.16916C9.21569 3.36091 8.90973 3.66687 8.71799 4.04319C8.55103 4.37087 8.51194 4.77612 8.5028 5.45117M20 2.95397C20.6751 2.96312 21.0803 3.0022 21.408 3.16916C21.7843 3.36091 22.0903 3.66687 22.282 4.04319C22.449 4.37087 22.4881 4.77612 22.4972 5.45116M22.4972 14.4512C22.4881 15.1262 22.449 15.5315 22.282 15.8592C22.0903 16.2355 21.7843 16.5414 21.408 16.7332C21.0803 16.9001 20.6751 16.9392 20 16.9484M22.5 8.95117V10.9512M14.5001 2.95117H16.5M5.7 22.9512H13.3C14.4201 22.9512 14.9802 22.9512 15.408 22.7332C15.7843 22.5414 16.0903 22.2355 16.282 21.8592C16.5 21.4313 16.5 20.8713 16.5 19.7512V12.1512C16.5 11.0311 16.5 10.471 16.282 10.0432C16.0903 9.66687 15.7843 9.36091 15.408 9.16916C14.9802 8.95117 14.4201 8.95117 13.3 8.95117H5.7C4.5799 8.95117 4.01984 8.95117 3.59202 9.16916C3.21569 9.36091 2.90973 9.66687 2.71799 10.0432C2.5 10.471 2.5 11.0311 2.5 12.1512V19.7512C2.5 20.8713 2.5 21.4313 2.71799 21.8592C2.90973 22.2355 3.21569 22.5414 3.59202 22.7332C4.01984 22.9512 4.57989 22.9512 5.7 22.9512Z" stroke="url(#paint0_linear_46_19516)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_46_19516" x1="25.2621" y1="6.36696" x2="7.42858" y2="8.48342" gradientUnits="userSpaceOnUse">
                                                        <stop offset="0.212855" stop-color="#0F4E97"/>
                                                        <stop offset="1" stop-color="#00A7DC"/>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url() ?>qr/ref/<?= $_SESSION["ucode"] ?>Thumbnail.png" download class="qrcode-download ms-auto mt-3 d-flex flex-column align-items-center">
                                    <img class="img-fluid" src="<?= base_url() ?>qr/ref/<?= $_SESSION["ucode"] ?>.png" alt="QR" width="90" height="90">
                                    <div>
                                        <img class="img-fluid d-block d-sm-none" src="<?=base_url()?>assets/img/speedybank/btn-qrdw-mobile.png" alt="dw-qr" width="15" height="auto">
                                    </div>
                                    <div>
                                        <img class="img-fluid d-none d-sm-block" src="<?=base_url()?>assets/img/speedybank/btn-qrdw.png" alt="dw-qr" width="90" height="auto">
                                    </div>
                                </a>
                            </div>
                            <div class="w-100 text-center mt-4">
                                <div class="d-inline-block btn-head-crypto">
                                    <a class="crypto px-4 py-2 active" href="<?= base_url() ?>homepage/">FIAT</a>
                                    <a class="crypto px-4 py-2" href="<?= base_url() ?>homepage/crypto">CRYPTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="row d-flex justify-content-center">
                    
                    <div class="row col-12 col-md-10 d-flex justify-content-center">
                        <div class="col-12 mx-auto my-5">
                            <h1 class="text-blue-freedy fw-bolder f-hahmlet text-center">Dashboard</h1>
                        </div>

                        <div class="col-12 menus-list-app mb-2">
                            <div class="row f-alegreya currencies-card mx-auto">
                                <div class="col-12 col-md-6 text-center mx-auto">
                                    <a href="<?= base_url() ?>homepage/setting_currency" class="d-flex align-items-center justify-content-center p-2 my-2">
                                        <img src="<?= base_url()?>assets/img/speedybank/select-currencies.png" alt="gear">
                                        <span class="ms-2 f-jakarta text-blue-freedy fw-bolder btn-select-currencies">Select Currencies</span>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 text-center mx-auto">
                                    <a href="<?= base_url() ?>card" class="d-flex align-items-center justify-content-center p-2 my-2 ">
                                        <img class="" src="<?= base_url()?>assets/img/speedybank/cardhome.png" alt="">
                                        <span class="ms-5 f-jakarta text-blue-freedy fw-bolder btn-select-currencies">Card</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 curencies-list-app">
                            <div class="col-12">
                                <?php foreach ($currency as $dt) {
                                    if ($dt->status == 'active') {
                                        if (($dt->currency == "USD") || ($dt->currency == "EUR")) {
                                ?>
                                            <a href="<?= base_url() ?>homepage/wallet?cur=<?= $dt->currency ?>" class="d-flex flex-row justify-content-center align-items-center curencies-list py-4 px-3 my-2">
                                                <span class="me-auto"><?= $dt->currency ?></span>
                                                <span><?= $dt->symbol; ?>
                                                    <?= substr(number_format($dt->balance, 4), 0, -2) ?></span>
                                            </a>
                                <?php }
                                    }
                                }
                                ?>
                                <?php foreach ($currency as $dt) {
                                    if ($dt->status == 'active') {
                                        if (($dt->currency != "USD") && ($dt->currency != "EUR")) {
                                ?>
                                            <a href="<?= base_url() ?>homepage/wallet?cur=<?= $dt->currency ?>" class="d-flex flex-row justify-content-center align-items-center curencies-list py-4 px-3 my-2">
                                                <span class="me-auto"><?= $dt->currency ?></span>
                                                <span><?= $dt->symbol; ?>
                                                    <?= substr(number_format($dt->balance, 4), 0, -2) ?></span>
                                            </a>
                                <?php }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
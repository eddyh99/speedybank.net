<!-- ======= Hero Section ======= -->
<section id="" class="d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>#guide">
                        <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                    </a>
                </div>
            </div>

            <?php if ($guide == 99) { ?>
                <div class="col-12 my-5 text-center">
                    <h1>Coming soon!</h1>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">

                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <!-- Start Wallet -->
            <?php if ($guide == 1) { ?>
                <div class="col-12 my-5 ">
                    <div class="logo-text wallet text-center">
                        <span class="fw-bolder text-blue-freedy f-hahmlet py-3">Wallet</span>
                    </div>
                </div>
                <div class="position-relative mb-0 mb-lg-5">
                    <div class="position-absolute element-banking d-none d-lg-block">
                        <svg width="111" height="349" viewBox="0 0 111 349" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-195 4.99999C-195 2.23857 -192.761 0 -190 0H106C108.761 0 111 2.23858 111 5V344C111 346.761 108.761 349 106 349H-190C-192.761 349 -195 346.761 -195 344V4.99999Z" fill="#0F4E97"/>
                        </svg>
                    </div>
                    <div class="position-absolute element-banking right d-none d-lg-block">
                        <svg width="106" height="349" viewBox="0 0 106 349" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="306" height="349" rx="5" fill="#0F4E97"/>
                        </svg>
                    </div>
                    <div class="container p-r mb-5 pb-5">
                        <div class="row gx-0 features-text">
                            <div class="col-12 col-lg-7 mx-auto ">
                                <div class="content-freedy text-center">
                                    <h3 class="d-inline-block p-r f-hahmlet text-black">
                                        The Importance of the <span class="text-blue-freedy"> Unique Code </span>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 mx-auto text-center mt-4 f-jakarta">
                                <p>
                                    Your wallet is identified through the ‘’Unique Code’’ <br> (you can find it on the homepage of your  wallet ). You have to use your Unique Code in order to top up your wallet and receive incoming transfers.
                                </p>
                                <p >
                                    <span translate="no"> SpeedyBank </span> offers the possibility of making bank transfers, directly from your wallet, to any  bank accounts, even not under your name,without any documentation required and anonymously.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="accordion" id="accordionFreedy">
                        <div class="accordion-item freedy-accordion-item mb-5">
                            <h2 class="accordion-header m-0" id="pageOne">
                                <button id="btnaccorionOne" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <div class="box-title-accordion ms-auto text-center">
                                        <span class="head text-blue-freedy f-hahmlet py-3">How to Topup your wallet and receive funds</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="pageOne" data-bs-parent="#accordionFreedy">
                                <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                    <?php $this->load->view('auth/landingpage/guide-1-1'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item freedy-accordion-item mb-5">
                            <h2 class="accordion-header m-0" id="pageTwo">
                                <button id="btnaccorionTwo" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="box-title-accordion ms-auto text-center">
                                        <span class="head text-blue-freedy f-hahmlet py-3">How to make a wallet to wallet transfer</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="pageTwo" data-bs-parent="#accordionFreedy">
                                <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                    <?php $this->load->view('auth/landingpage/guide-1-2'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item freedy-accordion-item mb-5">
                            <h2 class="accordion-header m-0" id="pageThree">
                                <button id="btnaccorionThree" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="box-title-accordion ms-auto text-center">
                                        <span class="head text-blue-freedy f-hahmlet py-3">How to convert currencies </span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="pageThree" data-bs-parent="#accordionFreedy">
                                <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                    <?php $this->load->view('auth/landingpage/guide-1-3'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item freedy-accordion-item mb-5">
                            <h2 class="accordion-header m-0" id="pageFour">
                                <button id="btnaccorionFour" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <div class="box-title-accordion ms-auto text-center">
                                        <span class="head text-blue-freedy f-hahmlet py-3">How to withdraw funds and make bank transfers</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="pageFour" data-bs-parent="#accordionFreedy">
                                <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                    <?php $this->load->view('auth/landingpage/guide-1-4'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Wallet  -->
            
            <!-- Start Capital Exportation -->
            <?php if ($guide == 2) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center features-text">
                        <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-2.png" alt="icon-2">
                        <span class="fw-bolder title-top-header text-blue-freedy f-hahmlet">Capital Exportation</span>
                    </div>
                </div>
                <div class="col-12 mb-5 features-text">
                    <div class="col-12 col-lg-8 text-center mb-5 mx-auto">
                        <p class="f-jakarta">
                            Given the increasingly stringent and restrictive regulations on international bank transfers,
                            <span translate="no"> SpeedyBank </span> offers a simple, risk-free and 100% legal solution.
                            The user who wants to send capital abroad will have to open a <span translate="no"> SpeedyBank
                            </span> account and will
                            have to carry out the following procedure to remain in the legality and away from tax
                            assessments:
                        </p>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="d-flex flex-column flex-md-row flex-wrap justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4 px-2 py-2">
                                <div class="card freedy-card small text-center">
                                    <div class="card-body">
                                        <h5 class="card-title f-hahmlet text-blue-freedy fw-bold pb-3">Step 1</h5>
                                        <p class="card-text f-jakarta"><b>Top up wallet</b> (the top up is not a credit transfer and
                                            therefore is not fiscally relevant as it is not comparable to a payment).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 px-2 py-2">
                                <div class="card freedy-card small text-center">
                                    <div class="card-body">
                                        <h5 class="card-title f-hahmlet text-blue-freedy fw-bold pb-3">Step 2</h5>
                                        <p class="card-text f-jakarta"><b>Convert</b> the amount to export into the currency of the
                                            destination country (the currency conversion is also not fiscally relevant).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 px-2 py-2">
                                <div class="card freedy-card small text-center">
                                    <div class="card-body">
                                        <h5 class="card-title f-hahmlet text-blue-freedy fw-bold pb-3">Step 3</h5>
                                        <p class="card-text f-jakarta"><b>Send</b> the converted amount, via our platform, as a
                                            national transfer (with this procedure the international transfer is
                                            eliminated).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mb-5 features-text">
                        <h3 class="text-dark f-hahmlet fw-bold">How we make this service possible?</h3>
                        <div class="col-12 col-md-8 mx-auto my-4">
                            <img src="<?= base_url() ?>assets/img/speedybank/img-13.png" alt="" class="img-fluid">
                        </div>
                        <p class="col-12 col-lg-9 mx-auto f-jakarta">
                            <span translate="no"> SpeedyBank, </span> making use of the licensee company's capitals, partners and offices, in order to respect the laws in force on the matter, will not carry out an international transfer but will send a national transfer from the current account of the country of destination to the current account required by the sender, in the same country, carrying out an internal clearing only afterwards (the internal clearing procedure is 100% legal).
                        </p>
                    </div>
                </div>
            <?php } ?>
            <!-- End Capital Exportation -->

            <!-- Start Easy Trip -->
            <?php if ($guide == 3) { ?>
                <div class="col-12 my-5 features-text">
                    <div class="logo-text text-center">
                        <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-3.png" alt="">
                        <span class="fw-bold title-top-header f-hahmlet text-blue-freedy mt-4">Business Trips</span>
                    </div>
                </div>
                <div class="col-12 mb-5 text-center  features-text">
                    <h3 class="fw-semibold f-hahmlet">With <span translate="no"> Speedybank </span> your money travels with you.</h3>
                    <p class="f-jakarta col-12 col-lg-7 mx-auto mt-3">Follow few easy steps to instant convert FIAT currencies and make easy payments from wherever
                        you want
                    </p>
                </div>

                <div class="col-12 mb-5">
                    <div class="d-flex flex-column flex-md-row flex-wrap justify-content-center">
                        <div class="col-12 col-md-6 col-lg-3 text-center px-2 py-2">
                            <h5 class="card-title my-3 text-blue-freedy fw-bold ">Step 1</h5>
                            <div class="card freedy-card text-center">
                                <div class="card-body">
                                    <p class="card-text">
                                        <span class="fw-bolder pb-3">
                                            Top up your wallet by bank transfers
                                        </span>
                                        <br> <br>
                                        in one of the 10 currencies that allows you to receive bank transfers.<br>
                                        You just need to follow the easy procedure that you can find in the
                                        ‘’Deposit/Receive’’ section of your wallet
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 text-center px-2 py-2">
                            <h5 class="card-title my-3 text-blue-freedy fw-bold">Step 2</h5>
                            <div class="card freedy-card text-center">
                                <div class="card-body">
                                    <p class="card-text">
                                        <span class="fw-bolder pb-3">
                                            Select one of the currencies
                                        </span>
                                        <br> <br>
                                        where you have the funds and
                                        Click the button ‘’Swap’’ </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 text-center px-2 py-2">
                            <h5 class="card-title my-3 text-blue-freedy fw-bold">Step 3</h5>
                            <div class="card freedy-card text-center">
                                <div class="card-body">
                                    <p class="card-text">
                                        <span class="fw-bolder pb-3">
                                            Enter the amount
                                        </span>
                                        <br> <br>
                                        choose
                                        one of the 40 currencies that allows you to convert and send and
                                        click ‘’Confirm’’
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 text-center px-2 py-2">
                            <h5 class="card-title my-3 text-blue-freedy fw-bold">Step 4</h5>
                            <div class="card freedy-card text-center">
                                <div class="card-body">
                                    <p class="card-text">
                                        <span class="fw-bolder pb-3">
                                            Congratulations!
                                        </span>
                                        <br> <br>
                                        Now you can make easy and fast payments in the currency of the country you are in
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Easy Trip -->

            <!-- Start Daily Use -->
            <?php if ($guide == 4) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center">
                        <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-4.png" alt="">
                        <span class="f-hahmlet fw-bold text-blue-freedy">Daily use</span>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-12 col-md-8 features-text">
                            <p class="f-jakarta">
                                The wallet functions of <span translate="no"> SpeedyBank </span> are suitable for all daily
                                payments, even for small
                                amounts; everywhere in the world.
                            </p>
                            <div class="col-12 d-flex flex-column justify-content-center">
                                <div class="content-freedy circle text-start">
                                    <ul class="ps-0 text-black f-jakarta">
                                        <li class="ali">Low and fixed fees </li>
                                        <li class="ali">Convert currencies for free during any trip</li>
                                        <li class="ali">More convenient, faster and safer than the use of cash and credit cards</li>
                                        <li class="ali">Users will be able to make any payment from his own device </li>
                                        <li class="ali">The balance will be updated in real time </li>
                                        <li class="ali">The remaining balance can be consulted directly through the specific application</li>
                                        <li class="ali">Respect of the privacy and anonymity of each user as no sms email or
                                            paper will be sent</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-none d-md-grid">
                            <img src="<?= base_url() ?>assets/img/speedybank/img-12.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Daily Use -->

            <!-- Start Buy & Sell FIAT Currencies -->
            <?php if ($guide == 5) { ?>
                <div class="col-12 mt-5"></div>
                <div class="position-relative mt-5 mb-0 mb-lg-5">
                    <div class="position-absolute element-banking d-none d-lg-block">
                        <svg width="109" height="500" viewBox="0 0 109 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-225 4.99999C-225 2.23857 -222.761 0 -220 0H104C106.761 0 109 2.23858 109 5V559C109 561.761 106.761 564 104 564H-220C-222.761 564 -225 561.761 -225 559V4.99999Z" fill="#0F4E97"/>
                        </svg>

                    </div>
                    <div class="position-absolute element-banking right d-none d-lg-block">
                        <svg width="112" height="500" viewBox="0 0 112 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="348" height="500" rx="5" fill="#0F4E97"/>
                        </svg>
                    </div>
                    <div class="container p-r mb-5 pb-5">
                        <div class="row gx-0">
                            <div class="col-12 col-lg-7 mx-auto ">
                                <div class="content-freedy text-center">
                                    <h3 class="d-inline-block p-r f-hahmlet text-blue-freedy">
                                        Buy and sell crypto using Fiat currencies <span translate="no"> ‘’Trade-Off </span> Platform’’
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 mx-auto text-center mt-4 features-text">
                                <p class="text-black f-jakarta">
                                    <span translate="no"> SpeedyBank </span> offers the possibility to buy and sell cryptocurrencies using FIAT, directly from any FIAT balance of your <span translate="no"> SpeedyBank </span>  wallet.
                                    <br>
                                    <span translate="no"> SpeedyBank </span> also gives the possibility to withdraw
                                    your funds by converting them INTO ANY FIAT CURRENCY; after conversion you can send your funds to any bank account, even if it is not under your name,
                                    thanks to the integrated <span translate="no"> trade-off </span> platform.
                                </p>
                                <p class="text-black f-jakarta">
                                    On <span translate="no"> SpeedyBank, </span> being a trade-off platform,  the ‘’Buy’’ and ‘’Sell’’ orders are just  ‘’LIMIT’’ orders.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 mb-5 ">
                    <div class="col-12 text-center mb-5">
                        <h3 class="fw-bold text-blue-freedy f-hahmlet">How to top up crypto wallet</h3>

                        <p class="mt-3 f-jakarta">In order to topup your <span translate="no"> Speedybank </span> crypto wallet follow the procedure below :</p>

                    </div>
                    <div class="d-flex flex-row justify-content-center flex-wrap">
                        <div class="in-crypto">
                            <span>Step 1</span>
                            <div class="box-crypto">
                                <p class="mb-3">Log in to your <b class="fw-semibold translate="no"> SpeedyBank </b> wallet and select
                                    crypto</p>
                                <img class="my-auto img-fluid" src="<?= base_url() ?>assets/img/speedybank/crypto-1.png" alt="crypto-1">
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 2</span>
                            <div class="box-crypto">
                                <p class="mb-3">Click top up button</p>
                                <img class="my-auto img-fluid" src="<?= base_url() ?>assets/img/speedybank/crypto-2.png" alt="">
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 3</span>
                            <div class="box-crypto">
                                <p class="mb-3">Select the FIAT currency that you want to convert in USDX, enter the
                                    amount and click convert</p>
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 4</span>
                            <div class="box-crypto">
                                <p class="mb-3">After clicking convert make sure that all data are correct and then click
                                    on the button confirm</p>
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 5</span>
                            <div class="box-crypto">
                                <p class="mb-3">Congratulations! Now you can start to buy and sell crypto</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5 features-text">
                        <h3 class="fw-bold f-hahmlet text-blue-freedy">How to buy and sell crypto by placing limit order</h3>

                        <p class="mt-3 col-10 mx-auto">
                            A buy limit order will be executed only at the limit price or a lower price and a sell limit order will be executed only at the limit price or a higher one.The price is guaranteed, but the filling of the order is not. Limit orders will be executed only if the price meets the order qualifications.
                        </p>

                        <div class="box-p-crypto p-4">
                            <p class="f-jakarta col-11 mx-auto">To start trading, enter the price you want to trade at, once you've entered the amount, you
                                can choose to enter the amount of cryptocurrency you want to buy/sell  or the USDX amount
                                you want to spend or receive.</p>
                        </div>

                        <h3 class="fw-bold f-hahmlet text-blue-freedy mt-5">How to withdraw your earning</h3>

                        <p class="mt-3 f-jakarta">
                            In order to withdraw your your funds follow the procedure below :
                        </p>

                    </div>

                    <div class="d-flex flex-row justify-content-center flex-wrap">
                        <div class="in-crypto">
                            <span>Step 1</span>
                            <div class="box-crypto">
                                <p class="mb-3">From your wallet, in crypto section, click the button withdraw</p>
                                <img class="my-auto img-fluid" src="<?= base_url() ?>assets/img/speedybank/crypto-3.png" alt="">
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 2</span>
                            <div class="box-crypto">
                                <p class="mb-3">Enter the USDX amount that you want to convert, choose your favorite FIAT
                                    currency and click withdraw</p>
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 3</span>
                            <div class="box-crypto">
                                <p class="mb-3">After clicking withdraw make sure that all data are correct and then click
                                    on confirm</p>
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 4</span>
                            <div class="box-crypto">
                                <p class="mb-3">Congratulations! Now your balance is available on your FIAT wallet, in the
                                    chosen currency</p>
                            </div>
                        </div>
                        <div class="in-crypto">
                            <span>Step 5</span>
                            <div class="box-crypto">
                                <p class="mb-3">Now you can transfer your funds to any bank account, even if is not under
                                    your name, in more than 40 currencies</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center fw-bold">
                    <h3>Coming soon</h3>
                </div>
            <?php } ?>
            <!-- End Buy & Sell FIAT Currencies -->

            <?php if ($guide == 11) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center">
                        <img src="<?= base_url() ?>assets/img/icon-guide-4.png" alt="">
                        <span class="f-lexend text-blue-freedy">Essential for your trips</span>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="text-dark">With SpeedyBank your money travels with you.</h3>
                            <p>
                                With this function integrated into your wallet, you will be able to see all the activities
                                that accept <b translate="no"> ExchangeTailor </b> as a collection and payment system.
                            </p>
                        </div>
                        <div class="col-6 d-none d-md-grid">
                            <img src="<?= base_url() ?>assets/img/img-13.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Start Search -->
            <?php if ($guide == 6) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center">
                        <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-6.png" alt="">
                        <span class="f-hahmlet fw-bolder text-blue-freedy">Search</span>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-12 col-md-6 my-auto features-text">
                            <p class="f-jakarta px-5">With this function integrated into your wallet, you will be able to see all the activities
                                that accept <span translate="no"> SpeedyBank </span> as a collection and payment system.
                            </p>
                        </div>
                        <div class="col-6 d-none d-md-grid mx-auto">
                            <img src="<?= base_url() ?>assets/img/speedybank/img-14.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Search -->
            
            <!-- Start Findme -->
            <?php if ($guide == 7) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center">
                        <div class="d-flex justify-content-center align-items-center mx-auto ">
                            <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-7.png" alt="icon-guide-7">
                        </div>
                        <span class="f-hahmlet fw-bolder text-blue-freedy mt-3">Find me</span>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="row features-text d-flex align-items-start">
                        <div class="col-12 col-md-6 text-md-start">
                            <p class="f-jakarta"><span translate="no"> SpeedyBank </span> allows you to increase the visibility of your business
                                by including it in the
                                search section that will be in every single wallet of all the users.
                                <br>
                                In this way your company will be easily accessible and traceable by all users who use
                                <span translate="no"> SpeedyBank </span> for daily payments.
                            </p>
                            <h6 class="fw-bolder f-hahmlet mt-5 " style="color: #1D003F;">
                                START TO APPLY NOW FOR FIND ME SERVICE
                            </h6>
                            <form id="form-input-unique-code" action="<?=base_url()?>link/getref" method="post" class="w-100 my-3">
                                <input 
                                    type="hidden" 
                                    id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>" 
                                    class="input-unique-code"    
                                >   
                                <div class="row d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-lg-start">
                                    <div class="col-12 col-md-9 col-lg-7 col-xl-5">
                                        <input type="text" name="ucode" maxlength="8" class="input-unique-code" placeholder="Enter your Unique Code">
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-2">
                                        <button type="submit" class="btn-unique-code d-flex justify-content-center align-items-center btn my-3">
                                            <span class="mx-3">
                                                Next
                                            </span>
                                            <div class="circle-btn-unique-code flex justify-content-center">
                                                <i class="ri-arrow-right-line fs-4"></i>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <h6 class="fw-bolder f-hahmlet my-5" style="color: #1D003F;">
                                How to register to FIND ME service :
                            </h6>
                            
                            <div class="col-12 d-flex flex-column justify-content-center">
                                <div class="content-freedy line text-start d-flex flex-row">
                                
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-6 d-none d-md-block mx-auto">
                            <img src="<?= base_url() ?>assets/img/speedybank/img-15.png" alt="" class="img-fluid">
                        </div>
                        
                        <div class="d-none d-md-block col-12 col-lg-10 features-text mt-4">
                            <p class="f-jakarta">
                                Enter your unique code in order to validate your account, then click next and fill out all the fields that you find on the next pages, make sure to have ready an image of your business logo of and prepare the google maps link your business location
                            </p>

                            <p class="f-jakarta">
                                If you encounter problems while applying, contact our support service :
                            </p>

                            <p class="fw-semibold f-jakarta text-decoration-underline">
                                    contact@SpeedyBank.com
                            </p>
                        </div>
                    </div>
                </div>
                
            <?php } ?>
            <!-- End Findme -->
            
            <!-- Start Collection & Payment -->
            <?php if ($guide == 8) { ?>
                <div class="col-12 my-5">
                    <div class="logo-text text-center features-text">
                        <img src="<?= base_url() ?>assets/img/speedybank/iconin-guide-8.png" alt="">
                        <span class="f-hahmlet title-top-header fw-bolder text-blue-freedy mt-4">Collections and Payments</span>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="content-freedy">
                        <div class="row features-text mx-auto">
                            <div class="col-12 col-md-7">
                                <p class="f-jakarta">
                                    <span translate="no"> SpeedyBank </span> offers your company, a multi-currency collection
                                    and payment system that
                                    can
                                    be easily integrated into your e-commerce :
                                </p>
                                <div class="col-12 d-flex flex-column justify-content-center">
                                    <div class="content-freedy circle text-start d-flex flex-row">
                                        <ul class="ps-0 f-jakarta">
                                            <li class="ali text-black">Integration is free of charge</li>
                                            <li class="ali text-black">No monthly and no annual fees</li>
                                            <li class="ali text-black">Collections in real time from users of the <span translate="no"> TracklessBank </span> circuit
                                            </li>
                                            <li class="ali text-black">Cheaper than credit cards</li>
                                            <li class="ali text-black">Reception and sending of national and international bank transfers at the lowest rates on the market</li>
                                            <li class="ali text-black">100% secure and free custody of funds</li>
                                            <li class="ali text-black">Possibility of converting instantly to and from other currencies.</li>
                                            <li class="ali text-black">Eliminates the problem of tedious changes compared to the use of
                                                cash</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-5 d-none d-md-block ">
                                <img src="<?= base_url() ?>assets/img/speedybank/img-23.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-12 features-text">
                                <h4 class="text-dark f-jakarta">Request the service by contacting : ........@trackless.com</h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- End Collection & Payment -->
        </div>
    </div>
</section><!-- End Hero -->


<!-- Notifikasi -->
<?php if (@isset($_SESSION["success"])) { ?>
<div class="alert alert-success alert-dismissible" id="success-alert" style="display: grid; position: fixed; top: 10px; z-index: 99999; padding: 1rem;
left: 0;
right: 0;
max-width: 300px;
margin: 0 auto;">
    <?= $_SESSION["success"]; ?>
</div>
<?php } ?>

<?php if (@isset($_SESSION["failed"])) { ?>
<div class="alert alert-danger alert-dismissible" id="danger-alert" style="display: grid; position: fixed; top: 10px; z-index: 99999; padding: 1rem;
left: 0;
right: 0;
max-width: 300px;
margin: 0 auto;">
    <?= $_SESSION["failed"]; ?>
</div>
<?php } ?>
<!-- ======= Start Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a class="logo d-flex align-items-center">
            <img class="img-fluid" src="<?= base_url() ?>assets/img/speedybank/logoindex.png" alt="mylogo">
        </a>

        <nav id="navbar" class="navbar">
            <ul class="px-5">
                <li><a class="f-hahmlet nav-link navbar-freedy scrollto" href="#service">Services</a></li>
                <li><a class="f-hahmlet nav-link navbar-freedy scrollto" href="#guide">Guide</a></li>
                <li><a class="f-bevietnam nav-link navbar-freedy scrollto" href="#specifications">Specifications</a>
                </li>
                <li><a class="f-bevietnam nav-link navbar-freedy scrollto" href="<?= base_url() ?>link/translate">Translate</a></li>
                <li><a class="f-bevietnam nav-link navbar-freedy scrollto" href="#downloadwallet">Download wallet</a></li>
                <li><a class="f-bevietnam nav-link mx-0 my-2 mx-lg-2 my-lg-auto text-center btn-login active" href="<?= base_url(); ?>auth/signup">Register</a>
                </li>
                <li>
                    <a class="f-bevietnam nav-link mx-0 my-2 mx-lg-2 my-lg-auto text-center btn-login" href="<?= base_url(); ?>auth/login">Log in</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->

<!-- START HERO SECTION -->
<div id="top" class="hero ">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-7 col-xl-6 d-flex flex-column justify-content-center slider-freedy text-start">
                <h1 class="f-hahmlet fw-bold"><b translate="no"> SpeedyBank </b><br>
                    <span class="text-black">Funds Relocation</span>
                </h1>
                <p class="f-jakarta my-3">
                    Anonymous multi currency wallet, with the main functions of a bank account that allows you to instantly convert your wallet balance into the destinantion currency, making easy your funds relocations.
                    <br> <br>
                    Carry out comfortably all the payments and bank transfers you want directly from your wallet.
                    <br> <br>
                    Buy and sell crypto using FIAT thanks to the <span translate="no"> trade-off </span> platform integrated or you can do forex with FIAT currencies.
                </p>
                <div class="d-flex flex-wrap mt-5 pt-5">
                    <a href="<?= base_url(); ?>auth/signup" class="btn-slider-signin active d-inline-flex align-items-center justify-content-center align-self-center me-3 mb-3">
                        <span class="f-roboto">Register</span>
                    </a><a href="<?= base_url(); ?>auth/login" class="btn-slider-signin d-inline-flex align-items-center justify-content-center align-self-center me-3 mb-3">
                        <span class="f-roboto">Log in</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-6 d-none d-lg-block d-flex flex-column justify-content-end align-items-end">
                <div>
                    <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/herospeedy.png" alt="hero maps">
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-12 col-lg-4">
                <a href="https://tracklessbank.com/" target="_blank">
                    <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/institute.png" alt="institute of trackless">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<main id="main">
    <!-- ======= Start Transfer Money ======= -->
    <section id="service" class="about position-relative">
        <div class="container p-r">
            <div class="row gx-0">
                <div class="row transfer-money">
                    <div class="col-12 col--lg-8 mx-auto text-start text-lg-center">
                        <h1 class="f-hahmlet fw-bold">Transfer Money <b>Worldwide</b> <br> <b>Fast & Easy</b></h1>
                    </div>
                </div>
                <div class="row mt-5 pt-3">
                    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center mb-5 ps-lg-5">
                        <div class="content-freedy p-r">
                            <ul class="p-0 f-jakarta ">
                                <li class="pb-1">Anonymous multi currency wallet, just an email and password are required  
                                    <u translate="no">
                                        <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('2') ?>">
                                            (No KYC & No AML)
                                        </a>
                                    </u> 
                                </li>

                                <li class="pb-1">Quick and free opening</li>

                                <li class="pb-1"><span translate="no"> SpeedyBank </span> provides a <span translate="no"> non-custodial wallet </span> </li>

                                <li class="pb-1">
                                    <u>
                                        <a href="<?= base_url()?>link/guide?guide=<?= base64_encode('2')?>">
                                            Capital exportation 100% legal
                                        </a>
                                    </u>
                                </li>

                                <li class="pb-1">Withdraw/send your funds from/to any bank account of the world, even if it is not under your name</li>
                            </ul>
                            <div class="text-start mt-5 ms-5">
                                <a href="<?= base_url(); ?>auth/signup" class="btn-content-freedy d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span class="">Register</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-12 col-lg-6 ">
                        <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/transfer-money-banner.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="element-transfer-money d-none d-lg-block ">
            <svg width="52" height="306" viewBox="0 0 52 306" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="306" height="306" rx="5" fill="#0F4E97"/>
            </svg>
        </div>
    </section>

    <section id="" class="about position-relative">
        <div class="container p-r">
            <div class="row gx-0">
                <div class="row">
                    <div class="d-none d-lg-block col-12 col-lg-6 ">
                        <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/transfer-money-banner-right.svg" alt="">
                    </div>
                    <div class="col-12 col-lg-6 d-flex flex-column justify-content-center mb-5 ps-lg-5">
                        <div class="content-freedy content-bottom p-r">
                            <ul class="p-0 f-jakarta fw-semibold">
                                <li class="pb-1"><span>Receive</span> funds in 10 FIAT currencies</li>

                                <li class="pb-1"><span>Convert</span> FIAT instantly at the real exchange rate without any fee</li>

                                <li class="pb-1"><span>Custody</span> and sending of money in more than 40 FIAT currencies.</li>

                                <li class="pb-1"><span>Trading</span> your crypto from everywhere you are</li>

                                <li class="pb-1"><span>Keep your currencies safe</span> in your wallet and make <span class="text-blue-freedy"> instant payments </span> worldwide between all the users of <span translate="no"> TracklessProject </span> and you can carry out <span class="text-blue-freedy">bank transfers</span> toward all bank accounts directly from your wallet</li>

                                <li class="pb-1"><span>Forex</span> of FIAT </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="element-transfer-money-right d-none d-lg-block ">
            <svg width="45" height="306" viewBox="0 0 45 306" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="-261" width="306" height="306" rx="5" fill="#0F4E97"/>
            </svg>
        </div>
    </section>
    <!-- ======= End Transfer Money ======= -->

    <!-- ======= Start Accordion How To Use ======= -->
    <section id="guide" class="about bg-flowers">
        <div class="container p-r">
            <div class="row gx-0">
                <div class="accordion text-center" id="accordionFreedy">
                    <div class="accordion-item freedy-accordion-item mb-5 d-inline-block">
                        <div class="col-12">
                            <div class="content-freedy p-r text-center">
                                <button id="btnaccorionOne" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <div class="box-title-accordion ms-auto text-center">
                                        <span class="head px-5 f-hahmlet text-black py-2">How to use <span class="text-blue-freedy">SpeedyBank</span></span>
                                        <span class="small f-jakarta" id="seemoreOne">(read more)</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="col-12 collapse-guide accordion-collapse collapse" aria-labelledby="pageOne" data-bs-parent="#accordionFreedy">
                        <div class="row d-flex flax-wrap justify-content-center align-items-center">
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-1.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Wallet</span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('1') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img  src="<?= base_url() ?>assets/img/speedybank/icon-guide-2.png" alt="" class="bg-red img-fluid">
                                        <span class="title mt-5 f-jakarta">Capital exportation</span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('2') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-3.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Business trips</span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('3') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-4.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Daily use </span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('4') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-5.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Buy&sell crypto with FIAT</span>
                                    </div>    
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('5') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-6.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Search activities</span>
                                    </div> 
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('6') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-7.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Find me</span>
                                    </div>    
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('7') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 mb-0 mb-md-5 py-3 list-different">
                                <div class="items-different p-4 d-flex flex-column justify-content-between align-items-center text-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-guide-8.png" alt="" class="bg-red">
                                        <span class="title mt-5 f-jakarta">Collections & payments</span>
                                    </div>   
                                    <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('8') ?>" class="py-2 px-3">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======== End Accordion How To Use ======== -->

    <!-- Start First Debit Card -->
    <section class="about position-relative">
        <div class="position-absolute c-first-debit">
            <svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.07" fill-rule="evenodd" clip-rule="evenodd" d="M69.4256 6.22293C47.0195 -6.2769 18.7226 1.75378 6.22273 24.1599C-6.2771 46.5661 1.75358 74.863 24.1597 87.3628C46.5659 99.8627 74.8628 91.832 87.3626 69.4258C99.8625 47.0197 91.8318 18.7228 69.4256 6.22293Z" fill="#0063AD"/>
            </svg>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-7">
                    <h1 class="f-hahmlet title-first-debit fw-bold mb-5">The first debit card <br> <span>completely anonymous that protect your privacy</span></h1>
                    <div class="row">
                        <div class="col-12 col-md-6 wrap-card-first-debit">
                            <div class="card-first-debit mt-3 p-4 f-jakarta fw-semibold">
                                Pay comfortably everywhere in the world keeping your privacy safe
                            </div>
                        </div>
                        <div class="col-12 col-md-6 wrap-card-first-debit">
                            <div class="card-first-debit mt-3 p-4 f-jakarta fw-semibold">
                                Withdraw your funds from any country, in a confidential way, with your physical card
                            </div>    
                        </div>
                        <div class="col-12 col-md-6 wrap-card-first-debit">
                            <div class="card-first-debit mt-3 p-4 f-jakarta fw-semibold">
                                Convert your  crypto into Fiat currency for using them with your card
                            </div>    
                        </div>
                        <div class="col-12 col-md-6 wrap-card-first-debit">
                            <div class="card-first-debit mt-3 p-4 f-jakarta fw-semibold">
                                Compatible with <span translate="no"> GooglePay ApplePay </span> and others
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-lg-row align-items-center mb-5 pb-5">
                        <div class="text-start mt-5 me-0 me-lg-5">
                            <a href="<?= base_url(); ?>auth/signup" class="btn-content-freedy d-inline-flex align-items-center justify-content-center align-self-center">
                                <span class="">Register Now</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-5 d-none d-lg-block">
                    <img class="img-fluid" src="<?= base_url()?>assets/img/speedybank/card-visa.png" alt="card-visa">
                </div>
            </div>
        </div>
    </section>
    <!-- End First Debit Card -->

    <!-- ======= Start Get Reward ======= -->
    <section id="reward" class="about bg-section-reward">
        <div class="container p-r">
            <div class="row gx-0 d-flex align-items-center">
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center mb-5 pb-3">
                    <div class="content-freedy p-r">
                        <h2 class="f-hahmlet text-black mb-5 ">Get A Passive Income<br>
                            <span class="text-blue-freedy">
                                With Our Affiliate Campaign
                            </span>
                        </h2>
                        <p class="fw-normal f-jakarta pe-xl-5 me-xl-5" style="color: #000000;">
                            Every account has a personal referral link (with a referral code) you just need to share your referral link and let your contacts register on the platform using it.
                        </p>
                        <p class="fw-normal f-jakarta pe-xl-5 me-xl-5" style="color: #000000;">
                            You will be rewarded for every single FIAT transaction and crypto buy&sell carried out by who signed up using your personal referral link.
                        </p>
                        <div class="text-start mt-5 pt-4 mb-5">
                            <a href="<?= base_url(); ?>link/lern_reward" class="btn-content-freedy d-inline-flex align-items-center justify-content-center align-self-center">
                                <span class="f-roboto">Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-lg-5 d-none d-lg-grid m-auto mt-xxl-0">
                    <img src="<?= base_url(); ?>assets/img/speedybank/img-2.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- End Get Reward -->


    <!-- ======= Start Speedybank Specifications ======= -->
    <section id="specifications" class="about">
        <div class="container p-r">
            <div class="row gx-0">
                <div class="accordion text-center" id="accordionFreedy">
                    <div class="accordion-item freedy-accordion-item mb-5 d-inline-block">
                        <div class="col-12">
                            <div class="content-freedy p-r text-center">
                                <button id="btnaccorionTwo" class="accordion-button freedy-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   <div class="box-title-accordion ms-auto text-center">
                                        <span class="head px-5 f-hahmlet text-black py-2"><span class="text-blue-freedy">SpeedyBank</span> Specifications</span>
                                        <span class="small f-jakarta" id="seemoreTwo">(read more)</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="collapseTwo" class="col-12 accordion-collapse collapse-specifications collapse" aria-labelledby="pageTwo" data-bs-parent="#accordionFreedy">
                        <div class="row d-flex flax-wrap justify-content-center align-items-center">
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-1.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto"><span translate="no"> Non custodial wallet </span>
                                        </span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('1') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-2.png" alt="">
                                        <span translate="no" class="f-jakarta title specifications py-4 text-blue-freedy my-auto">No KYC No AML</span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('2') ?>" class="active py-2 px-3">Read More</a>

                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-3.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto">Receive funds in
                                            <br>
                                            9 FIAT currencies</span>
                                            
                                        </div>
                                        <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('3') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-4.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto">Convert, custody
                                            <br>
                                            & send in over 40
                                            <br>
                                            FIAT curencies</span>

                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('4') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-5.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto">Zero exchange fees and 
                                            <br>
                                            competitive
                                            rates for <br>
                                            FIAT to
                                            FIAT</span>
                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('5') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-6.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto">Clear & transparent
                                            <br>
                                            prices without
                                            <br>
                                            hidden cost</span>

                                    </div>
                                    <a href="<?= base_url(); ?>link/lern_transparency" class="active py-2 px-3">Read
                                        More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 pt-5 my-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-7.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto"> <span translate="no"> Trade-off </span> platform
                                    </span>
                
                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('7') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                            <div class="col-10 col-md-5 col-lg-3 px-2 my-5 pt-5 list-different  mx-auto">
                                <div class="items-different p-2 d-flex flex-column justify-content-between align-items-center text-start">
                                    <div class="d-flex flex-column justify-content-center align-items-start">
                                        <img src="<?= base_url() ?>assets/img/speedybank/icon-spec-8.png" alt="">
                                        <span class="f-jakarta title specifications py-4 text-blue-freedy my-auto">Integration into
                                            <br>
                                            your business
                                            <br>
                                            API/plugin</span>

                                    </div>
                                    <a href="<?= base_url(); ?>link/spec?spec=<?= base64_encode('8') ?>" class="active py-2 px-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Speedybank Specifications -->

    <!-- ======= Start The Bank For A Changing World ======= -->
    <section id="crypto" class="about position-relative">
        <div class="position-absolute element-banking d-none d-md-block">
            <svg width="39" height="281" viewBox="0 0 39 281" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="-267" width="306" height="281" rx="5" fill="#0F4E97"/>
            </svg>
        </div>
        <div class="position-absolute element-banking right d-none d-md-block">
            <svg width="38" height="281" viewBox="0 0 38 281" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="306" height="281" rx="5" fill="#0F4E97"/>
            </svg>
        </div>
        <div class="container p-r">
            <div class="row gx-0">
                <div class="col-12 mb-0 pb-5 mb-md-5 pb-md-5">
                    <div class="content-freedy text-center">
                        <h1 class="title-first-debit fw-semibold p-r lr-title f-hahmlet text-black" translate="no">
                            SpeedyBank 
                        </h1>
                        <h1 class="title-first-debit py-1 fw-semibold p-r lr-title f-hahmlet text-blue-freedy">
                            The Bank For A Changing World
                        </h1>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="row">
                        <div class="col-lg-6 my-auto ps-lg-5">
                            <div class="content-freedy">
                                <h3 class="f-hahmlet"><span class="text-black">Instant payments between</span>
                                <br>
                                    <span class="text-blue-freedy">
                                        all <span translate="no"> TracklessProject </span> users of all over the world
                                    </span>
                                </h3> 
                                <div class="my-3">
                                    <p class="f-jakarta">
                                        <span translate="no"> SpeedyBank </span>, being part of <span translate="no"> TracklessProject </span> ecosystem, will be able to instantly send and receive Fiat currencies to all the wallets of the platforms of the ecosystem formed by <span translate="no"> TracklessBank, TracklessCrypto, TracklessMoney, TracklessChat, </span> sharing  with them the single collection and payment gateway.
                                    </p>
                                    <p class="fw-semibold fst-italic text-start text-md-center pe-5">Receive/send/request instant
                                        payments
                                        using <b translate="no"> ‘’wallet
                                            to wallet’’ </b>
                                        method</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-none d-lg-grid m-auto">
                            <img src="<?= base_url(); ?>assets/img/speedybank/img-21.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-crypto">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-5 d-none d-lg-grid m-auto">
                                <img src="<?= base_url(); ?>assets/img/speedybank/img-3.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-7 mb-5 ps-lg-5">
                                <div class="content-freedy">
                                    <h3 class="f-hahmlet"><span class="text-black">Revolutionary system</span> 
                                        <span class="text-blue-freedy">
                                            with crypto<br>
                                            trading
                                            service integrated
                                        </span>
                                    </h3>
                                    <div class="my-3 c-check">
                                        <div class="d-flex position-relative">
                                            <ul class="p-0 f-jakarta position-relative">
                                                <li> <span translate="no"> Trade off </span> platform</li>
                                                <li> <span translate="no"> Shared order book </span> </li>
                                                <li>Distributed and decentralized</li>
                                                <li>Buy crypto from your Fiat balance of your <span translate="no"> SpeedyBank </span> wallet </li>
                                                <li>Withdraw your earning by bank transfer in more than
                                                    50 currencies to any bank account even not under your name</li>
                                            </ul>
                                            <div class="buble-soon abs ms-5 d-flex justify-content-center align-items-center text-center f-jakarta fw-bolder mt-5 position-absolute">
                                                <span translate="no">
                                                    COMING <br> SOON
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <a href="<?= base_url() ?>link/crypto" class="btn-content-freedy d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span class="">Learn more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- ======= End The Bank For A Changing World ======= -->

    <!-- ======= Start Become  ======= -->
    <section id="reward" class="about bg-section-become">
        <div class="container p-r mt-0 pt-0 mt-lg-5 pt-lg-5">
            <div class="row gx-0 mt-5">
                <div class="col-12 col-lg-10 d-flex flex-column justify-content-center mb-5 mx-auto">
                    <div class="content-freedy p-r text-center">
                        <h2 class="f-hahmlet text-black">
                            Become our <span class="text-blue-freedy">partner</span> 
                        </h2>
                        <p class="f-jakarta mt-5 fw-semibold">
                            <span class="text-blue-freedy"> Become an affiliate partner </span> and <span class="text-blue-freedy"> create your point or open a corner </span>  in your shop in order to offer top-ups and withdrawals services to all the users <span translate="no"> TracklessBank </span> <span translate="no"> TracklessCrypto </span> and <span translate="no"> TracklessMoney </span>
                        </p>
                        <span class="bp mb-3 d-block f-jakarta fw-semibold">
                            It doesn't matter the country where you are, the users of the system are all over the world!
                        </span>
                        <div class="text-start d-flex justify-content-center mt-5">
                            <button class="mx-3 py-2 btn-contactus border-0" type="submit" id="btnconfirm">
                                <span class="mx-3 d-none d-sm-grid">Contact us</span>
                                <img src="<?= base_url() ?>assets/img/speedybank/email-contactus.png" alt="" class="mx-1">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Become -->

    <!-- ======= Start Futures & Technology ======= -->
    <section id="technology" class="about">
        <div class="container p-r">
            <div class="row gx-0">
                <div class="col-12 mb-5">
                    <div class="content-freedy p-r text-center">
                        <h2 class="text-dark f-hahmlet">Features and Technology</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 features-freedy">
                            <div class="features-freedy text-center d-flex align-items-center justify-content-center flex-wrap">
                                <div class="col-10 col-sm-6 col-lg-3">
                                    <div class=" d-flex flex-column align-items-center my-4 box-features px-2 pt-5 pb-4 m-auto">
                                        <img src="<?= base_url(); ?>assets/img/speedybank/feature-1.png" alt="">
                                        <h4 class="my-auto f-hahmlet">100% Secure</h4>
                                        <a class="text-blue-freedy" href="<?= base_url(); ?>link/features?features=<?= base64_encode('1') ?>">Read
                                            more</a>
                                    </div>
                                </div>
                                <div class="col-10 col-sm-6 col-lg-3">
                                    <div class=" d-flex flex-column align-items-center my-4 box-features px-2 pt-5 pb-4 m-auto">
                                        <img src="<?= base_url(); ?>assets/img/speedybank/feature-2.png" alt="">
                                        <h4 class="f-hahmlet my-auto">Technology</h4>
                                        <a class="text-blue-freedy" href="<?= base_url(); ?>link/features?features=<?= base64_encode('3') ?>">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-5">
                    <div class="col-10 box-contactus px-3 py-3 mx-auto">
                        <div class="d-flex flex-row justify-content-center align-items-center">
                            <div class="form-contactus py-2 w-100">
                                <form id="form_submit" method="POST" action="<?= base_url(); ?>link/send_message" class="w-100 d-flex flex-row justify-content-center align-items-center" onsubmit="return validate()">
                                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <input name="email" type="text" placeholder="Enter your email address" class="col f-roboto">
                                    <button class="mx-3 py-2 btn-contactus border-0" type="submit" id="btnconfirm">
                                        <span class="mx-3 d-none d-sm-grid">Contact us</span>
                                        <img src="<?= base_url() ?>assets/img/speedybank/email-contactus.png" alt="" class="mx-1">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Futures & Technology ======= -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="contactus" class="footer p-0 p-r">
    <div class="container py-5">
        <div class="row d-flex align-items-center gy-4">
            <div class="col-lg-3 col-12 pe-2 footer-links d-flex align-items-center justify-content-center">
                <a href="<?= base_url() ?>" class="text-text-decoration-none">
                    <img src="<?= base_url() ?>assets/img/speedybank/logoindex.png" alt="mylogo" class="logo">
                </a>
            </div>
            <div class="col-lg-6 col-12 pe-2 footer-links text-center">
                <div class="d-flex flex-row flex-wrap align-items-center justify-content-center w-100">
                    <span class="powered f-koulen text-uppercase fw-bold">institute of</span>
                    <a href="https://tracklessbank.com/" target="_blank">
                        <img src="<?= base_url() ?>assets/img/speedybank/tracklessprojects.png" alt="" class="trackless">
                    </a>
                </div>
                <p class="copyright py-3 m-0"> <b translate="no"> SpeedyBank </b> HKG 
            </div>
            <div class="col-lg-3 col-12 text-center text-black mb-5 d-flex justify-content-between">
                <a href="<?= base_url() ?>link/privacy_policy" class="fw-bold text-black text-decoration-underline">
                    Privacy policy
                </a>
                <a href="<?= base_url() ?>link/lern_transparency" class="fw-bold text-black text-decoration-underline">
                    Price lists
                </a>
                <a href="<?= base_url() ?>#" class="fw-bold text-black text-decoration-underline">
                    About Us
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<a href="#top" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
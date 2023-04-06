<!-- ======= Hero Section ======= -->
<section id="" class="d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>#reward">
                        <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-5 d-flex flex-row">
                <div class="col-12 text-center">
                    <h2 class="title-top-header fw-bold f-hahmlet text-blue-freedy py-2 px-5">
                        Tell everyone about <span translate="no"> SpeedyBank </span> and earn every time they use it.
                    </h2>
                    <h2 class="subtitle-top-header fw-bold " style="text-shadow: 0px 6px 6px rgba(0, 0, 0, 0.25);">Share it!</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="accordion" id="accordionFreedy">
                    <div class="accordion-item freedy-accordion-item mb-5">
                        <h2 class="accordion-header m-0" id="pageOne">
                            <button id="btnaccorionOne" class="accordion-button freedy-accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="false" aria-controls="collapseOne">
                                <div class="box-title-accordion ms-auto text-center">
                                    <span class="head text-blue-freedy f-hahmlet">How does it work</span>
                                    <span class="small" id="seemoreOne">See more</span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="pageOne"
                            data-bs-parent="#accordionFreedy">
                            <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                <?php 
                                $data['currency'] = $currency;
                                $this->load->view('auth/landingpage/lern_reward-1', $data); 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item freedy-accordion-item mb-5">
                        <h2 class="accordion-header m-0" id="pageTwo">
                            <button id="btnaccorionTwo" class="accordion-button freedy-accordion-button collapsed"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <div class="box-title-accordion ms-auto text-center">
                                    <span class="head text-blue-freedy f-hahmlet">Online Affiliate Partner</span>
                                    <span class="small" id="seemoreTwo">See more</span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="pageTwo"
                            data-bs-parent="#accordionFreedy">
                            <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                <?php $this->load->view('auth/landingpage/lern_reward-2'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
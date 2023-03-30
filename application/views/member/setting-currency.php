<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 settings-currency d-flex">
                        <div class="col-12 my-2 text-start">
                            <div class="col-12 px-0 check-currency overflow-auto">
                                <div class="d-flex flex-row align-items-center form-check form-switch my-1 ps-4">
                                    <label class="form-check-label w-50 me-3 me-md-auto me-lg-3" for="usdollar">US
                                        DOLLAR</label>
                                    <input class="form-check-input pill-currency" type="checkbox" id="usdollar" checked
                                        disabled>
                                </div>
                                <div class="d-flex flex-row align-items-center form-check form-switch my-1 ps-4">
                                    <label class="form-check-label w-50 me-3 me-md-auto me-lg-3" for="euro">EURO</label>
                                    <input class="form-check-input pill-currency" type="checkbox" id="euro" checked
                                        disabled>
                                </div>
                                <?php
                                foreach ($currency as $dt) {
                                    if ($dt->currency != "USD" && $dt->currency != "EUR") {
                                ?>
                                <div class="d-flex flex-row align-items-center form-check form-switch my-1 ps-4">
                                    <label class="form-check-label f-hahmlet w-50 me-3 me-md-auto me-lg-3"
                                        for="aeddirham"><?= $dt->name ?></label>
                                    <input class="form-check-input pill-currency" type="checkbox"
                                        id="<?= $dt->currency ?>"
                                        <?php echo ($dt->status == 'active') ? "checked" : "" ?>
                                        onclick="enablecurrency('<?= $dt->currency ?>','<?php echo ($dt->status == 'active') ? "disabled" : "active" ?>')">
                                </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-9 mb-3">
                                <!--<span class="com-currency-bimg">If your Topup hasn't arrived, contact the following email address:
                           support-topup@tracklessmail.com</span>-->

                                <span class="com-currency-bimg">*scroll to see more</span>
                            </div>
                            <div class="col-9 mb-3">
                                <a href="<?= base_url() ?>homepage" class="currency-next-btn p-2">
                                    <span>Next</span>
                                    <svg width="29" height="16" viewBox="0 0 29 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M28.7071 8.70711C29.0976 8.31658 29.0976 7.68342 28.7071 7.29289L22.3431 0.928932C21.9526 0.538408 21.3195 0.538408 20.9289 0.928932C20.5384 1.31946 20.5384 1.95262 20.9289 2.34315L26.5858 8L20.9289 13.6569C20.5384 14.0474 20.5384 14.6805 20.9289 15.0711C21.3195 15.4616 21.9526 15.4616 22.3431 15.0711L28.7071 8.70711ZM0 9H28V7H0V9Z"
                                            fill="#0F4E97" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
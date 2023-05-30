<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <span class="me-auto f-hahmlet text-blue-freedy fs-2 title-top-navbar">Confirmation</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app f-jakarta my-4">
                        <div class="col-8 mx-auto pt-4">
                            <div class="text-center">
                                <span class="me-auto f-hahmlet text-blue-freedy fs-5 title-top-navbar">Please send your money to following bank account</span>
                            </div>
                        </div>
                        <?php if ((@$currency == "EUR") || (@$currency == "USD") ) { ?>
                            <div class="row pt-4">
                                <!-- Recipient name -->
                                <label>Account Holder</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter1" value="<?= @$data->payinBankAccount->details[0]->value ?>" readonly>
                                    <a class="btn btn-copy" id="btninter1">
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

                            <div class="row">
                                <!-- IBAN / Account -->
                                <?php if (($_SESSION["currency"] == "USD")) { ?>
                                    <label class="form-label"><?= @$data->payinBankAccount->details[2]->label ?></label>
                                <?php } else { ?>
                                    <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                        <label class="form-label"><?= @$data->payinBankAccount->details[1]->label?> <small>(country belgium)</small></label>
                                    <?php } else { ?>
                                        <label class="form-label"><?= @$data->payinBankAccount->details[1]->label?></label>
                                    <?php } ?>
                                <?php } ?>
                                
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <?php if (($_SESSION["currency"] == "USD")) { ?>
                                        <input class="form-control me-2" type="text" name="" id="inter2" value="<?= @$data->payinBankAccount->details[2]->value ?>" readonly>
                                        <?php } else { ?>
                                            <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                                <input class="form-control me-2" type="text" name="" id="inter2" value="<?= @$data->payinBankAccount->details[1]->value ?>" readonly>
                                        <?php } else { ?>
                                            <!-- Masih Belum -->
                                            <label class="form-label"><?= @$data->payinBankAccount->details[1]->label?></label>
                                        <?php } ?>
                                    <?php } ?>
                                    <a class="btn btn-copy" id="btninter2">
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

                            <div class="row">
                                <!-- BIC / SWIFT / Routing Number USD  -->
                                <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                    <label class="form-label">BIC</label>
                                <?php } elseif(($_SESSION["currency"] == "USD")) { ?>
                                    <label class="form-label"><?= @$data->payinBankAccount->details[1]->label ?></label>
                                <?php } else { ?>
                                    <label class="form-label"><?= @$data->payinBankAccount->details[2]->label ?></label>
                                <?php }  ?>

                                <div class="d-flex flex-row align-items-center mb-3">
                                    <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                        <input class="form-control me-2" type="text" name="" id="inter3" value="<?= @$data->payinBankAccount->details[2]->value ?>" readonly>
                                    <?php } elseif(($_SESSION["currency"] == "USD")) { ?>
                                        <input class="form-control me-2" type="text" name="" id="inter3" value="<?= @$data->payinBankAccount->details[1]->value ?>" readonly>
                                    <?php } else { ?>
                                        <input class="form-control me-2" type="text" name="" id="inter3" value="<?= @$data->payinBankAccount->details[2]->value ?>" readonly>
                                    <?php }  ?>
                                    <a class="btn btn-copy" id="btninter3">
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

                            <div class="row">
                                <?php if (($_SESSION["currency"] == "USD")) { ?>
                                    <label class="form-label"><?= @$data->payinBankAccount->details[3]->label ?></label>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <input class="form-control me-2" type="text" name="" id="inter6" value="<?= @$data->payinBankAccount->details[3]->value ?>" readonly>
                                        <a class="btn btn-copy" id="btninter6">
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
                                <?php } ?>
                            </div>

                            <div class="row">
                                <label>Causal</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter4" value="SC<?= $_SESSION["ucode"] ?>" readonly>
                                    <a class="btn btn-copy" id="btninter4">
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
                        
                            <div class="row">
                                <label>Company Address</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter5" 
                                        value="<?= 
                                            @$data->wiseInformation->localAddress->firstLine . ', ' . 
                                            @$data->wiseInformation->localAddress->city . ', ' .
                                            @$data->wiseInformation->localAddress->countryName . ', ' .
                                            @$data->wiseInformation->localAddress->postCode
                                        ?>" readonly>
                                    <a class="btn btn-copy" id="btninter5">
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
                        <?php } else { ?>

                            <div class="row pt-4">
                                <!-- Recipient name -->
                                <label>Account Holder</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter1" value="<?= @$data->payinBankAccount->details[0]->value ?>" readonly>
                                    <a class="btn btn-copy" id="btninter1">
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

                            <div class="row">
                                <!-- IBAN / Account -->
                                <?php if (
                                        ($_SESSION["currency"] == "NZD") ||
                                        ($_SESSION["currency"] == "CAD") ||
                                        ($_SESSION["currency"] == "HUF") ||
                                        ($_SESSION["currency"] == "RON") ||
                                        ($_SESSION["currency"] == "SGD") ||
                                        ($_SESSION["currency"] == "AUD")
                                    ) { ?> <label class="form-label">Account number</label>

                                <?php } else { ?>
                                    <label class="form-label">IBAN</label>
                                <?php } ?>
                                
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter2" value="<?= @$data->payinBankAccount->details[2]->value ?>" readonly>
                                    <a class="btn btn-copy" id="btninter2">
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

                            
                            <!-- CODE -->
                            <?php if (
                                ($_SESSION["currency"] != "NZD") &&
                                ($_SESSION["currency"] != "HUF") &&
                                ($_SESSION["currency"] != "TRY")
                            ) { ?>
                                <div class="row">
                                    <?php
                                    if (($_SESSION["currency"] == "GBP")) {
                                    ?>
                                        <label class="form-label">Sort code</label>

                                    <?php } elseif (($_SESSION["currency"] == "AUD")) { ?>
                                        <label class="form-label">BSB code</label>

                                    <?php } elseif (($_SESSION["currency"] == "CAD")) { ?>
                                        <label class="form-label">Institution number</label>

                                    <?php } elseif (
                                        ($_SESSION["currency"] == "RON") ||
                                        ($_SESSION["currency"] == "SGD")
                                    ) { ?>
                                        <label class="form-label">Bank code</label>
                                    <?php } else { ?>
                                        <label class="form-label">Swift</label>
                                    <?php } ?>
                                    
                                    
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <input class="form-control me-2" type="text" name="" id="inter3" value="<?= @$data->payinBankAccount->details[1]->value ?>" readonly>
                                        <a class="btn btn-copy" id="btninter3">
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
                            <?php } ?>

                            <?php if (
                                ($_SESSION["currency"] == "GBP") ||
                                ($_SESSION["currency"] == "CAD")
                            ) { ?>
                                <div class="row">
                                    <?php if (($_SESSION["currency"] == "GBP")) { ?>
                                        <label class="form-label">Account number</label>

                                    <?php } elseif (($_SESSION["currency"] == "CAD")) { ?>
                                        <label class="form-label">Transit number</label>

                                    <?php } else { ?>
                                        <label class="form-label">Transit</label>
                                    <?php } ?>

                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <input class="form-control me-2" type="text" name="" id="us5" placeholder="Transit Number" value="<?= @$bank->transit_circuit ?>" readonly>
                                        <a class="btn btn-copy" id="btnus5">
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
                            <?php } ?>

                            <div class="row">
                                <label>Causal</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter4" value="SC<?= $_SESSION["ucode"] ?>" readonly>
                                    <a class="btn btn-copy" id="btninter4">
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
                        
                            <div class="row">
                                <label>Company Address</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter5" 
                                        value="<?= 
                                            @$data->wiseInformation->localAddress->firstLine . ', ' . 
                                            @$data->wiseInformation->localAddress->city . ', ' .
                                            @$data->wiseInformation->localAddress->countryName . ', ' .
                                            @$data->wiseInformation->localAddress->postCode
                                        ?>" readonly>
                                    <a class="btn btn-copy" id="btninter5">
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


                                

                        <?php } ?>
                        
                        <div class="row ms-1">
                            <span>Amount: </span>
                            <span class="fs-6 text-blue-freedy">
                                <?= @$amount?>
                            </span>
                        </div>
                        <div class="col-12 py-4">
                            <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            </div>
                            <div class="col-12 d-flex flex-row mt-5">
                                <a href="<?= base_url() ?>receive/localbank" class="btn btn-wallet-cancle py-2 me-auto">Cancel</a>
                                <a href="<?= base_url() ?>homepage/wallet" class="btn btn-topup-support" >Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center top">
        <a href="<?= base_url() ?>receive/localbank" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0066FF" />
                            <stop offset="1" stop-color="#0053CF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
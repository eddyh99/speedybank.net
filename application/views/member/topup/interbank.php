<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto text-blue-freedy f-hahmlet title-top-navbar">
                                <?= $_SESSION["currency"] ?> - Add / Receive fund - International </span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app input-piggy-style my-4">
                        <div class="py-4">
                            <div class="tutorial-box p-3 ">
                                <span class="title f-hahmlet text-blue-freedy">Top up procedure :</span>
                                <ol class="m-0 my-3 f-jakarta">
                                    <li class="fw-normal">Copy all the fields below</li>
                                    <li class="fw-normal">Paste on your online bank form
                                        (make sure to copy exactly the Causal*,
                                        as it identifies the destination wallet)</li>
                                    <li class="fw-normal">Send the amount chosen</li>
                                </ol>
                            </div>
                            <div class="noted-tutor px-3">
                                <p class="my-3">
                                    *In case you’ve written wrong Causal it is possible to manually recover the funds by
                                    contacting the following email :<br>
                                    <a href="mailto:support-topup@tracklessmail.com">support-topup@tracklessmail.com</a>
                                    <br>
                                    <br>
                                    (the manual recovery operation will cost 25 $)
                                </p>
                            </div>
                            <div class="row">
                                <label>Account Holder (min deposit : <?=@number_format($bank->minimum,2)?> <?php echo (isset($_GET["currency"])) ? $_GET["currency"] : $_SESSION["currency"] ?> )</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter1" value="<?= @$bank->name_outside ?>" readonly>
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
                                <?php if (($_SESSION["currency"] == "USD")) { ?>
                                    <label class="form-label">Account Number</label>
                                <?php } else { ?>
                                    <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                        <label class="form-label">IBAN <small>(country belgium)</small></label>
                                    <?php } else { ?>
                                        <label class="form-label">IBAN</label>
                                    <?php } ?>
                                <?php } ?>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter2" value="<?= @$bank->iban_outside ?>" readonly>
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
                                <?php if (($_SESSION["currency"] == "EUR")) { ?>
                                    <label class="form-label">Swift/BIC</label>
                                <?php } else { ?>
                                    <label class="form-label">Swift</label>
                                <?php } ?>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter3" value="<?= @$bank->bic_outside ?>" readonly>
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
                            <?php if (($_SESSION["currency"] == "USD")) { ?>
                                <div class="row">
                                    <label class="form-label">Routing Number</label>
                                    <div class="d-flex flex-row align-items-center mb-3">
                                        <input class="form-control me-2" type="text" name="" id="inter6" value="026073008" readonly>
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
                                </div>
                            <?php } ?>
                            <div class="row">
                                <label>Causal</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter4" value="SC <?= $_SESSION["ucode"] ?>" readonly>
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
                                    <input class="form-control me-2" type="text" name="" id="inter5" value="<?= @$bank->address_outside ?>" readonly>
                                    <a class="btn btn-copy" id="btninter5">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 2.95397C10.3249 2.96312 9.9197 3.0022 9.59202 3.16916C9.21569 3.36091 8.90973 3.66687 8.71799 4.04319C8.55103 4.37087 8.51194 4.77612 8.5028 5.45117M20 2.95397C20.6751 2.96312 21.0803 3.0022 21.408 3.16916C21.7843 3.36091 22.0903 3.66687 22.282 4.04319C22.449 4.37087 22.4881 4.77612 22.4972 5.45116M22.4972 14.4512C22.4881 15.1262 22.449 15.5315 22.282 15.8592C22.0903 16.2355 21.7843 16.5414 21.408 16.7332C21.0803 16.9001 20.6751 16.9392 20 16.9484M22.5 8.95117V10.9512M14.5001 2.95117H16.5M5.7 22.9512H13.3C14.4201 22.9512 14.9802 22.9512 15.408 22.7332C15.7843 22.5414 16.0903 22.2355 16.282 21.8592C16.5 21.4313 16.5 20.8713 16.5 19.7512V12.1512C16.5 11.0311 16.5 10.471 16.282 10.0432C16.0903 9.66687 15.7843 9.36091 15.408 9.16916C14.9802 8.95117 14.4201 8.95117 13.3 8.95117H5.7C4.5799 8.95117 4.01984 8.95117 3.59202 9.16916C3.21569 9.36091 2.90973 9.66687 2.71799 10.0432C2.5 10.471 2.5 11.0311 2.5 12.1512V19.7512C2.5 20.8713 2.5 21.4313 2.71799 21.8592C2.90973 22.2355 3.21569 22.5414 3.59202 22.7332C4.01984 22.9512 4.57989 22.9512 5.7 22.9512Z" stroke="url(#paint0_linear_46_19516)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <defs>
                                                <linearGradient id="paint0_linear_46_19516" x1="25.2621" y1="6.36696" x2="7.42858" y2="8.48342" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.212855" stop-color="#0F4E97"/>
                                                <stop offset="1" stop-color="#0F4E97"/>
                                                </linearGradient>
                                            </defs>
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
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-sm-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center">
        <a href="<?= base_url() ?>receive" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
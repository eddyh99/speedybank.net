<?php if($card != 'confirm' && $card != 'success' && $requestcard != 'detailcard' && $requestcard_physical != 'success' && $requestcard_physical != 'summary'){?>
<div class="navbar-app fixed-top d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex flex-row justify-content-start align-items-center bottom">
        <a href="<?= base_url() ?>homepage" class="d-flex align-items-center border-0 ms-0 me-auto">
            <div class="icon-menus d-flex align-items-center home-svg py-0">
                <img class="img-fluid" src="<?= base_url() ?>assets/img/speedybank/logoindex.png" alt="logo">
            </div>
        </a>

        <a href="<?= base_url() ?>soon" class="d-none icon-soon align-items-center border-0 mx-2">
            <div class="icon-menus d-flex align-items-center home-svg py-0">
                <svg width="34" height="29" viewBox="0 0 34 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.787598" width="32.5366" height="29" rx="2" fill="#F9BB81"/>
                    <path d="M24.7876 22L20.9209 18.1333M15.8987 8.66667C18.3533 8.66667 20.3432 10.6565 20.3432 13.1111M23.0098 13.1111C23.0098 17.0385 19.8261 20.2222 15.8987 20.2222C11.9714 20.2222 8.7876 17.0385 8.7876 13.1111C8.7876 9.18375 11.9714 6 15.8987 6C19.8261 6 23.0098 9.18375 23.0098 13.1111Z" stroke="#FF5C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>
    </div>
</div>
<?php }?>

<?php if($card != 'success' && $requestcard_physical != 'success' ){?>  
<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-center align-items-center top">
        <!-- Start Back -->
        <a href="
        
            <?php if($requestcard == 'requestcard' ) {?>
                <?= base_url() ?>homepage
            <?php }?>

            <?php if($requestcard == 'virtual' ) {?>
                <?= base_url() ?>homepage/requestcard?requestcard=<?= base64_encode('requestcard')?>
            <?php }?>

            <?php if($requestcard == 'activenow' ) {?>
                <?= base_url() ?>homepage/requestcard?requestcard=<?= base64_encode('virtual')?>
            <?php }?>

            <?php if($requestcard == 'detailcard' ) {?>
                <?= base_url() ?>homepage/requestcard?requestcard=<?= base64_encode('activenow')?>
            <?php }?>

            <?php if($card == 'card' ) {?>
                <?= base_url() ?>homepage
            <?php }?>

            <?php if($card == 'topup' ) {?>
                <?= base_url() ?>homepage/card?card=<?= base64_encode('card')?>
            <?php }?>

            <?php if($card == 'confirm' ) {?>
                <?= base_url() ?>homepage/card?card=<?= base64_encode('topup')?>
            <?php }?>

            <?php if($requestcard_physical == 'requestcard_physical' ) {?>
                <?= base_url() ?>homepage/card
            <?php }?>

            <?php if($requestcard_physical == '3dpassword' ) {?>
                <?= base_url() ?>homepage/requestcard_physical?requestcard_physical=<?= base64_encode('requestcard_physical')?>
            <?php }?>

            <?php if($requestcard_physical == 'shippingdetails' ) {?>
                <?= base_url() ?>homepage/requestcard_physical?requestcard_physical=<?= base64_encode('3dpassword')?>
            <?php }?>
            
            <?php if($requestcard_physical == 'summary' ) {?>
                <?= base_url() ?>homepage/requestcard_physical?requestcard_physical=<?= base64_encode('shippingdetails')?>
            <?php }?>



        " class="d-flex align-items-center me-auto">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.5 2L3.5 17L18.5 32" stroke="url(#paint0_linear_916_4049)" stroke-width="4" stroke-linecap="round"/>
                    <defs>
                        <linearGradient id="paint0_linear_916_4049" x1="3.5" y1="32" x2="21.7215" y2="32" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97"/>
                            <stop offset="1" stop-color="#0F4E97"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <span class="fw-bolder">Back</span>
        </a>
        <!-- End back -->
        
        <!-- Start logout -->
        <a href="<?= base_url() ?>auth/logout" class="d-flex align-items-center">
            <span>Log out</span>
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="35" height="26" viewBox="0 0 35 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.1087 8.81998C22.1677 6.45544 20.4359 4.49034 18.2084 3.25949C15.981 2.02865 13.3956 1.60823 10.893 2.06986C8.39026 2.5315 6.12506 3.84662 4.48331 5.79116C2.84157 7.73569 1.92485 10.1893 1.88936 12.734C1.85387 15.2786 2.70181 17.7569 4.28869 19.7465C5.87558 21.736 8.10322 23.1138 10.5921 23.645C13.0809 24.1763 15.677 23.8281 17.9379 22.6599C20.1988 21.4916 21.9847 19.5756 22.9913 17.2382L20.8356 16.3099C20.0438 18.1485 18.6389 19.6557 16.8604 20.5747C15.0819 21.4937 13.0398 21.7675 11.082 21.3497C9.12423 20.9318 7.3719 19.848 6.12361 18.2829C4.87533 16.7179 4.20832 14.7684 4.23623 12.7667C4.26415 10.765 4.98526 8.83492 6.27671 7.3053C7.56815 5.77567 9.35002 4.74116 11.3187 4.37803C13.2874 4.01489 15.3211 4.34561 17.0733 5.31382C18.8254 6.28204 20.1877 7.82784 20.9279 9.68785L23.1087 8.81998Z" fill="url(#paint0_linear_319_7)" />
                    <path d="M18 13.4414L34 13.4414" stroke="url(#paint1_linear_319_7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M26 7.00036L34 13.4396L26 19.8789" stroke="url(#paint2_linear_319_7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_319_7" x1="10.7999" y1="2.08743" x2="14.9766" y2="23.6873" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_319_7" x1="26" y1="13.4414" x2="26" y2="12.4414" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_319_7" x1="30" y1="19.8789" x2="30" y2="7.00036" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
        <!-- End Logout -->
    </div>
</div>
<?php }?>
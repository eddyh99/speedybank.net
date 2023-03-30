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
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z" stroke="#CB0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 my-2">Copy & share your referral link to earn money</span>
                                        <div class="copy-refcode d-flex flex-row justify-content-start mb-4">
                                            <input class="me-2" type="text" name="" id="refcode" value="<?= base_url() ?>auth/signup?ref=<?= $_SESSION["referral"] ?>" readonly style="min-width: 28ch;">
                                            <a class="btn btn-copy me-2" id="btnref">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z" stroke="#CB0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url() ?>qr/ref/<?= $_SESSION["ucode"] ?>Thumbnail.png" download class="qrcode-download ms-auto mt-3 d-flex flex-column align-items-center">
                                    <img class="img-fluid" src="<?= base_url() ?>qr/ref/<?= $_SESSION["ucode"] ?>.png" alt="QR" width="90" height="90">
                                    <div>
                                        <img class="img-fluid d-block d-sm-none" src="<?=base_url()?>assets/img/btn-qrdw-mobile.png" alt="dw-qr" width="15" height="auto">
                                    </div>
                                    <div>
                                        <img class="img-fluid d-none d-sm-block" src="<?=base_url()?>assets/img/btn-qrdw.png" alt="dw-qr" width="90" height="auto">
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
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 mx-auto my-4">
                            <h1 class="text-blue-freedy fw-bolder f-poppins text-center">Dashboard</h1>
                        </div>

                        <div class="col-12 menus-list-app mb-2">
                            <div class="row f-alegreya currencies-card mx-auto">
                                <div class="col-12 col-md-6 text-center mx-auto">
                                    <a href="<?= base_url() ?>homepage/setting_currency" class="d-flex align-items-center justify-content-center p-2 my-2">
                                        <img src="<?= base_url()?>assets/img/select-currencies.png" alt="">
                                        <span class="ms-2 f-poppins fw-bolder btn-select-currencies">Select Currencies</span>
                                    </a>
                                </div>
                                <div class="col-12 col-md-6 text-center mx-auto">
                                    <a href="<?= base_url() ?>soon" class="d-flex align-items-center justify-content-center p-2 my-2 ">
                                        <img class="" src="<?= base_url()?>assets/img/cardhome.png" alt="">
                                        <span class="ms-5 f-poppins fw-bolder btn-select-currencies">Card</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <!-- <div class="col-12 menus-list-app mb-4">
                        <div class="col-12 text-center">
                            <a href="<?= base_url() ?>homepage/setting_currency" class="d-inline-block p-2 mt-5">
                                <svg width="45" height="50" viewBox="0 0 45 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.1638 37.5274C2.2053 35.7412 1.46023 33.8316 0.946289 31.844C2.06481 31.231 3.00416 30.2964 3.66042 29.1438C4.31669 27.9912 4.66428 26.6654 4.66475 25.3131C4.66522 23.9608 4.31854 22.6347 3.66308 21.4816C3.00762 20.3284 2.06892 19.3931 0.950824 18.7792C1.97577 14.7854 3.9273 11.1386 6.62157 8.18216C7.67385 8.9194 8.8949 9.32851 10.1496 9.36423C11.4043 9.39995 12.6437 9.06089 13.7306 8.38456C14.8175 7.70823 15.7096 6.72101 16.3082 5.53216C16.9067 4.3433 17.1883 2.99917 17.1219 1.64852C20.8452 0.6116 24.7522 0.613282 28.4747 1.65341C28.4088 3.00403 28.691 4.34796 29.29 5.53648C29.889 6.72499 30.7814 7.71175 31.8686 8.38756C32.9557 9.06337 34.1952 9.40188 35.4498 9.36563C36.7044 9.32938 37.9253 8.91978 38.9772 8.18216C40.2901 9.62377 41.4555 11.2633 42.435 13.0934C43.4168 14.9235 44.1514 16.8318 44.6525 18.7767C43.534 19.3898 42.5947 20.3243 41.9384 21.4769C41.2821 22.6296 40.9345 23.9554 40.9341 25.3077C40.9336 26.6599 41.2803 27.986 41.9357 29.1392C42.5912 30.2923 43.5299 31.2276 44.648 31.8416C43.6231 35.8353 41.6715 39.4822 38.9772 42.4386C37.925 41.7014 36.7039 41.2922 35.4492 41.2565C34.1946 41.2208 32.9552 41.5599 31.8682 42.2362C30.7813 42.9125 29.8892 43.8997 29.2907 45.0886C28.6921 46.2774 28.4105 47.6216 28.477 48.9722C24.7537 50.0091 20.8467 50.0075 17.1241 48.9673C17.19 47.6167 16.9078 46.2728 16.3088 45.0843C15.7098 43.8958 14.8174 42.909 13.7302 42.2332C12.6431 41.5574 11.4036 41.2189 10.149 41.2551C8.8944 41.2914 7.67355 41.701 6.62157 42.4386C5.28152 40.9651 4.11972 39.3149 3.1638 37.5274ZM15.9972 38.0063C18.4134 39.508 20.2301 41.9182 21.0989 44.7745C22.2303 44.8893 23.3663 44.8917 24.4977 44.7769C25.367 41.9202 27.1845 39.51 29.6016 38.0087C32.0168 36.5028 34.8631 36.0112 37.5941 36.6282C38.2517 35.6313 38.8185 34.5684 39.2901 33.4567C37.4296 31.2171 36.4018 28.3163 36.4038 25.3104C36.4038 22.2317 37.4694 19.3558 39.2901 17.1641C38.8152 16.0527 38.2459 14.991 37.5896 13.9926C34.8603 14.6091 32.0159 14.1183 29.6016 12.6145C27.1854 11.1127 25.3687 8.70257 24.5 5.84628C23.3685 5.73144 22.2326 5.72899 21.1011 5.84383C20.2318 8.70052 18.4143 11.1107 15.9972 12.612C13.582 14.1179 10.7357 14.6096 8.00468 13.9926C7.34842 14.9902 6.78059 16.052 6.30867 17.1641C8.16922 19.4036 9.19706 22.3045 9.19506 25.3104C9.19506 28.3891 8.12939 31.2649 6.30867 33.4567C6.78362 34.568 7.35289 35.6297 8.00921 36.6282C10.7385 36.0117 13.5829 36.5024 15.9972 38.0063ZM22.7994 32.6406C20.9954 32.6406 19.2652 31.8683 17.9895 30.4936C16.7139 29.1189 15.9972 27.2545 15.9972 25.3104C15.9972 23.3663 16.7139 21.5018 17.9895 20.1271C19.2652 18.7525 20.9954 17.9802 22.7994 17.9802C24.6035 17.9802 26.3336 18.7525 27.6093 20.1271C28.8849 21.5018 29.6016 23.3663 29.6016 25.3104C29.6016 27.2545 28.8849 29.1189 27.6093 30.4936C26.3336 31.8683 24.6035 32.6406 22.7994 32.6406ZM22.7994 27.7538C23.4008 27.7538 23.9775 27.4963 24.4027 27.0381C24.8279 26.5799 25.0668 25.9584 25.0668 25.3104C25.0668 24.6623 24.8279 24.0409 24.4027 23.5826C23.9775 23.1244 23.4008 22.867 22.7994 22.867C22.1981 22.867 21.6213 23.1244 21.1961 23.5826C20.7709 24.0409 20.532 24.6623 20.532 25.3104C20.532 25.9584 20.7709 26.5799 21.1961 27.0381C21.6213 27.4963 22.1981 27.7538 22.7994 27.7538Z" fill="url(#paint0_linear_78_7408)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_78_7408" x1="22.7994" y1="0.87207" x2="22.7994" y2="49.7487" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#8B0000" />
                                            <stop offset="1" stop-color="#CD0000" />
                                        </linearGradient>
                                    </defs>
                                </svg>

                                </svg>
                                <span class="ms-2">Select Currencies</span>
                            </a>
                            <a href="<?= base_url() ?>soon" class="d-inline-block p-2 mt-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                                    <path d="M7.75 19.5C7.75 17.6144 7.75 16.6716 8.33579 16.0858C8.92157 15.5 9.86438 15.5 11.75 15.5H50.25C52.1356 15.5 53.0784 15.5 53.6642 16.0858C54.25 16.6716 54.25 17.6144 54.25 19.5V42.5C54.25 44.3856 54.25 45.3284 53.6642 45.9142C53.0784 46.5 52.1356 46.5 50.25 46.5H11.75C9.86438 46.5 8.92157 46.5 8.33579 45.9142C7.75 45.3284 7.75 44.3856 7.75 42.5V19.5Z" fill="url(#paint0_linear_797_5083)"/>
                                    <ellipse cx="15.5003" cy="38.7503" rx="2.58333" ry="2.58333" fill="url(#paint1_linear_797_5083)"/>
                                    <rect x="7.75" y="23.25" width="46.5" height="5.16667" fill="url(#paint2_linear_797_5083)"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_797_5083" x1="31" y1="15.5" x2="39.6097" y2="48.7647" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FD2A2A"/>
                                            <stop offset="1" stop-color="#FF9F9F" stop-opacity="0.76"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_797_5083" x1="15.5003" y1="36.167" x2="15.5003" y2="41.2334" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#500000"/>
                                            <stop offset="1" stop-color="#7E0000"/>
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_797_5083" x1="31" y1="23.25" x2="31" y2="28.3165" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#500000"/>
                                            <stop offset="1" stop-color="#7E0000"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <span class="ms-2">Card</span>
                            </a>
                        </div>
                    </div> -->

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
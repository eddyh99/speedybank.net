<div class="navbar-app fixed-top d-flex justify-content-center" style="background-color: #1E1E1E;">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex flex-row justify-content-start align-items-center bottom"
        style="background-color: #1E1E1E;">
        <a href="<?= base_url() ?>homepage" class="d-flex align-items-center border-0 ms-0 me-auto">
            <div class="icon-menus d-flex align-items-center home-svg py-0">
                <img src="<?= base_url() ?>assets/img/speedybank/logo.png" alt="logo">
            </div>
        </a>

    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center" style="background-color: #1E1E1E;">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-end align-items-center top"
        style="background-color: #1E1E1E;">
        <a href="<?= base_url() ?>auth/logout" class="d-flex align-items-center border-0">
            <span>Log out</span>
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="35" height="26" viewBox="0 0 35 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style="fill: #1E1E1E;">
                    <path
                        d="M23.1087 8.81998C22.1677 6.45544 20.4359 4.49034 18.2084 3.25949C15.981 2.02865 13.3956 1.60823 10.893 2.06986C8.39026 2.5315 6.12506 3.84662 4.48331 5.79116C2.84157 7.73569 1.92485 10.1893 1.88936 12.734C1.85387 15.2786 2.70181 17.7569 4.28869 19.7465C5.87558 21.736 8.10322 23.1138 10.5921 23.645C13.0809 24.1763 15.677 23.8281 17.9379 22.6599C20.1988 21.4916 21.9847 19.5756 22.9913 17.2382L20.8356 16.3099C20.0438 18.1485 18.6389 19.6557 16.8604 20.5747C15.0819 21.4937 13.0398 21.7675 11.082 21.3497C9.12423 20.9318 7.3719 19.848 6.12361 18.2829C4.87533 16.7179 4.20832 14.7684 4.23623 12.7667C4.26415 10.765 4.98526 8.83492 6.27671 7.3053C7.56815 5.77567 9.35002 4.74116 11.3187 4.37803C13.2874 4.01489 15.3211 4.34561 17.0733 5.31382C18.8254 6.28204 20.1877 7.82784 20.9279 9.68785L23.1087 8.81998Z"
                        fill="url(#paint0_linear_319_7)" />
                    <path d="M18 13.4414L34 13.4414" stroke="url(#paint1_linear_319_7)" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M26 7.00036L34 13.4396L26 19.8789" stroke="url(#paint2_linear_319_7)" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_319_7" x1="10.7999" y1="2.08743" x2="14.9766" y2="23.6873"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_319_7" x1="26" y1="13.4414" x2="26" y2="12.4414"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_319_7" x1="30" y1="19.8789" x2="30" y2="7.00036"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0F4E97" />
                            <stop offset="1" stop-color="#0F4E97" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
<div class="d-flex justify-content-center" style="background-color: #1E1E1E;">
    <div class="col-12 col-lg-8 col-xl-6" style="background-color: #1E1E1E;">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row" style="margin-top: 5rem;">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-12 box-code-freedy px-4 py-3">
                            <div class="copy-uqcode mt-3 mb-2 d-flex flex-row align-items-center">
                                <span class="me-2 text-white">UNIQUE CODE : </span>
                                <input class="me-2" type="text" name="" id="uqcode" value="<?= $_SESSION["ucode"] ?>"
                                    readonly style="color: #fff;">
                                <a class="btn btn-copy me-2" id="btnuq">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z"
                                            stroke="#0F4E97" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <span class="text-white">Copy & share your referral link to earn money</span>
                            <div class="copy-refcode d-flex flex-row justify-content-start mb-4">
                                <input class="me-2" type="text" name="" id="refcode"
                                    value="<?= base_url() ?>auth/signup?ref=<?= $_SESSION["referral"] ?>" readonly>
                                <a class="btn btn-copy me-2" id="btnref">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z"
                                            stroke="#0F4E97" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div class="w-100 text-center">
                                <div class="d-inline-block btn-head-crypto">
                                    <a class="crypto px-4 py-2" href="<?= base_url() ?>homepage/">FIAT</a>
                                    <a class="crypto px-4 py-2 active"
                                        href="<?= base_url() ?>homepage/crypto">CRYPTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="receive-title d-flex flex-row justify-content-center align-items-center my-5">
                            <span>COMING SOON!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-monserat title-top-navbar"><?= $_SESSION["currency"] ?> - Wallet
                                Receive</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="py-4 w-receive text-center">
                            <?php $this->load->view('member/alert-notif'); ?>
                            <img src="<?= base_url() ?>qr/receive/<?= $_SESSION['ucode'].$_SESSION["currency"] ?>.png"
                                alt="">
                            <input type="text" class="form-control" name="" id="copy-qr"
                                value="<?= base_url() . 'auth/requestbank/' . base64_encode($_SESSION["currency"]). '/' . base64_encode($_SESSION["ucode"]) ?>"
                                hidden>
                            <div class="mt-3">
                                <span class="fw-bold">UNIQUE CODE :<br> <?= $_SESSION["ucode"] ?></span>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="mx-1">
                                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.9067 36.0268L41.12 46.6402M41.0933 17.3602L22.9067 27.9735M56 13.3335C56 17.7518 52.4183 21.3335 48 21.3335C43.5817 21.3335 40 17.7518 40 13.3335C40 8.91522 43.5817 5.3335 48 5.3335C52.4183 5.3335 56 8.91522 56 13.3335ZM24 32.0002C24 36.4184 20.4183 40.0002 16 40.0002C11.5817 40.0002 8 36.4184 8 32.0002C8 27.5819 11.5817 24.0002 16 24.0002C20.4183 24.0002 24 27.5819 24 32.0002ZM56 50.6668C56 55.0851 52.4183 58.6668 48 58.6668C43.5817 58.6668 40 55.0851 40 50.6668C40 46.2486 43.5817 42.6668 48 42.6668C52.4183 42.6668 56 46.2486 56 50.6668Z"
                                            stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="#" class="mx-1" id="btn-copy-qr">
                                    <svg width="66" height="66" viewBox="0 0 66 66" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.75 41.25C11.1873 41.25 9.90598 41.25 8.89524 40.8313C7.54759 40.2731 6.47688 39.2024 5.91866 37.8548C5.5 36.844 5.5 35.5627 5.5 33V14.3C5.5 11.2197 5.5 9.67957 6.09946 8.50305C6.62677 7.46816 7.46816 6.62677 8.50305 6.09946C9.67957 5.5 11.2197 5.5 14.3 5.5H33C35.5627 5.5 36.844 5.5 37.8548 5.91866C39.2024 6.47688 40.2731 7.54759 40.8313 8.89524C41.25 9.90598 41.25 11.1873 41.25 13.75M33.55 60.5H51.7C54.7803 60.5 56.3204 60.5 57.497 59.9005C58.5318 59.3732 59.3732 58.5318 59.9005 57.497C60.5 56.3204 60.5 54.7803 60.5 51.7V33.55C60.5 30.4697 60.5 28.9296 59.9005 27.7531C59.3732 26.7182 58.5318 25.8768 57.497 25.3495C56.3204 24.75 54.7803 24.75 51.7 24.75H33.55C30.4697 24.75 28.9296 24.75 27.7531 25.3495C26.7182 25.8768 25.8768 26.7182 25.3495 27.7531C24.75 28.9296 24.75 30.4697 24.75 33.55V51.7C24.75 54.7803 24.75 56.3204 25.3495 57.497C25.8768 58.5318 26.7182 59.3732 27.7531 59.9005C28.9296 60.5 30.4697 60.5 33.55 60.5Z"
                                            stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-3">
                                <a href="<?= base_url() ?>wallet" class="btn btn-receive-bank py-2 px-4">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center">
        <a href="<?= base_url() ?>wallet" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8B0000" />
                            <stop offset="1" stop-color="#CB0000" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>
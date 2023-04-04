<?php if($requestcard == 'detailcard') {?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 ">
                    <h3 class="text-center text-blue-freedy fw-bolder f-poppins mt-5 pt-5">YOUR VIRTUAL CARD DETAILS</h3>
                    <div class="mt-5 wrap-border-topup p-3 p-md-4 col-12 col-md-10 mx-auto">
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>Card number</span>
                            <span><?=$detailcard->cardnumber ?></span>
                        </div>
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>CVV</span>
                            <span><?=$detailcard->cvv?></span>
                        </div>
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>Expire date</span>
                            <span><?=$exp?></span>
                        </div>
                        <div class="text-start d-flex justify-content-center mt-5 mb-4">
                            <a href="<?= base_url(); ?>homepage/card"
                                class="btn-card-confirm-nocard  d-inline-flex align-items-center justify-content-center align-self-center">
                                <span class="f-lexend">Confirm</span>
                            </a>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
<?php } else {?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 ">
                    <?php $this->load->view("tamplate/banner-nofiat-balance"); ?>
                    <?php if($requestcard ==  'requestcard'){?>
                        <div class="row my-5 ">
                            <div class="text-topup-card ">
                                <?php if (@isset($_SESSION["failed"])) { ?>
                                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <h1 class="text-blue-freedy fw-bolder f-poppins text-center ">
                                    Request Card
                                </h1>
                                <ul class="text-start fw-semibold f-lexend col-10 mx-auto mt-4">
                                    <li>The card will be linked and rechargable only in Euro from your own wallet</li>
                                    <li class="mt-3">Every wallet is allowed to have a maximum of 1  card, the card is a rechargeable VISA in Euro currency</li>
                                </ul>
                            </div>
                            <div class="card-req-card p-5 mt-4">
                                <div class="mt-4">
                                    <span class="text-req-card">Unique code</span>
                                    <div class="row d-flex align-items-center w-100">
                                        <div class="form-req-card d-flex flex-row align-items-center my-2 col-12 ms-2" style="height: 70px;">
                                            <!-- <label for="amount"><?= $_SESSION["symbol"] ?></label> -->
                                            <input type="text" class="form-control text-start fw-semibold" readonly value="<?=$_SESSION["ucode"]?>">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="mt-4">
                                    <span class="text-req-card">Price</span>
                                    <div class="row d-flex align-items-center w-100">
                                        <div class="form-req-card d-flex align-items-center my-2 col-12 col-md-6 ms-2" style="height: 70px;">
                                            <!-- <label for="confirmamount"><?= $_SESSION["symbol"] ?></label> -->
                                            <input type="text" class="form-control money-input text-start fw-bold" autocomplete="off" readonly value="<?=$price?>">&euro;
                                        </div>
                                        <span class="col-md-4 mx-0 mt-3 mt-md-0 mx-md-5 text-req-card">Annual cost</span>
                                    </div>
                                </div>
    
                                <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                    <a href="<?= base_url(); ?>homepage/requestcard?requestcard=<?= base64_encode('virtual')?>"
                                        class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                        <span class="f-lexend">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
    
                    <?php if($requestcard == 'virtual'){?>
                        <div class="row my-4">
                            <div class="text-topup-card mt-5 mb-3">
                                <h1 class="text-blue-freedy fw-bolder f-poppins text-center">
                                    Card
                                </h1>
                            </div>
                            <a href="<?= base_url(); ?>homepage/requestcard?requestcard=<?= base64_encode('activenow')?>" class="col-12 mx-auto card-topup d-flex align-items-center justify-content-center">
                                <span class="text-blue-freed fw-bold text-center f-lexend fw-bold">
                                Request Virtual Card
                                </span>
                            </a>
                            <a href="#" class="col-12 mx-auto card-topup d-flex align-items-center justify-content-center mt-4">
                                <span class="text-blue-freed fw-bold text-center f-lexend fw-bold">
                                Request Physical Card 
                                <br>
                                (COMING SOON)
                                </span>
                            </a>
                        </div>
                    <?php }?>
    
                    <?php if($requestcard == 'activenow'){?>
                        <div class="row my-4 card-req-activation">
                            <form action="<?=base_url()?>homepage/activecard" method="POST">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <?php if (@isset($_SESSION["failed"])) { ?>
                                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <div class=" row d-flex mt-5 mx-0 mx-md-2">
                                    <h3 class="col-12 col-md-10 mx-auto text-start f-ubuntu">
                                        THE MOBILE NUMBER YOU WILL ENTER WILL BE USED JUST FOR OTP NUMBER AUTHENTICATION
                                    </h3>
                                </div>
                                <div class="row my-4 mx-auto d-flex justify-content-center">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <input name="telp" id="telephone" autocomplate="false" class="nohp-select input-nohp" type="tel" required>
                                    </div>
                                </div>
                                <div class="row d-flex  mx-0 mx-md-2">
                                    <h4 class="text-start col-12 col-md-10 mx-auto f-ubuntu">
                                        The number will be kept encrypted and it will not be linked to a card or to a person and neither the company won’t be able to provide it to anyone, either under request.
                                    </h4>  
                                </div> 
                                <div class="row my-5 mx-auto d-flex justify-content-center">
                                    <div class="col-md-10 my-2">
                                        <input class="nohp-select inputPass" type="password" name="passwd" placeholder="*Create a password 3D Secure" required>
                                    </div>
                                    <div class="col-md-10 my-2 mt-4">
                                        <input class="nohp-select inputPass" type="password" name="confpasswd" placeholder="*Confirm 3D Secure password " required>
                                    </div>
                                </div>
                                <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                    <button type="submit"
                                        class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                        <span class="f-lexend">Active Now</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
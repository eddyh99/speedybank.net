<?php
require_once('countries-list.php'); ?>
<?php if( $requestcard_physical == 'success' ) {?>
    <div class="d-flex justify-content-center align-items-center card-topup-success">
        <div class="col-12 col-lg-8 col-xl-6 mt-5">
            <div class="container " style="margin-bottom: 8rem;">
                <div class="app-container mt-5 py-5 d-flex flex-column justify-content-center align-items-center ">
                    <svg width="167" height="167" viewBox="0 0 167 167" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M163.52 118.292L128.729 153.083L104.374 128.729L114.812 118.292L128.729 132.208L153.083 107.854L163.52 118.292ZM91.1535 138.471C88.3702 139.167 86.2827 139.167 83.4994 139.167C52.8827 139.167 27.8327 114.117 27.8327 83.5001C27.8327 52.8834 52.8827 27.8334 83.4994 27.8334C114.116 27.8334 139.166 52.8834 139.166 83.5001C139.166 86.2834 139.166 88.3709 138.47 91.1543C143.341 91.8501 147.516 93.2417 151.691 95.3292C152.387 91.1543 153.083 87.6751 153.083 83.5001C153.083 45.2292 121.77 13.9167 83.4994 13.9167C45.2285 13.9167 13.916 45.2292 13.916 83.5001C13.916 121.771 45.2285 153.083 83.4994 153.083C87.6744 153.083 91.8493 152.388 95.3285 151.692C93.241 148.213 91.8493 143.342 91.1535 138.471ZM108.549 98.1126L86.9785 85.5876V48.7084H76.541V90.4584L100.895 105.071C102.983 102.288 105.766 100.2 108.549 98.1126Z" fill="#0C5FA4"/>
                    </svg>
                    <h1 class="text-center f-poppins text-blue-freedy mt-2 mb-5">Payment Succeeded</h1>
                    <p class="f-poppins fw-semibold text-center">The  physical card will be sent to you as soon as possible</p>
                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                        <a href="<?= base_url(); ?>card"
                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                            <span class="f-lexend">Done</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($requestcard_physical == 'summary') {?>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="container" style="margin-bottom: 8rem;">
                <div class="app-container py-5 ">
                    <h3 class="text-center text-blue-freedy fw-bolder f-poppins mt-5 pt-5">Summary</h3>
                    <div class="mt-5 wrap-border-topup p-3 p-md-4 col-12 col-md-10 mx-auto">
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>Card price</span>
                            <span><?=$price." ".$_SESSION["currency"]?></span>
                        </div>
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>Ship price</span>
                            <span><?php
                                if ($carddetail["delivery_address"]["dispatch_method"]=="DHLGlobalMail"){
                                    echo number_format($ship->card_ship_reg,2)." ".$_SESSION["currency"];
                                }elseif ($carddetail["delivery_address"]["dispatch_method"]=="DHLExpress"){
                                    echo number_format($ship->card_ship_fast,2)." ".$_SESSION["currency"];
                                }
                            ?></span>
                        </div>
                        <div class="d-flex justify-content-between px-0 px-md-5 py-4 text-blue-freedy fw-bold">
                            <span>Total</span>
                            <span><?php
                                if ($carddetail["delivery_address"]["dispatch_method"]=="DHLGlobalMail"){
                                    echo number_format($price+$ship->card_ship_reg,2)." ".$_SESSION["currency"];
                                }elseif ($carddetail["delivery_address"]["dispatch_method"]=="DHLExpress"){
                                    echo number_format($price+$ship->card_ship_fast,2)." ".$_SESSION["currency"];
                                }
                            ?></span>
                        </div>
                        <div class="text-start d-flex justify-content-center mt-5 mb-4">
                            <form action="<?=base_url()?>card/activephysiccard" method="post">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit"
                                    class="btn-card-confirm-nocard  d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span class="f-lexend">Confirm</span>
                                </button>
                            </form>
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
                        <?php $this->load->view("tamplate/banner-nofiat"); ?>
                        <?php if($requestcard_physical == 'requestcard_physical') {?>
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
                                        Request Physical Card
                                    </h1>
                                    <ul class="text-center fw-normal f-lexend col-10 mx-auto mt-4">
                                        <li class="list-group-item">*Every wallet is allowed to have a maximum of 1 physical card, the card is a rechargeable VISA in Euro currency </li>
                                    </ul>
                                </div>
                                <div class="card-req-physical col-12 mx-auto mt-4 "  style="">
                                    <div class="mt-4">
                                        <span class="text-req-card">Unique code</span>
                                        <div class="row d-flex align-items-center w-100">
                                            <div class="form-req-card d-flex flex-row align-items-center my-2 col-12 ms-2" style="height: 70px;">
                                                <!-- <label for="amount"><?= $_SESSION["symbol"] ?></label> -->
                                                <input type="text" class="form-control text-start fw-semibold" readonly value="<?=$_SESSION["ucode"]?>">
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="my-4">
                                        <span class="text-req-card">Price</span>
                                        <div class="row d-flex align-items-center w-100">
                                            <div class="form-req-card d-flex align-items-center my-2 col-10 col-md-6 ms-2" style="height: 70px;">
                                                <!-- <label for="confirmamount"><?= $_SESSION["symbol"] ?></label> -->
                                                <input type="text" class="form-control money-input text-start fw-bold" autocomplete="off" readonly value="<?=$price?>">&euro;
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <span class="col-md-4 text-req-card">Annual cost</span>
                                            </div>
                                        </div>
                                    </div>        
                                </div>
                                <form class="mt-4" action="<?=base_url()?>card/shipping" method="post">
                                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <span class="text-req-card">Shipping Cost</span>
                                    <div class="row my-4 d-flex justify-content-center">
                                        <div class="col-12 col-md-6 mx-auto">
                                            <label class="label-dhl">
                                                <input type="radio" name="dhl" class="card-input-dlh d-none" value="fast" required>
                                                <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="c-dlh"></div>
                                                        <span class="m-dlh fw-bold">
                                                            DHL Express
                                                            <br>
                                                            <span class="fw-normal">
                                                                2-5 working days
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <span class="m-eur fw-bold"><?=number_format($ship->card_ship_fast,2)?> <?=$_SESSION["currency"]?></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-6 mx-auto">
                                            <label class="label-dhl">
                                                <input type="radio" name="dhl" class="card-input-dlh d-none" value="reg" required>
                                                <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <div class="c-dlh"></div>
                                                        <span class="m-dlh fw-bold">
                                                                DHL Global Mail     
                                                            <br>
                                                            <span class="fw-normal">
                                                                6-10 working days
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <span class="m-eur fw-bold"><?=number_format($ship->card_ship_reg,2)?> <?=$_SESSION["currency"]?></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>                                        
                                    </div>
                                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                        <button type="submit"
                                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span class="f-lexend">Next</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        <?php } elseif($requestcard_physical == '3dpassword') {?>
                            <form action="<?=base_url()?>card/cardsummary" method="post">
                                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="row my-4 card-req-activation">
                                    <div class="row mb-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="printedname" id="printedname" autocomplate="false" placeholder="Name and last name to print on the card (optional)" class="nohp-select inputPass" type="text">
                                        </div>
                                    </div>
                                    <div class="row d-flex  mx-0 mx-md-2">
                                        <h4 class="text-start col-12 col-md-10 mx-auto f-ubuntu">
                                            (Entering the name and surname to be printed on the card does not mean that the card will be under your name. <br>
                                            The name and surname printed on the card will useful because in some countries and in some structures  you could be asked  for a document showing the usual details printed on the card in order to accept it)
                                        </h4>  
                                    </div>
                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                            <div class="col-12 col-md-10 mx-auto">
                                                <input name="telp" id="telephone" autocomplate="false" class="nohp-select input-nohp" type="tel" required>
                                            </div>
                                        </div>
                                    <div class="row mx-auto d-flex justify-content-center">
                                        <div class="col-md-10 my-2">
                                            <!-- <input class="nohp-select inputPass" type="password" name="passwd" placeholder="*Create a password 3D Secure" required minlength="8" maxlength="36"> -->
                                            <div class="d-flex justify-content-evenly align-items-center wrap-3dsecure">
                                                <input id="password" class="inputPass" type="password" name="passwd" placeholder="*Create a password 3D Secure" minlength="8" maxlength="35" required>
                                                <span class="d-flex pe-3 justify-content-center">
                                                    <i class="far fa-eye "  id="togglePassword" style="cursor: pointer"
                                                        toggle="#password">
                                                    </i>
                                                </span>
                                            </div>
                                            <span class="d-flex ps-3 mt-2" style="font-size: 12px; color: gray;">Password must at least 8 - 35 Character</span>
                                        </div>
                                        <div class="col-md-10 my-2 mt-4">
                                            <!-- <input class="nohp-select inputPass" type="password" name="confpasswd" placeholder="*Confirm 3D Secure password " required minlength="8" maxlength="36"> -->
                                            <div class="d-flex justify-content-evenly align-items-center wrap-3dsecure">
                                                <input id="password2" class="inputPass" type="password" name="confpasswd" placeholder="*Confirm 3D Secure password" minlength="8" maxlength="35" required>
                                                <span class="d-flex pe-3 justify-content-center">
                                                    <i class="far fa-eye "  id="togglePassword2" style="cursor: pointer"
                                                        toggle="#password2">
                                                    </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex  mx-0 mx-md-2">
                                        <h4 class="text-start col-12 col-md-10 mx-auto f-ubuntu">
                                            <ul>
                                                <li>3d secure password, Required for card activation and enabling of internet purchases in case product has 3D Secure enabled</li>
                                                <li>We will send your PIN same as your card will arrive and you can easily request trough online</li>
                                            </ul>
                                        </h4>  
                                    </div> 
                                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                        <button type="submit"
                                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span class="f-lexend">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php } elseif($requestcard_physical == 'shippingdetails') {?>
                            <div class="row my-4 card-req-activation">
                                <form action="<?=base_url()?>card/cardsecurity" method="POST">
                                    <input type="hidden" name="shiptype" value="<?=$shiptype?>">
                                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <?php if (@isset($_SESSION["failed"])) { ?>
                                        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                            <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <div class=" row d-flex mt-2 mx-0 mx-md-2">
                                        <h5 class="col-12 col-md-10 mx-auto fw-bold text-start f-lexend">
                                            SHIPPING DETAILS
                                        </h5>
                                    </div>
                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="firstname" id="firstname" autocomplate="false" placeholder="*First Name" class="nohp-select inputPass" type="text" required maxlength="50">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="lastname" id="lastname" autocomplate="false" placeholder="*Last Name" class="nohp-select inputPass" type="text" required maxlength="50">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="telp" id="telephone" autocomplate="false" class="nohp-select input-nohp" type="tel" required>
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="companyname" id="companyname" autocomplate="false" placeholder="Company name (optional)" class="nohp-select inputPass" type="text" minlength="2" maxlength="45">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                        <select name="country" class="form-select nohp-select inputPass me-2" id="countryCode">
                                            <option value="">--Country--</option>
                                            <?php foreach ($countries_list as $cur) { ?>
                                            <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input type="text" name="city" autocomplate="false" placeholder="*city" class="nohp-select inputPass" required maxlength="35">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="zipcode" id="zipcode" autocomplate="false" placeholder="*Zip/ Postal code" class="nohp-select inputPass" type="text" required maxlength="10">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="addressone" id="addressone" autocomplate="false" placeholder="*Address 1" class="nohp-select inputPass" type="text" required maxlength="45">
                                        </div>
                                    </div>

                                    <div class="row my-4 mx-auto d-flex justify-content-center">
                                        <div class="col-12 col-md-10 mx-auto">
                                            <input name="addresstwo" id="addresstwo" autocomplate="false" placeholder="Address 2" class="nohp-select inputPass" type="text" maxlength="45">
                                        </div>
                                    </div>                                    
                                    <div class="text-start d-flex justify-content-center mt-5 mb-4">
                                        <button type="submit"
                                            class="btn-card-confirm d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span class="f-lexend">Next</span>
                                            </button>
                                    </div>
                                </form>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
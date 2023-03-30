<?php if($findme == "confirm") {?>
<section class="bg-thank d-flex justify-content-center align-items-center mt-0 pt-0">
  <div class="container ">
    <div class="row">
      <div class="col-12 col-lg-8 col-xl-6 mx-auto thank-findme">
        <h1 class="f-hahmlet text-center fw-bold text-blue-freedy pt-0">Thank you <br>your application <br>has been received! </h1>
        <p class="f-roboto text-center fw-bold mt-4">Our staff is working for you; <br> the process validation can take until 48 working hours</p>
        <div class="text-center mt-5">
              <a href="<?= base_url(); ?>"
                  class="btn-footer-signin mt-2 scrollto d-inline-flex align-items-center justify-content-center align-self-center f-lexend px-5 link-lp">
                  <span>Home</span>
              </a>
          </div>
      </div>
      </div>
  </div>
</section>

<?php } else { ?>
<section id="" class="d-flex p-3 pt-md-5 ">
      <div class="container">
            <div class="row">
        
              <!-- Start Country -->
              <?php if($findme == 1){ ?>
                <form action="<?=base_url()?>link/findcategory" method="post">
                    <input type="hidden" name="findme" value="<?=base64_encode(2)?>">
                    <input type="hidden" id="token"
                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">          
              
                    <div class="col-12 mb-5 pb-5">
                        <div class="link-back p-0">
                            <a href="<?= base_url(); ?>link/guide?guide=<?= base64_encode('7')?>">
                                <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="speedybank/back-link">
                            </a>
                        </div>
                    </div>
                    <div class="px-md-5">
                      <!-- Start Select Country  -->
                      <div class="col-md-12">        
                        <h5 class="fw-bold text-black text-start mb-3 text-findme">*Country</h5>


                        <select id="country" name="country" class="custom-select country-select"  required>
                          <option value="" selected>Select country</option> 
                          <?php foreach($country as $dt){ ?>
                              <?php if($dt->name) {?>
                                <option value="<?=$dt->code?>"><?=$dt->name?></option>
                              <?php }?>
                          <?php }?>
                        </select>

                      </div>
                      <!-- End Select Country  -->
            
                      <!-- Start Select Province  -->
                      <div class="col-md-12 my-5">        
                        <h5 class="fw-bold text-black text-start mb-3 text-findme">*State/Province</h5>
                        <select id="state" name="state" class="custom-select country-select"  required>
                          <option value="" selected >Select State/Province</option>
                        </select>
                      </div>
                      <!-- End Select Province  -->
            
                      <!-- Start Select Region  -->
                      <div class="col-md-12 mb-5">        
                        <h5 class="fw-bold text-black text-start text-findmetart mb-3 text-findme">*City/Region</h5>
                        <select id="city" name="city" class="custom-select country-select" required>
                          <option value="" selected >Select City/Region</option>
                        </select>
                      </div>
                      <!-- End Select Region  -->
            
                      <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn-unique-code mx-auto d-block btn my-3">
                                <div class="circle-btn-unique-code">
                                    <i class="ri-arrow-right-line fs-4"></i>
                                </div>
                                <div class="pt-2 fw-semibold text-black">
                                    next
                                </div>
                            </button>
                      </div>
            
            
                    </div>
                </form>
                
              <?php }?>
              <!-- End Country -->
      
              <!-- Start Category -->
              <?php if($findme == 2){ ?>
                <form action="<?=base_url()?>link/findbusiness" method="post">
                    <input type="hidden" name="findme" value="<?=base64_encode(3)?>">
                    <input type="hidden" id="token"
                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">          
                    <div class="col-12 mb-5 pb-5">
                        <div class="link-back p-0">
                            <a href="<?= base_url(); ?>link/findme?findme=<?= base64_encode('1')?>">
                                <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="speedybank/back-link">
                            </a>
                        </div>
                    </div>
                    <div class="px-md-5">
                      <!-- Start Select Category  -->
                      <div class="col-md-12">        
                        <h5 class=" fw-bold text-black text-start mb-3 text-findme">*Category</h5>
                        <select name="kategori[]" id="kat1" class="custom-select country-select" required>
                          <option value="" selected >category</option>
                          <?php foreach ($category as $dt){ ?>
                            <option value="<?=$dt->id?>"><?=$dt->category?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- End Select Category  -->
            
                      <!-- Start Other Category  -->
                      <div class="col-md-12 my-5">
                        <div class="d-flex align-items-center mb-1">
                          <h5 class="fw-bold text-black text-start text-findme me-3">*Other category</h5>
                          <span class="mb-2">
                            <i class="ri-question-line "></i>
                          </span>
                        </div>
                        <select name="kategori[]" id="kat2" class="custom-select country-select">
                          <option value="" selected >category</option>
                          <?php foreach ($category as $dt){ ?>
                            <option value="<?=$dt->id?>"><?=$dt->category?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- End Other Category  -->
            
                      <!-- Start Other Category  -->
                      <div class="col-md-12 mb-5">        
                      <div class="d-flex align-items-center mb-1">
                          <h5 class="fw-bold text-black text-start text-findme me-3">*Other category</h5>
                          <span class="mb-2">
                            <i class="ri-question-line "></i>
                          </span>
                        </div>
                        <select name="kategori[]" id="kat3" class="custom-select country-select">
                          <option value="" selected >category</option>
                          <?php foreach ($category as $dt){ ?>
                            <option value="<?=$dt->id?>"><?=$dt->category?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <!-- End Other Category  -->
            
                      <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn-unique-code mx-auto d-block btn my-3">
                            <div class="circle-btn-unique-code">
                                <i class="ri-arrow-right-line fs-4"></i>
                            </div>
                            <div class="pt-2 fw-semibold text-black">
                                next
                            </div>
                        </button>
                      </div>
            
            
                    </div>
                </form>
              <?php }?>
              <!-- End Category -->
        
              <!-- Start Name Bussiness -->
              <?php if($findme == 3){ ?>
                <form action="<?=base_url()?>link/findconfirm" enctype='multipart/form-data' method="post">
                    <input type="hidden" name="findme" value="<?=base64_encode('confirm')?>">
                    <input type="hidden" id="token"
                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="col-12 mb-5 pb-5">
                        <div class="link-back p-0">
                            <a href="<?= base_url(); ?>link/findme?findme=<?= base64_encode('1')?>">
                                <img src="<?= base_url() ?>assets/img/speedybank/back-link.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="px-md-5">
            
                      <!-- Start Name Bussiness -->
                      <div class="col-md-12 ">        
                        <h5 class=" fw-bold text-black text-start mb-3 text-findme">*Name of your business as reported in Googlemaps</h5>
                        <input class="country-select" type="text" name="business" placeholder="name of your business" required>
                      </div>
                      <!-- End Name Bussiness -->
            
                      <!-- Start Googlemaps link -->
                      <div class="col-md-12 my-5">        
                        <div class="d-flex align-items-center mb-1">
                          <h5 class="fw-bold text-black text-start text-findme me-3">*Google maps link </h5>
                          <span class="mb-2 pe-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="ri-question-line "></i>
                          </span>
                        </div>
                        <input class="country-select" type="text" name="map" placeholder="Link Here" required>
                      </div>
                      <!-- End Googlemaps link -->
            
                      <!-- Start  Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                              <ol>
                                <li>Open Google Maps</li>
                                <li>Enter your business</li>
                                <li>Click share</li>
                                <li>Click the botton "share link"</li>
                                <li>Paste on our form "Google maps"</li>
                              </ol>
                              <div class="d-flex justify-content-center">
                                <img class="img-fluid" src="<?= base_url(); ?>assets/img/speedybank/sharemaps.png" alt="sharemaps">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       <!-- End  Modal -->
            
            
                      <!-- Start logo -->
                      <div class="col-md-12 my-5 pt-5">        
                        <h5 class=" fw-bolder text-black text-start mb-3 text-findme">*Enter image (logo/brand)</h5>
                        <div class="d-flex flex-column">
                          <div class="row ">
                            <div class="col-12 col-sm-8 col-lg-6 input-logo-business">
                              <input name="logo" type="file" id="images-logo" accept="image/jpg, image/jpeg, image/png" required>
                            </div>
                          </div>
                          <div class="row  mt-3">
                            <div class="col-12 d-flex flex-column flex-sm-row">
                              <img id="image-container" src="<?= base_url()?>assets/img/speedybank/preview_image.png"/>
                              <span class="p-4 fw-bolder">
                                <p class="text-findme text-start">*Maximum 1MB</p>
                                <p class="text-findme text-start">*png, jpg, jpeg</p>
                              </span>
                            </div>
                          </div>
                        </div>

                      </div>
                      <!-- End logo -->
            
                      <div class="text-center mb-5">
                          <button type="submit"
                              class="btn-footer-signin mt-2 scrollto d-inline-flex align-items-center justify-content-center align-self-center f-lexend px-5 link-lp">
                              <span>Confirm</span>
                          </button>
                      </div>
            
            
                    </div>
                </form>
              <?php }?>
              <!-- End Name Bussiness -->
        
            </div>
      </div>
</section>
<?php }?>



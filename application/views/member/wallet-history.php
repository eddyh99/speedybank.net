<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12">
                        <div class="col-12 recive-bank  d-flex align-items-center flex-column">
                            <div class="col-12 transaction border-0">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="col-12 search d-flex flex-row">
                                        <input type="search" class="w-100 me-auto" placeholder="Search"
                                            aria-label="Search" aria-describedby="search-addon" />
                                        <span class="" id="search-addon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="app-calendar mb-2">
                                    <form id="frmhistory">
                                        <input type="hidden" id="token"
                                            name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="text" name="tgl" id="tgl" readonly class="border-0"
                                            style="cursor: pointer;">
                                    </form>
                                </div>
                                <div class="col-12 box-transaction overflow-auto">
                                    <div id="history"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
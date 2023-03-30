<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12">
                        <div class="col-12 recive-bank  d-flex align-items-center flex-column text-center">
                            <a href="<?= base_url() ?>wallet/send" class="col-8 py-3 my-2">Send</a>
                            <a href="<?= base_url() ?>wallet/receive" class="col-8 py-3 my-2">Receive</a>
                            <a href="<?= base_url() ?>wallet/request" class="col-8 py-3 my-2">Request</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
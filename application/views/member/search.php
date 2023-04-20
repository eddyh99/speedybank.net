<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">
<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <?php $this->load->view("tamplate/banner-nofiat"); ?>
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12">
                    <div class="col-12  d-flex align-items-center flex-column">
                            <div class="col-12 mt-5">
                                <div class="row flex-colum">
                                    <div class="col-12">
                                        <select id="country" name="country" class="form-select"  required>
                                            <option value="" selected>Select country</option> 
                                            <?php foreach($country as $dt){ ?>
                                                <?php if($dt->name) {?>
                                                    <option value="<?=$dt->code?>"><?=$dt->name?></option>
                                                <?php }?>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <select id="state" name="state" class="form-select"  required>
                                            <option value="" selected >Select State/Province</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <select id="city" name="city" class="form-select" required>
                                            <option value="" selected >Select City/Region</option>
                                        </select>
                                    </div>
                                    <hr class="mt-4">
                                    <div class="col-12 mt-2">
                                        <select name="kategori" id="kategori" class="form-select" required>
                                            <option value="" selected >category</option>
                                            <?php foreach ($category as $dt){ ?>
                                                <option value="<?=$dt->id?>"><?=$dt->category?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button id="search" class="mt-4 btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <table id="tblsearchme" class="table table-bordered" width="100%">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Business Name</th>
                                            <th>Map</th>
                                            <th>logo</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border-top: 0;">
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="accountNumber">
</div>

<?php if ($type == 'local') { ?>
    <div class="align-items-center my-3">
        <input class="form-control me-2" type="text" name="billerCode" placeholder="BPAY biller code">
    </div>
    <div class="align-items-center my-3">
        <input class="form-control me-2" type="text" name="customerReferenceNumber" placeholder="Customer Reference Number (CRN)">
    </div>
<?php } ?>

<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="city" placeholder="City">
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="postCode" placeholder="Post Code">
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="firstLine" placeholder="FirstLine">
</div>
<div class="align-items-center my-3">
    <select name="countryCode" class="form-select me-2" id="countryCode">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
            <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
    <!-- <input class="form-control me-2" type="text" name="countryCode" placeholder="Country initial"> -->
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="state" placeholder="State">
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="bsbCode" placeholder="BSB Code">
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountHolderName" placeholder="Recipient Name">
</div>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<?php if ($type == 'local') { ?>
    <div class="align-items-center my-3">
        <input class="form-control me-2" type="text" name="IBAN" placeholder="IBAN">
    </div>
<?php } ?>

<div class="align-items-center my-3">
    <select name="bankCode" class="form-control me-2" id="bankCode">
        <option value="">--Bank Code--</option>
        <?php foreach ($codecur as $dt) { ?>
            <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
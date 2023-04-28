<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>
<div class="align-items-center my-3">
    <select name="bankCode" class="form-control me-2">
        <option value="">--Bank name--</option>
        <?php foreach ($codecur as $dt) { ?>
            <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
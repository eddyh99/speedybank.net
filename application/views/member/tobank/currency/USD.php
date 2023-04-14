<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<?php if ($type == "local") { ?>

<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="abartn" placeholder="Routing Number">
</div>
<?php } ?>

<?php if ($type == "inter") { ?>
<div class="align-items-center my-3">
    <input class="form-control me-2" type="text" name="swiftCode" placeholder="Swift Code">
</div>

<input type="hidden" name="abartn" value="">
<input type="hidden" name="accountType" value="">
<?php } ?>

<?php if ($type == "local") { ?>
<div class="align-items-center my-3">
    <select name="accountType" class="form-select me-2" id="accountType">
        <option value="">--Account Type--</option>
        <option value="savings">Saving</option>
        <option value="checking">Checking</option>
    </select>
</div>
<?php } ?>

<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="firstLine" placeholder="FirstLine"
        <?php if ($type == 'local') echo 'value="16192 Coastal Highway"'; ?>>
</div>

<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="city" placeholder="City"
        <?php if ($type == 'local') echo 'value="Delaware"'; ?>>
</div>

<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="state" placeholder="State"
        <?php if ($type == 'local') echo 'value="United State"'; ?>>
</div>

<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="postCode" placeholder="Postcode"
        <?php if ($type == 'local') echo 'value="19958"'; ?>>
</div>

<?php if ($type == "local") { ?>
<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="state" placeholder="State initial" maxlength="2"
        <?php if ($type == 'local') echo 'value="DE"'; ?>>
</div>

<div class="align-items-center my-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control me-2" type="text" name="countryCode" <?php if ($type == 'local') echo 'value="US"'; ?>>
</div>

<?php } ?>

<?php if ($type == "inter") { ?>
<div class="align-items-center my-3">
    <select name="countryCode" class="form-select me-2" id="countryCode">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
        <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>
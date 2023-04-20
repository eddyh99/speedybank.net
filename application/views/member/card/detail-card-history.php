<?php if(is_array($history) || is_object($history)) {?>
    <?php foreach($history as $dt) { ?>
        <div class="list-transaction d-flex align-items-center justify-content-between">
            <div class="flex-shrink-0">
                <h4 class="m-0"><?=$dt->merchant_name?>
                </h4>
                <span><?php echo date_format(date_create($dt->purchase_date), "m-d-Y h:i A") ?></span>
            </div>
            <div class="d-flex flex-column justify-content-end text-end">
                <font color="red"><?= $_SESSION["symbol"] ?> <?= number_format(abs($dt->account_amount), 2) ?></font>
            </div>
        </div>
    <?php } ?>
<?php }?>
<?php if (empty($history)) { ?>
    <div class="list-transaction d-flex align-items-center text-center justify-content-center">
        <span class="fst-italic">No history</span>
    </div>
<?php
    }
?>
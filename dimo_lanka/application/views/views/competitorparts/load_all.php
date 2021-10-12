<select id="cmb_category" name="cmb_category" onchange="refreshCombo();">
    <option>Select type</option>
    <?php
    if ($extraData != '') {
        foreach ($extraData as $value) {
            ?>
            
            <option value="<?php echo $value->visit_category_id; ?>"><?php echo $value->category_name; ?></option>

            <?php
        }
    }
    ?>

</select>
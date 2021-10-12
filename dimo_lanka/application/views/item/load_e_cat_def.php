<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<select id="cmb_e_cat_def" name="cmb_e_cat_def">
    <option></option>
    <?php foreach ($extraData as $value) { ?>
        <option value="<?php echo $value->e_cat_def_id ?>"><?php echo $value->e_cat_name; ?></option>

    <?php }
    ?>
</select>
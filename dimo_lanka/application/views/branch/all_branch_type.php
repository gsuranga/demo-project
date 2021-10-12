<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

  <?php foreach ($extraData as $value){ ?>
    <option value="<?php echo $value->id_item_category; ?>"> <?php echo $value->tbl_item_category_name; ?> </option>
    <?php } ?>

<?php
/**
 * Description of category
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>


   
    <?php foreach ($extraData as $value){ ?>
    <option value="<?php echo $value->id_item_category; ?>"> <?php echo $value->tbl_item_category_name; ?> </option>
    <?php } ?>

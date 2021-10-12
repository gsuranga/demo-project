<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->item_brand_id; ?>"><?php echo $value->brand_name; ?></option>
<?php }
?>
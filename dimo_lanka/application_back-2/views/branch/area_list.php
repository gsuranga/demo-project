<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * @author Iresha Lakmali
 */
?>
<select id="cmb_area" name="cmb_area">
    <option>select Area</option>
    <?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->area_id ?>"><?php echo $value->area_name; ?></option>

<?php }
?>
</select>
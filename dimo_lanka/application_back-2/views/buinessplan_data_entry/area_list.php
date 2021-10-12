<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<select id="cmbArea1" name="cmbArea1">
    <option></option>
    <?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->area_id ?>"><?php echo $value->area_name; ?></option>

<?php }
?>
</select>
<?php echo form_error('cmbArea1'); ?>
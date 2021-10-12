<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<select id="cmb_campaign_type1" name="cmb_campaign_type1">
    <option></option>
    <?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->id_campaing_type ?>"><?php echo $value->type_description; ?></option>

<?php }
?>
</select>
<?php echo form_error('cmb_campaign_type1'); ?>
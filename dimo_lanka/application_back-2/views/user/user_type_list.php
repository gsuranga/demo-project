<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<select id="cmb_user_type" name="cmb_user_type" onchange="hiden_non_admin();">
    <option>select type</option>
    <?php foreach ($extraData as $value) { ?>
    <option value="<?php echo $value->typeid ?>"><?php echo $value->typename; ?></option>

<?php }
?>
</select>
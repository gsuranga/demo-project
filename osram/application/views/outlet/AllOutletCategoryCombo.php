<?php 
/**
 * Description of AllOutletCategoryCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
        ?>
        <option value="<?php echo $data['id_outlet_category']; ?>"><?php echo $data['outlet_category_name']; ?></option>
    <?php
    }
}
?>

<?php
/**
 * Description of AllUserTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
foreach ($extraData['user_type'] as $value) {
    ?>
    <option value="<?php echo $value['id_user_type']; ?>"><?php echo $value['user_type']; ?></option>
    <?php
}
?>

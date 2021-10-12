<?php
/**
 * Description of allDivisionTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
foreach ($extraData as $value) {
    foreach ($value as $data) {
        ?>

        <option value="<?php echo $data['id_division_type']; ?>"><?php echo $data['tbl_division_type_name']; ?></option>
        <?php
    }
}
?>
  

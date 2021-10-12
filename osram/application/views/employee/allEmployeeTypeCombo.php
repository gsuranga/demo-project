<?php
/**
 * Description of allEmployeeTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
foreach ($extraData as $value) {
    foreach ($value as $data) {
        ?>

        <option value="<?php echo $data['id_employee_type']; ?>"><?php echo $data['employee_type']; ?></option>
        <?php
    }
}
?>
  

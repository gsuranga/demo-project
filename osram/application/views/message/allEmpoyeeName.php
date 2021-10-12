<?php
/**
 * Description of allEmpoyeeName
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
foreach ($extraData as $value) {
    foreach ($value as $data) {
        ?>
        <option value="<?php echo $data['id_employee_registration']; ?>"><?php echo $data['employee_first_name']; ?></option>
        <?php
    }
}
?>
  

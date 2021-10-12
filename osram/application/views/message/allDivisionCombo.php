<?php
/**
 * Description of allDivisionCombo
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
        <option value="<?php echo $data['id_division']; ?>"><?php echo $data['division_name']; ?></option>
        <?php
    }
}
?>
  

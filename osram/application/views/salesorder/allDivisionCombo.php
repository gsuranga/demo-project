<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
foreach ($extraData as $data) {
    ?>
    <option value="<?php echo $data['id_division']; ?>"><?php echo $data['division_name']; ?></option>
    <?php
}
?>
  

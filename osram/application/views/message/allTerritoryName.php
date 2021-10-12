<?php
/**
 * Description of allTerritoryName
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
        <option value="<?php echo $data['id_territory']; ?>"><?php echo $data['territory_name']; ?></option>
        <?php
    }
}
?>
  

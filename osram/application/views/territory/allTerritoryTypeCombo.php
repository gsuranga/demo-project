<?php 
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
        <?php
        foreach ($extraData as $value) {
            foreach ($value as $data) {
                ?>

                <option value="<?php echo $data['id_territory_type']; ?>"><?php echo $data['territory_type_name']; ?></option>
                <?php
            }
        }
        ?>
  

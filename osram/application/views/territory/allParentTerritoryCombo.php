<?php 
/**
 * Description of allParentTerritoryCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
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
  

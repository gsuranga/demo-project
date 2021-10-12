<?php 
/**
 * Description of allPhysicalPlaceCategory
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
        <?php
        foreach ($extraData as $value) {
            foreach ($value as $data) {
                ?>

                <option value="<?php echo $data['id_physical_place_category']; ?>"><?php echo $data['physical_place_category_name']; ?></option>
                <?php
            }
        }
        ?>
  

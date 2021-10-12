<select id="repair_type_id_0" name="repair_type_h_id_0">
    <option>--Repair type--</option> 
<?php
      
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
    
    <option value="<?php echo $value->repair_type_id; ?>"><?php echo $value->repair_type_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>
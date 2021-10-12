<select id="vehicle_model_0" name="vehicle_model_0" onchange="get_vehicle_model_id(0);"> 
    <option>----Select Vehicle Model----</option>
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->vehicle_model_id; ?>"><?php echo $value->vehicle_model_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>
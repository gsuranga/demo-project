<select id="vehicle_sub_model_0" name="vehicle_sub_model_0"> 
    <option>----Select Sub Model----</option>
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->vehicle_sub_model_id; ?>"><?php echo $value->vehicle_sub_model_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>
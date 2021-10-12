<select id="purpus" name="purpus" onchange="get_business_type();">
    <option>--Select Purpose--</option> 
<?php
      
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
    
    <option value="<?php echo $value->vehicle_purpose_id; ?>"><?php echo $value->vehicle_purpose_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>
<select id="cmd_district" name="cmd_district"> 
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->district_id; ?>"><?php echo $value->district_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

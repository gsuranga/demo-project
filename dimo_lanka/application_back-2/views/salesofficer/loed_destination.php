<select id="cmd_district" name="cmd_district">
  
  
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->des_Id; ?>"><?php echo $value->des_type; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

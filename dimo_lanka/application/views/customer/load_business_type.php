<select id="business_type" name="business_type"> 
    <option>--Select Business Type--</option>
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->business_type_id; ?>"><?php echo $value->business_type_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

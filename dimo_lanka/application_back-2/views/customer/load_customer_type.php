<select id="customer_type" name="customer_type"> 
    <option>----Select Customer Type----</option>
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->customer_type_id; ?>"><?php echo $value->customer_type_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

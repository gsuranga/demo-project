<select id="cmd_SalesOFicType" name="cmd_SalesOFicType"> 
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->sales_type_id; ?>"><?php echo $value->sales_type_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>
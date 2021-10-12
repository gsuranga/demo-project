<select name="aso_names1" id="aso_names1" onchange="getbranch(value);">
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->sales_officer_name; ?>"><?php echo $value->sales_officer_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

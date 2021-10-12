<select id="cmd_district" name="cmd_district">
  
  <option value="0">Select All</option>
<?php
       
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                
    <option value="<?php echo $value->visit_category_id; ?>"><?php echo $value->category_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

<select id="part_type_id_0" name="part_type_id_0">
    <option>--Part Type--</option> 
<?php
      
 if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
    
    <option value="<?php echo $value->part_type_id; ?>"><?php echo $value->part_type_name; ?></option>
                      
                        <?php
                        }
                        
 }?>
        
</select>

<!--this came from controller 'load_part_type'-->

    <?php 
    
    foreach ($extraData as $value){ ?>

    <option value="<?php echo $value->id_employee_has_place; ?>"> <?php echo $value->full_name; ?> </option>
    <?php } ?>

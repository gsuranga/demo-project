<select id="cmd_district" name="cmd_district"  style="position: relative;float: right; width: 21.7em" onchange="get_town();"> 
    <option value="0">--------select--------</option>    
    <?php
    if ($extraData != '') {
        foreach ($extraData as $value) {
            ?>

            <option value="<?php echo $value->district_id; ?>"><?php echo $value->district_name; ?></option>

            <?php
        }
    }
    ?>
    </select>






<!--    for city ///////////////// harshan-->

<select id="city_id" name="city_id"  style="position: relative;float: right; width: 21.7em"> 
    <option value="0">--------select--------</option>   
    <?php
    if ($extraData != '') {
        foreach ($extraData as $value) {
            ?>

            <option value="<?php echo $value->city_id; ?>"><?php echo $value->city_name; ?></option>

            <?php
        }
    }
    ?>
</select>


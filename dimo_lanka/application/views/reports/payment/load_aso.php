
<select id="select_area" name="select_area">
<option value="0">--------Select Aso------------</option>
                <?php
                if (isset($extraData['aso'])) {

                    foreach ($extraData['aso'] as $areas) {
                        ?>
             <option value="<?php echo $areas->sales_officer_id; ?>"><?php echo $areas->sales_officer_name; ?></option>
                       <?php
                            }
                        }
                        ?>
</select>


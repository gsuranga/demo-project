<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($extraData as $value) {
    foreach ($value as $data) {
        ?>

        <option value="<?php echo $data['id_territory']; ?>"><?php echo $data['territory_name']; ?></option>
        <?php
    }
}


<table width="45%" cellpadding="0" cellspacing="2" style="margin-top: 30px;margin-left: 400px" class="SytemTable">
    <?php
//    echo "<th>Date</th>";
//    echo "<th>Select Route Plan</th>";
//    echo "<th>Update Route Plane</th>";
//    for ($i = 1; $i < $extraData['amount']; $i++) {
//        echo"<tr>";
//        echo"<td >$i</td>";
//        echo "<td><select>           
//                <option> height
//                </option>";                        
//         echo "</select></td>";
//        echo "<td></td>";
//        echo "</tr>";
//    }
    ?>
    <thead>
        <tr height="30">
            <th>Date</th>
            <th>Select Route Plan</th>    
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i < $extraData['amount'] + 1; $i++) { ?>
            <tr>
                <td id="row_<?php echo $i; ?> "><?php echo $i; ?> </td>
                <td><select id="territory_name_<?php echo $i; ?>" name="territory_name">
                        <option>All</option>
                        <?php foreach ($extraData['ternames'] as $value) { ?>
                            <option> <?php echo $value->territory_name; ?></option>
                        <?php } ?>
                    </select>
                </td>           
            </tr>
        <?php } ?>

    </tbody>
</table>
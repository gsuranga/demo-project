<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<table  cellpadding="4" cellspacing="4" align="left">
<?php
if ($extraData != null) {
    foreach ($extraData as $value) {
        ?>
            <tr>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90); width: 150px">Promotion Name</td>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90); width: 200px"><?php echo $value->promotion_name; ?></td>
            </tr>
            <tr>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);">Description</td>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);"><?php echo $value->description; ?></td>
            </tr>
            <tr>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);">Starting Date</td>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);"><?php echo $value->starting_date; ?></td>
            </tr>
            <tr>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);">End Date</td>
                <td style="background: #E9DCFC; color:rgb(90, 90, 90);"><?php echo $value->end_date; ?></td>
            </tr>            
    <?php } ?>
    <?php } ?>
</table>
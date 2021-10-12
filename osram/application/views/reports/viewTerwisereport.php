<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form action="<?php echo base_url()?>reports/drawviewtterwise" method="post">
<table>
    <tr>
        <td>Territory Name</td><?php echo form_error('txt_ter_name'); ?>
        <td><input type="text" name="txt_ter_name" id="txt_ter_name" onfocus="get_ter();" autocomplete="off"><input type="hidden" name="txt_idter_name" id="txt_idter_name"></td>
        <td>Start Date</td>
        <td><input type="text" name="txttren_date" id="txttren_date" readonly="true" autocomplete="off"></td>
       
        <td>End Date</td>
        <td><input type="text" name="txttrend_date" id="txttrend_date" readonly="true" autocomplete="off"></td>
        <td><input type="submit" name="btnok"></td>
    </tr>
</table>
<table width="90%" class="SytemTable" align="center"  cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Added Date</td>
            <td>Territory Name</td>
            <td>Product Name</td>
            <td>Product Price</td>
            <td>Target</td>
            <td>Target From</td>
            <td>Target To</td>
            <td>Time</td>

        </tr>
    </thead>
    
    <?php
foreach ($extraData as $value) { ?>
    <tr>
        <td><?php echo $value['added_date']; ?></td>
        <td><?php echo $value['territory_name']; ?></td>
        <td><?php echo $value['item_name']; ?></td>
        <td><?php echo $value['product_price']; ?></td>
        <td><?php echo round($value['product_qty']); ?></td>
        <td><?php echo $value['target_st_date']; ?></td>
        <td><?php echo $value['target_en_date']; ?></td>
        <td><?php echo $value['added_time']; ?></td>
    </tr>
<?php }
    ?>
        </table>
</form>

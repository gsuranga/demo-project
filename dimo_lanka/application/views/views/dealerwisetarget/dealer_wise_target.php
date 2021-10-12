<?php
$_instance = get_instance();
?>
<table style="position: relative;left: 430px">
    <tr>
        <td>
            <label for="select_month"><b>SELECT MONTH:</b> </label></td><td><input type="text" id="month_picker"  name="month_picker" style="border-style: groove"   title="Month" >
        </td>
    </tr>
    <tr style="height: 40px"></tr>
</table>
<table class="SytemTable" border="1" width="100%">
    <thead>
        <tr> 
            <td>Part Number</td> 
            <td>Description</td> 
            <td>Price</td>  
            <td>Total Target</td>
            <td>Actual</td>
            <td>Achievement</td>        
        </tr>     
    </thead>
    <tbody>
         <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
        <tr>
            <td><?php echo $value->part_no;?></td>
            <td><?php echo $value->description;?></td>
            <td align="center"><?php echo $value->selling_val;?></td>
            <td align="center"><?php echo 0;?></td>
            <td align="center"><?php echo 0;?></td>
            <td align="center"><?php echo 0.00;?>%</td>
        </tr>
         <?php
            }
        }
        ?>
    </tbody>


</table>



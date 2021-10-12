<?php
$_instance = get_instance();
?>
<?php echo form_open('manthwise_summary/drawIndexManthlysummary'); ?>
<table>
    <tr>
        <td>
            Select Sales Officer name
        </td>
        <td>
            <input type="text" id="sales_oficer" name="sales_oficer" onfocus="get_APM_sales_officer()"/>
        </td>

        <td><input type="hidden" id="sales_oficer_id" name="sales_oficer_id"></td>
        <td>Select Category</td>
        <td><?php $_instance->drawDistricLoad(); ?></td>
        <td></td>
        <td><input type="submit" name="Search" id="Search" value="Search"/></td>
    </tr>
    
</table>
<?php echo form_close(); ?>


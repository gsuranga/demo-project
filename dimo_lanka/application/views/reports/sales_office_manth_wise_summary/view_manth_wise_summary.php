<?php
$_instance = get_instance();
?>
<?php echo form_open('manthwise_summary/drawIndexManthlysummary'); ?>
<table>
    <tr>
        <td>Select Category</td>
        <td><?php $_instance->drawDistricLoad(); ?></td>
        <td><input type="hidden" id="sales_oficer_id" name="sales_oficer_id" readonly="ture"  value="<?php echo $this->session->userdata('employe_id'); ?>"></td>
        <td><input type="submit" name="Search" id="Search" value="Search"/></td>
    </tr>

</table>
<?php echo form_close(); ?>


<?php
$_instance = get_instance();
?>
<?php echo form_open('tour_itenerary_daily/drawIndextour_itenerary_daily'); ?>
<table>
    <tr>
        <td><input type="hidden" id="sales_officer_id" name="sales_officer_id" readonly="ture"  value="<?php echo $this->session->userdata('employe_id'); ?>"></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><input type="text" name="select_date" id="select_date"/></td>
        <td><input type="hidden" id="select_date_id" name="select_date_id" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="Search" id="Search" value="Search"/></td>
    </tr>

</table>
<?php echo form_close(); ?>
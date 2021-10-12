<?php
/**
 * Description of outletCategoryRegister
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php echo form_open($System['URL'] . 'outlet_category/insertOutletCategory/'); ?>
<table width="100%">
    <tbody>
        <tr>
            <td>Outlet Type</td>
            <td>
                <input type="text" onkeyup="check_outlet_type();" name="outlet_type" value="<?php set_value('outlet_type');?>" id="outlet_type"/>
            </td>
        </tr>
        <tr>
        <td></td>
        <td><?php echo form_error('outlet_type'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_outlet_cat'); ?></td>
    </tr>
    </tbody>
</table>

<?php echo form_close(); ?>

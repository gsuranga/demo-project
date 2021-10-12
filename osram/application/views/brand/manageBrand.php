<?php
/**

 */
?>

<?php echo form_open('brand/Updatebrand'); ?>
<table width="100%">
        <tr>
        <td>Brand Id</td>
        <td><input type="text" id="managebrand_id" readonly="true" name="managebrand_id" value="<?php echo $_GET['id_token'] ?>"></td>
    </tr>
    <tr>
        <td>Brand Name</td>
        <td><input type="text" id="managebrand_name" name="managebrand_name" value="<?php echo $_GET['name'] ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('brand_name') ?></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" id="submit" name="submit"align="right"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_brand'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>

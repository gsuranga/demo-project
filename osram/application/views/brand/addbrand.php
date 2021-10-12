<?php
/**
 *Thilina
 */
?>

<?php echo form_open('brand/insertbrand'); ?>
<table width="100%">
    <tr>
        <td>Brand Name</td>
        <td><input type="text" id="brand_name" name="brand_name"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('brand_name') ?></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" id="submit" name="submit"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_brand'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>

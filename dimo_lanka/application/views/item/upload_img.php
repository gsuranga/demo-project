
<?php echo form_open_multipart('item/ImageUploads'); ?>
<table  width="25%" border="0"  cellpadding="5" cellspacing="5" id="tbl_dfata" align="center">
    <thead>

    </thead>
    <tbody>
        <tr id="select_row_1">
            <td><input type="file" id="userfile" name="userfile" size="100"/></td>
            <td><input type="submit" name="btn_select_file" id="btn_select_file" value="Upload Image"></td>

        </tr>

    </tbody>
    <tfoot>
        <tr>

            <td>
<!--                <input type="submit" value="Upload" onclick="" id="btn_submit_file" name="btn_submit_file">-->
            </td>
        </tr>
    </tfoot>
</table>
<?php echo form_close(); ?>



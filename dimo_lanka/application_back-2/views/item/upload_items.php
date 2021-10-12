<?php header("Access-Control-Allow-Origin: *"); ?>
<?php echo form_open_multipart('item/uploadPriceList'); ?>
<table  width="25%" border="0"  cellpadding="5" cellspacing="5" id="tbl_dfata" align="center">
    <thead>

    </thead>
    <tbody>
        <tr id="select_row_1">
            <td><input type="file" name="userfile" size="100" width="250" style="border: 20px;border-color: aqua"/></td>
            <td><input type="submit" name="btn_select_file" id="btn_select_file" value="Upload Price List"></td>

        </tr>

    </tbody>
     <table>
        <tr>
            <td> Excel Format</td>
        </tr>
        <tr>
            <td>
                <img src="<?php echo $System['URL']; ?>images/vsd_img.png"></>
            </td>
        </tr>
    </table>
    <tfoot>
        <tr>

            <td>
<!--                <input type="submit" value="Upload" onclick="" id="btn_submit_file" name="btn_submit_file">-->
            </td>
        </tr>
    </tfoot>
</table>
<?php echo form_close(); ?>



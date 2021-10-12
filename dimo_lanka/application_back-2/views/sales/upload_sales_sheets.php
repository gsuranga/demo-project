<?php ?>
<div width="60%" border="1" style="border-bottom-style: solid;border-bottom-width: 1px">
    <h3 style="color: #3D6DC3;font-weight: bold; margin-top: 5px;margin-bottom: 5px;margin-right: 50px;margin-left: 50px">Instructions for DLR upload:</h3>


</div>
<div>
    <p style="font-size: 112%; font-weight: 700; margin-top: 5px;margin-bottom: 5px;margin-right: 70px;margin-left: 70px">* File should be a MS Excel file and only should have the extension of ‘xlsx’ or ‘xls’.</p>
    <p style="font-size: 112%; font-weight: 700; margin-top: 5px;margin-bottom: 5px;margin-right: 70px;margin-left: 70px">* Make sure the file has headers in following format and the number of columns should be same as the following format.</p>
    <p style="font-size: 112%; font-weight: 700; margin-top: 5px;margin-bottom: 5px;margin-right: 70px;margin-left: 70px">* Also make sure the file is sorted by ‘Date Edit’ column and ‘Time’ ascending order before uploading.</p>
</div>


&emsp;
<?php echo form_open_multipart('sales/insertSalesToDB'); ?>
<table width="30%" cellpadding="5" cellspacing="5" id="tbl_dfata_select" align="center" border="0">
    <tr>
        <td align=" center">
            <select id="select_area" name="select_area">
                <option>----Area----</option>
                <?php foreach ($extraData as $values) {
                    ?>
                    <option value="<?php echo $values->area_id; ?>"><?php echo $values->area_name ?></option>


                <?php } ?>

            </select>
        </td>
    </tr>
</table>
<table  width="25%" cellpadding="5" cellspacing="5" id="tbl_dfata" align="center" border="0">
    <thead>

    </thead>
    <tbody>

        <tr id="select_row_1">
            <td align="right"><input align="right" type="file" name="userfile" size="60" width="50%" style="border: 20px;border-color: aqua;"/></td>
            <td align="center"><input type="submit" name="btn_select_file" id="btn_select_file" value="Upload"></td>

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
<div width="60%" border="1" style="border-bottom-style: solid;border-bottom-width: 1px">
    <h3 style="color: #3D6DC3;font-weight: bold; margin-top: 5px;margin-bottom: 5px;margin-right: 50px;margin-left: 50px">Format:</h3>


</div>
<div>
    &emsp;
    <img src="<?php echo $System['URL']; ?>public/images/DLR_format1.png">
</div>

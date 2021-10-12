<?php
/**
 * Description of viewSingleItem
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();
$row_id = 0;
?>
<?php echo form_open_multipart('stock_excell/importExcellData'); ?>
<table align="left" width="30%">
    <tr>
        <td><input type="button" onclick="ExportExcel('itemDetail', 'ItemExcel');" value="Export"/></td>
        <td><input type="file" name="userfile"/></td>
        <td align='left'><input type="submit" value="Import" /></td>
    </tr>
</table>
<?php echo form_close(); ?>

<script type="text/javascript">// pagination link
    $j(document).ready(function() {
        var s = $j('#e').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>


<table  width="100%" id="e" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Division</td>
            <td>Item Category</td>
            <td>Item Name</td>
            <td>Item No</td>
            <td>Item Account Code</td>
            <td>Item_Alias</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {
            $row_id++;
            ?>
            <tr>
                <td>
                    <input type="hidden" name="division_token_primary_<?php echo $row_id; ?>" id="division_token_primary_<?php echo $row_id; ?>" value="<?php echo $value->id_item_map; ?>">
                    <select disabled name="manage_division_<?php echo $row_id; ?>" 
                            id="manage_division_<?php echo $row_id; ?>" >
                        <option value="<?php echo $value->id_division; ?>" selected="selected"><?php echo $value->division_name; ?></option>
                        <?php
                        $_instance->drawDivision('not');
                        ?>
                    </select> 
                </td>
                <td>
                    <input type="hidden" name="item_token_primary_<?php echo $row_id; ?>" id="item_token_primary_<?php echo $row_id; ?>" value="<?php echo $value->id_item; ?>">
                    <select disabled name="manage_item_category_<?php echo $row_id; ?>" 
                            id="manage_item_category_<?php echo $row_id; ?>" >
                        <option value="<?php echo $value->id_item_category; ?>" selected="selected"><?php echo $value->tbl_item_category_name; ?></option>
                        <?php
                        $_instance->getCategoryList();
                        ?>
                    </select>
                </td>
                <td> <input type="text" readonly="true" value="<?php echo $value->item_name; ?>" 
                            onfocus="get_item_category(this.id);" name="manage_item_name_<?php echo $row_id; ?>" 
                            id="manage_item_name_<?php echo $row_id; ?>">
                    <input type="hidden" 
                           name="hreg_item_id_<?php echo $row_id; ?>"
                           id="hreg_item_id_<?php echo $row_id; ?>" value="<?php echo $value->id_item; ?>">
                </td>
                <td> <input type="text" readonly="true" name="mreg_item_no_<?php echo $row_id; ?>" 
                            id="mreg_item_no_<?php echo $row_id; ?>" value="<?php echo $value->item_no; ?>"></td>
                <td><input type="text" readonly="true" name="mreg_item_account_code_<?php echo $row_id; ?>" 
                           id="mreg_item_account_code_<?php echo $row_id; ?>" value="<?php echo $value->item_account_code; ?>"></td>
                <td> <input type="text" readonly="true" name="mreg_item_alias_<?php echo $row_id; ?>" 
                            id="mreg_item_alias_<?php echo $row_id; ?>" value="<?php echo $value->item_alias; ?>"></td>
                <td>
                    <a href="#" id="manage_edit_<?php echo $row_id; ?>" onclick="activate_and_save_to_db(<?php echo $row_id; ?>);">Edit</a>
                </td>
                <td>
                    <a href="#" onclick="delete_item(<?php echo $row_id; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>







<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="itemDetail">
    <thead>
        <tr>
            <td>Item ID</td>
            <td>Item Name</td>
            <td>Item No</td>
            <td>Item Account Code</td>
            <td>Item_Alias</td>
            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {
            
            ?>
            <tr>
                <td> <?php echo $value->id_item; ?></td>
                <td> <?php echo $value->item_name; ?></td>
                <td> <?php echo $value->item_no; ?></td>
                <td><?php echo $value->item_account_code; ?></td>
                <td> <?php echo $value->item_alias; ?></td>
               
            </tr>
        <?php } ?>
    </tbody>
</table>

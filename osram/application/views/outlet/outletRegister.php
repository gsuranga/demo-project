<?php
/**
 * Description of outletRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">

    function addBranch() {
        var outputTbl11 = document.getElementById('id_branch_table');
        var id = (outputTbl11.rows.length + 1);
        if (id > 1) {
            $j('#delete1_' + (id - 1)).hide();
        }
        var output = document.createElement("tr");
        outputTbl11.appendChild(output);
        output.innerHTML += '<td style="width:5%;vertical-align: top;"> <img width="20" height="20" onclick="addBranch();" src="<?php echo $System['URL']; ?>public/images/add2.png" />' +
                '<img width="20" height="20" onclick="deleteRow(' + id + ');" src="<?php echo $System['URL']; ?>public/images/delete2.png" /></td>' +
                '<td>' +
                '<table width="110%" id="id_division_table_' + id + '">' +
                '<tr class="ContentTableTitleRow">' +
                '<td style="width: 45.5%;">Branch Details :-</td>' +
                '<td></td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 45.5%;">Division</td>' +
                '<td><input type="text" name="division_name_' + id + '_1" id="division_name_' + id + '_1" onfocus="get_division_names(this.id,1,' + id + ');" placeholder="Select Division Name"/>' +
                '<input type="hidden" id="division_id_' + id + '_1" name="division_id_' + id + '_1"/>' +
                '<input type="hidden" id="division_count_' + id + '" value="1" name="division_count_' + id + '"/>' +
                '</td>' +
                ' <td><img width="20" height="20" onclick="addDivision2(' + (id) + ');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>' +
                '</tr>' +
                '</table>' +
                '<table width="100%" >' +
                '<tbody>' +
                '<tr>' +
                '<td style="width: 30%;">Territory</td>' +
                '<td><input type="text" name="territory_name_' + id + '" id="territory_name_' + id + '" onfocus="get_territory_names(this.id, ' + id + ')" placeholder="Select Territory Name"/>' +
                '<input type="hidden" id="territory_id_' + id + '" name="territory_id_' + id + '" />' +
                '</td></tr>' +
                '<tr>' +
                '<tr>' +
                '<td style="width: 30%">Address</td>' +
                '<td style="width: 30%"><textarea name="outlet_address_' + id + '" id="outlet_address_' + id + '" cols="35" rows="5"></textarea></td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 30%">Telephone</td>' +
                '<td style="width: 30%"><input type="text" name="outlet_tel_' + id + '" id="outlet_tel_' + id + '"/></td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 30%">Mobile</td>' +
                ' <td style="width: 30%"><input type="text" name="outlet_mob_' + id + '" id="outlet_mob_' + id + '"/></td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 30%">Contact Person</td>' +
                '<td style="width: 30%"><input type="text" name="outlet_conpersn_' + id + '" id="outlet_conpersn_' + id + '"/></td>' +
                '</tr>' +
                '<tr>' +
                ' <td style="width: 30%">Contact Person Designation</td>' +
                '<td style="width: 30%"><input type="text" name="outlet_con_persn_designation_' + id + '" id="outlet_con_persn_designation_' + id + '"/>' +
                '</tr>' +
                '<tr>' +
                '<td>Discount Type</td>' +
                '<td>' +
                '<select id="discount_type_' + id + '" name="discount_type_' + id + '">' +
                '<option value="1">Percentage(%)</option>' +
                '<option value="2">Price(Rs)</option>' +
                '</select>' +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Discount</td>' +
                '<td><input type="text" id="discount_' + id + '" name="discount_' + id + '"></td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</td>';
        $j('#branch_count').val(id);
    }
    function deleteRow(ID) {
        try {
            var table = document.getElementById('id_branch_table');
            table.deleteRow(ID - 1);
            var id = (table.rows.length);
            $j('#branch_count').val(id);
        } catch (e) {
            alert(e);
        }
    }
    function addDivision(id2) {
        var outputTbl1 = document.getElementById("id_division_table_" + id2);
        var id = (outputTbl1.rows.length);
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td  style="width: 46%;"></td>';
        output.innerHTML += '<td style="width: 45.5%;"><input type="text" name="division_name_' + id2 + '_' + id + '" id="division_name_' + id2 + '_' + id + '" onfocus="get_division_names(this.id, ' + id + ',' + id2 + ');" placeholder="Select Division Name"/><input type="hidden" id="division_id_' + id2 + '_' + id + '" name="division_id_' + id2 + '_' + id + '"/></td><td><img width="20" height="20" onclick="addDivision(' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td><td><img width="20" height="20" onclick="deleteRow2(' + id + ',' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/delete2.png" /></td>';
        $j('#division_count_' + id2).val(id);
    }
    function addDivision2(id2) {
        var outputTbl1 = document.getElementById("id_division_table_" + id2);
        var id = (outputTbl1.rows.length - 1);
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td  style="width: 46%;"></td>';
        output.innerHTML += '<td style="width: 45.5%;"><input type="text" name="division_name_' + (id2) + '_' + (id + 1) + '" id="division_name_' + id2 + '_' + (id + 1) + '" onfocus="get_division_names(this.id, ' + (id + 1) + ',' + id2 + ');" placeholder="Select Division Name"/><input type="hidden" id="division_id_' + id2 + '_' + (id + 1) + '" name="division_id_' + id2 + '_' + (id + 1) + '"/></td><td><img width="20" height="20" onclick="addDivision(' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td><td><img width="20" height="20" onclick="deleteRow3(' + (id + 1) + ',' + id2 + ');" src="<?php echo $System['URL']; ?>public/images/delete2.png" /></td>';
        $j('#division_count_' + id2).val(id + 1);
    }
    function deleteRow2(ID, id2) {
        try {
            var table = document.getElementById("id_division_table_" + id2);
            table.deleteRow(ID);
            var id = (table.rows.length);
            $j('#division_count_' + id2).val(id - 1);
        } catch (e) {
            alert(e);
        }
    }
    function deleteRow3(ID, id2) {
        try {
            var table = document.getElementById("id_division_table_" + id2);
            table.deleteRow(ID);
            var id = (table.rows.length);
            $j('#division_count_' + id2).val(id - 1);
        } catch (e) {
            alert(e);
        }
    }
</script>
<?php $CI = & get_instance(); ?>
<?php echo form_open('outlets/insertOutlet'); ?>
<table width="100%">
    <tbody>
        <tr>
            <td style="width: 30%;">Outlet Category</td>
            <td style="width: 30%">
                <select name="outlet_category_name" id="outlet_category_name">
                    <?php $CI->allOutletCategorytoListBox(); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="width: 30%;"></td>
            <td style="width: 30%"><?php echo form_error('outlet_category_name'); ?></td>
        </tr>
        <tr>
            <td style="width: 30%">Name</td>
            <td style="width: 30%"><input type="text" name="outlet_name" id="outlet_name" value="<?php echo set_value('outlet_name'); ?>"/>
                <input type="hidden" id="branch_count" value="1" name="branch_count"/>
            </td>
        </tr>
        <tr>
            <td style="width: 30%;"></td>
            <td style="width: 30%"><?php echo form_error('outlet_name'); ?></td>
        </tr>
        <tr>
            <td style="width: 30%">Code</td>
            <td style="width: 30%"><input type="text" name="outlet_code" id="outlet_code" value="<?php echo set_value('outlet_code'); ?>"/></td>
        </tr>
        <tr>
            <td style="width: 30%;"></td>
            <td style="width: 30%"><?php echo form_error('outlet_code'); ?></td>
        </tr>
    </tbody></table>
<table width="98%" id="id_branch_table" style="font-size: large;">
    <tr>
        <td style="width:5%;vertical-align: top;"><img width="20" height="20" onclick="addBranch();" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>
        <td>
            <table width="110%" id="id_division_table_1">      
                <tr class="ContentTableTitleRow">
                    <td style="width: 45.5%;">Branch Details :-</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width: 45.5%;">Division</td>
                    <td><input type="text" name="division_name_1_1" id="division_name_1_1" onfocus="get_division_names(this.id, '1', '1');" value="<?php echo set_value('division_name_1_1'); ?>" placeholder="Select Division Name"/>
                        <input type="hidden" id="division_id_1_1" name="division_id_1_1" value="<?php echo set_value('division_id_1_1'); ?>"/>
                        <input type="hidden" id="division_count_1" value="1" name="division_count_1"/>
                    </td>
                    <td><img width="20" height="20" onclick="addDivision('1');" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>
                </tr>
                <tr>
                    <td style="width: 45.5%;"></td>
                    <td><?php echo form_error('division_name_1_1'); ?></td>
                    <td></td>
                </tr>
            </table>
            <table width="100%" >
                <tbody>

                    <tr>
                        <td style="width: 30%;">Territory</td>
                        <td><input type="text" name="territory_name_1" id="territory_name_1" onfocus="get_territory_names(this.id, '1')" value="<?php echo set_value('territory_name_1'); ?>" placeholder="Select Territory Name"/>
                            <input type="hidden" id="territory_id_1" name="territory_id_1" value="<?php echo set_value('territory_id_1'); ?>"/>
                        </td></tr>
                    <tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('territory_name_1'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Address</td>
                        <td style="width: 30%"><textarea name="outlet_address_1" id="outlet_address_1" cols="35" rows="5"><?php echo set_value('outlet_address_1'); ?></textarea></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('outlet_address_1'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Telephone</td>
                        <td style="width: 30%"><input type="text" name="outlet_tel_1" id="outlet_tel_1" value="<?php echo set_value('outlet_tel_1'); ?>"/></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('outlet_tel_1'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Mobile</td>
                        <td style="width: 30%"><input type="text" name="outlet_mob_1" id="outlet_mob_1" value="<?php echo set_value('outlet_mob_1'); ?>"/></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('outlet_mob_1'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Contact Person</td>
                        <td style="width: 30%"><input type="text" name="outlet_conpersn_1" id="outlet_conpersn_1" value="<?php echo set_value('outlet_conpersn_1'); ?>"/></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('outlet_conpersn_1'); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Contact Person Designation</td>
                        <td style="width: 30%"><input type="text" name="outlet_con_persn_designation_1" id="outlet_con_persn_designation_1" value="<?php echo set_value('outlet_con_persn_designation_1'); ?>"/></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;"></td>
                        <td><?php echo form_error('outlet_con_persn_designation_1'); ?></td>
                    </tr>
                    <tr>
                        <td>Discount Type</td>
                        <td>
                            <select id="discount_type_1" name="discount_type_1">
                                <!--<option value="1">Percentage(%)</option>-->
                                <option value="2">Price(Rs)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td><input type="text" id="discount_1" name="discount_1" value="<?php echo set_value('discount_1'); ?>"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo form_error('discount_1'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo $this->session->flashdata('insert_outlet'); ?></td>
                    </tr>
                </tbody>
            </table>

        </td>
    </tr>
</table>
<?php echo form_close(); ?>

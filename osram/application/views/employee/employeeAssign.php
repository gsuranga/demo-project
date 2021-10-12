<?php
/**
 * Description of employeeAssign
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">

    function addDetails() {
        var outputTbl2 = document.getElementById('id_details_table');
        var id = (outputTbl2.rows.length);
        var division_id = $j('#division_id1').val();
        var territory_id1 = $j('#territory_id1').val();
        var physicalplace_id1 = $j('#physicalplace_id1').val();
        var discount = 0.00;
        if ($j('#discount').val() != '') {
            discount = $j('#discount').val();
        }
        if (division_id != '' && territory_id1 != '' && physicalplace_id1 != '') {
            var output2 = document.createElement("tr");
            outputTbl2.appendChild(output2);

            output2.innerHTML += '<td><input type="checkbox" name="chk"/></td>';
            output2.innerHTML += '<td><input type="text" size="10" value="' + $j('#division_name1').val() + '" id="division_name_' + id + '"/><input type="hidden" size="10" value="' + $j('#division_id1').val() + '" id="division_id_' + id + '" name="division_id_' + id + '"/></td>';
            output2.innerHTML += '<td><input type="text" size="10" value="' + $j('#territory_name1').val() + '" id="territory_name_' + id + '" name="territory_name_' + id + '"/><input type="hidden" size="10" value="' + $j('#territory_id1').val() + '" id="territory_id_' + id + '" name="territory_id_' + id + '"/></td>';
            output2.innerHTML += '<td><input type="text" size="10" value="' + $j('#physicalplace_name1').val() + '" id="physicalplace_name' + id + '" name="physicalplace_name' + id + '"/><input type="hidden" size="10" value="' + $j('#physicalplace_id1').val() + '" id="physicalplace_id_' + id + '" name="physicalplace_id_' + id + '"/></td>';
            output2.innerHTML += '<td><input type="text" size="10" value="' + discount + '" id="discount' + id + '" name="discount' + id + '"/></td>';
            $j('#table_row_count1').val(id);
        } else {
            alert("Please Input Maping Details")
        }
    }
    function form_submit() {
        $j('#assignEmployee_form').submit();
    }
    function checkValidation() {
        var outputTbl2 = document.getElementById('id_details_table');
        var id = (outputTbl2.rows.length);
        if (id != 1) {
            form_submit();
        }else{
         alert("Employee is not Map");   
        }
    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        } catch (e) {
            alert(e);
        }
    }

</script>
<?php $CI = & get_instance(); ?>
<?php
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'button',
    'value' => 'Save',
    'onclick' => 'checkValidation();'
);
$res = array(
    'name' => 'btreset',
    'id' => 'btreset',
    'type' => 'reset',
    'value' => 'Reset',
    'class' => 'classname'
);
$formm = array(
    'name' => 'assignEmployee_form',
    'id' => 'assignEmployee_form',
);
?>
<table width="100%"><tr>
        <td>
            <?php echo form_open('employee/assignEmployee', $formm); ?>
            <input type="hidden" id="employee_id" name="employee_id" value="<?php echo $_GET['empID']; ?>"/>
            <table id="id_division_table" width="100%">
                <tr>
                    <td style="width: 31%;">Division</td>
                    <td><input type="text" name="division_name1" id="division_name1" onfocus="get_division_names(this.id, '1');" value="<?php echo set_value('division_name1'); ?>" placeholder="Select Division"/>
                        <input type="hidden" id="division_id1" name="division_id1" value="<?php echo set_value('division_id1'); ?>"/>
                        <input type="hidden" id="table_row_count1" value="1" name="table_row_count1"/>


                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('division_name1'); ?></td>
                </tr>
                <tr>
                    <td style="width: 31%;">Territory</td>
                    <td><input type="text" name="territory_name1" id="territory_name1" onfocus="get_territory_names(this.id, '1')" value="<?php echo set_value('territory_name1'); ?>" placeholder="Select Territory"/>
                        <input type="hidden" id="territory_id1" name="territory_id1" value="<?php echo set_value('territory_id1'); ?>"/>
                    </td></tr>
                <tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('territory_name1'); ?></td>
                </tr>
                <tr>
                    <td style="width: 29.5%;">Physical Place</td>
                    <td>
                        <input type="text" name="physicalplace_name1" id="physicalplace_name1" onfocus="get_physicalplace_names(this.id, '1')" value="<?php echo set_value('physicalplace_name1'); ?>" placeholder="Select Physical Place"/>
                        <input type="hidden" id="physicalplace_id1" name="physicalplace_id1" value="<?php echo set_value('physicalplace_id1'); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('physicalplace_name1'); ?></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="text" id="discount" name="discount" value="<?php echo set_value('discount'); ?>"/></td>
                    <td>
                        <input type="button" value="Add" onclick="addDetails();"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('discount'); ?></td>
                    <td></td>
                </tr>
            </table>
            <table width="100%" class="SytemTable2" cellpadding="0" cellspacing="0"  id="id_details_table" align="center">
                <thead>
                    <tr style="color: #FFF;background-color: #B6B6B6;">
                        <td>#</td>
                        <td>Division</td>
                        <td>Territory</td>
                        <td>Physical Place</td>
                        <td>Discount(%)</td>
                    </tr>
                </thead>

            </table>
            <table align="center">
                <tr><td>&ensp;</td></tr>
                <tr>

                    <td>
                        <input type="button" value="Remove" onclick="deleteRow('id_details_table');"/>
                    </td>
                    <td><?php echo form_submit($sub); ?></td>
                    <td><?php echo form_submit($res); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>&ensp;<?php echo $this->session->flashdata('employeeRegister'); ?></td>
                </tr>
            </table>
            <?php echo form_close(); ?>

        </td>

    </tr>
</table>
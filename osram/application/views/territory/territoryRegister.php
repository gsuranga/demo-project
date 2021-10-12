<?php
/**
 * Description of territoryRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">

    function addDivision() {
        var outputTbl1 = document.getElementById('id_division_table');
        var id = (outputTbl1.rows.length + 1);
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td  style="width: 30%;"></td>';
        output.innerHTML += '<td style="width: 50%;"><input type="text" name="division_name' + id + '" id="division_name' + id + '" onfocus="get_division_names(this.id, ' + id + ');" placeholder="Select Division"/><input type="hidden" id="division_id' + id + '" name="division_id' + id + '"/></td><td><img width="20" height="20" onclick="addDivision();" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td><td><img width="20" height="20" onclick="deleteRow(' + (id - 1) + ');" src="<?php echo $System['URL']; ?>public/images/delete.png" /></td>';
        $j('#table_row_count1').val(id);
    }
    function get_division_names(name, id) {
        var namee = name;
        var idd = "division_id" + id;
        $j("#" + namee).autocomplete({
            source: "getDivisionNames",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j("#" + idd).val(data.item.id_division);
            }
        });

    }
    function deleteRow(ID) {
        try {
            var table = document.getElementById('id_division_table');
            table.deleteRow(ID);
            var id = (table.rows.length);
            $j('#table_row_count1').val(id);
        } catch (e) {
            alert(e);
        }
    }

</script>
<?php $CI = & get_instance(); ?>
<?php
$territoryname = array(
    'name' => 'territoryname',
    'id' => 'territoryname',
    'type' => 'text',
    'value' => set_value('territoryname'),
    'onchange'=>'check_territoryName();'
);
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
$res = array(
    'name' => 'btreset',
    'id' => 'btreset',
    'type' => 'reset',
    'value' => 'Reset',
    'class' => 'classname'
);
?>

<table width="100%"><tr><td>
            <?php echo form_open('territory/insertTerritory'); ?>
            <table width="100%" id="id_division_table">               
                <tr>
                    <td style="width: 30%;">Division</td>
                    <td style="width: 60%;"><input type="text" name="division_name1" id="division_name1" onfocus="get_division_names(this.id, '1');" value="<?php echo set_value('division_name1');?>" placeholder="Select Division"/>
                        <input type="hidden" id="division_id1" name="division_id1" value="<?php echo set_value('division_id1');?>"/>
                        <input type="hidden"  id="table_row_count1" value="1" name="table_row_count1"/>

                    </td>
                    <td><img width="20" height="20" onclick="addDivision();" src="<?php echo $System['URL']; ?>public/images/add2.png" /></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td style="width: 60%;">
                        <?php echo form_error('division_name1'); ?>
                    </td>
                    <td></td>
                </tr>

            </table>
            <table width="100%">
                <tr>
                    <td style="width: 30%;">Name</td>
                    <td><?php echo form_input($territoryname); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Type</td>
                    <td><label>
                            <select name="territory_type" id="territory_type" class="select"><?php $CI->allTerritoryTypestoCombo(); ?></select></label></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('territory_type'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Parent</td>
                    <td><label>
                            <select name="parent_territory" id="parent_territory" onclick="check_territoryName();" class="select"><option value="">None</option><?php $CI->allTerritorytoCombo(); ?></select></label></td>
                </tr>

                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('territoryname'); ?></td>
                </tr>
                <tr><td>&ensp;</td></tr>
                <tr>
                    <td>&ensp;</td>
                    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_reset($res); ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td>&ensp;<?php echo $this->session->flashdata('insert_territory');
                        ?></td>
                </tr>
            </table>
            <?php echo form_close(); ?>
        </td>

    </tr>
</table>
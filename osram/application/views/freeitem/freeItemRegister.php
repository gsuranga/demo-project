<?php
/**
 * Description of freeItemRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$add1 = array(
    'name' => 'add1',
    'id' => 'add1',
    'type' => 'button',
    'value' => 'Add',
    'onclick' => 'addItem1()'
);
$add2 = array(
    'name' => 'add2',
    'id' => 'add2',
    'type' => 'button',
    'value' => 'Add',
    'onclick' => 'addItem2()'
);
$delete2 = array(
    'name' => 'delete2',
    'id' => 'delete2',
    'type' => 'button',
    'value' => 'Remove',
    'onclick' => ''
);
$save = array(
    'name' => 'save',
    'id' => 'save',
    'type' => 'submit',
    'value' => 'Save'
);
?>
<script>
    function get_Item1(id) {
        $j("#item_name1_" + id).autocomplete({
            source: "getItem",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j('#item_id1_' + id).val(data.item.id_item);
            }
        });
    }
    function get_Item2(id) {
        $j("#item_name2_" + id).autocomplete({
            source: "getItem",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j('#item_id2_' + id).val(data.item.id_item);
            }
        });
    }
    function addItem1() {
        var outputTbl1 = document.getElementById('id_free_item1');
        var id = (outputTbl1.rows.length + 1);
        // $j("#delete1_"+id-1).hide();
        if (id > 1) {
            $j('#delete1_' + (id - 1)).hide();
        }
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td>Item Name (' + id + ')</td>';
        output.innerHTML += '<td><input type="text" onfocus="get_Item1(' + id + ');" name="item_name1_' + id + '" id="item_name1_' + id + '" style="width: 80%;"/><input type="hidden" name="item_id1_' + id + '" id="item_id1_' + id + '" style="width: 80%;"/></td><td><input type="button" id="delete1_' + id + '" name="delete1_' + id + '" value="-" onclick="deleteRow1(' + id + ');"/></td>';
        output.innerHTML += '<td></td>';
        $j('#tbl_1_count').val(id);
    }
    function addItem2() {
        var outputTbl1 = document.getElementById('id_free_item2');
        var id = (outputTbl1.rows.length + 1);
        if (id > 1) {
            $j('#delete2_' + (id - 1)).hide();
        }
        var output = document.createElement("tr");
        outputTbl1.appendChild(output);
        output.innerHTML += '<td>Item Name (' + id + ')</td>';
        output.innerHTML += '<td><input type="text" onfocus="get_Item2(' + id + ');" name="item_name2_' + id + '" id="item_name2_' + id + '" style="width: 80%;"/><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '" style="width: 80%;"/></td>';
        output.innerHTML += ' <td>QTY</td><td><input type="text"  name="qty2_' + id + '" id="qty2_' + id + '" style="width: 80%;"/></td><td><input type="button" id="delete2_' + id + '" name="delete2_' + id + '" value="-" onclick="deleteRow2(' + id + ');"/></td>';
        $j('#tbl_2_count').val(id);
    }
    function deleteRow1(ID) {
        try {
            var table = document.getElementById('id_free_item1');
            table.deleteRow(ID - 1);
            if (ID > 1) {
                $j('#delete1_' + (ID - 1)).show();
            }
            var id = (table.rows.length);
            $j('#tbl_1_count').val(id);
        } catch (e) {
            alert(e);
        }
    }
    function deleteRow2(ID) {
        try {
            var table = document.getElementById('id_free_item2');
            table.deleteRow(ID - 1);
            if (ID > 1) {
                $j('#delete2_' + (ID - 1)).show();
            }
            var id = (table.rows.length);
            $j('#tbl_2_count').val(id);
        } catch (e) {
            alert(e);
        }
    }

</script>
<?php //echo validation_errors();        ?>
<?php echo form_open('freeitem/insertFreeItem'); ?>
<table width="100%" cellpadding="10">
    <tr  style="background-color: #def8c4;color: #009933;font-weight:bold" >
        <td>Products Combination</td>
        <td>Free Issue Products</td>
    </tr>
    <tr style="vertical-align: top;">
        <td>
            <table align="center" id="id_free_item1" style="background-color: #eff5de;color: #000" width="100%">
                <tr>
                    <td style="width: 20%;">Item Name</td>
                    <td style="width: 30%;">
                        <input type="text" onfocus="get_Item1('1');" name="item_name1_1" id="item_name1_1" style="width: 80%;" placeholder="Select Item"/>
                        <input type="hidden" name="item_id1_1" id="item_id1_1" style="width: 80%;"/>
                        <input type="hidden" name="tbl_1_count" id="tbl_1_count" value="1" style="width: 80%;"/>
                    </td>
                    <td style="width: 10%;">QTY</td>
                    <td><input type="text"  name="qty1" id="qty1" style="width: 80%;"/></td>
                    <!--<td><input type="button" onclick="addItem1();" value="+"/></td>-->
                </tr>
                <tr>
                    <td style="width: 15%;"></td>
                    <td style="width: 30%;"><?php echo form_error('item_name1_1'); ?></td>
                    <td></td>
                    <td><?php echo form_error('qty1'); ?></td>
                </tr>
            </table>
        </td>
        <td>
            <table align="center" id="id_free_item2" style="background-color: #eff5de;color: #000" width="100%">
                <tr>
                    <td style="width: 20%;">Item Name</td>
                    <td>
                        <input type="text" onfocus="get_Item2('1');" name="item_name2_1" id="item_name2_1" style="width: 80%;" placeholder="Select Item"/>
                        <input type="hidden"  name="item_id2_1" id="item_id2_1" style="width: 80%;"/>
                        <input type="hidden" name="tbl_2_count" id="tbl_2_count"  value="1" style="width: 80%;"/>
                    </td>
                    <td>QTY</td>
                    <td><input type="text"  name="qty2_1" id="qty2_1" style="width: 80%;"/></td>
                    <!--<td><input type="button" onclick="addItem2();" value="+"/></td>-->
                    <td><?php echo form_input($save); ?></td>
                    
                </tr>
                <tr>
                    <td style="width: 15%;"></td>
                    <td style="width: 30%;"><?php echo form_error('item_name2_1'); ?></td>
                    <td></td>
                    <td><?php echo form_error('qty2_1'); ?></td>
                </tr>
                
            </table>
            <table><tr><td><?php echo $this->session->flashdata('insert_free_item'); ?></td></tr></table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>

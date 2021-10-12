<?php
/**
 * Description of addDiscount
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<!--id_employee_item_discount, id_employee_has_place, id_item, percentage_discount, price_discount-->
<?php
$discount = array(
    'name' => 'discount',
    'id' => 'discount',
    'type' => 'text',
    'value' => set_value('discount')
);

$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'placeholder' => "Select Employee Name",
    'onfocus' => 'get_employee();',
    'value' => set_value('employee_name')
);

$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'type' => 'hidden',
    'value' => set_value('employee_id')
);
$item_name = array(
    'id' => 'item_name',
    'name' => 'item_name',
    'type' => 'text',
    'placeholder' => "Select Item Name",
    'onfocus' => 'get_Item();',
    'value' => set_value('item_name')
);

$item_id = array(
    'id' => 'item_id',
    'name' => 'item_id',
    'type' => 'hidden',
    'value' => set_value('item_id')
);
$save = array(
    'name' => 'save ',
    'id' => 'save ',
    'value' => 'Save',
    'type' => 'submit'
);
$reset = array(
    'name' => 'reset ',
    'id' => 'reset ',
    'value' => 'Reset',
    'type' => 'reset'
);
?>
<script>
    $j(function() {
        var user_type = $j("#log_user_type").val();

        if (user_type !== "Admin") {
            var log_id_employee = $j("#log_id_employee").val();
            var log_employee_name = $j("#log_employee_name").val();

            $j('#employee_id').val(log_id_employee);
            $j('#employee_name').val(log_employee_name);

            loadDivision();
        }
    });
    function get_Item() {
        $j("#item_name").autocomplete({
            source: "getItem",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j('#item_id').val(data.item.id_item);
            }
        });
    }
    function get_employee() {
        $j("#employee_name").autocomplete({
            source: "getEmployee",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {

                $j('#employee_id').val(data.item.id_employee);
                loadDivision();
            }
        });
    }

    function loadDivision() {
        var empid = $j('#employee_id').val();
        $j.ajax({
            type: 'POST',
            url: 'allDivisionCombo',
            data: {
                'empid': empid
            },
            success: function(data) {
                $j('#division_name').empty();
                $j('#division_name').append(data);
                loadTerritory();

            },
            error: function() {

            }
        });
    }
    function loadTerritory() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allTerritoryCombo',
            data: {
                'division_name': division_name,
                'empid': empid
            },
            success: function(data) {
                // alert(data);
                $j('#territory_name').empty();
                $j('#territory_name').append(data);
                loadPhysicalPlace();

            },
            error: function() {

            }
        });
    }

    function loadPhysicalPlace() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        $j.ajax({
            type: 'POST',
            url: 'allPhysicalPlaceCombo',
            data: {
                'division_name': division_name,
                'empid': empid,
                'territory_name': territory_name
            },
            success: function(data) {
                // alert(data);
                $j('#physical_place_name').empty();
                $j('#physical_place_name').append(data);
                loadEmplyee_hasplace_id();
            },
            error: function() {

            }
        });
    }

    function loadEmplyee_hasplace_id() {
        var empid = $j('#employee_id').val();
        var division_name = $j('#division_name').val();
        var territory_name = $j('#territory_name').val();
        var physical_place_name = $j('#physical_place_name').val();
        if (empid !== null && division_name !== null && territory_name !== null && physical_place_name !== null) {
            $j.ajax({
                type: 'POST',
                url: 'getEmployeHasPlaceID',
                data: {
                    'empid': empid,
                    'division_name': division_name,
                    'territory_name': territory_name,
                    'physical_place_name': physical_place_name
                },
                success: function(data) {

                    var dataarr = data.split("`");
                    $j('#id_employee_has_place').val(dataarr[0].trim());

                },
                error: function() {

                }
            });
        }
    }

</script>
<?php echo form_open('itemdiscount/insertDiscount'); ?>
<table width="100%">
    <tr>
        <td>Employee</td>
        <td><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('employee_name'); ?></td>
    </tr>
    <tr>
        <td>Division</td>
        <td><select name="division_name" id="division_name" onchange="loadTerritory();"><?php set_value('division_name'); ?></select></td>
    </tr> 
    <tr>
        <td></td>
        <td><?php echo form_error('division_name'); ?></td>
    </tr>

    <tr>
        <td>Territory</td>
        <td><select name="territory_name" id="territory_name" onchange="loadPhysicalPlace();"></select></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('territory_name'); ?></td>
    </tr>
    <tr>
        <td>Physical Place</td>
        <td><select name="physical_place_name" id="physical_place_name" onchange="loadOutlet();"></select>
            <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php set_value('id_employee_has_place'); ?>"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('physical_place_name'); ?></td>
    </tr>
    <tr>
        <td>Item</td>
        <td><?php echo form_input($item_name); ?><?php echo form_input($item_id); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('item_name'); ?></td>
    </tr>
    <tr>
        <td>Discount Type</td>
        <td>
            <select id="discount_type" name="discount_type">
                <option value="1">Percentage(%)</option>
                <option value="2">Price(Rs)</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Discount</td>
        <td><?php echo form_input($discount); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('discount'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($save); ?>&ensp;<?php echo form_input($reset); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('insert_discount'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
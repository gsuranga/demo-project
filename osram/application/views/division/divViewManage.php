<?php
/**
 * Description of divViewManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$_instance = get_instance();

$divisionName = array(
    "id" => "division_name1",
    "name" => "division_name1",
    "type" => "text",
    'placeholder' => 'Select Division',
    "onfocus" => "getDivType();"
);

$divisionNo = array(
    "id" => "id_division",
    "name" => "id_division",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('division/indexdrawViewDivision'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Division Type</td>
        <td>
            <select name="division_type_name" id="division_type_name">
                <option value="">ALL</option>
                <?php foreach ($extraData['div_name'] as $val) { ?>

                    <option value="<?php echo $val['id_division_type']; ?>"><?php echo $val['tbl_division_type_name']; ?></option>

                <?php } ?>
            </select>

        </td>
    </tr>

    <tr>
        <td>Status</td>
        <td>
            <select name="status_name" id="status_name">
                <option value="">ALL</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>


            </select>

        </td>
    </tr>
    <tr>
        <td>Division Name</td>
        <td><?php echo form_input($divisionName); ?></td>
        <td><?php echo form_input($divisionNo); ?></td>
    </tr>


    <tr>
        <td></td>
        <td></td>

    </tr>

    <tr>
        <td></td>
        <td><?php echo form_input($btn); ?></td>

    </tr>



</table>
<?php echo form_close(); ?>

<?php
/**
 * Description of viewAllDivType
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();


$division_type_name = array(
    "id" => "division_type_name",
    "name" => "division_type_name",
    "type" => "text",
    'placeholder' => 'Select Division Type',
    "onfocus" => "getDivTypeName();"
);

$id_division_type = array(
    "id" => "id_division_type",
    "name" => "id_division_type",
    "type" => "hidden"
);

$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('division_type/indexViewDivisionType'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Division Type Name</td>
        <td><?php echo form_input($division_type_name); ?></td>
        <td><?php echo form_input($id_division_type); ?></td>
    </tr>

    <tr>
            <td>Status</td>
            <td>
                <select name="status_name" id="status_name">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                   
                </select>

            </td>
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

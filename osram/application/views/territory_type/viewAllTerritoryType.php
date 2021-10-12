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


$territory_type_name = array(
    "id" => "territory_type_name",
    "name" => "territory_type_name",
    "type" => "text",
    'placeholder' => 'Select Terrotory Type',
    "onfocus" => "getTeryTypeName();"
);

$id_territory_type = array(
    "id" => "id_territory_type",
    "name" => "id_territory_type",
    "type" => "hidden"
);

$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('territory_type/indexViewTerritoryType'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Territory Type Name</td>
        <td><?php echo form_input($territory_type_name); ?></td>
        <td><?php echo form_input($id_territory_type); ?></td>
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

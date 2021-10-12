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


$physical_place_name = array(
    "id" => "physical_place_category_name",
    "name" => "physical_place_category_name",
    "type" => "text",
    'placeholder' => 'Select Physical Place',
    "onfocus" => "getphysicalCategoryName();"
);

$id_physical_place_category = array(
    "id" => "physical_place_categoryID",
    "name" => "physical_place_categoryID",
    "type" => "hidden"
);

$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('physical_place_category/indexViewTerritoryType'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Physical Place Category Name</td>
        <td><?php echo form_input($physical_place_name); ?></td>
        <td><?php echo form_input($id_physical_place_category); ?></td>
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

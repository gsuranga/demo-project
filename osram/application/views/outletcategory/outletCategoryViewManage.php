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


$Outlet_category_type = array(
    "id" => "Outlet_category_type",
    "name" => "Outlet_category_type",
    "type" => "text",
    'placeholder' => 'Select Category Type',
    "onfocus" => "getOutletCategoryName();"
);

$id_outlet_category = array(
    "id" => "id_outlet_category",
    "name" => "id_outlet_category",
    "type" => "hidden"
);

$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('outlet_category/indexOutletCategoryView'); ?>
<table  width="60%" align="center">

    <tr>
        <td>Outlet Category Name</td>
        <td><?php echo form_input($Outlet_category_type); ?></td>
        <td><?php echo form_input($id_outlet_category); ?></td>
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

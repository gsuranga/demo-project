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

$PhysicalPlaceName = array(
    "id" => "PhysicalPlaceName",
    "name" => "PhysicalPlaceName",
    "type" => "text",
    'placeholder' => 'Select Physical Place',
    "onfocus" => "getPhysicalPlaceTypeName();"
);


$PhysicalPlaceNo = array(
    "id" => "id_physical_place",
    "name" => "id_physical_place",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('physical_place/indexViewPhysicalPlace'); ?>
<table  width="60%" align="center">

    <tr>
            <td>Physical Place Category Name</td>
            <td>
                <select name="Physical_place_name" id="Physical_place_name">
                    <option value="">All</option>
                    <?php foreach ($extraData['Physical_place_cat_name'] as $val) { ?>

                        <option value="<?php echo $val['id_physical_place_category']; ?>"><?php echo $val['physical_place_category_name']; ?></option>

                    <?php } ?>
                </select>

            </td>
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
        <td>Physical Place Name</td>
        <td><?php echo form_input($PhysicalPlaceName); ?></td>
        <td><?php echo form_input($PhysicalPlaceNo); ?></td>
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

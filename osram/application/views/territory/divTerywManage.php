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

$TreyName = array(
    "id" => "tery_name",
    "name" => "tery_name",
    "type" => "text",
    'placeholder' => 'Select Territory',
    "onfocus" => "getTeryType();"
);

$id_tery = array(
    "id" => "id_tery",
    "name" => "id_tery",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('territory/indexViewTerritory'); ?>
<table  width="60%" align="center">

    <tr>
            <td>Territory Type</td>
            <td>
                <select name="territory_Type_name" id="territory_Type_name">
                     <option value="">All</option>
                    <?php foreach ($extraData['tery_name'] as $val) { ?>

                        <option value="<?php echo $val['id_territory_type']; ?>"><?php echo $val['territory_type_name']; ?></option>

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
        <td>Territory Name</td>
        <td><?php echo form_input($TreyName); ?></td>
        <td><?php echo form_input($id_tery); ?></td>
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

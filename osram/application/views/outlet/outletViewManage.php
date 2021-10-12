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

$OutletName = array(
    "id" => "outlet_name",
    "name" => "outlet_name",
    "type" => "text",
    'placeholder' => 'Select Outlet',
    "onfocus" => "getOutletNameType();"
);
$OutletCode = array(
    "id" => "outlet_code",
    "name" => "outlet_code",
    "type" => "text",
    'placeholder' => 'Select OutletCode',
    "onfocus" => "getOutletAddressType();"
);

$Idoutlet = array(
    "id" => "id_outlet",
    "name" => "id_outlet",
    "type" => "hidden"
);
$IdoutletReg = array(
    "id" => "id_Reg_outlet",
    "name" => "id_Reg_outlet",
    "type" => "hidden"
);
$TerritoryName = array(
    "id" => "tery_name",
    "name" => "tery_name",
    "type" => "text",
    'placeholder' => 'Select Territory',
    "onfocus" => "getterritoryType();"
);

$Idterrytory = array(
    "id" => "id_territory",
    "name" => "id_territory",
    "type" => "hidden"
);

$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('outlets/drawIndexViewOutlet'); ?>
<table  width="60%" align="center">

    <tr>
            <td>Outlet Category Name</td>
            <td>
                <select name="outlet_cat_name" id="outlet_cat_name">
                    <option value="">All</option>
                    <?php foreach ($extraData['outlet_name'] as $val) { ?>

                        <option value="<?php echo $val['id_outlet_category']; ?>"><?php echo $val['outlet_category_name']; ?></option>

                    <?php } ?>
                </select>

            </td>
            <td>Outlet Name</td>
        <td><?php echo form_input($OutletName); ?></td>
        <td><?php echo form_input($Idoutlet); ?></td>
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
             <td>Outlet Code</td>
        <td><?php echo form_input($OutletCode); ?></td>
        <td><?php echo form_input($IdoutletReg); ?></td>
        </tr>
        <tr>
            <td>Division Name</td>
            <td>
                <select name="division_name" id="division_name">
                    <option value="">All</option>
                    <?php foreach ($extraData['division_name'] as $val) { ?>

                        <option value="<?php echo $val['id_division']; ?>"><?php echo $val['division_name']; ?></option>

                    <?php } ?>
                </select>

            </td>
            <td>Territory Name</td>
        <td><?php echo form_input($TerritoryName); ?></td>
        <td><?php echo form_input($Idterrytory); ?></td>
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

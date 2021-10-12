<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden'
);
$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_sales_officer();',
    'placeholder' => 'Select Sales Officer'
);
$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_area_name();',
    'placeholder' => 'Select Area'
);
$area_id = array(
    'id' => 'area_id',
    'name' => 'area_id',
    'type' => 'hidden'
);
$search_s_o_target = array(
    'id' => 'search_s_o_target',
    'name' => 'search_s_o_target',
    'type' => 'submit',
    'value' => 'Search'
);
$target_month = array(
    'id' => 'target_month',
    'name' => 'target_month',
    'placeholder' => 'Select Target Month',
    'type' => 'text'
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>
<table width="60%" align="center" id="tbl" style=" position: relative">
    <tr>
        <td>Select Area</td>
        <td>
            <?php echo form_input($area_name); ?>
            <?php echo form_input($area_id); ?>
        </td>

    </tr>
    <tr>
        <td>Sales Officer</td>
        <td>
            <?php echo form_input($sales_officer_name); ?>
            <?php echo form_input($sales_officer_id); ?>
        </td>

    </tr>
    <tr>
        <td>Target Month</td>
        <td><?php echo form_input($target_month); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <?php echo form_input($search_s_o_target); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Dealer ID</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Dealer Account No</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Dealer Name</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Part No</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Description</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total Target</td>    
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total Minimum (Target)</td>    
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total Additional(Target)</td>
            <td style="background-color: yellow;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Total (Actual)</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Variance</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">BBF</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Reason</td>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->vehicle_brand_id; ?></td>
                    <td><?php echo $value->vehicle_brand_name; ?></td>    
                    <td><?php echo $value->vehicle_type_name; ?></td>    
                    <td><a style="text-decoration: none;" href="drawIndexVehicleBrand?token_vehicle_brand_id=<?php echo $value->vehicle_brand_id; ?>&token_vehicle_brand_name=<?php echo $value->vehicle_brand_name; ?>&token_vehicle_type_name=<?php echo $value->vehicle_type_name; ?>&token_vehicle_type_id=<?php echo $value->vehicle_type_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
                    <td><a style="text-decoration: none;" href="remooveVehicleBrand?token_vehicle_brand_id=<?php echo $value->vehicle_brand_id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"></a></td>
                </tr>
            <?php }
        } else {
            ?> 
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>
<?php echo form_close(); ?>

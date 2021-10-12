<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$garage_name = array(
    'id' => 'garage_name',
    'name' => 'garage_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_garage_name();',
    'placeholder' => 'Select Garage'
);
$garage_id = array(
    'id' => 'garage_id',
    'name' => 'garage_id',
    'type' => 'hidden'
);
$dealer_name = array(
    'id' => 'nearest_tata_dealer',
    'name' => 'nearest_tata_dealer',
    'type' => 'text',
     'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer();',
    'placeholder' => 'Select Dealer'
);
$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);
$create_dealer = array(
    'id' => 'create_dealer',
    'name' => 'create_dealer',
    'type' => 'submit',
    'value' => 'Create TGP Dealer'
);

?>
<?php echo form_open('garage/inserTGPDelar'); ?>
<table width="80%" align="center">
    <tr>
        <td>Garage Name</td>
        <td>
            <?php echo form_input($garage_name); ?>
            <?php echo form_input($garage_id); ?>
        </td>
    </tr>
    <tr>
        <td>Dealer Name</td>
        <td>
            <?php echo form_input($dealer_name); ?>
            <?php echo form_input($dealer_id); ?>
        </td>
    </tr>
    <tr>
        <td>Part Type</td>
        <td>
            <table width="80%" id="part_type_tgp">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <input type="text" id="txt_part_type_1" name="txt_part_type_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type('1');"/>
                        <input type="hidden" id="txt_part_type_id_1" name="txt_part_type_id_1"/>
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <?php echo form_input($create_dealer); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <input type="hidden" name="tokn_row" id="tokn_row" value="1">
</table>
<?php echo form_close(); ?>
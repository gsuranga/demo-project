<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text'
);
$dealer_address = array(
    'id' => 'dealer_address',
    'name' => 'dealer_address',
    'type' => 'text'
);
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
$dealer_contact_no = array(
    'id' => 'dealer_contact_no',
    'name' => 'dealer_contact_no',
    'type' => 'text'
);

$create_non_tata_dealer = array(
    'id' => 'create_non_tata_dealer',
    'name' => 'create_non_tata_dealer',
    'type' => 'submit',
    'value' => 'Create Non Tata Dealer'
);
$_instance = get_instance();
?>
<?php echo form_open('garage/createNonTataDealer'); ?>
<input type="hidden"  id="tokn_row" name="tokn_row"/>
<table width="80%" align="center">
    <tr>
        <td>Dealer Name</td>
        <td><?php echo form_input($dealer_name); ?></td>
    </tr>
    <tr>
        <td>Dealer Address</td>
        <td><?php echo form_input($dealer_address); ?></td>
    </tr>
    <tr>
        <td>Dealer Contact No</td>
        <td><?php echo form_input($dealer_contact_no);?></td>
    </tr>
    <tr>
        <td>Garage Name</td>
        <td>
            <?php echo form_input($garage_name); ?>
            <?php echo form_input($garage_id); ?>
        </td>
    </tr>
    <tr>
        <td>Part Type</td>
        <td>
            <table width="80%" id="part_type">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_part_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <input type="text" id="txt_part_type_1" name="txt_part_type_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_all_vehicle_part_type('1');"/>
                        <input type="hidden" id="txt_part_type_id_1" name="txt_part_type_id_1"/>
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">

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
                        <?php echo form_input($create_non_tata_dealer); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
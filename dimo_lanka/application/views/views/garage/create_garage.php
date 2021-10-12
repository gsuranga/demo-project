
<?php
$garage_code = array(
    'id' => 'garage_code',
    'name' => 'garage_code',
    'type' => 'text'
);
$garage_account_no = array(
    'id' => 'garage_account_no',
    'name' => 'garage_account_no',
    'type' => 'text'
);
$garage_name = array(
    'id' => 'garage_name',
    'name' => 'garage_name',
    'type' => 'text'
);
$garage_contact_no = array(
    'id' => 'garage_contact_no',
    'name' => 'garage_contact_no',
    'type' => 'text'
);
//$garage_code = array(
//    'id' => 'garage_code',
//    'name' => 'garage_code',
//    'type' => 'text'
//);
$nearest_tata_dealer = array(
    'id' => 'nearest_tata_dealer',
    'name' => 'nearest_tata_dealer',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_dealer1();',
    'placeholder' => 'Select Nearest TATA Dealer',
);
$dealer_id = array(
    'id' => 'dealer_id',
    'name' => 'dealer_id',
    'type' => 'hidden'
);
$garage_address = array(
    'id' => 'garage_address',
    'name' => 'garage_address',
    'type' => 'text'
);
// town start
$town = array(
    'id' => 'txt_part_cityReg_1',
    'name' => 'txt_part_cityReg_1',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_cityReg(1);',
    'placeholder' => 'Select Nearest Town',
);
$town_id = array(
    'id' => 'txt_part_cityReg_id_1',
    'name' => 'txt_part_cityReg_id_1',
    'type' => 'hidden'
);
// town end
$create_additional_detail = array(
    'id' => 'create_additional_detail',
    'name' => 'create_additional_detail',
    'type' => 'submit',
    'value' => 'Submit'
);

$added_by_user = array(
    'id' => 'added_by_user',
    'name' => 'added_by_user',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly ' => 'true'
);
$user_id = array(
    'id' => 'user_id',
    'name' => 'user_id',
    'type' => 'hidden'
);
//$create_garage = array(
//    'id' => 'create_garage',
//    'name' => 'create_garage',
//    'type' => 'submit',
//    'value' => 'Register Garage'
//);



$_instance = get_instance();
?>
<?php echo form_open('garage/createGarage'); ?>
<table width="50%" align="center">
    <tr style="display:none;" >
        <td>Garage Code</td>
        <td>
            <?php echo form_input($garage_code); ?>

        </td>
    </tr>
    <tr style="display:none;">
        <td>Garage Account No</td>
        <td>
            <?php echo form_input($garage_account_no); ?>

        </td>
    </tr>
    <tr>
        <td>Garage Name</td>
        <td>
            <?php echo form_input($garage_name); ?>
            <?php echo form_error('garage_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Garage Address</td>
        <td>
            <?php echo form_input($garage_address); ?>
            <?php echo form_error('garage_address'); ?>
        </td>
    </tr>
    <tr>
        <td>Town</td>
        <td>
            <?php echo form_input($town); ?>
            <?php echo form_input($town_id); ?>
            <?php echo form_error('town'); ?>
        </td>
    </tr>
    <tr>
        <td>Garage Contact No</td>
        <td>
            <?php echo form_input($garage_contact_no); ?>
            <?php echo form_error('garage_contact_no'); ?>
        </td>
    </tr>
    <tr>
        <td>Garage Code</td>
        <td>
            <input type="text" id="garage_code" name="garage_code" ></textarea>
            <?php echo form_error('garage_code'); ?>
        </td>
    </tr>
    <tr>
        <td>Nearest TATA Dealer</td>
        <td>
            <?php echo form_input($nearest_tata_dealer); ?>
            <?php echo form_input($dealer_id); ?>
            <?php echo form_error('nearest_tata_dealer'); ?>
        </td>
    </tr>
    <tr>
        <td>Added By User</td>
        <td>
            <?php
            $username = $this->session->userdata('username');
            $id = $this->session->userdata('id');
            echo form_input($added_by_user, $username);
            ?>
            <?php echo form_input($user_id, $id); ?>
            <?php echo form_error('added_by_user'); ?>
        </td>
    </tr>
    <tr>
        <td>Remark</td>
        <td>
            <textarea id="txt_remark" name="txt_remark" cols="6" rows="5"></textarea>
            <?php echo form_error('txt_remark'); ?>
        </td>
    </tr>
    <tr>

        <td>Contact details</td>
        <td>
            <table width="100%" align="center" class="SytemTable" id="contact_details">
                <thead>
                    <tr>
                        <td style="background: #777777;color:white;width: 10px;text-align: center"></td> 
                        <td style="background: #777777;color:white;width: 10px;text-align: center">Name</td> 
                        <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Contact number</td> 
                        <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Code</td> 
                        <td style="background: #a3a3a3;color:white;width: 10px;text-align: center"></td> 
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td> <img style="width: 20px; height: 20px" type="button"   onclick="add_new_contact_details();" src="http://localhost/dimo_lanka/public/images/add2.png"></td>
                        <td><input type="text" id="txt_contact_person_name_1" name="txt_contact_person_name_1"/></td>
                        <td><input type="text" id="txt_contact_no_1" name="txt_contact_no_1"/></td>
                        <td><input type="text" id="txt_code_1" name="txt_code_1"/></td>
                        <td>
                            <img style="width: 20px; height: 20px" type="button"   src="http://localhost/dimo_lanka/public/images/delete2.png">
                        </td>
                    </tr>
                </tbody>
                <input type="hidden" id="hidden_contact_details" name="hidden_contact_details" value="1"/>
            </table>
        </td>
    </tr>

</table>



<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">Types of vehicles serviced</td>   
    </tr>

</table>
<table width="80%" align="center">
    <tr>
        <td>Vehicle Type</td>
        <td>
            <table width="80%" id="vehicle_type">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type('1');" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <select id="txt_vehicle_type_id_1" name="txt_vehicle_type_id_1"></select>
<!--                        <input type="text" id="txt_vehicle_type_1" name="txt_vehicle_type_1" placeholder="Select Vehicle Type" autocomplete="off" onfocus="get_all_vehicle_type('1');"/>
                        <input type="hidden" id="txt_vehicle_type_id_1" name="txt_vehicle_type_id_1"/>-->
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <input type="hidden" name="token_vehicle_type" id="token_vehicle_type" value="1">
</table>
<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger "> What are the Indian Brands ?</td>   
    </tr>
</table>

<table width="80%" align="center">
    <tr>
        <td>Indian Brand</td>
        <td>
            <table width="80%" id="indian_brand">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_indian_brand();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <select id="txt_indian_brand_id_1" name="txt_indian_brand_id_1"></select>
<!--                        <input type="text" id="txt_indian_brand_1" name="txt_indian_brand_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_all_vehicle_part_type_indian('1');"/>
                        <input type="hidden" id="txt_indian_brand_id_1" name="txt_indian_brand_id_1"/>-->
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <input type="hidden" name="token_indian_brand" id="token_indian_brand" value="1">
</table>
<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">   What are the types TATA Models serviced ?</td>   
    </tr>

</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_vehicle_detail" >
    <thead>
        <tr>
            <td style="background: #777777;color:white"></td>
            <td style="background: #777777;color:white">Vehicle Model</td>
            <td style="background: #A2A2A2;color:black">Vehicle Sub Model</td>
            <td style="background: #E2E2E2;color:black">Vehicle Repair Type</td>
            <td style="background: #E2E2E2;color:black"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="http://localhost/dimo_lanka/public/images/add2.png">
            </td>
            <td>
                <select id="txt_vehicle_model_id_1" name="txt_vehicle_model_id_1"></select>
                <!--                <input type="text" id="txt_vehicle_model_1" name="txt_vehicle_model_1" placeholder="Select Vehicle Model" autocomplete="off" onfocus="get_all_vehicle_model('1');"/>
                                <input type="hidden" id="txt_vehicle_model_id_1" name="txt_vehicle_model_id_1"/>-->

            </td>
            <td>
                <select id="txt_vehicle_sub_model_id_1" name="txt_vehicle_sub_model_id_1"></select>
                <!--                <input type="text" id="txt_vehicle_sub_model_1" name="txt_vehicle_sub_model_1" placeholder="Select Vehicle Sub Model" autocomplete="off" onfocus="get_al_vehicle_sub_model('1')"/>
                                <input type="hidden" id="txt_vehicle_sub_model_id_1" name="txt_vehicle_sub_model_id_1"/>-->
            </td>
            <td>
                <select id="txt_vehicle_repair_type_id_1" name="txt_vehicle_repair_type_id_1"></select>
                <!--                <input type="text" id="txt_vehicle_repair_type_1" name="txt_vehicle_repair_type_1" placeholder="Select Vehicle Repair Type" autocomplete="off" onfocus="get_all_vehicle_repair1('1');"/>
                                <input type="hidden" id="txt_vehicle_repair_type_id_1" name="txt_vehicle_repair_type_id_1"/>-->
            </td>
            <td>

                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
            </td>
        </tr>
    <input type="hidden" name="token_tata_model" id="token_tata_model" value="1">
    </tbody>
</table>
<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger "> What are the Dealers outlets used for parts purchasing TATA Genuine Parts Dealers ?</td>   
    </tr>

</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="part_type_tgp">
    <thead>
        <tr>
            <td style="background: #777777;color:white"></td>
            <td style="background: #777777;color:white">Vehicle Part Type</td>
            <td style="background: #A2A2A2;color:black">Dealer Name</td>
            <td style="background: #E2E2E2;color:black">Dealer Account No</td>
            <td style="background: #E2E2E2;color:black"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

            </td>
            <td>
                <select id="txt_part_type_id_1" name="txt_part_type_id_1"></select>
<!--                <input type="text" id="txt_part_type_1" name="txt_part_type_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type('1');"/>
                <input type="hidden" id="txt_part_type_id_1" name="txt_part_type_id_1"/>-->
            </td>
            <td>
                <input type="text" id="nearest_tata_dealer_1" name="nearest_tata_dealer_1" autocomplete="off" placeholder="Dealer Name" onfocus="get_all_dealer('1');"/>
                <input type="hidden" id="nearest_tata_dealer_id_1" name="nearest_tata_dealer_id_1"/>
            </td>
            <td>
                <input type="text" id="txt_dealer_account_no_1" name="txt_dealer_account_no_1" placeholder="Select Dealer Account No" autocomplete="off" onfocus="get_all_dealer_account_no('1');" />
                <input type="hidden" id="txt_dealer_account_no_id_1" name="txt_dealer_account_no_id_1"/>

            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>
        </tr>
    <input type="hidden" name="token_tgp_dealers" id="token_tgp_dealers" value="1">
    </tbody>
</table>
<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger "> Non TGP Dealers</td>   
    </tr>

</table>
<table width="100%"class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="non_tgp_parts_dealers">
    <thead>
        <tr>
            <td style="background: #777777;color:white"></td>
            <td style="background: #777777;color:white">Non TGP Dealer Name</td>
            <td style="background: #A2A2A2;color:black">Dealer Address</td>
            <td style="background: #E2E2E2;color:black">Vehicle Part Type</td>
            <td style="background: #E2E2E2;color:black">Town Of The Dealer</td>
            <td style="background: #E2E2E2;color:black"></td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_non_tgp_dealers();" src="http://localhost/dimo_lanka/public/images/add2.png">

            </td>
            <td>
                <input type="text" id="txt_non_tata_dealer_name_1" name="txt_non_tata_dealer_name_1"/>

            </td>
            <td>
                <input type="text" id="txt_non_tata_dealer_address_1" name="txt_non_tata_dealer_address_1" />

            </td>
            <td>
                <select id="txt_part_type_id1_1" name="txt_part_type_id1_1"></select>
<!--                <input type="text" id="txt_part_type1_1" name="txt_part_type1_1" placeholder="Select Vehicle Part Type" autocomplete="off" onfocus="get_vehicle_part_type1('1');"/>
            <input type="hidden" id="txt_part_type_id1_1" name="txt_part_type_id1_1"/>-->
            </td>
            <td>
                <input type="text" id="txt_part_city_1" name="txt_part_city_1" placeholder="Select Nearest Town" autocomplete="off" onfocus="get_city('1');"/>
                <input type="hidden" id="txt_part_city_id_1" name="txt_part_city_id_1"/>
            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_tgp_part_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
            </td>
        </tr>
    <input type="hidden" name="token_non_tgp_part_type" id="token_non_tgp_part_type" value="1">
    </tbody>
</table>

<table class="SubTile">
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger ">  What are the types Of Brands preferred ?</td>   
    </tr>

</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_garage_tata_brand" >
    <thead>
        <tr>
            <td style="background: #777777;color:white"></td>
            <td style="background: #777777;color:white">Vehicle Repair Type</td>
            <td style="background: #A2A2A2;color:black">Vehicle Brand</td> 
            <td style="background: #A2A2A2;color:black">If Other (Names)</td> 
            <td style="background: #E2E2E2;color:black">No. Of Repairs Per Month Approx.</td>
            <td style="background: #E2E2E2;color:black">Remarks</td>
            <td style="background: #E2E2E2;color:black"></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row1();" src="http://localhost/dimo_lanka/public/images/add2.png">
            </td>
            <td>
                <select id="txt_vehicle_repair_type_id1_1" name="txt_vehicle_repair_type_id1_1"></select>
<!--                <input type="text" id="txt_vehicle_repair_type1_1" name="txt_vehicle_repair_type1_1" placeholder="Select Vehicle Repair Type" autocomplete="off" onfocus="get_all_vehicle_repair2('1');"/>
                <input type="hidden" id="txt_vehicle_repair_type_id1_1" name="txt_vehicle_repair_type_id1_1"/>-->
            </td>
            <td>
                <select id="txt_vehicle_brand_id_1" name="txt_vehicle_brand_id_1"></select>
<!--                <input type="text" id="txt_vehicle_brand_1" name="txt_vehicle_brand_1" placeholder="Select Vehicle Brand" autocomplete="off" onfocus="get_all_vehicle_brand('1');"/>
<input type="hidden" id="txt_vehicle_brand_id_1" name="txt_vehicle_brand_id_1"/>-->
            </td> 
            <td>
                <input type="text" id="txt_others_1" name="txt_others_1" />

            </td>
            <td>
                <input type="text" id="txt_repairs_1" name="txt_repairs_1" />

            </td>
            <td>
                <textarea id="txt_remarks_1" name="txt_remarks_1" cols="10" rows="3"></textarea>

            </td>
            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
            </td>
        </tr>
    <input type="hidden" name="token_tata_brand_detail" id="token_tata_brand_detail" value="1">
    </tbody>
</table>
<table align="right">
    <tr>
        <td>
            <?php echo form_input($create_additional_detail); ?>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>






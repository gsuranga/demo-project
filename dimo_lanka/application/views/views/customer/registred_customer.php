<?php
$_instance = get_instance();



$delar_name = array(
    'id' => 'delar_id',
    'name' => 'delare_name',
    'onfocus' => 'get_repaerType();',
    'placeholder' => 'Select Delar Name',
    'autocomplete' => 'off',
    'type' => 'text'
);
$delar_id = array(
    'id' => 'delar_id',
    'name' => 'delar_id',
    'type' => 'text'
);
$customer_name = array(
    'id' => 'customer_name',
    'name' => 'customer_name',
    'placeholder' => 'Enter Customer Name',
    'autocomplete' => 'off',
//    'onBlur' => 'OtherVehicle();',
    'size' => '40px',
    'type' => 'text'
);
$customer_cont = array(
    'id' => 'customer_con_t',
    'name' => 'customer_con_t',
    'placeholder' => 'Enter Contact Number',
    'autocomplete' => 'off',
    'type' => 'text'
);
$customer_cont1 = array(
    'id' => 'customer_con_m',
    'name' => 'customer_con_m',
    'placeholder' => 'Enter Contact Number',
    'autocomplete' => 'off',
    'type' => 'text'
);
$customer_cont2 = array(
    'id' => 'customer_con_w',
    'name' => 'customer_con_w',
    'placeholder' => 'Enter Contact Number',
    'autocomplete' => 'off',
    'type' => 'text'
);
$customer_address = array(
    'id' => 'customer_address',
    'name' => 'customer_address',
    'placeholder' => 'Enter Address',
    'autocomplete' => 'off',
    'type' => 'text'
);
$customer_type = array(
    'id' => 'type_name',
    'name' => 'type_name',
    'placeholder' => 'Select Customer Type',
    'autocomplete' => 'off',
    'type' => 'text'
);
$customer_id = array(
    'id' => 'type_id',
    'name' => 'type_id',
    'type' => 'text'
);
$email_address = array(
    'id' => 'email_address',
    'name' => 'email_address',
    'placeholder' => 'Enter Email',
    'autocomplete' => 'off',
    'type' => 'text'
);
$vehicle_reg = array(
    'id' => 'reg_number',
    'name' => 'reg_number',
    'placeholder' => 'Enter Vehicle Registration Number',
    'autocomplete' => 'off',
    'size' => '10',
    'type' => 'text'
);
//$vehicle_reg_b = array(
//    'id' => 'reg_b',
//    'name' => 'reg_b',
//    // 'placeholder' => 'Enter Email',
//    'autocomplete' => 'off',
//    'type' => 'text'
//);
//$vehicle_reg_c = array(
//    'id' => 'reg_c',
//    'name' => 'reg_c',
//    // 'placeholder' => 'Enter Email',
//    'autocomplete' => 'off',
//    'type' => 'text'
//);
$vehicle_model = array(
    'id' => 'vehicle_model_name',
    'name' => 'vehicle_model_name',
    'placeholder' => 'Select Vehicle Model',
    'autocomplete' => 'off',
    'type' => 'text'
);
$vehicle_model_id = array(
    'id' => 'vehicle_model_name_id',
    'name' => 'vehicle_model_name_id',
    'autocomplete' => 'off',
    'type' => 'text'
);
$Dealer_Purchase_parts = array(
    'id' => 'delar_purchase_name',
    'name' => 'delar_purchase_name',
    'placeholder' => 'Select Type',
    'autocomplete' => 'off',
    'type' => 'text'
);
$Dealer_Purchase_part_id = array(
    'id' => 'delar_purchase_id',
    'name' => 'delar_purchase_id',
    // 'placeholder' => 'Select Dealer Purchase Part',
    'autocomplete' => 'off',
    'type' => 'text'
);
$Dealer_Purchase_type = array(
    'id' => 'delar_purchase_Type',
    'name' => 'delar_purchase_Type',
    'placeholder' => 'Select',
    'autocomplete' => 'off',
    'onfocus' => 'set_dealer_purchacing_part();',
    'type' => 'text'
);
$Dealer_Purchase_type_id = array(
    'id' => 'delar_purchase_type_id',
    'name' => 'delar_purchase_type_id',
    //'placeholder' => 'Select',
    'autocomplete' => 'off',
    'type' => 'hidden'
);
$Repair_type = array(
    'id' => 'Repair_type',
    'name' => 'Repair_type',
    //'placeholder' => 'Select',
    'autocomplete' => 'off',
    'type' => 'text'
);
$btn_sub = array(
    'name' => 'btn_sub',
    'value' => 'Register',
    'type' => 'submit'
);
$_instance = get_instance();
?>
<?php echo form_open('customer/create_customer'); ?>

<table align="right">
    <tr><td></td>
        <td colspan="3"><?php echo $this->session->flashdata('insert_customer'); ?></td>
    </tr>
</table>
<table align="center">

    <tr><td>
            <table>
                <tr>
                    <td colspan="2" align="center"><label style=" font-size: 18px; font-style: oblique; color: #000000;"><u>Customer Details</u></label></td>
                    </td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Customer Name:-</label></td>
                    <td><?php echo form_input($customer_name); ?> <td>

                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('customer_name'); ?></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Customer Type:-</label></td>
                    <td><?php $_instance->customerTypeLoad(); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Contact no/ Tel:-</label></td>
                    <td><?php echo form_input($customer_cont); ?></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Contact no/ Mobile:-</label></td>
                    <td><?php echo form_input($customer_cont1); ?></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Contact no/ Work:-</label></td>
                    <td><?php echo form_input($customer_cont2); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('customer_con'); ?></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Customer Address:-</label></td>
                    <td><?php echo form_input($customer_address); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('customer_address'); ?></td>
                </tr>
                <tr>
                    <td><label style="font-size: 14px;">Customer Email:-</label></td>
                    <td><?php echo form_input($email_address); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('email_address'); ?></td>
                </tr>
                <tr>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><label style=" font-size: 18px; font-style: oblique; color: #000000;"><u>Vehicle Details</u></label></td>
                    </td>

                </tr>
            </table>





            <table>
                <tr>
                    <td width="170"><label style="font-size: 14px;">Vehicle Reg no:-</label></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr align="right">
                    <td width="170">Eg:-</td>
                    <td style="color: #005fbf;"><u><b>sp-DD-9999</b></u></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr align="right">
        <td width="170"></td>
        <td><input type="text" id="driver_1" name="driver_1" placeholder="" size="6px" autocomplete="off"></td>
        <td><label>-</label></td>
        <td><input type="text" id="driver_2" name="driver_2" size="6px" autocomplete="off"></td>
        <td><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>

        <td><input type="text" id="driver_3" name="driver_3" size="10px" autocomplete="off"></td>

    </tr> 
    <tr align="right">
        <td width="170"></td>
        <td><?php echo form_error('driver_1'); ?></td>
        <td><label></label></td>
        <td><?php echo form_error('driver_2'); ?></td>
        <td><label></label></td>
        <td><?php echo form_error('driver_3'); ?></td>

    </tr> 
</table>





<table>

    <tr>
        <td><label style="font-size: 14px;">Vehicle Model:-</label></td>
        <td width="78"></td>

        <td>

            <select id="vehicle_model_0" name="vehicle_model_0"  onchange="get_vehicle_model_id(0);"> 
                <option>----Select Vehicle Model----</option>
                <?php
                if ($extraData != '') {
                    foreach ($extraData as $value) {
                        ?>

                        <option value="<?php echo $value->vehicle_model_id; ?>"><?php echo $value->vehicle_model_name; ?></option>

                        <?php
                    }
                }
                ?>

            </select>


        </td>
        <td><input type="hidden" name="vehicle_model_id_0" id="vehicle_model_id_0"/></td>
    </tr>
    <tr>
        <td><label style="font-size: 14px;">Vehicle Sub Model:-</label></td>
        <td width="78"></td>
        <td><select name="set_sub_model" id="set_sub_model"></select></td>
    </tr>

    <tr>
        <td></td>
        <td></td>

    </tr>

</table>





<table id="vehicleRegForm1">
    <tr>
        <td width="170"><label style="font-size: 14px;">Contact details</label></td>
<!--                    <td width="170"><label style="font-size: 14px;">Add Driver/Drivers:-</label></td>-->
        <td width="170"><label style="font-size: 14px;">Name</label></td>
        <td width="170"><label style="font-size: 14px;">Contact No</label></td>
        <td width="170"><label style="font-size: 14px;">Email Address</label></td>

        <td></td>
    </tr>
    <tr align="right">
        <td></td>
        <td><input type="text" id="owner" name="owner" placeholder="Owner Name" autocomplete="off" onclick="get_owner();">
            <input type="hidden" id="owner_id" name="owner_id" autocoowner_idmplete="off"></td>
        <td><input type="text" id="ownerConNo" name="ownerConNo" placeholder="Owner Contact No" autocomplete="off">
            <input type="hidden" id="ownerConNo_id" name="ownerConNo_id"  autocomplete="off"></td>
        <td><input type="text" id="ownerEmail" name="ownerEmail" placeholder="Owner Email" autocomplete="off">
            <input type="hidden" id="ownerEmail_id" name="ownerEmail_id" autocomplete="off"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('owner'); ?></td>
        <td><?php echo form_error('ownerConNo'); ?></td>
        <td><?php echo form_error('ownerEmail'); ?></td>
    </tr>

    <tr align="right">
        <td width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addDrivers();" style="font-size: larger" value="+"/></td>
        <td><input type="text" id="driver_name_0" name="driver_name_0" placeholder="Driver Name" autocomplete="off">
            <input type="hidden" id="driver_id_hid_0" name="driver_id_hid_0"></td>

        <td><input type="text" id="driverConNo_0" name="driverConNo_0" placeholder="Driver No" autocomplete="off">
            <input type="hidden" id="driverConNo_id_0" name="driverConNo_id_0"  autocomplete="off"></td>
        <td><input type="text" id="driverEmail_0" name="driverEmail_0" placeholder="Driver Email" autocomplete="off">
            <input type="hidden" id="driverEmail_id_0" name="driverEmail_id_0"  autocomplete="off"></td>
    </tr>
    <input type="hidden" id="token_vehicle_no" name="token_vehicle_no" value="0"/>
    <tr>
        <td></td>
        <td><?php echo form_error('driver_name_0'); ?></td>
        <td><?php echo form_error('driverConNo_0'); ?></td>
        <td><?php echo form_error('driverEmail_0'); ?></td>
    </tr>
</table>



<table id="vehicleRegForm2">
    <tr>
        <td width="170"><label style="font-size: 14px;">Purpose:-</label></td>
        <td><?php $_instance->drawpurpose(); ?></td>

    </tr>

    <tr id="bus_type">
        <td width="170"><label style="font-size: 14px;">Business Type:-</label></td>
        <td><?php $_instance->lode_business_Type(); ?></td>
<!--        <td><input type="text" id="bus_type_id" name="bus_type_name" onfocus="get_bus_type();" autocomplete="off"/></td>
        <td><input type="hidden" id="business_type_hid_id" name="business_type_hid_name"></td>
    </tr>-->
<!--                <tr id="bus_type">
        <td></td>
        <td></td>
    </tr>-->

    <tr>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td width="170"><label style="font-size: 14px;">Areas of Travel:-</label></td>
        <td></td>
    </tr>

    <tr>
        <td align="right" width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addDistricts();" style="font-size: larger" value="+"/></td>
        <td><input type="text" id="district_id_0" name="district_name_0" onfocus="get_district(0);" placeholder="select District" autocomplete="off"></td>
        <td><input type="hidden" id="district_id_hid_0" name="district_name_hid_0"></td>

        <td><input type="text" id="main_town_id_0" name="main_town_name_0" onfocus="get_city(0);" placeholder="select City" autocomplete="off"></td>
        <td><input type="hidden" id="main_town_id_hid_0" name="main_town_name_hid_0"></td>

        <td><input type="text" id="location_id_0" name="location_name_0" placeholder="Enter a location"></td>
    </tr>
    <input type="hidden" name="token_arres_of_trevel" id="token_arres_of_trevel" value="0"/>
    <tr>
        <td></td>
        <td><?php echo form_error('district_name_0'); ?></td>
        <td></td>
        <td><?php echo form_error('main_town_name_0'); ?></td>
        <td></td>
        <td><?php echo form_error('location_name_0'); ?></td>
        <td></td>
    </tr>
</table>

<table id="vehicleForm2">
    <tr>
        <td width="170"><label style="font-size: 14px;">Other vehicles own by the same customer:-</label></td>

    </tr>
    <tr align="right">
        <td>Eg:-</td>
        <td style="color: #005fbf;"><u><b>sp-DD-9999</b></u></td>
</tr>
<tr align="right">
    <td  align="right"><input type="button" name="pls_vehicle" id="pls_vehicle_id_0"  onclick="addvehicle();" style="font-size: larger" value="+"/></td>
    <td><input type="text" id="vehicle_1_0" name="vehicle_1_0" placeholder="" size="6px" autocomplete="off"><input type="hidden" id="vehicle_id_1_0" name="vehicle_id_1_0"  size="10px" autocomplete="off"></td>
    <td><label>-</label></td>
    <td><input type="text" id="vehicle_2_0" name="vehicle_2_0" size="6px" autocomplete="off"><input type="hidden" id="vehicle_id_2_0" name="vehicle_id_2_0" size="10px" autocomplete="off"></td>
    <td><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
    <td><input type="text" id="vehicle_3_0" name="vehicle_3_0" size="10px" autocomplete="off"><input type="hidden" id="vehicle_id_3_0" name="vehicle_id_3_0" size="10px" autocomplete="off"></td>
</tr> 
<input type="hidden" name="token_vehicles_of" id="token_vehicles_of" value="0"/>

<tr align="right">
    <td width="170"></td>
    <td><?php echo form_error('vehicle_1'); ?></td>
    <td><label></label></td>
    <td><?php echo form_error('vehicle_2'); ?></td>
    <td><label></label></td>
    <td><?php echo form_error('vehicle_3'); ?></td>

</tr> 
</table>

<!--dealers and garages   ======== start-->
<table id="dealerRegForm1">
    <tr>
        <td width="170"><label style="font-size: 14px;">Dealers & Garages Purchased parts</label></td>
<!--                    <td width="170"><label style="font-size: 14px;">Add Driver/Drivers:-</label></td>-->
        <td width="170"><label style="font-size: 14px;">Parts</label></td>
        <td colspan="2" width="170"><label style="font-size: 14px;">Dealers or new shop</label></td>
        <td width="170"><label style="font-size: 14px;">Name of Garages</label></td>
    </tr>


    <tr align="right">
        <td width="170"><input type="button" name="pls_dealer" id="pls_dealer"  onclick="addParts1();" style="font-size: larger" value="+"/></td>
        <td>
            <?php //$_instance->load_part_type(); ?>
            <select id="dealer_select_0" name="dealer_select_0" >  </select>
        </td>

        <td>
            <select name="PurchasePart_type_0" id="PurchasePart_type_0" onchange="get_dealer_purchacing_part(0);">
                <option>--Select Type--</option>
                <option value="1">Dealer</option>
                <option value="2">New Shop</option>
                <input type="hidden" id="PurchasePart_type_id_0" name="PurchasePart_type_id_0">
            </select>
        </td>

        <td>
            <input type="text" id="selected_name_0" name="selected_name_0" onfocus="set_dealer_purchacing_part(0);" placeholder="Select" autocomplete="off" />
            <input type="hidden" id="selected_name_Hid_0" name="selected_name_Hid_0">
        </td>
 <!--       <td>
            <input type="text" id="dealer_name_1" name="dealer_name_1" size="10px" autocomplete="off" onclick="get_dealer();"  placeholder="Select Or Enter New Shop">
            <input type="hidden" id="dealer_name_id_1" name="dealer_name_id_1" size="10px" autocomplete="off">
        </td>-->

        <td>
            <input type="text" id="garage_name_0" name="garage_name_0" autocomplete="off"  onclick="get_garage1(0);" placeholder="Select Garage">
            <input type="hidden" id="garage_name_id_0" name="garage_name_id_0"  autocomplete="off">
        </td>
    </tr>
    <input type="hidden" id="token_dealer_no_" name="token_dealer_no_" value="0"/>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo form_error('selected_name_0'); ?></td>
        <td><?php echo form_error('garage_name_0'); ?></td>
    </tr>
</table>
<!--dealers and garages   ======== end 

<table id="dealerPurchasePart">
    <tr>
        <td width="170"><label style="font-size: 14px;">Spare Parts Purchases(TGP & non TGP Dealers):-</label></td>
        <td></td>
    </tr>

    <tr>
        <td align="right" width="170">
            <input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="dealerPurchasePart();" style="font-size: larger" value="+"/></td>
        <td>
            <select name="PurchasePart_type_0" id="PurchasePart_type_0" onchange="get_dealer_purchacing_part(0);">
                <option>--Select Type--</option>
                <option value="1">Dealer</option>
                <option value="2">New Shop</option>
                <input type="hidden" id="PurchasePart_type_id_0" name="PurchasePart_type_id_0">
                </td>


                <td><input type="text" id="selected_name_0" name="selected_name_0" onfocus="set_dealer_purchacing_part(0);" placeholder="Select" autocomplete="off" /></td>
                <td><input type="hidden" id="selected_name_Hid_0" name="selected_name_Hid_0"></td>
                <input type="hidden" name="token_PurchasePart" id="token_PurchasePart" value="0"/>
    </tr>
    <tr>
        <td align="right" width="170"></td>
        <td></td>
        <td><?php // echo form_error('selected_name_0');         ?></td>
        <td></td>
    </tr>

</table>






<table id="garage">
    <tr>
        <td width="170"><label style="font-size: 14px;">Garages Visited:-</label></td>
        <td></td>
    </tr>

    <tr>
        <td align="right" width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addgGarage();" style="font-size: larger" value="+"/></td>
                    <td><input type="text" id="repair_type_0" name="repair_type_m_0" onfocus="get_Repair_type(0);" placeholder="Repair Type" autocomplete="off"/></td>
        <td><input type="hidden" id="repair_type_id_0" name="repair_type_h_id_0"></td>
        <td><?php // $_instance->load_repay_type();         ?></td>
        <td></td>
        <td><input type="text" id="garage_name_id_0" name="garage_name_0" onfocus="get_garage(0);" placeholder="Garage" autocomplete="off" /></td>
        <td><input type="hidden" id="garage_name_Hid_0" name="garage_name_Hid_0"></td>
    <input type="hidden" name="token_Garages_Visited" id="token_Garages_Visited" value="1"/>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><?php //echo form_error('garage_name_0');         ?></td>
    <td></td>
</tr>

</table>-->

</td></tr></table>
<table align="center">
    <tr>
        <td></td>
        <td></td>
        <td><?php echo form_input($btn_sub); ?></td><br>

    <td><input type="reset" name="tbn_reset" id="tbn_reset" value="Reset"/></td>
</tr>
</table>
<?php echo form_close(); ?>


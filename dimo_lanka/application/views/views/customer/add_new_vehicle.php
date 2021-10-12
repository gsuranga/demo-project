<?php
$_instance = get_instance();
$m_customer_id = array(
    'id' => 'customer_id',
    'name' => 'customer_id',
    'type' => 'hidden'
);
$m_address = array(
    'id' => 'address',
    'name' => 'address',
    'type' => 'hidden'
);
$m_comtact = array(
    'id' => 'comtact',
    'name' => 'comtact',
    'type' => 'hidden'
);
?>



<table align="center">
    <tr>
        <?php if (isset($_GET['customer_name'])) { ?>
            <td colspan="3"><label style="font-size: 15px; color: #003f7f;"><b><u>Customer Name:-<?php echo $_GET['customer_name']; ?></u></b></label></td>
        <?php }
        ?>
    </tr>
</table>
<table height="10px">
    <tr>
        <td></td>
    </tr>
</table>

<!--<form action="add_new_vehicle_index">-->
<?php echo form_open('customer/add_new_vehicle'); ?>
<table align="center">

    <?php
    if (isset($_GET['token_customer_id'])) {
        echo form_input($m_customer_id, $_GET['token_customer_id']);
        echo form_input($m_address, $_GET['token_address']);
        echo form_input($m_comtact, $_GET['token_contact']);
    }
    ?>


    <tr><td>

            <table id="vehicleAdd">


                <tr>
                    <td><label style="font-size: 14px;">Vehicle Reg no:- </label></td>
                    <td width="50"></td>
<!--                    <td><input type="button" name="pls_vehicle" id="pls_vehicle_0"  onclick="addNewVehicle();" style="font-size: larger" value="+"/></td>-->
                    <td><input type="text" id="A_vehicle_number" name="A_vehicle_number" placeholder="Vehicle Number" autocomplete="off"/></td>
                    <td><label>-</label></td>
                    <td><input type="text" id="B_vehicle_number" name="B_vehicle_number" placeholder="Vehicle Number" autocomplete="off"/></td>
                    <td><label>-</label></td>
                    <td><input type="text" id="C_vehicle_number" name="C_vehicle_number" placeholder="Vehicle Number" autocomplete="off"/></td>


<!--                    <td><input type="text" id="vehicle_model_0" name="vehicle_model_0" onfocus="" placeholder="Vehicle Model" autocomplete="off" /></td>-->
<!--                    <td><input type="hidden" id="vehicle_model_Hid_0" name="vehicle_model_Hid_0"></td>
                <input type="hidden" name="token_add_vehocle" id="token_add_vehocle" value="1"/>-->

                </tr>


                <tr>

                    <td><label style="font-size: 14px;">Vehicle Model:-</label></td>
                    <td width="50"></td>
<!--                    <td><?php $_instance->drawVehicleModelLoad(); ?></td>-->
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
                </tr>

                <tr>

                    <td><label style="font-size: 14px;">Vehicle Sub Model:-</label></td>
                    <td width="50"></td>
                    <td><select name="set_sub_model" id="set_sub_model"></select></td>
                </tr>

                <tr>
                    <td></td>
                    <td><?php echo form_error('A_vehicle_number_0'); ?></td>
                    <td></td>
                    <td><?php echo form_error('B_vehicle_number_0'); ?></td>
                    <td></td>
                    <td><?php echo form_error('C_vehicle_number_0'); ?></td>


                </tr>
            </table>





            <table id="vehicleRegForm1">
                <tr>
                    <td width="170"><label style="font-size: 14px;">Add Driver/Drivers:-</label></td>
                    <td></td>
                </tr>
                <tr align="right">
                    <td width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addDrivers();" style="font-size: larger" value="+"/></td>
                    <td><input type="text" id="driver_name_0" name="driver_name_0" placeholder="Enter Driver" autocomplete="off"></td>
                    <td><input type="hidden" id="driver_id_hid_0" name="driver_id_hid_0"></td>

                </tr>
                <input type="hidden" id="token_vehicle_no" name="token_vehicle_no" value="1"/>
                <tr>
                    <td></td>
                    <td><?php echo form_error('driver_name_0'); ?></td>
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

                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td width="170"><label style="font-size: 14px;">Areas Of Travel:-</label></td>
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
                <input type="hidden" name="token_arres_of_trevel" id="token_arres_of_trevel" value="1"/>
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
                            <input type="hidden" id="PurchasePart_type_id_0" name="PurchasePart_type_id_0"></td>


                            <td><input type="text" id="selected_name_0" name="selected_name_0" onfocus="set_dealer_purchacing_part(0);" placeholder="Select" autocomplete="off" /></td>
                            <td><input type="hidden" id="selected_name_Hid_0" name="selected_name_Hid_0"></td>
                            <input type="hidden" name="token_PurchasePart" id="token_PurchasePart" value="1"/>
                </tr>
                <tr>
                    <td align="right" width="170"></td>
                    <td></td>
                    <td><?php echo form_error('selected_name_0'); ?></td>
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
            <!--        <td><input type="text" id="repair_type_0" name="repair_type_m_0" onfocus="get_Repair_type(0);" placeholder="Repair Type" autocomplete="off"/></td>
                    <td><input type="hidden" id="repair_type_id_0" name="repair_type_h_id_0"></td>-->
                    <td><?php $_instance->load_repay_type(); ?></td>
                    <td></td>
                    <td><input type="text" id="garage_name_id_0" name="garage_name_0" onfocus="get_garage(0);" placeholder="Garage" autocomplete="off" /></td>
                    <td><input type="hidden" id="garage_name_Hid_0" name="garage_name_Hid_0"></td>
                <input type="hidden" name="token_Garages_Visited" id="token_Garages_Visited" value="1"/>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo form_error('garage_name_0'); ?></td>
        <td></td>
    </tr>

</table>

</td></tr></table>
<table align="center">
    <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tbn_submit" id="tbn_submit" value="Submit"/></td>

        <td><input type="reset" name="tbn_reset" id="tbn_reset" value="Reset"/></td>
    </tr>
</table>

<?php echo form_close(); ?>
<!--</form>-->


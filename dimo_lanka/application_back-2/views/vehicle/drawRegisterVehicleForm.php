<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table align="center" >
            <tr>
                <td><table id="vehicleRegForm1">
                        <tr >
                            <td width="170"><label>Vehicle Model</label></td>
                            <td><input type="text" id="vehicle_model_id" name="vehicle_model_name" onfocus="get_vehicle_model();"></td>
                            <td><input type="hidden" id='vehicle_model_hid_id' name='vehicle_model_hid_id'></td>
                        </tr>
                        <tr>
                            <td width="170"><label>Vehicle Registration Number</label></td>
                            <td><input type="text" id="vehicle_reg_num_id" name="vehicle_reg_num_name"></td>


                        </tr>
                        <tr>
                            <td width="170"><label>Owner</label></td>
                            <td><input type="text" id="owner_id" name="owner_name" onfocus='get_customer();'></td>
                            <td><input type="hidden" id="owner_hid_id" name="owner_hid_name"></td>
                        </tr>
                        <tr>
                            <td width="170"><label>Add Driver/Drivers</label></td>
                            <td></td>
                        </tr>
                        <tr align="right">
                            <td width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addDrivers();" style="font-size: larger" value="+"/></td>
                            <td><input type="text" id="driver_id_0" name="driver_name_0"></td>
                            <td><input type="hidden" id="driver_id_hid_0" name="driver_name_hid_0"></td>

                        </tr>


                    </table>
                </td>

            </tr>
            <tr>
                <td><table id="vehicleRegForm2">
                        <tr>
                            <td width="170"><label>Purpose</label></td>
                            <td><input type="text" id="purpose_id" name="purpose_name" onfocus="get_purpose();" onchange="business_type()"></td>
                            <td><input type="hidden" id="purpose_hid_id" name="purpose_hid_name"></td>

                        </tr>
                        <tr id="bus_type">
                            <td width="170"><label>Business Type</label></td>
                            <td><input type="text" id="bus_type_id" name="bus_type_name" onfocus="get_bus_type();"/></td>
                            <td><input type="hidden" id="business_type_hid_id" name="business_type_hid_name"></td>
                        </tr>

                        <tr>
                            <td width="170"><label>Areas Of Travel</label></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td align="right" width="170"><input type="button" name="pls_driver" id="pls_driver_id_0"  onclick="addDistricts();" style="font-size: larger" value="+"/></td>
                            <td><input type="text" id="district_id_0" name="district_name_0" onfocus="get_district(0);" placeholder="select District"></td>
                            <td><input type="hidden" id="district_id_hid_0" name="district_name_hid_0"></td>
                            <td><input type="text" id="main_town_id_0" name="main_town_name_0" onfocus="get_city(0);" placeholder="select City"></td>
                            <td><input type="hidden" id="main_town_id_hid_0" name="main_town_name_hid_0"></td>
                            <td><input type="text" id="location_id_0" name="location_name_0" placeholder="Enter a location"></td>
                            <td><input type="hidden" id="location_id_hid_0" name="location_name_hid_0"></td>



                        </tr>

                    </table></td>

            </tr>
            <tr>
                <td> <table id="preDefinedVehicles">
                        <th>
                        <tr>Customers' Other Vehicle</tr>
                        </th>
                    </table></td>

            </tr>
            <tr>
                <td> <table id="vehicleRegForm3">
                        <tr>
                            <td><label>Dealer Purchasing Parts</label></td>
                        </tr>
                        <tr align="right">
                            <td width="170"><input type="button" name="pls_purchasing_0" id="pls_purchasing_name_0"  onclick="addDealerPurchasingParts();" style="font-size: larger" value="+"/></td>
                            <td><input type="text" id="dealer_purchase_parts_id_0" name="dealer_purchase_parts_name_0" onfocus="get_dealer_purchasing_parts(0);"></td>
                            <td><input type="hidden" id="dealer_purchase_parts_id_hid_0" name="dealer_purchase_parts_name_hid_0"></td>

                        </tr>
                    </table></td>

            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td></td>
                            <td><input type="button" onclick="register_vehicle();" value="Register"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </body>
</html>

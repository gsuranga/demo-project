<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="search_vehicle_index">
    <table align="center">
        <tr>
            <td colspan="3"><b><u>Example Vehicle Reg No-:</u> sp-DD-9999</b></td>
        </tr>
        <tr>
            <td><input type="text" name="search_vehicle_reg_no" id="search_vehicle_reg_no" autocomplete="off" onfocus="get_vehicle_number();"/></td>
            <td><input type="hidden" name="search_vehicle_reg_no_hidden" id="search_vehicle_reg_no_hidden" autocomplete="off"/></td>
            <td><input type="submit" name="searech_vehicle_btn" id="searech_vehicle_btn" /></td>
        </tr>
    </table>
</form>

<table>
    <tr height="10px">
        <td></td>
    </tr>

</table>

<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="">
    <thead>
        <tr>
            <td>Customer Name</td>
            <td>Vehicle Reg No</td>
            <td>Manege</td>
        </tr>
    </thead>
    <tbody>
        <?php
        //print_r($extraData);
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>

                    <td><?php echo $value->customer_name; ?></td>
                    <td><?php echo $value->vehicle_reg_no; ?></td>
                    <!--                    
                                        <td align="center"><img src="<?php echo $System['URL']; ?>public/images/driver_details.png" style="widh:60px;height:20px;cursor:pointer" onclick="update_searched_vehicle(<?php echo $value->customer_id; ?>);"></td>-->

                    <td><a style="text-decoration: none;" href="add_new_vehicle_index?token_customer_id=<?php echo $value->customer_id; ?>&token_address=<?php echo $value->address; ?>&token_contact=<?php echo $value->contact_number; ?>&customer_name=<?php echo $value->customer_name; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>

                </tr>

                <?php
            }
        }
        ?> 

        <?php if (count($extraData) <= 0) { ?>
            <tr><td align="center" colspan="3">
                    No recodes.....
                </td>
            </tr>
        <?php }
        ?>

    </tbody>
</table>

<table>
    <tr height="150px">
        <td></td>
    </tr>

</table>

<table align="center">
<?php
if ($extraData != '' && count($extraData) <= 0) {
    ?>
        <tr id="test">
            <td></td>
            <td><input type="button" name="btn_vehicle" id="btn_vehicle" value="Create New Customer" onclick="customer_reg();"/></td>
            <td></td>
        </tr>
<?php } ?>  
</table>


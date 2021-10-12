<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script>

</script>


<?php echo form_open_multipart('new_campaign/create_campaign_submit_form', array('id' => 'create_campaign_submit_form', 'name' => 'create_campaign_submit_form')); ?>
<table align="center" style="width: 80%;border-collapse:collapse;color: black" >
    <tr>
        <td align="left" style="width: 30%">Type</td>
        <td  align="left"><select style="width: 250px;" id="create_campaign_type" name="create_campaign_type" >
                <?php foreach ($extraData AS $val) { ?>
                    <option><?php echo $val->type_description; ?></option>
                <?php }
                ?>
                <option>Other</option>
            </select></td>
    </tr>
    <tr>
        <td align="left" >Date</td>
        <td  align="left"><input style="width:250px" type="text" value="" id="create_campaign_date" name="create_campaign_date" readonly="" placeholder="select date"></></td>
    </tr>
    <tr>
        <td align="left">Location</td>
        <td  align="left"><input id="create_campaign_location" name="create_campaign_location" style="width:350px" type="text" value="" ></></td>
    </tr>
    <tr>
        <td  align="left">Objective</td>
        <td  align="left"><textarea id="create_campaign_objective" name="create_campaign_objective" style="width:686px" value=""></textarea></td>
    </tr>
    <tr>
        <td  align="left">Material Required From H/O</td>
        <td  align="left"><textarea id="create_campaign_mrfho" name="create_campaign_mrfho"style="width:686px" value=""></textarea></td>
    </tr>
    <tr>
        <td  align="left">Other Requirements From Branch</td>
        <td  align="left"><textarea id="create_campaign_orfb" name="create_campaign_orfb"style="width:686px" value=""></textarea></td>
    </tr>
    <tr>
        <td  align="left" style="vertical-align: top">Expected Number Of Participants</td>
        <td  align="left">
            <table>
                <tr>
                    <td>Invitees:</td>
                    <td><input type="text" id="create_campaign_invitees" name="create_campaign_invitees"value=""  onkeyup="calculate_invitees_create();" style="width: 50px;text-align: right"></></td>
                </tr>
                <tr>
                    <td>Dimo Employees:</td>
                    <td><input type="text" id="create_campaign_dimo_employee" name="create_campaign_dimo_employee" value="" id="create_campaign_dimo_employee" onkeyup="calculate_invitees_create();" style="width: 50px;text-align: right"></></td>
                </tr>
                <tr>
                    <td>Total Employees:</td>
                    <td id="total_employees_create" style="text-align: center;font-size: 15px;font-weight: bold">0</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left" style="vertical-align: top">Targeted Dealers</td>
        <td >
            <table class="SytemTable" style="width:700px">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Account No</td>
                        <td>Current T/O</td>
                        <td>Expected increase after three months</td>
                    </tr>
                </thead>
                <tbody id="create_dealer_target">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                </tfoot>
               
            </table>              
        </td>
    </tr>

    <tr>
        <td ></td>
        <td><fieldset style="background-color: #d7e3e5;width:675px"> <legend style="color:black;font-weight: bold;font-size: 15px">Add New Dealers</legend>
                <table>
                    <tr>
                        <td>
                            <input type="text" placeholder="Name" id="dealer_name_create"onkeypress="get_new_dealer_create();" ><input type="hidden" id="dealer_id_create"></></>
                        </td>
                        <td>
                            <input type="text" placeholder="Account No" id="account_no_create" onkeypress="get_new_dealer_account_nu_create();"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Current T/O" id="current_to_create" name="current_to_create" style="text-align: center" readonly=""></>
                        </td>
                        <td>
                            <input type="text" placeholder="After 3 Month " id="after_3_month_create"  style="text-align: center" onkeypress="check_event_create(event)"></>
                        </td>
                        <td>
                            <img src="<?php echo $System['URL']; ?>public/images/add_dealer.png" width="25px" height="25px" style="cursor: pointer" onclick="add_new_dealer_create();"></>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left" style="vertical-align: top">Budget</td>
        <td >
            <table class="SytemTable" style="width:700px">

                <thead>
                    <tr>
                        <td>Description</td>
                        <td>Estimated Cost Per Unit</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody id="description_body_create">


                </tbody >
                <tfoot>
                    <tr style="border-top: #666666;">
                        <td colspan="3" style="text-align: center;font-weight: bold">TOTAL</td>
                        <td id="est_total_amount_create" style="text-align: right;font-weight: bold;font-size: 20px" >0.00</td>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><fieldset style="background-color: #d7e3e5;width:675px"> <legend style="color:black;font-weight: bold;font-size: 15px">Add New Estimate</legend>
                <table style="width: 100%">
                    <tr>
                        <td>
                            <input type="text" placeholder="Description" id="new_description_create" onkeypress="check_event_s(event, 'cost_per_unit_create')"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Cost Per Unit" id="cost_per_unit_create" onkeypress="check_event_s(event, 'qty_create')"></>
                        </td>
                        <td>
                            <input type="text" placeholder="Qty" id="qty_create" style="text-align: center" onkeypress="check_event_sumbit_create(event)" ></>
                        </td>

                        <td>
                            <img  src="<?php echo $System['URL']; ?>public/images/add_item.png" width="30px" height="30px" style="cursor: pointer" onclick="add_neew_items_create();"></>
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
    </tr>
    <tr style="height: 20px"></tr>
    <tr>
        <td  align="left">Quotation</td>
        <td style="width: 90%" align="center"><div style=""><input type="file" name="userfile" size="20" /></div></></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="left" style="width:700px">
                <tr style="height: 50px"></tr>
                <tr>
                    <td align="right"><input  style="width: 200px;background-color: #446CB3;color: white" type="button" value="Submit" onclick="submit_create_campaign();"></></td>
                   
                </tr>
            </table>
        </td>
    </tr>

</table>
<input type="hidden" id="row_count_create" name="row_count_create" value="0"></>
<input type="hidden" id="estmate_row_count_create" name="estmate_row_count_create" value="0"></>
<?php echo form_close(); ?>

<body>
    <?php
    // put your code here
    ?>
</body>

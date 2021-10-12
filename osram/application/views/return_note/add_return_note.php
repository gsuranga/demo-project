<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$_instance = get_instance();

$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'onfocus' => 'get_employee();',
    "placeholder" => "Select Distributor",
    'value' => set_value('employee_name')
);

$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'type' => 'hidden',
    'value' => set_value('employee_id')
);
$discount = array(
    'id' => 'discount',
    'name' => 'discount',
    'type' => 'text',
    'value' => set_value('discount')
);
$discounttype = array(
    'id' => 'type',
    'name' => 'type',
    'type' => 'hidden',
    'value' => set_value('type')
);
$add = array(
    'id' => 'add',
    'name' => 'add',
    'type' => 'submit',
    'value' => 'Add'
);

$reset = array(
    'id' => 'reset',
    'name' => 'reset',
    'type' => 'reset',
    'value' => 'Reset'
);
?>

<form id="save_returnNote" name="save_returnNote" method="post" action="<?php echo base_url() ?>return_note/insert_return_note">
<input type="hidden" name="txtemp_place_id" id="txtemp_place_id">
<table width="100%">
    <tr>
        <td>

            <table width="100%" align="center">
                <tr>
                    <td>
                        <table border='0' align='center' width="50%">
                            <tr >
                                <td>Employee Name</td>
                                <td style="width: 50%"><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>

                            </tr>
                          <?php
                                  $userdata = $this->session->userdata('user_type');
                                  if($userdata =='Admin' || $userdata =='National Sales manager' || $userdata =='Regional Manager' || $userdata =='Area Sales Manager - User'){
                          ?>  
                            <tr>
                                <td>Territory</td>
                                <td style="width: 50%"><select name="territory_name" id="territory_name" onchange="loadPhysicalPlace();"></select></td>
                            </tr>
                            <tr>

                                <td style="width: 50%"><?php echo form_error('employee_name'); ?></td>

                                <td style="width: 50%"><?php echo form_error('territory_name'); ?></td>
                            </tr>
                            <tr>
                                <td>Outlet</td>
                                <td><select name="division_name" id="division_name" onchange="loadTerritory();" hidden="true"></select>
                                    <select name="outlet_name" id="outlet_name" onchange="loadInvoiced();"></select>
                                </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td style="width: 50%"><?php echo form_error('division_name'); ?></td>
                                <td></td>
                                <td style="width: 50%"><?php echo form_error('outlet_name'); ?></td>
                            </tr>

                                  <?php } ?>
                            <tr>
                                <td>Start Date</td>
                                <td width="50%"><input type="date" name="from" id="from" onchange="loadInvoiced();" style="width: 90%"></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td width="50%"><input type="date" name="to" id="to" onchange="loadInvoiced();" style="width: 90%"></td>
                            </tr>
                            <tr>
                                <td>Invoice No</td>
                                <td width="50%">
                                    <select name="InvoiecId" id="InvoiecId"></select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="button" value="search" id="btn_sub" name="btn_sub" onclick="show_invoice();"></td>
                            </tr>

                        </table></td>

                </tr>

                <input type="hidden" name="sales_rows_token" id="sales_rows_token" value="1">
                <input type="hidden" name="rtsales_rows_token" id="rtsales_rows_token" value="1">
            </table>
        </td>
    </tr>
    <tr>
        <td id="invoced_detais"  ></td>
    </tr>
    <tr>
        <td id="set_return"></td>
    </tr>

            

        <tr>
        <td>
    <table align="center">
            <tr>
                <td><?php echo $this->session->flashdata('insert_return'); ?></td>
            </tr>
    </table>
        </td>
    </tr>
</table>
</form>

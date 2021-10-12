<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
//$branch_id = array(
//    'id' => 'branch_id_1',
//    'name' => 'branch_id_1',
//    'type' => 'hidden'
//);
//$branch_name = array(
//    'id' => 'branch_name_1',
//    'name' => 'branch_name_1',
//    'type' => 'text',
//    'autocomplete' => 'off',
//    'onfocus' => 'get_all_branch(1);',
//    'placeholder' => 'Select Branch'
//);
$location = array(
    'id' => 'location',
    'name' => 'location',
    'type' => 'text'
);

$start_date = array(
    'id' => 'start_date',
    'name' => 'start_date',
    'type' => 'text',
    'placeholder' => "Select Date",
    'autocomplete' => 'off',
    'readonly' => 'true'
);
$start_time = array(
    'id' => 'start_time',
    'name' => 'start_time',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => "Select Time",
);
?>
<?php echo form_open('meeting_minute/createBoardMeetingMinute'); ?>
<input type="hidden" id="branch_count" name="branch_count" value="1">
<input type="hidden" id="emp_count" name="emp_count" value="1">
<table width="50%" align="center" id="tbl" style=" position: relative">
    <tr>
        <td>Meeting Type</td>
        <td>
            <select id="cmb_meeting_type"  name="cmb_meeting_type"  >
                <option value="Board Meeting">Board Meeting</option>
                <option value="Branch Meeting">Branch Meeting</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Location</td>
        <td><?php echo form_input($location); ?></td>
    </tr>
    <tr>
        <td>Purpose</td>
        <td>
            <textarea id="purpose" name="purpose" class="input" cols="35" rows="5" style="resize: none;"></textarea>
        </td>
    </tr>
    <tr>
        <td>Invites Group</td>
        <td>
            <table width="100%" id="tbl_meeting_invites">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button" onclick="add_new_meeting_invites();" src="http://localhost/dimo_lanka/public/images/add2.png">
                    </td>
                    <td>
                        <input type="text" id="txt_invites_1" name="txt_invites_1" autocomplete="off" placeholder="Select Invites Group" onfocus="get_all_group_name('1');"/>
                        <input type="hidden" id="txt_invites_id_1" name="txt_invites_id_1"/>
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                    <td>
                        <input type="button" value="Create Group" onclick="JavaScript:newPopup('drawIndexMeetingGroup?token_meeting_group=2')"/>
                    </td>
                </tr> 
                <input type="hidden" id="hidden_invites_group" name="hidden_invites_group" value="1"/>
            </table>
        </td>

    </tr>
    <tr>
        <td>Start Date</td>
        <td><?php echo form_input($start_date); ?></td>
    </tr>
    <tr>
        <td>Start Time</td>
        <td><?php echo form_input($start_time); ?></td>
    </tr>

</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_employee" name="tbl_employee" align="center">
    <thead>
        <tr>
            <td></td>
            <td>Designation</td>
            <td>Employee Name</td>
            <td>Account No</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>

                <img style="width: 20px; height: 20px" type="button" onclick="add_new_row();" src="http://localhost/dimo_lanka/public/images/add2.png">
            </td>
            <td>
                <select name="cmb_user_type_1" id="cmb_user_type_1" >
                    <option value="non">Select Designation</option>
                    <option value="Sales Officer">Sales Officer</option>
                    <option value="APM">APM</option>
                </select>  
            </td>
            <td>
                <input type="text" name="txt_employee_name_1" id="txt_employee_name_1" placeholder="Select Employee" onfocus="set_employee_name('1');" autocomplete="off">
                <input type="hidden" id="txt_employee_id_1" name="txt_employee_id_1"/>
                <input type="hidden" id="txt_employee_email_1" name="txt_employee_email_1"/>
            </td>
            <td>
                <input type="text" name="txt_account_no_1" id="txt_account_no_1" autocomplete="off">
            </td>

            <td>
                <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">

            </td>
        </tr>
    </tbody>

</table>
<table align="right">
    <tr>
        <td>
            <input type="submit" id="btn_meeting" name="btn_meeting" value="Create Meeting"/>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>

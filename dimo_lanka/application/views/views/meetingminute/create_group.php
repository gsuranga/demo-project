<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('meeting_minute/createMeetingGroup');?>
<table width="100%" cellpadding="7" cellspacing="7" align="left">
    <tr>
        <td>Group Name :</td>
        <td><input type="text" id="txt_group_name" name="txt_group_name"/></td>
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
                    <img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="http://localhost/dimo_lanka/public/images/add2.png">
<!--                    <input type="button" onclick="add_new_row();" value="+">   -->
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
<!--                    <input type="button" onclick="remove_select_row();" value="-">-->
                    <img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                </td>
            </tr>
        </tbody>
        <input type="hidden" id="emp_count" name="emp_count" value="1"/>
    </table>
    <table>
    <tr>
        <td>
            <table align="right">
                <tr>
                    
                    <td><input type="submit" id="btn_create_group" name="btn_create_group" value="Create Group"/></td>
                    <td><input type="submit" id="btn_discard" name="btn_discard" value="Discard" onclick="window_discard();"</td>

                </tr>
            </table>
        </td>
    </tr>
</table>

    
    
<?php echo form_close();?>
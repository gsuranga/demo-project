<table>
<!--    <tr hidden="true">
        <td>Emp ID</td>
        <td>
            <input type="text" name="emp_id" id="emp_id" value="<?php // echo $this->session->userdata('id_employee'); ?>" readonly="true">
        </td>
    </tr>
    <tr hidden="true">
        <td>Employee Name</td>
        <td>
            <input type="text" name="emp_name" id="emp_name" value="<?php // echo $this->session->userdata('employee_name'); ?>" readonly="true">
        </td>
    </tr>-->
    <tr>
    <input type="hidden" name="user_id1" id="user_id1" value="<?php echo $this->session->userdata('id'); ?>" readonly="true">
    </tr>
    <tr>
        <td style="width: 170px">Create Password</td>
        <td style="width: 200px">
            <input type="password" name="managepw" id="managepw"/>
        </td>
    </tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
    <tr>
        <td>Confirm Password</td>
        <td>
            <input type="password" name="confirm_passwordmanage" id="confirm_passwordmanage" onkeyup="checkPasswordManage();"/>
        </td>
    </tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
    <tr>
        <td></td>
        <td align="center">
            <input type="submit" name="pword" id="pword" onclick="UpdateUserPWD();"/>
        </td>
    </tr>
</table>
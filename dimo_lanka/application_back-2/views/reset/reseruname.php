<table>
    <tr hidden="true">
        <td>Emp ID</td>
        <td>
            <input type="text" name="emp_id" id="emp_id" value="<?php echo $this->session->userdata('id_employee'); ?>" readonly="true">
        </td>
    </tr>
    <tr hidden="true">
        <td>Employee Name</td>
        <td>
            <input type="text" name="emp_name" id="emp_name" value="<?php echo $this->session->userdata('employee_name'); ?>" readonly="true">
        </td>
    </tr>
    <tr>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('username'); ?>" readonly="true">
    </tr>
	<tr>
        <td style="width: 170px">Current User Name</td>
        <td style="width: 200px">
            <input readonly="true" type="text" name="currusernamemanage" id="currusernamemanage" value="<?php echo $this->session->userdata('username'); ?>">
            <input readonly="true" type="hidden" name="currusernamemanage1" id="currusernamemanage1" value="<?php echo $this->session->userdata('id'); ?>">
        </td>
    </tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
    <tr>
        <td>New User Name</td>
        <td>
            <input type="text" name="usernamemanage" id="usernamemanage" placeholder="Enter New Usename">
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
            <input type="submit" name="pword" id="pword" onclick="UpdateUserName();"/>
        </td>
    </tr>
</table>
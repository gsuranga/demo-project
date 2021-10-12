<?php
/**
 * Description of viewAllDivType
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
$_instance = get_instance();

$EmpName = array(
    "id" => "emp_name",
    "name" => "emp_name",
    "type" => "text",
    'placeholder' => 'Select Employee',
    "onfocus" => "getEmpName();"
);
$nic = array(
    "id" => "nic",
    "name" => "nic",
    "type" => "text",
    'placeholder' => 'Select Nic',
    "onfocus" => "getEmpNIC();"
);

$Mobile = array(
    "id" => "mobile",
    "name" => "mobile",
    "type" => "text",
    'placeholder' => 'Select Mobile No',
    "onfocus" => "getEmpMobile();"
);
$Tel = array(
    "id" => "tel",
    "name" => "tel",
    "type" => "text",
    'placeholder' => 'Select Telephone No',
    "onfocus" => "getEmpTele();"
);
$Email = array(
    "id" => "email",
    "name" => "email",
    "type" => "text",
    'placeholder' => 'Select Email',
    "onfocus" => "getEmpEmail();"
);

$EmpNo = array(
    "id" => "id_emp",
    "name" => "id_emp",
    "type" => "hidden"
);

$GetEmpNo = array(
    "id" => "id_empl",
    "name" => "id_empl",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('employee/drawViewEmployee'); ?>
<table  width="60%" align="center">





<!--    <tr>
        <td>Employee Mobile</td>
        <td><?php echo form_input($Mobile); ?></td>
        <td><?php echo form_input($EmpNo); ?></td>
        <td></td>

        <td>Employee Gender</td>
        <td>
            <select name="gender" id="gender">
                <option value="">All</option>
                <option >Male</option>
                <option >Female</option>


            </select>

        </td>
    </tr>-->
    <tr>
<!--        <td>Employee Telephone</td>
        <td><?php echo form_input($Tel); ?></td>
        <td><?php echo form_input($EmpNo); ?></td>

        <td></td>-->
        <td> Status </td>
        <td>
            <select name="status_name" id="status_name">
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>


            </select>

        </td>
    </tr>
    <tr>
        <td>Employee Name</td>
        <td><?php echo form_input($EmpName); ?></td>
        <td><?php echo form_input($GetEmpNo); ?></td>

        <td></td>
        <td>Employee Type</td>
        <td>
            <select name="employee_type" id="employee_type" class="select">
                <option>All</option>
                <?php $_instance->allEmployeeTypestoCombo(); ?></select>
            
        </td>

  



    </tr>
<!--    <tr>
        <td>Employee NIC</td>
        <td><?php echo form_input($nic); ?></td>
        <td><?php echo form_input($EmpNo); ?></td>
    </tr>-->
    
    <tr>
<!--        <td>Employee Email</td>-->
        <td><?php// echo form_input($Email); ?></td>
        <td><?php echo form_input($EmpNo); ?></td>
    </tr>


    <tr>
        <td></td>
        <td></td>

    </tr>

    <tr>
        <td></td>
        <td><?php echo form_input($btn); ?></td>

    </tr>



</table>
<?php echo form_close(); ?>

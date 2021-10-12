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

$emptype = array(
    "id" => "emptype",
    "name" => "emptype",
    "type" => "text",
    'placeholder' => 'Select Employeee Type',
    "onfocus" => "get_emp_type_name();"
);

$emptypeNo = array(
    "id" => "id_employee_type",
    "name" => "id_employee_type",
    "type" => "hidden"
);


$btn = array(
    "id" => "bt_search",
    "name" => "bt_search",
    "type" => "submit",
    "value" => "Search"
);
?>
<?php echo form_open('employee_type/drawIndexViewEmployeeType'); ?>
<table  width="60%" align="center">

    <tr>
            <td>Employee Type</td>
            
        <td><?php echo form_input($emptype); ?></td>
        <td><?php echo form_input($emptypeNo); ?></td> 

            
        </tr>

    <tr>
            <td>Status</td>
            <td>
                <select name="status_name" id="status_name">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                   
                </select>

            </td>
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

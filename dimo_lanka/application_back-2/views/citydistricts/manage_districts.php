<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *  @author Iresha Lakmali
 */

$u_district_code = array(
    'id' => 'u_district_code',
    'name' => 'u_district_code',
    'type' => 'text'
//    'automcomplete' => 'off'
);
$u_district_name = array(
    'id' => 'u_district_name',
    'name' => 'u_district_name',
    'type' => 'text'
);
$u_district = array(
    'id' => 'udelete_area',
    'name' => 'udelete_area',
    'type' => 'submit',
    'value' => 'Update'
);
$district_id = array(
    'id' => 'district_id',
    'name' => 'district_id',
    'type' => 'hidden'
);
?>
<?php echo form_open('citydistricts/updateDistricts'); ?>
<table width="60%" align="center">

    <tr>
        <td>District Code</td>
        <td>
<?php echo form_input($u_district_code, $_GET['token_district_code']); ?>
            <?php echo form_input($district_id, $_GET['token_district_id']); ?>

        </td>    
    </tr>
    <tr>
        <td>District Name</td>
        <td><?php echo form_input($u_district_name, $_GET['token_district_name']); ?></td>

    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                 
                    <td><?php echo form_input($u_district); ?></td> 

                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
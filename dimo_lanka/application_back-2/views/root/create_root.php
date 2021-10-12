<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
$root_account_no = array(
    'id' => 'root_account_no',
    'name' => 'root_account_no',
    'type' => 'text'
);
$root_name = array(
    'id' => 'root_name',
    'name' => 'root_name',
    'type' => 'text',
    
    
);
$area = array(
    'id' => 'area',
    'name' => 'area',
    'type' => 'text',
    'autocomplete' => 'off',
     'onfocus' => 'get_area();',
    'placeholder'=>'select area'
);

$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Submit',
    'class' => 'classname'
);

$res = array(
    'id' => 'reset_s_o',
    'name' => 'reset_s_o',
    'type' => 'RESET',
    'value' => 'Clear',
);
?>

<?php echo form_open('root/addRoot'); ?>
<table width="100%">
    <tr><input type="hidden" id="branchid" name="branchid"> </input></tr>
 <tr><input type="hidden" id="areaid" name="areaid"> </input></tr>
    <tr>
        <td>Root Account No</td>
        <td>
            <?php echo form_input($root_account_no) ?>

        </td>
    </tr>   
    <tr>
        <td>Root Name</td>
        <td>
            <?php echo form_input($root_name) ?>
            

        </td>
    </tr>   
    <tr style="height:20px">

    </tr>

    <tr>
        <td>Area</td>
        <td>
            <?php echo form_input($area) ?>

        </td>
    </tr>   


   
<tr>
    <td></td>
    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_input($res); ?></td>

</tr>






</table>
<? form_close('')?>


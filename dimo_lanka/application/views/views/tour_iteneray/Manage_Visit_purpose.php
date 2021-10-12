<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Shamil ilyas
 */
?>
<?php
$Purpose_name = array(
    'id' => 'Purpose_name',
    'name' => 'Purpose_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$Purpose_des = array(
    'id' => 'Purpose_des',
    'name' => 'Purpose_des',
    'type' => 'textarea',
    'class' => 'input',
    'cols' => '35',
    'rows' => '5'
    
);



$purpose_ID = array(
    'id' => 'Purpose_Id',
    'name' => 'Purpose_Id',
    'type' => 'hidden',
    'autocomplete' => 'off'
);

$PurposeCode = array(
    'id' => 'purpose_code',
    'name' => 'purpose_code',
    'type' => 'text',
    'autocomplete' => 'off'
);

$update_Purpose = array(
    'id' => 'update_Purpose',
    'name' => 'update_Purpose',
    'type' => 'submit',
    'value' => 'Update'
);
$Delet_Purpose = array(
    'id' => 'delete_Purpose',
    'name' => 'delete_Purpose',
    'type' => 'submit',
    'value' => 'Delete'
);

$_instance = get_instance();
?>
<?php echo form_open('tour_iteneray/manageVisitPurpose'); ?>
<table>
    <tr>
        <td>Category Name</td>
        <td>
            <?php echo form_input($Purpose_name, $_GET['token_visitPur_name']); ?>
            <?php echo form_input($purpose_ID, $_GET['token_visitPur_id']) ?>    
        </td>
        
    </tr>
    <tr>
        <td>Code</td>
        <td><?php echo form_input($PurposeCode, $_GET['token_visitpur_code']); ?></td>
    </tr>
    <tr>
     <td>Description</td>
        
            <td>
        <textarea id="Purpose_des" name="Purpose_des"  class="input" cols="35" rows="5"><?php echo $_GET['token_visitPur_des'] ?></textarea>

           
           
           
            </td>
</tr>
        <td></td>
        <td>
            <table align="center">
                <tr>
                    <td></td> 
                    <td><?php echo form_input($update_Purpose); ?></td> 

                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>

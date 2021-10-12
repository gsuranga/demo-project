<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Shamil ilyas
 */
?>
<?php
$categary_name = array(
    'id' => 'categary_name',
    'name' => 'categary_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$categary_ID = array(
    'id' => 'categary_Id',
    'name' => 'categary_Id',
    'type' => 'hidden',
    'autocomplete' => 'off'
);

$Code = array(
    'id' => 'code',
    'name' => 'code',
    'type' => 'text',
    'autocomplete' => 'off'
);

$update_Category = array(
    'id' => 'update_Category',
    'name' => 'update_Category',
    'type' => 'submit',
    'value' => 'Update'
);
$Delet_Category = array(
    'id' => 'delete_Category',
    'name' => 'delete_Category',
    'type' => 'submit',
    'value' => 'Delete'
);

$_instance = get_instance();
?>
<?php echo form_open('tour_iteneray/manageVisitCategory'); ?>
<table>
    <tr>
        <td>Category Name</td>
        <td>
            <?php echo form_input($categary_name, $_GET['token_visit_name']); ?>
            <?php echo form_input($categary_ID, $_GET['token_visit_id']) ?>    
        </td>
    </tr>
    <tr>
        <td>Code</td>
        <td><?php echo form_input($Code, $_GET['token_visit_code']); ?></td>
    </tr>
    
        <td></td>
        <td>
            <table align="center">
                <tr>
                    <td></td> 
                    <td><?php echo form_input($update_Category); ?></td> 

                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>

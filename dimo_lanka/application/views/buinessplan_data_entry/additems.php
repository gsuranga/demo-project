<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$nofevents = array(
    'id' => 'nofevents',
    'name' => 'nofevents',
    'type' => 'text',
    'autocomplete' => 'off'
);

$submit = array(
    'id' => 'submit',
    'name' => 'submit',
    'type' => 'submit',
    'value' => 'Submit',
    'onclick' => 'submititems();',
);


$_instance = get_instance();
?>

<?php // echo form_open('buinessplan_data_entry/createSwotAnalysis'); ?>
<form>
        <table width="90%">
    <thead>
    <td width="25%"></td>
    <td width="25%"></td>
    <td width="5%"></td>
    <td width="20%"></td>
    <td width="25%"></td>
</thead>

<tr>

</tr>
<tr>
    <td>Item :</td>
    <td><input type="text" id="itemnew" required></td>
</tr>
<tr>
    <td>Status:</td>
    <td><input id="status" type="text" required></td></tr>
<tr>
    <td>Sub Status:</td>
    <td><input id="sb_Status"  type="text" required></td></tr>
<tr>
    <td>Cost Per Item:</td>
    <td><input id="cost" type="text" required></td></tr>
    	
        <td></td> 
        <td></td>

</tr>

<tr>
    
     <td>
       
        <?php echo form_input($submit); ?>
    </td>
   
</tr>

</table>
    
</form>

    
  
<?php // echo form_close(''); ?>

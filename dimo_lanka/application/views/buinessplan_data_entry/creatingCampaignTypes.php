<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
#mytb {
    
    border-collapse: collapse;
    width: 100%;
}

#myth, .mytd {
    text-align: left;
    padding: 12px;
}

/*tr:nth-child(even){background-color: #f2f2f2}*/

#myth {
    background-color: #3B84A8;
    color: white;
}
</style>
<?php
$nofevents = array(
    'id' => 'nofevents',
    'name' => 'nofevents',
    'type' => 'text',
    'autocomplete' => 'off',
    'required' =>'required'
);

$submit = array(
    'id' => 'submit',
    'name' => 'submit',
    'type' => 'submit',
    'value' => 'Submit',
    'onclick' => 'submitCrearingCtype();',
);

$save = array(
    'id' => 'save',
    'name' => 'save',
    'type' => 'submit',
    'value' => 'Save',
    'onclick' => 'savingCrearingCtype();',
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
    <td>Description :</td>
    <td><input type="text" id="dscription" name="dscription" required></td>
</tr>
<tr>
    <td>Select Items:</td>
    
    <td><select id="items" required>
            <option selected value="0">Select Items</option>
        </select></td>
        <td></td> 
        <td></td> <td>
<table id="mytb">
  <tr>
    <th id="myth">Item Name</th>
    <th id="myth">Status</th>
    <th id="myth">Sub Status</th>
    <th id="myth">cost per unit</th>
  </tr>
<tbody id="mytb_body">
</tbody>
</table></td>

</tr>

<tr>
    <td>Number Of Events Per Branch:</td>
    <td>
        <?php echo form_input($nofevents); ?>
    </td>
   
</tr>
<tr>
    
     <td>
        <?php echo form_input($save); ?>
        <?php echo form_input($submit); ?>
    </td>
   
</tr>

</table>
    
</form>

    
  
<?php // echo form_close(''); ?>
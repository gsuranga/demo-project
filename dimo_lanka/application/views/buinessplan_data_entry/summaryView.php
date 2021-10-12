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
#mytbDetail {
    border-collapse: collapse;
    width: 75%;
}

th, .mytd {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #3B84A8;
    color: white;
}
</style>
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
    'type' => 'button',
    'value' => 'Search',
    'onclick' => 'getallCompaignSummary();',
);


$_instance = get_instance();
?>

<?php // echo form_open('buinessplan_data_entry/createSwotAnalysis'); ?>
<form>
        <table width="90%">
    <thead>
    <td width="10%"></td>
    <td width="25%"></td>
    <td width="5%"></td>
    <td width="20%"></td>
    <td width="25%"></td>
</thead>

<tr>

</tr>
<tr>
    <td>Branch Name:</td>
    <td><input type="text" id="branch" onfocus="getallBranches()"></td>
    <td hidden><input type="text" id="branchId" ></td>
</tr>


<tr>
    
     <td>
       
        <?php echo form_input($submit); ?>
    </td>
   
</tr>

</table>
    
</form>


    
  
<?php // echo form_close(''); ?>



<h3>Summary View</h3>

<table id="mytb">
  <tr>
    <th>Campaign Type</th>
    <th>description</th>
    <th>January</th>
    <th>February</th>
    <th>March</th>
    <th>April</th>
    <th>May</th>
    <th>June</th>
    <th>July</th>
    <th>August</th>
    <th>September</th>
    <th>October</th>
    <th>November</th>
    <th>December</th>
    <th>entitlement</th>
    <th>utilized</th>
  </tr><tbody id="newID">
  <tr>
    
  </tr></tbody>
  
</table>

<h3> Detailed view
 </h3>
<table id="mytbDetail">
  <tr>
      <th rowspan="2">Month</th>
    <th rowspan="2">Campaign Type</th>
    <th rowspan="2">Description</th>
    <th colspan="3" align="center">Cost</th>
    <th rowspan="2">Targeted Dealers</th>
    <th rowspan="2">Branch</th>
  </tr>
  <tr>
      <th>Event</th>
      <th>Complementary</th>
      <th>Total</th>
  </tr>
  <tbody id="detailView"></tbody>
  
</table>
<hr>
<input type="button" onclick="completeSubmit()" value="Submit">
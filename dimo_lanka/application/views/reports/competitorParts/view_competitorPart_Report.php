<script type="text/javascript">
    $j(document).ready(function () {
        var s = $j('#accepted_order_tbl').dataTable();
        setupDataTableSettings(true, false, true, [30, 60, 90, 110], 'accepted_order_tbl', true, true);
    });
    
</script>

<?php
$com_partNo = array(
    'id' => 'com_partNo',
    'name' => 'com_partNo',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Part Number',
    'onfocus' => 'getAllParts();',
);
$com_sales = array(
    'id' => 'com_sales',
    'name' => 'com_sales',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Area Sales Office ',
    'onfocus' => 'getsalesOffice();',
);
$dealer = array(
    'id' => 'dealer',
    'name' => 'dealer',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Dealer Account Number',
    'onfocus' => 'getDealer();',
);
$btn_search = array(
    'id' => 'btn_search',
    'name' => 'btn_search',
    'type' => 'button',
    'value' => 'Search',
    'onclick' => 'getsearchCompetitParts();'
);
$hidden_dealer_id = array(
    'id' => 'hidden_dealer_id',
    'name' => 'hidden_dealer_id',
    'type' => 'hidden'
);

$start_date = array(
    'id' => 'com_start_date',
    'name' => 'com_start_date',
    'type' => 'text',
    'placeholder' => "Start date",
    'autocomplete' => 'off',
   // 'readonly' => 'true'
);
$end_date = array(
    'id' => 'com_end_date',
    'name' => 'com_end_date',
    'type' => 'text',
    'placeholder' => "End Date",
    'autocomplete' => 'off',
   // 'readonly' => 'true'
);
?>
<table width="100%" align="center">
     <tr>
      <td style="width:250px;">
           <?php echo form_input($dealer); ?></td>
       <td >  <?php echo form_input($com_sales); ?></td>
        
        
       
        
        <td><?php echo form_input($start_date); ?></td>
       
        <td style="width:250px;"><?php echo form_input($end_date); ?></td>
       
        
         <td><?Php echo form_input($hidden_dealer_id); ?></td>
        
        
     </tr>
     <tr>
        <td style="width:250px;">
        <?php echo form_input($com_partNo); ?></td>
    <td style="width:250px;"> <input type="text" placeholder="Description" id="res1"  ></td>
<td style="width:250px;"> <input type="text" placeholder="Model" id="res2"  ></td>
     <td><?php echo form_input($btn_search); ?></td>
     
       
</tr>
       
       
        
         
        
        
      
</table>

<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="accepted_order_tbl" border="1">
    <thead>

    <tr>
        <th rowspan="2" style="background-color: #FFEF42" >Dealer Name</th>
        <th rowspan="2" style="background-color: #FFEF42" >Account Number</th>
        <th rowspan="2" style="background-color: #FFEF42" >ASO Name</th>
        <th rowspan="2" style="background-color: #FFEF42" >Number of days since the entry</th>
        <th colspan="5" style="background-color: #424f5c;color: #fff">
        TATA Genuine Part
               </th>
        <th colspan="7" style="background-color: #A2A2A2;color: #fff" >Competitor part</th>
        
        <th rowspan="2" style="background-color: #FFEF42">Market share overall</th>
        <th rowspan="2" style="background-color: #FFEF42">Overall TGP movement in the area</th>
        <th  rowspan="2" style="background-color: #FFEF42">Upload</th>
        <!--<th  rowspan="2" style="background-color: #FFEF42">View</th>-->
 </tr>
 <tr>
        <th style="background-color: #FFEF42" >TGP No</th>
        <th style="background-color: #FFEF42">Description</th>
        <th style="background-color: #FFEF42">Selling Price with VAT</th>
        <th style="background-color: #FFEF42">Movement of TGP to the Dealer</th>
        <th style="background-color: #FFEF42">Part Number</th>
    
        <th style="background-color: #FFEF42">Brand</th>
        <th style="background-color: #FFEF42">Importer</th>
        <th style="background-color: #FFEF42">Cost price to the Dealer</th>
        <th style="background-color: #FFEF42">Selling Price to the customer</th>
        <th style="background-color: #FFEF42">Average Monthly Movement</th>
        <th style="background-color: #FFEF42">Overall Movement at the Dealer</th>
        <th style="background-color: #FFEF42;">Market share with the brand</th>
        

</tr>
</thead>
<tbody id="tbl_acc_body">
       <?php
        if (isset($extraData)) {
            foreach ($extraData as $value) {
                ?>
        
        
        <tr>
            
                    <td ><?php echo $value->delar_name?></td>
                    <td ><?php echo $value->delar_account_no ?></td>
                    <td ><?php echo $value->sales_officer_name?></td>
                    <td ><?php echo $value->dateDiff ?></td>         
                    <td ><?php echo $value->item_part_no ?></td>
                    <td ><?php echo $value->description ?></td>
                    <td ><?php echo $value->selling_price ?></td>
                    <td ><?php echo $value->qtytot ?></td>
                    <td ><?php echo $value->non_tgp_part_no ?></td>
                    <td ><?php echo $value->brand?></td>
                    <td ><?php echo $value->non_tgp_importer ?></td>
                    <td ><?php echo $value->non_tgp_cost_price ?></td>
                    <td ><?php echo $value->non_tgp_selling_price ?></td>
                    <td ><?php echo $value->non_tgp_current_movement ?></td>
                    <td ><?php echo $value->non_tgp_overall_movement ?></td>
                    <td ><?php echo ($value->xql)*100 ?>%</td>
                    <td ><?php echo ($value->xax)*100 ?>%</td>
                    <td ><?php echo $value->areatot ?></td>
                    <?php  $img = $System['URL'].$value->part_image; ?>
                    <td ><img id="imgs" style="width: 50px;height: 70px;" src="<?php echo $img; ?>"  onclick="comPartImg(id);"></td>
                    <!--<td ><img id="acc_view_id" width="20" height="20" src="<?php // echo $System['URL'] ?>public/images/view.png" onclick="comPartbox(id);"></td>-->
       </tr>
        <?php
              
            }
           
       
            }
        ?> </tbody>
 
</table>     

<div style="display:none">
    
  <div id='viewImg' style='padding:0px;border:1px soild black;min-height: 500px;height:100px;width: 80px'> 
    
<!--      <img style="width:400px;height: 500px;" src="<?php  echo $img ; ?>">-->
   
      
 
</div>  
    
</div>     
 <div style='display:none;'>
<div id='acc_orders_div' style='padding:0px;border:1px soild black;min-height: 500px;height:100px;'> 
    

    <table hidden="true" style="alignment-adjust: middle"width="100%" class="CSSTableGenerator" cellpadding="0" cellspacing="0" name="execel_po1" id="execel_po1">

            <tr><td><p>Test</p></td></tr>

        </table>
      
 <input type="button" id="to_exel" value="To Exel"  onclick="reportToExcel('execel_po1', 'name');"/>
</div>
 </div>
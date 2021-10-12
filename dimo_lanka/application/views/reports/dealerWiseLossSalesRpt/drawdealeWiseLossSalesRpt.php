<script type="text/javascript">
    $j(document).ready(function () {
        var s = $j('#accepted_order_tbl').dataTable();
        setupDataTableSettings(true, false, true, [30, 60, 90, 110], 'accepted_order_tbl', true, true);
    });
    
</script>
<style type="text/css">
    
 .SytemTablenew {
    margin: 0px;
    padding: 0px;
    border:solid 1px #cccccc;
    -webkit-border-radius: 4px;
    -moz-border-radius:4px;
    -ms-border-radius:4px;
    border-radius: 4px;
}   
    .SytemTablenew td{
    padding:8px;
    color:#666666;
}
.SytemTablenew thead tr{
    /*background-color: #67C76F;*/
    background-image:url(tableheader.jpg);
    background-repeat:repeat-x;
    background-position:center;
}
.SytemTablenew thead tr td{
    text-align:center;
    font-weight:700;
    padding-top:11px;
    padding-bottom:11px;
}
.SytemTablenew tbody tr{
    background-color: #EAEAEA;
}
.SytemTablenew tbody tr td{
    border-top:solid 1px #cccccc;
    border-right:solid 1px #cccccc;
}
.SytemTablenew tbody tr td:last-child{
    border-top:solid 1px #cccccc;
    border-right:none;
}
.SytemTablenew thead tr td{
    border-right:solid 1px #FFFFFF;
}
.SytemTablenew thead tr td:last-child{
    border-right:none;
}
.SytemTablenew thead tr td:last-child{
    -webkit-border-radius: 0px 4px 0px 0px;
    -moz-border-radius:0px 4px 0px 0px;
    -ms-border-radius:0px 4px 0px 0px;
    border-radius: 0px 4px 0px 0px;
}
.SytemTablenew thead tr td:first-child{
    -webkit-border-radius: 4px 0px 0px 0px;
    -moz-border-radius:4px 0px 0px 0px;
    -ms-border-radius:4px 0px 0px 0px;
    border-radius: 4px 0px 0px 0px;
}
.SytemTablenew tbody tr:last-child td:last-child{
    -webkit-border-radius: 0px 0px 4px 0px;
    -moz-border-radius:0px 0px 4px 0px;
    -ms-border-radius:0px 0px 4px 0px;
    border-radius: 0px 0px 4px 0px;
}
.SytemTablenew tbody tr:last-child td:first-child{
    -webkit-border-radius: 0px 0px 0px 4px;
    -moz-border-radius:0px 0px 0px 4px;
    -ms-border-radius:0px 0px 0px 4px;
    border-radius: 0px 0px 0px 4px;
}
.SytemTablenew tbody tr:nth-child(odd){ background-color:#FFFFFF; }
.SytemTablenew tbody tr:nth-child(even)    { background-color:#f7f7f7; }
.SytemTablenew tbody tr:hover{
    background-color: #e5ecd4;
}

    
    
    
</style>
<?php  

if(isset($_REQUEST['no'])){
   $aso =$_REQUEST['no'];  
   $sales_officer = array(
    'id' => 'sales_officer',
    'name' => 'sales_officer',
    'type' => 'text',
    'autocomplete' => 'off',
    //'placeholder'=>'Sales officer',
    'value'=>$aso
           
           
           
       
);
   
   ?>
<script> 
  function asoLog(){
       
            var log = $j('#sales_officer').val();
            var z=log;
//            alert(z);
           getalldelr(z);
           getponumbers(z);
           invoiceNumber(z);
           getalldelrAcc(z);
        }
        
       window.onload = function(){
       asoLog();
      };
</script>  
       
       
       <?php
}else{
$sales_officer = array(
    'id' => 'sales_officer',
    'name' => 'sales_officer',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Sales officer',
    'onfocus' => 'getSalesOfficer();',
);

}
?>

<?php



$dealer_name = array(
    'id' => 'dealer_name',
    'name' => 'dealer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Dealer Name',
    'onfocus' => 'getdelarName();',
);
$dealer_accNo = array(
    'id' => 'dealer_accNo',
    'name' => 'dealer_accNo',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>'Dealer Account Number',
    'onfocus' => 'getDealerAccNo();',
);

$submit_dlr_search = array(
    'id' => 'submit_dlr_search',
    'name' => 'submit_dlr_search',
    'type' => 'button',
    'value' => 'Search',
   'onclick' => 'getDealrWLoss();'
);
$hidden_dealer_id = array(
    'id' => 'hidden_dealer_id',
    'name' => 'hidden_dealer_id',
    'type' => 'hidden'
);


$podate = array(
    'id' => 'podate',
    'name' => 'podate',
    'type' => 'text',
    'placeholder' => "Purchase Order Date",
    'autocomplete' => 'off',
   // 'readonly' => 'true'
);
?>


<table width="100%" align="center">
    <tr>    
         
   
        <td><?php echo form_input($sales_officer); ?></td>
        </td>
         
<!--        <td><?php // echo form_input($dealer_name); ?></td>
        </td>
       
         <td><?php // echo form_input($dealer_accNo); ?></td>
         </td>-->
         
         <td><select id="del" onchange="delaC(value);">
                         <option id="0" selected>Dealer</option>
                     </select></td>
         <td><select id="delAcc" onchange="delrN(value);getDelponumbers(value);">
                 <option value="0" selected>Dealer Account No</option>
                     </select></td>
                     
                     <td><select id="res2" onchange="invoiceGet(value);" required>
                             <option value="0" selected>Invoice Number</option>
                     </select></td>
       
         
        <td><select id="resl" onchange="ponumberGet(value);" required>
                <option value="0" selected>Select Order Number</option>
                     </select></td>
                 
       
         <td><?php echo form_input($podate); ?></td>
         
         <td><?php echo form_input($hidden_dealer_id); ?></td>
         <td><?php echo form_input($submit_dlr_search); ?></td>
    
       
       
        
        
      
</table>


<style type="text/css">
        span{
            font-size: 25;
            color: #0000bf;
            
        }label{
            
            width: 35px;
        }
        
    </style>
    
    <table>
        <tr>
   
            <td>Invoice Number:</td><td><input type="text" id="test1" onfocus="getinvoice();"></td></tr>
    <tr><td> WIP Number: </td>   <td>             <span id="test2"></span> </td></tr>
    <tr><td>Date Invoiced:   </td> <td>       <span id="test3"></span> </td></tr>
    <tr><td> Time:      </td>     <td>           <span id="test4"></span> </td></tr>
 </table>
    
    
    <hr>
    <div style="width:100%">  
       
        <div style="width:45%;float: left">
             <label><b>Order:</b></label>
<table  width="100%" class="SytemTablenew" cellpadding="0" cellspacing="0"  border="1">
    <thead>

    <tr>
        <th style="background-color: #cccccc;color: #000" >Part Number</th>
        <th style="background-color: #cccccc;color: #000" >Description</th>
        <th style="background-color: #cccccc;color: #000" >Unit Price(Rs)</th>
        <th  style="background-color: #cccccc;color: #000" >Order Qty</th>
<!--        <th  style="background-color: #FFEF42" >Invoice Qty</th>
        <th style="background-color: #424f5c;">Loss Sales</th>-->
        
     </tr>

    </thead>
 <tbody id="tbl_acc_body_a">
        <?php
        if (isset($extraData['a'])) {
            $tot = 0;
            foreach ($extraData['a'] as $value) {
                ?>
        <tr style="cursor: pointer">
                    <td ><?php echo $value->item_part_no ?></td>
                    <td > <?php echo $value->description ?></td>
                    <td > <?php echo $value->sellP ?></td>
                    <td style="color: #009933;"><?php echo $value->item_qty ?></td>     
                    <!--<td ><?php // echo $value->qty ?></td>-->
                    <!--<td ><?php // echo $value->loss ?></td>-->
 
        </tr>
        
        <?php 
//                          $tot =   $tot + $value->lossS ;
//
//                          $value->lossS ?>

 <?php
            }
          
            ?>
        </tbody>
<!--        <tr><td></td>
                        
                    <td ><?php // echo "Total"  ?></td>
                    <td ><?php // echo $tot;  ?></td></tr>      -->

<!--<input type="text" value=""> -->

         <?php   
           
        }else{
            ?>
        
        <tr><td>No Data</td></tr>
        
        <?php
        
        
        }
        ?> 
        
</table>     
        </div>
        <!--<div style="width:2%"></div>-->
        <div style="width:10%;">
           
   
        </div>
        <div style="width:45%;float: right">
            <label><b>Invoiced:</b></label>
<table  width="100%" class="SytemTablenew" cellpadding="0" cellspacing="0" border="1">
    <thead>

    <tr>
        <th style="background-color:#cccccc;color: #000" >Part Number</th>
<!--        <th style="background-color: #FFEF42" >Description</th>
        <th  style="background-color: #FFEF42" >Order Qty</th>-->
        <th  style="background-color: #cccccc;color: #000" >Invoice Qty</th>
<!--        <th style="background-color: #424f5c;">Loss Sales</th>-->
        
           </tr>

    </thead>
 <tbody id="tbl_acc_body_b">
        <?php
        if (isset($extraData['b'])) {
            $tot = 0;
            foreach ($extraData['b'] as $value) {
                ?>
        <tr style="cursor: pointer">
                    <td ><?php echo $value->part_no ?></td>
                    
                    <td style="color:#990000"><?php echo $value->qty ?></td>     
                   
                    
 
        </tr>
        
        <?php 
//                          $tot =   $tot + $value->lossS ;
//
//                          $value->lossS ?>

 <?php
            }
          
            ?>
        </tbody>
<!--        <tr> <td ></td>
                    <td > </td>
                    <td ></td>     
                    <td ><?php // echo "Total"  ?></td>
                    <td ><?php // echo $tot;  ?></td> </tr>      -->

<!--<input type="text" value=""> -->

         <?php   
           
        }else{
            ?>
        
        <tr><td>No Data</td></tr>
        
        <?php
        
        
        }
        ?> 
</table>     
        </div>
    </div>
    
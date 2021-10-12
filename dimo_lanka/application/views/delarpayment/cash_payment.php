<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 * 
 */



 $typename = $this->session->userdata('typename');
 $user = $this->session->userdata('username');
 //Sales Officer
    if ($typename == "Sales Officer") {?>

<?php
$cash_ammount = array(
    'id' => 'txt_cash',
    'name' => 'txt_cash',
    'type' => 'text',
    'disabled'=>'disabled',
  //  'onkeydown' => 'setCalculation();',
    'onkeyup' => 'validateAmount();setCalculation();'
);
?>

<table width="40%" id="tbl_cash">
    <tr>
        <td>Enter Cash Amount</td>
        <td><?php echo form_input($cash_ammount); ?></td>
    </tr>
    

</table>
    <?php   } ?>
<?php
  if ($typename == "Super Admin" || $typename == "payment" ) {?>

  <table style="alignment-adjust: middle"width="100%" class="SytemTable" cellpadding="0" cellspacing="0"  id="tbl_cash">
    <thead >
        <tr>
            <td hidden="hidden">Delaer Return ID</td>
            <td>Voucher number</td>
            <td>Amount</td>
            <td>Remarks</td>
            <td>Image</td>
            
        </tr>
    </thead>
    <tbody >
        
        <?php
     $paht =  base_url();
    //echo $value->img_path;
        if ($extraData != Array ( )) {
            $return_o_id = 0;
            foreach ($extraData as $value) {
               
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" value="<?php echo $value->deliver_order_id; ?>"></td>
                    <td><?php echo $value->voucher_no; ?></td>
                    <td><?php echo $value->cash_payment; ?></td>
                    <td><?php echo $value->remarks; ?></td>
                    <td><img width="80" height="40" src="<?php echo $paht.$value->img_path; ?>" ></td>
                    <td>
                    
                   <input type="button"  name="view_btn"   value="Print" onclick="getgargepayprint(<?php echo $value->voucher_no; ?>,<?php echo $value->deliver_order_id; ?>);" />
                   <?php if( !$value->inprogress == '4'){ ?>
                   <input type="button"  name="view_btn" id="" style="background-color: green" value="In Progress" onclick="inprogresspayment('<?php echo $value->deliver_order_id;?>','<?php echo $value->voucher_no; ?>','<?php echo $user; ?>');" />
                    
            <?php } ?>
                   <input type="button"  name="view_btn" id="" value="Approve" onclick="submitpayment('<?php echo $value->deliver_order_id;?>','<?php echo $user; ?>','<?php echo $value->voucher_no; ?>');" />
                   <input type="button"  name="view_btn" id="" value="Reject" style="background-color: red" onclick="rejectpayment('<?php echo $value->deliver_order_id;?>','<?php echo $value->voucher_no; ?>','<?php echo $user; ?>');" /></td>
                </tr>
                <?php
                $return_o_id++;
            }
        } else {
            ?>
            <tr><td>No Pending Orders<td></tr>
            <?php
        }
        ?> 
    </tbody>
   

</table>

<?php }?>




<div id="cashprint" hidden>
    
    <h1>Garage Loyalty Scheme</h1>
    <label id="date"></label>
    <label id="time"></label>
    
    <table>
        
        <tbody id="Acc_order_detailcash">
            
            
        </tbody>
        
    </table>
       
    
    
</div>


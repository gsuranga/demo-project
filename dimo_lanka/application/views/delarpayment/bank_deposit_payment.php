<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $typename = $this->session->userdata('typename');
 $user = $this->session->userdata('username');
 //Sales Officer
    if ($typename == "Sales Officer") {?>

<body>
    <input type="hidden" name="depost_rows" id="depost_rows" value="1">
<table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="deposit_table" >
    <thead>
        <tr>
            <td>Bank Name</td>
            <td>Account No</td>
            <td>Amount</td>
            <td>Deposit Date</td>
            <td>Deposit Slip Image</td>
            <td>Remove</td>
        </tr>
    </thead>
    <tr>
        <td>
           <select name="decmb_banks_1" id="decmb_banks_1">
                <option value="non">select bank</option>
           </select>  
        </td>
        <td>
            <input type="text" name="detxt_chq_1" id="detxt_chq_1" autocomplete="off">
        </td>
        <td>
            <input type="text" name="detxt_amount_1" id="detxt_amount_1" autocomplete="off" onkeyup="setCalculation();">
        </td>
        <td>
            <input type="text" name="detxt_cl_1" id="detxt_cl_1" onmouseover="derl_date('1');" readonly="true" autocomplete="off" placeholder="Select Date" >
        </td>
        <td align="center"><input type="file" name="filb1" value="" autocomplete="off"></td>
    </tr>
     <tfoot>
        <tr>
            <td align="left">
                <input type="button" onclick="add_new_row1();" value="New Deposit">
            </td>
        </tr>
    </tfoot>
</table>
    
        <?php   } ?>
<?php
  if ($typename == "Super Admin" || $typename == "payment" ) {
    
?>
 <table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="deposit_table" >
    <thead >
        <tr>
           <td>Bank Name</td>
            <td>Account No</td>
            <td>Amount</td>
            <td>Deposit Date</td>
            <td>Deposit Slip Image</td>
            
            
        </tr>
    </thead>
    <tbody>
        
        <?php
     $paht =  base_url();
    //echo $value->img_path;
        if ($extraData != Array ( )) {
            $return_o_id = 0;
           
            foreach ($extraData as $value) {
               
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" value="<?php echo $value->deliver_order_id; ?>"></td>
                    <td><?php echo $value->bnkName; ?></td>
                    <td><?php echo $value->account_no; ?></td>
                    <td><?php echo $value->deposit_payment; ?></td>
                    <td><?php echo $value->deposit_date; ?></td>
                    <td><img width="80" height="40" src="<?php echo $paht.$value->deposit_slip_image; ?>" ></td>
                     <td><input type="button"  name="view_btn" id="" value="Print" onclick="printdeposit('<?php echo $value->deliver_order_id;?>','<?php echo $value->slip_no;?>');" /></td>
                    <?php if( !$value->progress == '2'){ ?>
                     <td><input type="button"  name="view_btn" id="" value="In Progress" style="background-color: green" onclick="progressdeposit('<?php echo $value->deliver_order_id;?>','<?php echo $value->slip_no;?>','<?php echo $user; ?>');" /></td>
                    <?php  } ?>
                    <td><input type="button"  name="view_btn" id="" value="Approve" onclick="submitdeposit('<?php echo $value->deliver_order_id;?>','<?php echo $value->slip_no;?>','<?php echo $user; ?>');" /></td>
                    <td><input type="button"  name="view_btn" id="" value="Reject" style="background-color: red" onclick="rejectdeposit('<?php echo $value->deliver_order_id;?>','<?php echo $value->slip_no;?>','<?php echo $user; ?>');" /></td>
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
    
    
    
    
    
  <?php }
  
  ?>
</body>

<div id="bankkprint" hidden>
    
    <h1>Bank Deposit</h1>
    <label id="date"></label>
    <label id="time"></label>
    
    <table>
        
        <tbody id="Acc_order_detailbnk">
            
            
        </tbody>
        
    </table>
       
    
    
</div>
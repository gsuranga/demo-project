<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$user = $this->session->userdata('username');
  $typename = $this->session->userdata('typename');
   if ($typename == "Sales Officer") { ?>



<body onload="setBankNames('1');">
    <table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="chq_table">
        <thead>
            <tr>
                <td>Bank Name</td>
                <td>Cheque No</td>
                <td>Amount</td>
                <td>Realised Date</td>
                <td>Cheque Image</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tr>
            <td>
                <select name="cmb_banks_1" id="cmb_banks_1" >
                    <option value="non">select bank</option>
                </select>  
            </td>
            <td>
                <input type="text" name="txt_chq_1" id="txt_chq_1" autocomplete="off">
            </td>
            <td>
                <input type="text" name="txt_amount_1" id="txt_amount_1" autocomplete="off" onkeyup="validateAmount();">
            </td>
            <td>
                <input type="text" name="txt_cl_1" id="txt_cl_1" onmouseover="rl_date('1');" readonly="true" autocomplete="off" placeholder="Select Date" >
            </td>
            <td align="center"><input type="file" name="file1" value="" autocomplete="off"></td>
        </tr>
        <tfoot>
            <tr>
                <td align="left">
                    <input type="button" onclick="add_new_row();" value="New Cheque">
                </td>
            </tr>
        </tfoot>
        <input type="hidden" name="hidden_table_row" id="hidden_table_row" value="1">
    </table>
    
    
   <?php }
   if ($typename == "Super Admin" || $typename == "payment") { ?>
       
        <table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="chq_table">
        <thead>
            <tr>
                <td>Bank Name</td>
                <td>Cheque No</td>
                <td>Amount</td>
                <td>Realised Date</td>
                <td>Cheque Image</td>
                
            </tr>
        </thead>
       
    <tbody>
        
        <?php
       $paht =  base_url();
        if ($extraData != Array ( )) {
            $return_o_id = 0;
            foreach ($extraData as $value) {  //cheque_no
                //cheque_no,cheque_payment,realized_date,deliver_order_id,added_date,realized_status,bank_id,added_time,cheque_image,tour_status 
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" value="<?php echo $value->deliver_order_id; ?>"></td>
                    <td><?php echo $value->bnkName; ?></td>
                    <td><?php echo $value->cheque_no; ?></td>
                    <td><?php echo $value->cheque_payment; ?></td>
                    <td><?php echo $value->realized_date; ?></td>
                    <td><img width="80" height="40" src="<?php 
                    echo $paht.$value->cheque_image; ?>"></td>
                    
                    <td><input type="button"  name="view_btn" id="" value="Print" onclick="printcqk('<?php echo $value->deliver_order_id;?>','<?php echo $value->cheque_no;?>');" />
                    <input type="button"  name="view_btn" id="" value="Approve" onclick="submitcqk('<?php echo $value->deliver_order_id;?>','<?php echo $value->cheque_no;?>','<?php echo $user; ?>' );" />
                     <?php if( !$value->inprogress == '4'){ ?>
                    <input type="button"  name="view_btn" id="" value="In progress" onclick="progresscqk('<?php echo $value->deliver_order_id;?>','<?php echo $value->cheque_no;?>','<?php echo $user; ?>');" />
                     <?php  }
            ?>
                    <input type="button" style="background-color: red"  name="view_btn" id="" value="Reject" onclick="rejectcqk('<?php echo $value->deliver_order_id;?>','<?php echo $value->cheque_no;?>','<?php echo $user; ?>');" /></td>
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
 <?php   } ?>
    
    
  
</body>

<div id="checkkprint" hidden>
    
    <h1>Check Payment</h1>
    <label id="date"></label>
    <label id="time"></label>
    
    <table>
        
        <tbody id="Acc_order_detailchk">
            
            
        </tbody>
        
    </table>
       
    
    
</div>


<?php

$partID = array(
    'id' => 'part_No_1',
    'name' => 'part_No_1',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'getpartId();'
    
);
  $user = $this->session->userdata('username');
  $typename = $this->session->userdata('typename');
   if ($typename == "Sales Officer") { ?>
  

<input type="hidden" name="return_rows" id="return_rows" value="1">
 
<table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="return_table" >
    <thead>
        <tr>
            <td>Part Number</td>
            <td>Description</td>
            <td>Reason</td>
            <td>Value</td>
            <td>Remarks</td>
            <td>Image</td>
            <td>Remove</td>
        </tr>
    </thead>
    
        <tr>
            <td><?php echo  form_input($partID);   ?></td>
            <td><input type="text" name="descrption_1" id="descrption_1" autocomplete="off"></td>
            <td><select name="reason_1" id="reason_1">
                    <option value="non" selected>Select Reason</option>
                    <option value="non">Short & Wrong Supply</option>
                    <option value="non">Damage / Corroded</option>
                    <option value="non">Different with Sample</option>
                    <option value="non">Order Not Complete</option>
                    <option value="non">Stores Supply Issues</option>
                    <option value="non">Salesman Errors</option>
                    <option value="non">Invoicing Errors</option>
                </select></td>
            <td><input type="text" name="value_1" id="value_1" autocomplete="off"></td>
            <td><input type="text" name="remarks_1" id="remarks_1" autocomplete="off" ></td>
            <td align="center"><input type="file" name="img_1" id="img_1" value="" autocomplete="off"></td>
        </tr>
       
        <tfoot>
        <tr>
            <td> <input type="button" onclick="add_new_rowcash();" value="New Return"></td>
        </tr>
        </tfoot> 
    
   
    
    <input type="hidden" name="hidden_table_row1" id="hidden_table_row1" value="1">
     
</table>
<?php

  }
  

   if ($typename == "Super Admin" || $typename == "payment") {
       
       
       
       
       ?>
       
<table  width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="return_table" >
     <thead>

        <tr>
             <td>Part Number</td>
            <td>Description</td>
            <td>Reason</td>
            <td>Value</td>
            <td>Remarks</td>
            <td>Image</td>
           
        </tr>
    </thead>
    <tbody>
        
        <?php
        $paht =  base_url();
        if ($extraData != Array ( )) {
            $return_o_id = 0;
            foreach ($extraData as $value) {
                
                ?>
                <tr>
                    <td hidden="hidden"><input type="hidden" value="<?php echo $value->deliver_order_id; ?>"></td>
                    <td><?php echo $value->part_no; ?></td>
                    <td><?php echo $value->description; ?></td>
                    <td><?php echo $value->reason; ?></td>
                    <td><?php echo $value->amount; ?></td>
                    <td><?php echo $value->remarks; ?></td>
                    <td><img width="80" height="40" src="<?php echo  $paht.$value->images; ?>"></td>
                    
                    
                    <td><input type="button"  name="view_btn" id="" value="Print" onclick="printreturn('<?php echo $value->deliver_order_id;?>','<?php echo $value->part_no;?>');" /></td>
                    <td><input type="button"  name="view_btn" id="" value="Approve" onclick="submitreturn('<?php echo $value->deliver_order_id;?>','<?php echo $value->part_no;?>','<?php echo $user;  ?>');" /></td>
                    <?php 
                    if($value->inprogrss !== '1'){
                        ?>
                     <td><input type="button"  name="view_btn" style="background-color: green" id="" value="In Progress" onclick="progressreturn('<?php echo $value->deliver_order_id;?>','<?php echo $value->part_no;?>','<?php echo $user; ?>');" /></td>   
                      <?php    
                    }
                    
                    ?>
                    
                    <td><input type="button"  name="view_btn" style="background-color: red" id="" value="Reject" onclick="rejectreturn('<?php echo $value->deliver_order_id;?>','<?php echo $value->part_no;?>','<?php echo $user; ?>');" /></td>
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




<div id="returnprint" hidden>
    
    <h1>Dealer Return</h1>
    
    
    <table>
        
        <tbody id="Acc_order_detailret">
            
            
        </tbody>
        
    </table>
       
    
    
</div>

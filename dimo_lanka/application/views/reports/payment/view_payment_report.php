<style>
    table.products td.price {
        text-align: right;
    }
</style>
<?php

?>
<?php 
$username = $this->session->userdata('username');
$typename = $this->session->userdata('typename');

if($typename == "Super Admin" || $typename == "payment") {
echo form_open('reports/drawIndex_payment_Report') ?>
<table width="70%" align="center">
    <?php
    ?>
    
    <tr>
        <td>Select Branch : </td>
        <td>
            <select id="select_branch" name="select_branch" onchange="get_aso();">
                <option value="0">--------Branch------------</option>
                <?php
                if (isset($extraData['branch'])) {

                    foreach ($extraData['branch'] as $areas) {
                        ?>
                <option value="<?php echo $areas->branch_id; ?>"><?php echo $areas->branch_name; ?></option>
                       <?php
                        
                            }
                        }
                        ?>

            </select>
            </td>
            
             <td>ASO : </td>
        <td id="append">
            <select id="select_area" name="select_area">
                 <option value="0">-------Select ASO--------</option>
                <?php
                if (isset($extraData['asoo'])) {

                    foreach ($extraData['asoo'] as $areas) {
                        ?>
                <option value="<?php echo $areas->sales_officer_id; ?>"><?php echo $areas->sales_officer_name; ?></option>
                       <?php
                        
                            }
                        }
                        ?>
            </select>
        
        </td>
    
        <td>Status : </td>
        <td>
                 <select id="status" name="status">
             <option value="0">--------All------------</option>
             <option value="1">Pending</option>
             <option value="2">In Progress</option>
             <option value="3">Accepted</option>
             <option value="4">Rejected</option>
                 </select>
             </td>
                 
            

    </tr>
</table>
<br>
<table align="center" width="60%">
    
        <tr>
            
            <td><label style="color: #454545">Dealer Name:</label></td>
            <td><input  placeholder="Dealer Name" type="text" id="dealername" name="dealername" onfocus="get_Name();"/><input type="hidden" id="dealer_id" name="dealer_id"/> </td> 
            <td> </td>
            <td><label style="color: #454545">Account Number:</label></td>
            <td><input  placeholder="Acc. No." type="text" id="accno" name="accno" onclick="getAccNo()"/> <input type="hidden" id="acc_no" name="acc_no"> </td> 
            <td> </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td><label style="color: #454545"> From:</label></td>
            <td><input type="text" id="dlr_start_date" name="dlr_start_date" placeholder="Start date" autocomplete="off"></td>
            <td></td>
            <td style="color: #454545"> To:</td>
            <td><input type="text" id="dlr_end_date" name="dlr_end_date" placeholder="End date" autocomplete="off"></td>
            <td> <input type="submit" value="Search" name="submit"></td>

        </tr>
        
    </table>
<?php echo form_close(); } ?>


<?php 


if ($typename == "Sales Officer"){
    
echo form_open('reports/drawIndex_payment_Report') ?>

<br>
<table align="center" width="60%">
        <td>
            <select hidden id="select_branch" name="select_branch" onchange="get_aso();">
                <option value="0">--------Branch------------</option>
                <?php
                if (isset($extraData['branch'])) {

                    foreach ($extraData['branch'] as $areas) {
                        ?>
                <option value="<?php echo $areas->branch_id; ?>"><?php echo $areas->branch_name; ?></option>
                       <?php
                            }
                        }
                        ?>
            </select>
            </td>
        <td id="append">
            <select hidden id="select_area" name="select_area">
                 <option value="0">-------Select ASO--------</option>
                <?php
                if (isset($extraData['asoo'])) {

                    foreach ($extraData['asoo'] as $areas) {
                        ?>
                <option value="<?php echo $areas->sales_officer_id; ?>"><?php echo $areas->sales_officer_name; ?></option>
                       <?php
                        
                            }
                        }
                        ?>
            </select>
        </td>
        <tr>            
            <td><label style="color: #454545">Dealer Name:</label></td>
            <td><input  placeholder="Dealer Name" type="text" id="dealername" name="dealername" onfocus="get_Name_perDealer('<?php echo $username; ?>');"/><input type="hidden" id="dealer_id" name="dealer_id"/> </td> 
            <td> </td>
            <td><label style="color: #454545">Account Number:</label></td>
            <td><input  placeholder="Acc. No." type="text" id="accno" name="accno" onclick="getAccNo()"/> <input type="hidden" id="acc_no" name="acc_no"> </td> 
            <td> </td>
            <td>Status : </td>
             <td>
             <select id="status" name="status">
             <option value="0">--------All------------</option>
             <option value="1">Pending</option>
             <option value="2">In Progress</option>
             <option value="3">Accepted</option>
             <option value="4">Rejected</option>
             </select>
             </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td><label style="color: #454545"> From:</label></td>
            <td><input type="text" id="dlr_start_date" name="dlr_start_date" placeholder="Start date" autocomplete="off"></td>
            <td></td>
            <td style="color: #454545"> To:</td>
            <td><input type="text" id="dlr_end_date" name="dlr_end_date" placeholder="End date" autocomplete="off"></td>
            <td> <input type="submit" value="Search" name="submit"></td>
        </tr>
        
    </table>
<?php echo form_close();} ?>

&emsp;
<table class="dealer_ranking_css" width='100%' id="dlr_table">
    <tr style="color: #000">
            <th style="background-color:#01C3FD ">Invoice Number</th>
            <th style="background-color: #01C3FD">WIP</th>
            <th style="background-color: #01C3FD">Dealer Account</th>
            <th style="background-color: #01C3FD">Mode of payment</th>
            <th style="background-color: #01C3FD">Details</th>
            <th style="background-color: #01C3FD">amount</th>
            <th style="background-color: #01C3FD">date of entry</th>
            <th style="background-color: #01C3FD">status</th>
            <th style="background-color: #01C3FD">Date</th>
            <th style="background-color: #01C3FD">Updated by</th>
            <th style="background-color: #01C3FD">Due date</th>
            <th style="background-color: #01C3FD">Target collection date</th>
            <th style="background-color: #01C3FD">Dealer name</th>
    </tr> 
    
    <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

       
        
        if ($extraData['datareturn'] != '') {
            foreach ($extraData['datareturn'] as $value) {
                ?>

                <tr>
                    <td><?php echo $value->invoice_no;?></td>
                    <td><?php echo $value->wip_no;?></td>
                    <td><?php echo $value->delar_account_no;?></td>
                    <td><?php echo 'Return';?></td>
                    <td><?php echo $value->part_no;?></td>
                    <td><?php echo $value->qty;?></td>
                    <td><?php echo $value->add_date;?></td>
                    <td ><?php
                    
                    if($value->status == '1'){
                        echo '<h4 style="font: italic;color:#007c80;">Accepted</h4>';
                    }elseif($value->inprogrss == '1'){
                        echo '<h4 style="font: italic;color:Green;">In Progress</h4>';                                            
                    } elseif ($value->status == '3') {
                    echo '<h4 style="font: italic;color:red;">Rejected</h4>';
                   } else {
                      echo '<h4 style="font: italic;color:orange;">Pending</h4>';
                   }?></td>
                     <td><?php echo $value->appr_date;?></td>
                    <td><?php
                    if($value->aprover !== ''){
                      echo 'Mr.'.$value->aprover;
                    }else{
                        echo '----';
                    }
                    ?></td>
                    <td><?php echo $value->due_date;?></td>
                    <td><?php echo $value->tgt_collection_dt;?></td>
                    <td><?php echo $value->delar_name;?></td></tr>
                 
                <?php
            }
        }
        if ($extraData['chechk'] != '') {
            foreach ($extraData['chechk'] as $value) {
                ?>

                <tr>
                    
                    <td><?php echo $value->invoice_no;?></td>
                    <td><?php echo $value->wip_no;?></td>
                    <td><?php echo $value->delar_account_no;?></td>
                    <td><?php echo 'Cheque';?></td>
                    <td><?php echo $value->cheque_no;?></td>
                    <td><?php echo $value->cheque_payment;?></td>
                    <td><?php echo $value->added_date;?></td>
                    <td ><?php
                    
                    if($value->realized_status == '1'){
                        echo '<h4 style="font: italic;color:#007c80;">Accepted</h4>';
                    }elseif($value->inprogress == '5'){
                        echo '<h4 style="font: italic;color:Green;">In Progress</h4>';                                            
                    } elseif ($value->realized_status =='3') {
                    echo '<h4 style="font: italic;color:red;">Rejected</h4>';
                   } else {
                      echo '<h4 style="font: italic;color:orange;">Pending</h4>';
                   }?></td>
                    <td><?php echo $value->appr_date;?></td>
                    <td><?php 
                    if($value->aprover !== ''){
                      echo 'Mr.'.$value->aprover;
                    }else{
                        echo '----';
                    }
                    ?></td>
                    <td><?php echo $value->due_date;?></td>
                    <td><?php echo $value->tgt_collection_dt;?></td>
                    <td><?php echo $value->delar_name;?></td></tr>
                 
                <?php
            }
        }
        if ($extraData['deposit'] != '') {
            foreach ($extraData['deposit'] as $value) {
                ?>

                <tr>
                    <td><?php echo $value->invoice_no;?></td>
                    <td><?php echo $value->wip_no;?></td>
                    <td><?php echo $value->delar_account_no;?></td>
                    <td><?php echo 'Bank Slip';?></td>
                    <td><?php echo $value->slip_no;?></td>
                    <td><?php echo $value->deposit_payment;?></td>
                    <td><?php echo $value->added_date;?></td>
                    <td ><?php
                    
                    if($value->status == '0'){
                        echo '<h4 style="font: italic;color:#007c80;">Accepted</h4>';
                    }elseif($value->progress == '2'){
                        echo '<h4 style="font: italic;color:Green;">In Progress</h4>';                                            
                    } elseif ($value->status == '4') {
                    echo '<h4 style="font: italic;color:red;">Rejected</h4>';
                    } else {
                      echo '<h4 style="font: italic;color:orange;">Pending</h4>';
                    }?></td>
                    <td><?php echo $value->appr_date;?></td>
                    <td><?php
                     if($value->aprover !== ''){
                      echo 'Mr.'.$value->aprover;
                    }else{
                        echo '----';
                    }
                    ?></td>
                    <td><?php echo $value->due_date;?></td>
                    <td><?php echo $value->tgt_collection_dt;?></td>
                    <td><?php echo $value->delar_name;?></td></tr>
                 
                <?php
            }
        }
         if($extraData['data'] != '') {
            foreach ($extraData['data'] as $value) {
                ?>

                <tr>
                    <td><?php echo $value->invoice_no;?></td>
                    <td><?php echo $value->wip_no;?></td>
                    <td><?php echo $value->delar_account_no;?></td>
                    <td><?php echo 'Garage loyalty';?></td>
                    <td><?php echo $value->voucher_no;?></td>
                    <td><?php echo $value->cash_payment;?></td>
                    <td><?php echo $value->added_date;?></td>
                    <td ><?php
                    
                    if($value->status == '1'){
                        echo '<h4 style="font: italic;color:#007c80;">Accepted</h4>';
                    }elseif($value->inprogress == '4'){
                        echo '<h4 style="font: italic;color:Green;">In Progress</h4>';                                            
                    } elseif ($value->status == '3') {
                    echo '<h4 style="font: italic;color:red;">Rejected</h4>';
                   } else {
                      echo '<h4 style="font: italic;color:orange;">Pending</h4>';
                   }?></td>
                    <td><?php echo $value->appr_date;?></td>
                    <td><?php
                    
                    if($value->aprover !== ''){
                      echo 'Mr.'.$value->aprover;
                    }else{
                        echo '----';
                    }
                    
                    
                    ?>  
                    
                    </td>
                    <td><?php echo $value->due_date;?></td>
                    <td><?php echo $value->tgt_collection_dt;?></td>
                    <td><?php echo $value->delar_name;?></td> </tr>
                 
                <?php
            }
        }

        ?>
</table>
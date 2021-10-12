<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" border="1" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Credit Enhancement</td>
    </tr>
    <tr>
        <td style="margin-top: 10px">
            <table>
                <tr>
                    <td>
                        <table border="0">
                            <tr>
                                <td valign="top" >
                                    <table style="width: 900px" border="0">                            
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label>Customer</label>                                           
                                                                    </td>
                                                                    <td>
                                                                        <input value="<?= $extraData[0]['name']; ?>" readonly="true" style="margin-left: 10px;width: 750px" type="text" id="cust_name" name="cust_name"/>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>                                
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style="width: 850px">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Area/Address</th>
                                                                        <th>Acc: handled by</th>
                                                                        <th>Dept</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr style="padding: 0">
                                                                        <td><input type="text" id="address_text" name="address_text"></td>
                                                                        <td><input type="text" id="handled_text" name="handle_text"></td>
                                                                        <td><input type="text" id="dept_text" name="dept_text"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Acc.No</th>
                                                            <th>Credit Limit</th>
                                                            <th>Debtors Total</th>
                                                            <th></th>
                                                            <th>Total Oustanding</th>
                                                            <th></th>
                                                            <th>Account Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input style="margin-top: 20px" type="text" id="account_text" name="account_text"></td>
                                                            <td><input style="margin-top: 20px" type="text" id="credit_text" name="credit_text"></td>
                                                            <td><input style="margin-top: 20px" type="text" id="debt_total_text" name="debt_total_text"></td>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <label><45 Total</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" id="" name="">
                                                                        </td>
                                                                    </tr>
                                                                </table>                                                    
                                                            </td>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <label>45 To 60</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" id="outstand_text" name="outstand_text">
                                                                        </td>
                                                                    </tr>
                                                                </table>                                                    
                                                            </td>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <label>>60 Total</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" id="" name="">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td><input style="margin-top: 20px" type="text" id="acc_status_text" name="acc_status_text"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 350px">
                                    <table>
                                        <tr>
                                            <td>
                                                <table border="0">
                                                    <td style="width: 115px">
                                                        <label>Per credit</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="per_credit_text" name="per_credit_text"/>
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0">
                                                    <td style="width: 115px">
                                                        <label>Date Opened</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="opened_date_text" name="opened_date_text"/>
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0">
                                                    <td style="width: 115px">
                                                        <label>BG</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="bg_text" name="bg_text"/>
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" style="width: 315px">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Requested Credit Limit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <input type="text" id="req_credit_limit" name="req_credit_limit"/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="5" align="center" border="0">
                            <tr class="ContentTableTitleRow">
                                <td>Payment summary of Transaction</td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" width="100%">
                                        <tr>
                                            <td valign="top" width="60%">
                                                <table border="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice No</th>
                                                            <th>Invoice Date</th>
                                                            <th>Invoice Value</th>
                                                            <th>Settled Date </th>
                                                            <th>No of Days</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        foreach ($extraData['getPaymentSummery'] as $value) { ?>
                                                             <tr>
                                                                 <td><?php echo $value->temp_excel_imp1_id; ?></td>
                                                                 <td><?php echo $value->doc_date; ?></td>
                                                                 <td><?php echo $value->Debit; ?></td>
                                                                 <td><?php echo $value->doc_date; ?></td>
                                                                 <td><?php echo $value->Source; ?></td>
                                                        </tr>
                                                         <?php }
                                                        ?>
                                                       
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td valign="top">
                                                <table cellpadding="5" align="center" border="0" width="100%">
                                                    <tr class="ContentTableTitleRow">
                                                        <td>Date Of Enhancement Raised</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>                                    
                                </td>
                            </tr>                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="5" align="center">
                            <tr class="ContentTableTitleRow">
                                <td>Return Cheque Information</td>
                            </tr>
                            <tr>
                                <td valign="top" width="60%">
                                    <table border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Cheque No/Bank</th>
                                                <th>Cheque Date</th>
                                                <th>Cheque Value</th>
                                                <th>Return Date </th>
                                                <th>Date of Settlement Days</th>
                                                <th>#Days tkn to stl RTN chq</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="background-color:#0ab4f3;color: #FFFFFF;font-weight:bold;">
                    <td align="center">Department wise Information</td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" border="0" cellpadding="5" align="center">
                            <tr class="ContentTableTitleRow">
                                <td>Payment summary of Transaction(Other Department)</td>
                            </tr>
                            <tr>
                                <td valign="top" width="60%">
                                    <table border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Ac.No</th>
                                                <th>Credit Limit</th>
                                                <th>Responsible</th>
                                                <th><60 Total</th>
                                                <th>45 To 60 Total</th>
                                                <th>>60 Total</th>
                                                <th>Ac.Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="ContentTableTitleRow">
                                <td>Return Cheque Information</td>
                            </tr>
                            <tr>
                                <td valign="top" width="60%">
                                    <table border="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Account No</th>
                                                <th>Cheque No/Bank</th>
                                                <th>Cheque Date</th>
                                                <th>Cheque Value</th>
                                                <th>Return Date </th>
                                                <th>Date of Settlement Days</th>
                                                <th>#Days tkn to stl RTN chq</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="height: 50px" valign="top" align="center">Checked</td>
                                                <td style="height: 50px" valign="top" align="center">Requested By</td>
                                                <td style="height: 50px" valign="top" align="center">Authorized Team Leader</td>
                                                <td style="height: 50px" valign="top" align="center">Authorized Manager Admin for</td>
                                                <td style="height: 50px" valign="top" align="center">Authorized GM/BUM</td>
                                                <td style="height: 50px" valign="top" align="center">Approved by Director Incharge</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>            
        </td>
    </tr>
</table>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="<?php echo base_url() ?>reports/drowIndex_item_list_summery">

    <table align="center">
        <tr>
            <td>Employee Name</td>
            <td>
                <input type="text" name="txt_emp_name" id="txt_emp_name" placeholder="Enter Employee Name" onkeyup="getEmpName_for_ItemListSummery();">
                <input type="hidden" name="hiddenempId" id="hiddenempId">
            </td>
        </tr>
        <tr>
            <td>Item name</td>
            <td>
                <input type="text" name="txt_item_name" id="txt_item_name" placeholder="Enter Item Name" onkeyup="getItemName_for_ItemListSummery();">
                <input type="hidden" name="hiddenItemId" id="hiddenItemId">
            </td>
        </tr>
        <tr>
            <td>Item Account Code</td>
            <td>
                <input type="text" name="txt_item_accountCode" id="txt_item_accountCode" placeholder="Enter Item Account Code" onkeyup="getitem_accountCode_for_ItemListSummery();">
                <input type="hidden" name="hiddenCodeItemId" id="hiddenCodeItemId">
            </td>
        </tr>
        <tr>
            <td>Store Name</td>
            <td>
                <input type="text" name="txt_storeName" id="txt_storeName" placeholder="Enter Store Name" onkeyup="getStore_name_for_ItemListSummery();">
                <input type="hidden" name="hiddenStoreId" id="hiddenStoreItemId">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Search">
            </td>
        </tr>

    </table>
    <table align="right">    
        <tr>
            <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a File name" /></td>
            <td><input type="button" value="To PDF" onclick="getPDFPrint('Item_summery');" /></td>
            <td><input type="button" value="To Excel" onclick="reportsToExcel('Item_summery','Item List summery');" /></td>
            <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
            <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Item List summery' ?>" /></td>
        </tr>
    </table>
</form>

<div id="Item_summery">
    <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <td>Item Id</td>
                <td>Item Name</td>
                <td>Item Account Code</td>
                <td>Units On Hand</td>
                <td>Unit Cost</td>
                <td>Unit Price</td>
                <td>Total Cost</td>
                <td>Total price</td>
            </tr>
        </thead>
        <?php 
        $total_cost=0;
        foreach ($extraData as $value) {
            
            $total_cost+=$value->total_cost;
            $total_price+=$value->total_price;
            ?>
            <tr>
                <td><?php echo $value->id_item; ?></td>
                <td><?php echo $value->item_name; ?></td>
                <td><?php echo $value->item_account_code; ?></td>              
                <td align="right"><?php echo $value->qty ?></td>
                <td align="right"><?php echo number_format($value->product_cost,2); ?></td>
                <td align="right"><?php echo number_format($value->product_price,2); ?></td>
                <td align="right"><?php echo number_format($value->total_cost,2);?></td>
                <td align="right"><?php echo number_format($value->total_price,2); ?></td>
                
            </tr>
<?php } ?>
         <tr>
            <td colspan="6" >Grand Total</td>
            <td align="right"><?php echo number_format($total_cost,2); ?></td>
            <td align="right"><?php echo number_format($total_price,2);?></td>
        </tr>   
    </table>
</div>
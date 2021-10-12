<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>

<table align="right" >    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('summery');" /></td>
        <td><input type="button" value="To Excel" onclick="reportsToExcel('summery', 'loading_summery.xls');" /></td>
    <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
    <input type="hidden" id="topic" name="topic" value="" />
</tr>
</table>
<div id="summery">
    <table width="100%" class="" cellpadding="0" cellspacing="10" style="background-color: #EAEAE0; text-align: center;font-weight: 700; border-radius: 5px;border-color: #cccccc; border:1px solid #cccccc">
        <thead>
            <tr>
                <td width="15%">Item Name</td>
                <td width="15%">Item Account Code</td>
                <td width="10%">No of Invoices</td>
                <td width="10%">Sales Quantity</td>
                <td width="10%">Free Issue</td>
                <td>Warranty Issue</td>
                <td>Sales Returns</td>
                <td>Market Returns</td>
                <td width="10%">Total</td>
            </tr>    
        </thead>        
    </table>
    <?php if ($extraData != Array()) { ?>
        <div style="height:450px;overflow: scroll">
            <table width="100%"  class="SytemTable" cellpadding="0" cellspacing="0" >
                <tbody>
                    <?php
                    $noOfInvoice = 0;
                    $sQty = 0;
                    $fQty = 0;
                    $warrenty = 0;
                    $sReturn = 0;
                    $mReturn = 0;
                    $gTotal = 0;
                    foreach ($extraData as $value) {
                        $prodcutDetail = $_instance->getProdcutDetails($value->id_products, $_POST['date'], $_POST['dis_phy']);
                        $total = $prodcutDetail['sales'][0]->sales_qty + $prodcutDetail['sales'][0]->free_qty + $prodcutDetail['sales'][0]->wr_qty - ($prodcutDetail['returns'][0]->s_return);
                        ?>

                        <tr>
                            <td width="15%" style="color: #000000"><?php echo $value->item_name ?></td>
                            <td width="15%" style="color: #000000"><?php echo $value->item_account_code ?></td>
                            <td width="10%" align="center" style="color: #000000"><?php
                                if (isset($prodcutDetail['sales'][0]->count)) {
                                    echo $prodcutDetail['sales'][0]->count;
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td width="10%" align="right" style="color: #000000"><?php
                                if (isset($prodcutDetail['sales'][0]->sales_qty)) {
                                    echo number_format($prodcutDetail['sales'][0]->sales_qty);
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td width="10%" align="right" style="color: #000000"><?php
                                if (isset($prodcutDetail['sales'][0]->free_qty)) {
                                    echo number_format($prodcutDetail['sales'][0]->free_qty);
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td align="right" style="color: #000000"><?php
                                if (isset($prodcutDetail['sales'][0]->wr_qty)) {
                                    echo number_format($prodcutDetail['sales'][0]->wr_qty);
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td align="right" style="color: #000000"><?php
                                if (isset($prodcutDetail['returns'][0]->s_return)) {
                                    echo number_format($prodcutDetail['returns'][0]->s_return);
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td align="right" style="color: #000000"><?php
                                if (isset($prodcutDetail['returns'][0]->m_return)) {
                                    echo number_format($prodcutDetail['returns'][0]->m_return);
                                } else {
                                    echo '0';
                                }
                                ?></td>
                            <td width="10%" align="right"><?php echo $total ?></td>
                        </tr>
                        <?php
                        $noOfInvoice += $prodcutDetail['sales'][0]->count;
                        $sQty +=$prodcutDetail['sales'][0]->sales_qty;
                        $fQty +=$prodcutDetail['sales'][0]->free_qty;
                        $warrenty +=$prodcutDetail['sales'][0]->wr_qty;
                        $sReturn +=$prodcutDetail['returns'][0]->s_return;
                        $mReturn+=$prodcutDetail['returns'][0]->m_return;
                        $gTotal+=$total;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <table width="99%" class="SytemTable" cellpadding="0" cellspacing="0">
            <tr style="background-color: #EAEAE0">
                <td width="30%" style="color: #D22020;font-size: medium">Grand Total</td>
                <td style="color: #D22020;font-size: medium" width="10%" align="center"><labal id="tot_inv"><?php echo $noOfInvoice; ?></labal></td>
            <td style="color: #D22020;font-size: medium" width="10%" align="right">
                <input type="hidden" id="stot" name="stot" value="<?php echo $sQty; ?>">
            <lable id="s_qty"><?php echo $sQty; ?></lable></td>
            <td style="color: #D22020;font-size: medium" width="10%" align="right">
                <input type="hidden" id="ftot" name="ftot" value="<?php echo $fQty; ?>">
            <lable id="f_qty"><?php echo $fQty; ?></lable></td>
            <td style="color: #D22020;font-size: medium" align="right">
                <input type="hidden" id="wtot" name="wtot" value="<?php echo $warrenty; ?>">
            <lable id="wrt_rtn"><?php echo $warrenty; ?></lable></td>
            <td style="color: #D22020;font-size: medium" align="right">
                <input type="hidden" id="srtot" name="srtot" value="<?php echo $sReturn; ?>">
            <lable id="s_rnt"><?php echo $sReturn; ?></lable></td>
            <td style="color: #D22020;font-size: medium" align="right">
                <input type="hidden" id="mtot" name="mtot" value="<?php echo $mReturn; ?>">
            <lable id="m_rnt"><?php echo $mReturn; ?></lable></td>
            <td style="color: #D22020;font-size: medium" align="right" width="10%">
            <lable id=""><?php echo $gTotal; ?></lable></td>
            </tr>
        </table>
    </div>
<?php } else { ?>
    <table align="center">
        <tr>
            <td><?php echo $this->session->flashdata('status_data'); ?></td>
        </tr>
    </table>
<?php } ?>
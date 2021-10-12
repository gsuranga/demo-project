<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<script type="text/javascript">// pagination link
     $j(document).ready(function() {
     var s = $j('#invoice_pag').dataTable({
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
        //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
            });
</script>

<form action="<?php echo base_url() ?>deleted_invoices/draw_index_deleted_invoices" method="post">
    <table align="center">
        <tr>
            <td>Employee Name</td>
            <td>:</td>
            <td><input type="text" name="e_name" id="e_name" placeholder="Select Employee Name" onkeyup="select_emp_name();" >
                <input type="hidden" name="hasPlaceId" id="hasPlaceId">
                <input type="hidden" name="etype" id="etype">
                <input type="hidden" name="phyId" id="phyId">
            </td>
        </tr>
        <tr>
            <td>Outlet Name</td>
            <td>:</td>
            <td><input type="text" name="o_name" id="o_name" placeholder="Select Outlet Name" onkeyup="select_outlet();"><input type="hidden" name="outletId" id="outletId"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" id="btn_submit" name="btn_submit"></td>
        </tr>
    </table>
</form>
                <table align="right">    
                    <tr>
                        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                        <td><input type="button" value="To PDF" onclick="getPDFPrint('deletetdDiv');" /></td>
                        <td><input type="button" value="To Excel" onclick="ExportExcel('deleted','Deleted Invoices');"/></td>
                        <!--<td><input type="button" value="To Excel" onclick="reportsToExcel('non_invoiced_tbl', 'Non Invoiced Outlet');" /></td>-->
                        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
                        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Deleted Invoices' ?>" /></td>
                    </tr>
                </table>
      
<!--<div id="invoice_pag1" name="invoice_pag">-->
<table class="SytemTable" width="100%" id="invoice_pag" name="invoice_pag" align="center" cellpadding="0" cellspacing="0">
    <thead>
        <tr >            
            <td>Order Code</td>
            <td>Invoice Date</td>
            <td>Employee Name</td>     
            <td>Outlet</td>
            <td>Branch Address</td>
            <td>Sales Amount</td>
            <td>Return Amount</td>
            <td>Net Amount</td>
            <td>View</td>
        </tr>
    </thead>
     <?php if(count($extraData) > 0 && $extraData != ''){ ?>
    <?php foreach ($extraData as $value ){ ?>
    <!--<tbody>-->
        <tr>
            <td><?php echo $value->id_sales_order ?></td>
            <td><?php echo $value->added_date    ?></td>
            <td><?php echo $value->full_name ?></td>
            <td><?php echo $value->outlet_name ?></td>
            <td><?php echo $value->branch_address ?></td>
            <td align="right" ><?php echo number_format($value->sales_amount,2) ?></td>
            <td align="right"><?php echo number_format($value->returnmount,2) ?></td>
            <td align="right"><?php echo number_format($value->sales_amount - $value->returnmount,2) ?></td></td>
            <td align="center"><a href="<?php echo $System['URL']; ?>salesorder/drawindexSalesorderproductView?id_sales_order=<?php echo $value->id_sales_order;?>&type=deleted"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/view.png" /></a></td>
        </tr>
    <!--</tbody>-->
    <?php }?>
</table>
<!--</div>-->

<div id="deletetdDiv" hidden="true">
    <table class="SytemTable" width="100%" id="deleted">
    <thead>
        <tr >            
            <td>Order Code</td>
            <td>Invoice Date</td>
            <td>Employee Name</td>     
            <td>Outlet</td>
            <td>Branch Address</td>
            <td>Sales Amount</td>
            <td>Return Amount</td>
            <td>Net Amount</td>
            <td>View</td>
        </tr>
    </thead>
    <?php foreach ($extraData as $value ){ ?>
    <tbody>
        <tr>
            <td><?php echo $value->id_sales_order ?></td>
            <td><?php echo $value->added_date    ?></td>
            <td><?php echo $value->full_name ?></td>
            <td><?php echo $value->outlet_name ?></td>
            <td><?php echo $value->branch_address ?></td>
            <td align="right" ><?php echo number_format($value->sales_amount,2) ?></td>
            <td align="right"><?php echo number_format($value->returnmount,2) ?></td>
            <td align="right"><?php echo number_format($value->sales_amount - $value->returnmount,2) ?></td></td>
            <td></td>
        </tr>
    </tbody>
                <?php }}?>
</table>
</div>

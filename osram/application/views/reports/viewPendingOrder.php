<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$table_row = 0;
?>
<table align="right">    
    <tr>
        <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
        <td><input type="button" value="To PDF" onclick="getPDFPrint('purchase_details');" /></td>
         <td><input type="button" value="To Excel" onclick="reportsToExcel('purchase_details','purchase_pending_details');" /></td>
        <td><input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" /></td>
        <td><input type="hidden" id="topic" name="topic" value="<?php echo 'Purchasing Details' ?>" /></td>
    </tr>
</table>


<table width="90%" class="SytemTable" align="center" id="pending_purchase" cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Purchase Order No</td>
            <td>Employee Name</td>
            <td>Date</td>
            <td>View</td>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {
            //print_r($extraData);
            $table_row++;
            if (!isset($value->id_dilivery_note)) {
                ?>
                <tr id="row_<?php echo $table_row; ?>">
                    <td><?php echo $value->purchase_order_number; ?><input type="hidden" id="hidden_purchase_order_<?php echo $table_row; ?>" value="<?php echo $value->id_purchase_order; ?>"></td>
                    <td><?php echo $value->employee_first_name; ?></td>
                    <td><?php echo $value->purchase_order_date; ?></td>
                    <td><a href="drawDetailstPurchase?cl_distributorHayleystoken=<?php echo $value->id_purchase_order; ?>">view</a></td>



                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<div id="purchase_details" hidden="true">
    <table width="90%" class="SytemTable" align="center" id="pending_purchase" cellpadding="0" cellspacing="0" >
        <thead>
            <tr>
                <td>Purchase Order No</td>
                <td>Employee Name</td>
                <td>Date</td>


            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $value) {
                //print_r($extraData);
                $table_row++;
                if (!isset($value->id_dilivery_note)) {
                    ?>
                    <tr id="row_<?php echo $table_row; ?>">
                        <td><?php echo $value->purchase_order_number; ?><input type="hidden" id="hidden_purchase_order_<?php echo $table_row; ?>" value="<?php echo $value->id_purchase_order; ?>"></td>
                        <td><?php echo $value->employee_first_name; ?></td>
                        <td><?php echo $value->purchase_order_date; ?></td>
                        <td><a href="drawDetailstPurchase?cl_distributorHayleystoken=<?php echo $value->id_purchase_order; ?>">view</a></td>



                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
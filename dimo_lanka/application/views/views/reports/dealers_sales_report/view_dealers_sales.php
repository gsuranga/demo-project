<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

 */
//print_r($extraData);
$submit_dealers_sales_search = array(
    "id" => "submit_search",
    "name" => "submit_search",
    "type" => "submit",
    "value" => "Search",
);

$reset_form = array(
    "id" => "submit_reset",
    "name" => "submit_reset",
    "type" => "reset",
    "value" => "Reset",
    "style" => "width: 85px",
);
?>
<form action="<?php echo base_url() ?>reports/drawIndexDealersSalesReport" method="post">
    <table align="center" width="50%">
        <tr>
            <td><label>Dealer Name:</label></td>
            <td><input type="text" id="dealername" name="dealername" onfocus="get_Name();"/><input type="hidden" id="dealer_name" name="dealer_name" autocomplete="off"/> </td> 
            <td> <?php echo form_error('dealername'); ?></td>


            <td><label>Account Number:</label></td>
            <td><input type="text" id="accno" name="accno" onfocus="getAccNo();" autocomplete="off" /> <input type="hidden" id="acc_no" name="acc_no"> </td> 
            <td>  <?php echo form_error('accno'); ?></td>

        </tr>
        <tr>
            <td ><label >From:</label></td>
            <td><input type="text" id="startDate_id" name="start_date_name" autocomplete="off"></td> 
            <td>  <?php echo form_error('start_date_name'); ?></td>

            <td><label>To:</label></td>  
            <td><input type="text" id="endDate_id" name="end_date_name" autocomplete="off"></td>  
            <td>  <?php echo form_error('end_date_name'); ?></td>


        </tr>

    </table>
    <table align="center" width="21%">
        <tr>
            <td align="right" style="position: relative; right: 10px"><?php echo form_submit($reset_form) . "  "; ?><?php echo form_submit($submit_dealers_sales_search) ?></td>
        </tr>
    </table>
    &emsp;
    <table width="80%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_dailySumarry">
        <thead>
            <tr>

                <td>Part Number</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>Unit Price</td>
                <td>Date</td>
                <td>Discount</td>

            </tr>
        </thead>
        <tbody>
            <?php
            // echo 'jddjvbk';
            // print_r($extraData);
            $es = count($extraData);
            if ($es > 0) {
                foreach ($extraData as $value) {
                    ?>
                    <tr>

                        <td><?php echo $value->item_part_no; ?></td>      
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->qty; ?></td>                    
                        <td><?php echo $value->unit_price; ?></td> 
                        <td><?php echo $value->sold_date; ?></td> 
                        <td><?php echo $value->discount; ?></td> 
                    </tr>

                    <?php
                }
            } else {
                ?>
            <tfoot><td>No Records Found</td></tfoot>
            <?php
        }
        ?>

    </table>
</td>
</tr>
</table>
</form>
<?php echo form_close(); ?>
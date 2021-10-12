<script>
    function count_amount(id) {

        console.log(id);


        var qty = $j('#qty_' + id).val();
        var rexg = new RegExp(/^\d*(?:\.\d{1,2})?$/);


        if (!rexg.test(qty)) {
            $j('#qty_' + id).val("");
        
        alert("Enter Avalid Number");
        
        }

        console.log(qty);

    }
</script>
	<script type="text/javascript">// pagination link
                $j(document).ready(function() {
                    var s = $j('#note').dataTable();
                    setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
                });
            </script>








<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder' => "Select Distributor",
    'onfocus' => 'get_employenames_by_stores();'
);

$employee_id = array(
    'id' => 'employee_id',
    'name' => 'employee_id',
    'type' => 'hidden'
);


$submit_stock_search = array(
    'id' => 'submit_stock_search',
    'name' => 'submit_stock_search',
    'type' => 'submit',
    'value' => 'Search'
);

$total = 0;
?>
<?php echo form_open_multipart('stock_excell/importExcellData2'); ?>
<table align="left" width="30%">
    <tr>
        <td><input type="submit" onclick="ExportExcel('allitem', 'allitems');" value="Export Item List"/></td>
    </tr>
    <tr>
        <td><input type="file" name="userfile"/></td>
        <td>Choose a "upload.xlx" file </td>
        <td align='left'><input type="submit" value="Import" /></td>
    </tr>
</table>
<?php echo form_close(); ?>

<?php echo form_open('stock/drawIndexStock'); ?> 
<table align="center" width="80%">
    <input type="hidden" name="log_type" id="log_type" value="<?php echo $this->session->userdata('user_type'); ?>">
    <input type="hidden" name="id_physical_place" id="id_physical_place" value="<?php echo $this->session->userdata('id_physical_place'); ?>">
    <tr>
        <td>
            <table align="center">
                <tr>
                    <td>Distributor Name</td>
                    <td><?php echo form_input($employee_name); ?><?php echo form_input($employee_id); ?></td>
                </tr>

                <tr>
                    <td>Store Name</td>
                    <td><input type="hidden" name="store_id" id="store_id">
                        <select name="store_name" id="store_name" onchange="set_store_id();">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Item Name</td>
                    <td><input type="text" id="itemNameForStock" name="itemNameForStock" onfocus="get_item_name();"></td>
                    <td><input type="hidden" name="itemidForStock" id="itemidForStock">

                    </td>
                </tr>
                <tr>
                    <td>Item Code</td>
                    <td><input type="text" id="itemCode" name="itemCode" onfocus="get_item_code();"></td>
                    <td><input type="hidden" name="itemidcode" id="itemidcode">

                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right"><?php echo form_submit($submit_stock_search); ?></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>



            <table width="100%" class="SytemTable" align="center" id="note" cellpadding="0" cellspacing="0" >
                <!--pending_diliver_note-->
                <thead>
                    <tr>
                        <td>Store Code</td>
                        <td>Item Name</td>
                        <td>Item Account Code</td>
                        <td>Cost Price</td>
                        <td>Selling Price</td>
                        <td>Item Quantity</td>
                        <td>Cost Amount</td>
                        <td>Selling Amount</td>

                        <?php if ($this->session->userdata('user_type') == 'Admin') { ?><td>Edit</td> <?php } ?>
                    </tr>
                <tbody>
                    <?php
                    if (isset($extraData['stockdis'])) {
                        foreach ($extraData['stockdis'] as $value) {
                            $amount = $value->product_price * $value->qty;
                            $total+=$amount;

                            $costsel = $value->product_cost * $value->qty;
                            $totalcost+=$costsel;
                            ?>
                            <tr>
                                <td><?php echo $value->store_code; ?></td> 
                                <td><?php echo $value->item_name; ?></td> 
                                <td><?php echo $value->item_account_code; ?></td> 
                                <td><?php echo $value->product_cost; ?></td> 
                                <td style="text-align: right"><?php echo $value->product_price; ?></td> 
                                <td style="text-align: right"><input type="text" readonly="true" name="qty_<?php echo $value->id_stock; ?>" id="qty_<?php echo $value->id_stock; ?>" value="<?php echo number_format($value->qty); ?>"onkeyup="count_amount('<?php echo $value->id_stock; ?>');"></td> 
                                <td style="text-align: right"><?php echo number_format($costsel, 2); ?></td> 
                                <td style="text-align: right"><?php echo number_format($amount, 2); ?></td> 
                                <?php if ($this->session->userdata('user_type') == 'Admin') { ?><td><a href="#" id="ch_edit_<?php echo $value->id_stock; ?>" onclick="enable_editing_row(<?php echo $value->id_stock; ?>)">Edit</a></td><?php } ?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right;">Cost Total</td>
                        <td style="text-align: right"><?php echo number_format($totalcost, 2); ?></td>
                    </tr>

                    <tr>
                        <td colspan="6" style="text-align: right;">Selling Total</td>
                        <td colspan="2"style="text-align: right"><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tfoot>
                </thead>
            </table>


            <table width="90%" class="SytemTable" align="center" id="allitem" cellpadding="0" cellspacing="0" >

                <thead>
                    <tr>
                        <td>id_products</td>
                        <td>item_name</td>
                        <td>item_account_code</td>
                        <td>Qty</td>


                    </tr>
                <tbody>
                    <?php
                    if (isset($extraData['allstock'])) {
                        foreach ($extraData['allstock'] as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->id_products; ?></td> 
                                <td><?php echo $value->item_name; ?></td> 
                                <td><?php echo $value->item_account_code; ?></td> 
                                <td><?php echo 0 ?></td> 


                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
                <tfoot>



                </tfoot>
                </thead>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>

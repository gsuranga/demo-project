
<input type="hidden" id="sopoid" value="<?php echo $extraData[1] ?>"></>
<input type="hidden" id="discount_per" value="<?php echo $extraData[5] ?>"></>
<input type="hidden" id="vat_de" value="<?php echo $extraData[6] ?>"></>

    <?php if ($extraData[2] == 1) { ?>
    <table style="font-size: 20px;color:  #49ff0e" align="right">

        <tr>
            <td>
                Assign me
            </td>

            <td>
                <input type="checkbox" id="check_box_select" style="width: 30px;height: 30px;color: greenyellow;background-color: green" onclick="assign_purchase_order();" <?php if($extraData[3] =='1'){?> checked="true" <?php }?>></>
            </td>


        </tr>
    </table>
<?php } ?>

<table class="SytemTable" align="center" style="width: 100%">
    <thead>
        <tr>
            <td>Part NO</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Retail Price</td>
            <?php if($extraData[7] !=0) { ?>
            <td>No. of kits</td>
            <?php } ?>
        </tr>

    </thead>
    <tbody id="order_body">
        <?php if($extraData[7] == 0) { ?>
        <?php $row_count = 1; ?>

        <?php foreach ($extraData[0] As $pur) { $display_amount=$pur->unit_price+$pur->unit_price*$extraData[6]/100 ?>
            <tr id="update_row_<?php echo $row_count; ?>">

                <td><input type="hidden" value="<?php echo $pur->item_id ?>" id="item_id_<?php echo $row_count; ?>"></><input type="hidden" id="order_detail_id_<?php echo $row_count; ?>" value="<?php echo $pur->purchase_order_detail_id ?>" ></><input type="text" value="<?php echo $pur->item_part_no ?>" readonly="true" id="update_part_no_<?php echo $row_count; ?>" style=""></></td>
                <td><input type="text" value="<?php echo $pur->description ?>" readonly="true" id="update_description_<?php echo $row_count; ?>"> </></td>
                <td><input style="text-align: right" type="text" value="<?php echo $pur->item_qty ?>" readonly="true" id="update_qty_<?php echo $row_count; ?>"> </><input type="hidden" id="update_retail_price_<?php echo $row_count; ?>" value="<?php echo $pur->unit_price ?>"></></td>
                <td style="text-align: right" id="show_vat_with_price_<?php echo $row_count;  ?>"><?php echo number_format($display_amount,2) ?></td>
                
                <?php if ($extraData[2] == 2 || $extraData[2] == 5) { ?>
                <td align="center"><input type="button"  id="update_button_<?php echo $row_count; ?>"value="Edit" style="background-color: gray;color: white;width: 90px"  onclick="edit_part(<?php echo $row_count; ?>)"></><input type="hidden" id="detail_id_<?php echo $pur->purchase_order_detail_id; ?>"></></td>
                    <td align="center"><input type="button" value="Remove" style="background-color: #ff0f14;color: white;width: 90px;" onclick="remove_parts(<?php echo $row_count; ?>);"></></td>
                <?php } ?>
                <?php $row_count++;
            } ?>
        </tr>
        <?php } else { ?>
            <?php $row_count = 1; ?>

        <?php foreach ($extraData[0] As $pur) { $display_amount=$pur->unit_price+$pur->unit_price*$extraData[6]/100 ?>
            <tr id="update_row_<?php echo $row_count; ?>">

                <td><input type="hidden" value="<?php echo $pur->item_id ?>" id="item_id_<?php echo $row_count; ?>"></><input type="hidden" id="order_detail_id_<?php echo $row_count; ?>" value="<?php echo $pur->purchase_order_detail_id ?>" ></><input type="text" value="<?php echo $pur->item_part_no ?>" readonly="true" id="update_part_no_<?php echo $row_count; ?>" style=""></></td>
                <td><input type="text" value="<?php echo $pur->description ?>" readonly="true" id="update_description_<?php echo $row_count; ?>"><input type="hidden" id="row_count" value="<?php echo count($extraData[0])?>"></td>
                <td><input style="text-align: right" type="text" value="<?php echo $pur->item_qty ?>" readonly="true" id="update_qty_<?php echo $row_count; ?>"> </><input type="hidden" id="update_retail_price_<?php echo $row_count; ?>" value="<?php echo $pur->unit_price ?>"></></td>
                <td style="text-align: right" id="show_vat_with_price_<?php echo $row_count;  ?>"><?php echo number_format($display_amount,2) ?></td>
                 
                <?php if($row_count == 1) { ?>
                    <td rowspan="<?php echo count($extraData[0])?>"><input type="text" style="text-align: right" readonly="true" id="kits" value="<?php echo $extraData[7] ?>"</td>
                    <td rowspan="<?php echo count($extraData[0])?>" align="center"><input type="button"  id="update_button_<?php echo $row_count; ?>"value="Edit" style="background-color: gray;color: white;width: 90px"  onclick="edit_kit(<?php echo $row_count; ?>)"></><input type="hidden" id="detail_id_<?php echo $pur->purchase_order_detail_id; ?>"></></td>
                
                <?php }
                $row_count++;
            }   
        } ?>
            </tr>

    </tbody>

</table>
<input type="hidden" id="row_count" value="<?php echo $row_count ?>"></>
<?php if ($extraData[2] == 2 || $extraData[2] == 5) { ?>
<?php if($extraData[7] == 0) { ?>
<table style="width: 100%"><tr><td><fieldset style="background-color: #d7e3e5"> <legend style="color:black;font-weight: bold;font-size: 15px">Add New Parts</legend>
                    <table align="center">
                        <tr>
                     <!--        <td> </td>-->
                            <td>
                                <div id="show_more_part_div">
                                    <table>
                                        <tr>
                                            <td><input type="text" placeholder="Part No" id="part_part_number_update" onkeypress="get_part_no_to_new_update();"></></td>
                                            <td><input type="text" placeholder="Description" id="part_description_update" onkeypress="get_part_description_update();"></></td>
                                            <td style="width: 20px"></td>
                                            <td><input type="text" placeholder="Qty" id="qty_field" style="width: 100px;text-align: center;border-color: blue" onkeypress="check_event_update(event)"></><input type="hidden" id="item_id_by_auto_complete_update"></><input type="hidden" id="selling_price_auto_update"></></td>
                                            <td><img src="<?php echo $System['URL']; ?>images/plus.png" style="width: 40px;height: 40px;cursor: pointer" onclick="add_new_parts();" ></></td>
                                            <td style="width: 50px;text-align: center;color: red"> OR</td>
                                            <td style="width: 20px" align="right"><input type="button" value="Reject Order" style="background-color: #ffffff;color: red;border-color: red" id="reject_button" onclick="reject_order()"></></td>
                                            <?php if ($extraData[2] == 5) { ?>
                                            <td style="width: 20px" align="right"><input type="button" value="Submit As Order" style="background-color: #ffffff;color: green;border-color: greenyellow" id="Submit_as_order_button" onclick="submit_like_order(<?php echo $extraData[1] ?>);"></></td>
                                            <?php }?>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>

                    </table>

                </fieldset>
            </td></tr></table>

<?php } ?>
<?php } ?>
<table align="right" style="width: 50%;color: black">
    <tr style="height: 10px"></tr>
    <tfoot>
      <tr style="font-size: 20px;font-weight: bold">
        <td colspan="2" align="center" style="text-align: left">Total Amount (Vat+Discount)</td>

        <td  id="total_amount"colspan="2" style="text-align:right"><?php echo number_format($extraData[4] ,2) ?></td>
    </tr>
    </tfoot>


</table>

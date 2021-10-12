<table>
    <tr>
        <td>
            <input type="button" value="+" onclick="add_sales_row('+sales_return+');"/>
        </td>
        <td>
            <input type="text" name="sr_item_name_'+sales_return+'" id="sr_item_name_1" placeholder="Select Product" >
            <input type="hidden" name="hisr_item_name_1" id="hisr_item_name_1">'
        </td>
        <td>
            <input type="text" name="sr_product_price_1" id="sr_product_pwrice_1" readonly="true" style="position: relative;margin: 0;top: 17px;"><br>
            <br><input type="checkbox">
        </td>
        <td>
            <input type="text" name="sr_item_qty_1" id="sr_item_qty_1">
        </td>
        <td>
            <input type="text" name="sr_abl_qty_1" id="sr_abl_qty_1" readonly="true">
        </td>
        <td>
            <input type="text" name="sr_amount_1" id="sr_amount_1" readonly="true">
        </td>
    </tr>
</table>
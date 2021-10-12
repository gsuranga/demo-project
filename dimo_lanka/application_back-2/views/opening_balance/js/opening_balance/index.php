<form action="" id="OBRegister"/>
<table class="table-decoration" style="width:50%">  
    <tr>
        <td>Distributor <input type="hidden"  id="rowcount" value="1" name="rowcount" style="width:90%" readonly="readonly"/></td>
        <td>

            <select style="width:100%" id="distributor"  name="distributor">
                <?php
                foreach ($this->alldis as $dis) {
                    echo" <option value='$dis->idposition'>{$dis->dis}</option>";
                }
                ?>
            </select>
        </td>
    </tr>
</table>
<table class="sub-table" id="openning_bal" border="0">
    <thead>
        <tr>
            <td class="sub-table-title" ></td>
            <td class="sub-table-title" width="35%">Product Name</td>
            <td class="sub-table-title" width="15%">Product Code</td>
            <td class="sub-table-title" width="20%">Price</td>
            <td class="sub-table-title" width="10%">Qty</td>
            <td class="sub-table-title" width="10%">Expiry Date</td>
            <td class="sub-table-title" >Amount</td>
        </tr>
    </thead>
    <tbody>
        <tr id="1">
            <td width="2%">
                <table>
                    <tr>
                        <td><input type="checkbox" name="checkbox-1-1" id="checkbox-1-1" class="regular-checkbox" style="width:10%"/><label for="checkbox-1-1" style="width:10px;height:8px;"  onclick="clickCheckBox(1);"></label></td>
                        <td><input type="hidden" value="" id="ihpo_1" name="ihpo_1" style="width:1%" readonly="readonly"/></td>
                    </tr>
                </table>
            </td>
            <td width="35%"><input type="text"  class ="product_name" id="product_name_1"  name="product_name_1"  style="width:95%" /></td>
            <td width="15%">
                <input type="hidden" id="product_id_1" name="product_id_1"  style="width:10%" readonly="readonly"  />
                <input type="text"  id="product_code_1" name="product_code_1"  style="width:90%" readonly="readonly"  />
            </td>
            <td width="20%"><input type="text" value="0.00" style="width:90%" id="price_1" name="price_1" onkeyup="calculateTotal(1);" readonly="readonly"/></td>
            <td width="10%"><input type="text" value="0"  style="width:90%" id="qty_1"  name="qty_1" onkeyup="calculateTotal(1);"/></td>
            <td ><input type='text' id='date_1' name='date_1'  style='width:80%;text-align:right'  value='' onmouseover='setDate(this.id);'/> </td>
            <td>
                <input type="text" value="0.00" id="amount_1" name="amount_1" class="amount" />
            </td> 
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><input type="button" onclick="addNewRow();" value="Add New Item" id="bt_product_add" style="padding:5px;font-size:10px;"/><input type="button" onclick="delrows();" value="Remove Item/s" id="bt_product_add" style="padding:5px;font-size:10px;margin-left:20px;"/></td>
            <td></td>
            <td></td>
            <td align="center"></td>
            <td>Total</td>
            <td><input style="font-size:16px;font-weight:bold;" type="text" name="po_total" value="0.00" id="po_total"></td>
        </tr>
        <tr>
            <td><input type="button" id="btn_add" name="btn_add" value="Add" onclick="createOB();"/></td>
            <td><input type="button" id="btn_add" name="btn_add" value="Cancel"/></td>
        </tr>
    </tfoot>
</table>
</form>



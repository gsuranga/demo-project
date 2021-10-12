<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
$_instance = get_instance();
?>
<?php echo form_open('part_analysis/managepart'); ?>

<form id="frm_part_analys">
    <table id="part_analysis" width="100%" class="SytemTable" align="center" cellpadding="10">
        <thead>
            <tr>
               
                <td rowspan="2" width="10%">Part Number</td>
                <td rowspan="2" width="15%">Description</td>
                <td rowspan="2">Selling Price with VAT</td>
                <td colspan="2">Average Movement</td>
                <td colspan="4">Reasons </td>
                <td rowspan="2">Maximum price could be sold at</td>
                <td rowspan="2">Quantities at the maximum price</td>
                <td rowspan="2">Remarks</td>
                
            </tr>
            <tr>
                <td width="8%">from Dimo to Dealer</td>
                <td width="8%">from Dealer to Customer</td>
                <td width="6%">Price</td>
                <td width="6%">Supply</td>
                <td width="6%">Packaging</td>
                <td width="6%">Awareness</td>
            </tr>
        </thead>
        <tbody>
        <input type="hidden" id="m_detail_id" name="m_detail_id" autocomplete="off" value="<?php echo $_GET['token_m_detail']?>"/> 
        
                <td><input type="text" id="partnumber" name="partnumber" value="<?php echo $_GET['token_m_part']?>" onfocus="get_part_no()"/>
                    <input type="hidden" id="itemid" name="itemid" value="<?php echo $_GET['token_m_itemid']?>" autocomplete="off"/> 
                </td>
                
                <td> <input type="text" id="description" name="description" value="<?php echo $_GET['token_m_des']?>" onfocus="get_desc()"/>
                    <input type="hidden" id="item_id" name="item_id" autocomplete="off"> 
                </td> 
                
                <td><input type="text" id="price" name="price" value="<?php echo $_GET['token_m_price']?>" onfocus="get_price()"/>
                    <input type="hidden" id="item_id1" name="item_id1" autocomplete="off"> 
                </td>
                
                <td><input type="text" id="daimo_to_dealer" name="daimo_to_dealer" value="<?php echo $_GET['token_dimo_del']?>"></td>
                <td><input type="text" id="daealer_to_customer" name="daealer_to_customer" value="<?php echo $_GET['token_to_cus']?>"></td>
                <td>
                    <select id="reason_price" name="reason_pric">
                       
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_supply" name="reason_suppl">
                       
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_packaging" name="reason_packagin">
                        
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_awareness" name="reason_awarenes">
                       
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td><input type="text" id="max_price" name="max_price" value="<?php echo $_GET['token_max_price']?>"></td>
                <td><input type="text" id="qty_at_max" name="qty_at_max" value="<?php echo $_GET['token_qty_max']?>"></td>
                <td><input type="text" id="remark" name="remark" value="<?php echo $_GET['token_rema_rks']?>"></td>
              
                <td><input type="hidden" id="rw_coun" name="rw_coun"></td>
            </tr>
        </tbody>
    </table>
    
    <br>
    
    <table>
        <tr>
            <td style="padding-left: 1100px"><input type="submit" id="part_submit" name="part_submit" value="Update" onclick="update_part_analysis();"></td>
            
        </tr>
    </table>
    
</form>

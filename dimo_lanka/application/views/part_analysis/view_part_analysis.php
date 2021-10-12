<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
                <td rowspan="2">Edit</td>
               
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
            <tr>
                 <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
            <tr>
                <td><?php echo $value->item_part_no;?></td>
                <td><?php echo $value->description;?></td> 
                <td><?php echo $value->selling_price;?></td>
                <td><?php echo $value->avg_movement_from_dimo_to_dealer;?></td>
                <td><?php echo $value->avg_movement_from_dealer_to_customer;?></td>
                <td><?php echo $value->reason_price;?></td>
                <td><?php echo $value->reason_supply;?></td>
                <td><?php echo $value->reason_packaging;?></td>
                <td><?php echo $value->reason_awareness;?></td>
                <td><?php echo $value->max_price;?></td>
                <td><?php echo $value->qty_at_max_price;?></td>
                <td><?php echo $value->remarks;?></td>
                
                <td><a style="text-decoration: none;" href="drawIndexManagepart?token_m_detail=<?php echo $value->detail_id;?>&token_m_itemid=<?php echo $value->item_id;?>&token_m_part=<?php echo $value->item_part_no;?>&token_m_des=<?php echo $value->description;?>&token_m_price=<?php echo $value->selling_price;?>&token_dimo_del=<?php echo $value->avg_movement_from_dimo_to_dealer;?>&token_to_cus=<?php echo $value->avg_movement_from_dealer_to_customer;?>&token_max_price=<?php echo $value->max_price;?>&token_qty_max=<?php echo $value->qty_at_max_price;?>&token_rema_rks=<?php echo $value->remarks;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>
            </tr>
            
<!--                
<td>
                    <select id="reason_price_1" name="reason_price_1" onchange="disable_price(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_supply_1" name="reason_supply_1" onchange="disable_supply(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_packaging_1" name="reason_packaging_1" onchange="disable_packaging(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td>
                    <select id="reason_awareness_1" name="reason_awareness_1" onchange="disable_awareness(1);">
                        <option value="0"></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td><input type="text" id="max_price_1" name="max_price_1"></td>
                <td><input type="text" id="qty_at_max_1" name="qty_at_max_1"></td>
                <td><input type="text" id="remark_1" name="remark_1"></td>-->
                <!--<td><a href="#"><img width="20" height="20" src="<?//php echo $System['URL']; ?>public/images/edit.png"></a></td>-->
               
                
                   <?php }
    } ?>
            </tr>
        </tbody>
    </table>
   


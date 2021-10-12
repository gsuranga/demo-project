<?php
$_instance = get_instance();
$row_id = 0;

$current_date = date("Y-m-d");







?>
<?php echo form_open('speciol_pramotion/addUpdateSpeciolPramotion'); ?>
<?php  ?>

<table align="center" width="80%">
    <input type="hidden" name="hid_rows" id="hid_rows">



    <!--<tr>-->
    <td>
    <tr><td> <input type="hidden" id="updateRowCount" name="updateRowCount" value="1"></input></td></tr>
                    <!--<tr><td> <input type="text" id="ID_HD" name="ID_HD" value="<?php echo $value->special_promotion_id;?>"></input></td></tr>-->
        <table width="100%" class="SytemTable" align="center" id="view_stock" cellpadding="0" cellspacing="0" >
            <thead>

                <tr>
                    
                    <td></td>
                    <td>Part No</td>
                    <td>Description</td>
                    <td>Item Price</td>
                     <td>Discount</td>
                    <td>Discount Type</td>              
                     <td>New Price</td>
                    <!--<td>Edit</td>-->
                    <td>Delete</td>


                </tr>


            <tbody>

                <?php
                if (isset($extraData)) {
                    $count = 0;
                   
                    
                    foreach ($extraData as $value) {
                        
                        $row_id++;
                        $tot = 0;
                        $pric= $value->selling_price;
                        $valueGVn= $value->discount;
                        $newPric=0;
                        if($value->discount_type ==0){
                            $status ='Default';
                            $newPric =$pric-$valueGVn;
                            $dtype='Pecentage';
                        } else {
                            $status ='Pecentage';
                            $newPric=$pric*$valueGVn/100;
                             $dtype='Default';
                        }
                     
                            
                            
                        ?>
                        <tr>
                            <td align='center'><input type='button' value='+' onClick="addRow('<?php echo $value->special_promotion_id; ?>');" id="add_row_<?php echo $count ?>" name="add_row_<?php echo $count ?>"/> <input  type="hidden" id="HDDetail<?php echo $count ?>" name="HDDetail<?php echo $count ?>" readonly="true" value="<?php echo $value->detail_id; ?> "/></td>
                            <!--<td><input style="width: 90px" type="text"  id="date_Edit_<?php echo $count ?>" value="<?php echo $value->added_date; ?>" disabled="true" onmouseover="set_hellodateED('<?php echo $count ?>');"/></td>--> 
                            <td><input style="width: 100px" type="text" id="Part_no<?php echo $count ?>" name="Part_no<?php echo $count ?>" value="<?php echo $value->item_part_no; ?> "  onclick="get_product(<?php echo $count ?>)"/> <input  type="hidden" id="Specl_ProID_HD<?php echo $count ?>" name="Specl_ProID_HD<?php echo $count ?>" readonly="true" value="<?php echo $value->special_promotion_id; ?> "/><input  type="hidden" id="HDUpdate<?php echo $count ?>" name="HDUpdate<?php echo $count ?>" readonly="true" value="Update"/></td> 

                            <td><input style="width: 150px" type="text" id="item_Descrip_<?php echo $count ?>" name="item_Descrip_<?php echo $count ?>" value="<?php echo $value->description; ?>" onfocus="getDes(<?php echo $count ?>)" /> <input  type="hidden" id="Item_ID_HD<?php echo $count ?>" name="Item_ID_HD<?php echo $count ?>" readonly="true"value="<?php echo $value->item_id; ?> "/></td> 
                            <td><input type="text" id="item_Price_<?php echo $count ?>" name="item_Price_<?php echo $count ?>" readonly="true" value="<?php echo $value->selling_price; ?>"  /></td> 
                            <td><input type="text" id="Discount_<?php echo $count ?>" name="Discount_<?php echo $count ?>" value="<?php echo $value->discount; ?>" onkeyup="setprice(<?php echo $count ?>)" /></td> 
                            <td><select  style="float:left; width: 120px" id="combo_id_<?php echo $count ?>" name="combo_id_<?php echo $count ?>"onchange="setprice(<?php echo $count ?>)" name="combo_id_<?php echo $count ?>"><option selected="selected"><?php echo $status ?></option><option ><?php echo $dtype ?></option></select></td> 
                            <td><input type="text" id="newPrice_<?php echo $count ?>" name="newPrice_<?php echo $count ?>" value="<?php echo $newPric; ?>" readonly="true"/></td> 
                            
                            <!--<td> <a href="#" id="manage_edit_<?php echo $count; ?>" onclick="activate_and_save_to_db(<?php echo $count; ?>);">Edit</a></td>-->
                            <td> <a href="#" onclick="delete_item(<?php echo $count; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>



                        </tr>


        <?php
        $count = $count + 1;
    }
}       
?>


            </tbody>



            <tfoot>

            </tfoot>
            </thead>
            
            <table width="100%">
            <tr>

                <td align="right"><input type="submit" id="UpdateNDSave" name="UpdateNDSave" value="Save Changes">
                <input type="reset" id="reset" name="reset" value="Reset">
                </td>
                
            </tr>
        </table>

        </table>
       

    </td>
</tr>
</table>
<?php echo form_close(); ?>
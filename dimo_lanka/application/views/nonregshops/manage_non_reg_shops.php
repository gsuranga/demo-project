<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

$_instance = get_instance();
?>
<?php echo form_open('non_reg_shops/updateNonRegShops');?>
<table width="100%">
    <tr style="display: none">
        <td>Shop Code</td>
        <td>
            
            <input type="text" id="txt_shop_code" name="txt_shop_code" value="<?php echo $_GET['token_shop_code'];?>"/>
            <input type="hidden" id="txt_shop_id" name="txt_shop_id" value="<?php echo $_GET['token_shop_id'];?>"/>
          
        </td>
    </tr>
     <tr>
        <td>Shop Name</td>
        <td><input type="text" id="txt_shop_name" name="txt_shop_name" value="<?php echo $_GET['token_shop_name'];?>"/></td>
    </tr>
     <tr>
        <td>Shop Address</td>
        <td><textarea id="txt_shop_address" name="txt_shop_address" cols="5"  rows="5" ><?php echo $_GET['token_shop_address'];?></textarea></td>
    </tr>
   <tr>
        <td>Contact No :</td>
        <td>
            <input type="text" id="txt_m_contact_no" name="txt_m_contact_no" value="<?php echo $_GET['token_contact_no'];?>"/>
           
        </td>
    </tr>
    <tr>
        <td>Remark :</td>
        <td>
            <textarea id="txt_m_remark" name="txt_m_remark" cols="5" rows="5"><?php echo $_GET['token_remark'];?></textarea>
           
    </tr>
    <tr>
        <td>Select City</td>
        <td>
            <input type="text" id="txt_city" name="txt_city" autocomplete="off" placeholder="Select City" onfocus="get_all_city();" value="<?php echo $_GET['token_city'];?>"/>
            <input type="hidden" id="txt_city_id" name="txt_city_id"  value="<?php echo $_GET['token_city_id'];?>"/>
        </td>
    </tr>
     <tr>
        <td>Select Branch</td>
        <td>
            <input type="text" id="txt_branch" name="txt_branch" autocomplete="off" placeholder="Select Branch" onfocus="get_all_branch_name();" value="<?php echo $_GET['token_branch'];?>"/>
            <input type="hidden" id="txt_branch_id" name="txt_branch_id"  value="<?php echo $_GET['token_branch_id'];?>"/>
        </td>
    </tr>
     <tr>
        <td>Select Sales Officer</td>
        <td>
            <input type="text" id="txt_sales_officer" name="txt_sales_officer" autocomplete="off" placeholder="Select Sales Officer" onfocus="get_all_sales_officer();" value="<?php echo $_GET['token_sales_officer'];?>"/>
            <input type="hidden" id="txt_sales_officer_id" name="txt_sales_officer_id"  value="<?php echo $_GET['token_sales_officer_id'];?>"/>
        </td>
    </tr>
     <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <input type="submit" value="Update" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('manege_non_reg_shop');
            ?></td>
    </tr>
</table>
<?php echo form_close();?>
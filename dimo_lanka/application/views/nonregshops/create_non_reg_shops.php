<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$sales_officer = array(
    'id' => 'sales_officer',
    'name' => 'sales_officer',
    'type' => 'text',
    'readonly' => 'true'
);

$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden'
);
$_instance = get_instance();
?>

<?php echo form_open('non_reg_shops/createNonRegShops'); ?>
<table width="100%" align="center">
    <tr style="display: none">
        <td>Shop Code</td>
        <td>
            <input type="text" id="txt_shop_code" name="txt_shop_code"/>
            <?php echo form_error('txt_shop_code'); ?>
        </td>
    </tr>
     <tr>
        <td>Sales Officer :</td>
        <td>
             <?php
            $username = $this->session->userdata('username');
            $id = $this->session->userdata('id');
           echo form_input($sales_officer, $username);
            ?>
           <?php echo form_input($sales_officer_id, $id); ?>
        </td>
    </tr>
    <tr>
        <td>Shop Name :</td>
        <td>
            <input type="text" id="txt_shop_name" name="txt_shop_name"/>
            <?php echo form_error('txt_shop_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Address :</td>
        <td>
            <textarea id="txt_shop_address" name="txt_shop_address" cols="5" rows="5"></textarea>
            <?php echo form_error('txt_shop_address'); ?>
        </td>
    </tr>
    <tr>
        <td>Contact No :</td>
        <td>
            <input type="text" id="txt_contact_no" name="txt_contact_no"/>
            <?php echo form_error('txt_contact_no'); ?>
        </td>
    </tr>
    <tr>
        <td>Remark :</td>
        <td>
            <textarea id="txt_remark" name="txt_remark" cols="5" rows="5"></textarea>
            <?php echo form_error('txt_remark'); ?>
        </td>
    </tr>
    <tr>
        <td>City:</td>
        <td>
            <input type="text" id="txt_city" name="txt_city" autocomplete="off" placeholder="Select City" onfocus="get_all_city();"/>
            <?php echo form_error('txt_city'); ?>
            <input type="hidden" id="txt_city_id" name="txt_city_id"/>
        </td>
    </tr>
    <tr>
        <td>Branch :</td>
        <td>
            <input type="text" id="txt_branch" name="txt_branch" autocomplete="off" placeholder="Select Branch" onfocus="get_all_branch_name();"/>
            <?php echo form_error('txt_branch'); ?>
            <input type="hidden" id="txt_branch_id" name="txt_branch_id"/>
        </td>
    </tr>
    <tr>
        <td  style="color: #000000;font-weight:900;">
            <table>
                <tr>
                    <td>Prefer to sell</td>
                </tr>
                <tr>
                    <td>TATA Genuine Parts ?</td>
                </tr>
            </table>
             
        </td>
        <td align="right" style="position: absolute;left: 253px;">
            <select id="cmb_prefer_tata" name="cmb_prefer_tata" style="width: 100px;">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
    </tr>
    <tr style="height : 30px">
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <input type="reset" value="Reset"/>
                    </td>
                    <td>
                        <input type="submit" value="Create" />
                    </td>
                    
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('creare_non_reg_shop');
            ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
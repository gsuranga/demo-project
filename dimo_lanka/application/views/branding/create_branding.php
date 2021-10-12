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
<?php echo form_open_multipart('branding/createBrandig'); ?>
<table width="100%" align="center">
 <tr>
        <td>Sales Officer</td>
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
        <td>Description</td>
        <td>
            <textarea  id="txt_description" name="txt_description" cols="5" rows="4"></textarea>
        </td>
    </tr>
    <tr>
        <td>Select Category</td>
        <td>
            <?php $_instance->drawAlCategories(); ?>
        </td>
    </tr>
    <tr>
        <td>Outlet</td>
        <td>
            <input type="text" id="txt_category_type" name="txt_category_type" autocomplete="off" placeholder="Select Outlet" onfocus="set_category_type();"/>
            <input type="hidden" id="txt_category_type_id" name="txt_category_type_id"/>
        </td>
    </tr>
   
    <tr id="non_dealer" onselect="hiden_non_admin();">
        <td>Account No</td>
        <td>
            <input type="text" id="txt_category_type_no" name="txt_category_type_no" autocomplete="off" placeholder="Select Outlet Account No" onfocus="set_category_type_no();"/>
            <input type="hidden" id="txt_category_type_no_id" name="txt_category_type_no_id"/>
        </td>
    </tr>
   
    <tr>
        <td> Image</td>
        <td>
     <input type="file" name="userfile" size="20" />

        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <input type="submit" value="Create"/>
                    </td> 
                </tr>
            </table>

        </td>
    </tr>
</table>
<?php echo form_close(); ?>
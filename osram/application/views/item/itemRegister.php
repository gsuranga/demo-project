<?php
/**
 * Description of itemRegister
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();

$reg_item_no = array(
    "id" => "reg_item_no",
    "name" => "reg_item_no",
    "type" => "text",
    "onkeyup"=>"get_item_no();"
);

$reg_item_account_code = array(
    "id" => "reg_item_account_code",
    "name" => "reg_item_account_code",
    "type" => "text",
    "onkeyup"=>"get_acc_code();"
);

$reg_item_name = array(
    "id" => "reg_item_name",
    "name" => "reg_item_name",
    "type" => "text",
       "onkeyup"=>"get_item_name();"
);

$reg_item_alias = array(
    "id" => "reg_item_alias",
    "name" => "reg_item_alias",
    "type" => "text",
    "onkeyup"=>"get_item_alias();"
);

$reg_item_reset = array(
    "id" => "reg_item_reset",
    "name" => "reg_item_reset",
    "type" => "reset",
    "value" => "RESET"
);

$reg_item_add = array(
    "id" => "reg_item_add",
    "name" => "reg_item_add",
    "type" => "button",
    "value" => "add to table",
    "onclick" => "add_data_row();"
);
?>
<script>
    function loadcategory(){
           var brandid = $j('#reg_brand_name').val();
           $j.ajax({
            type: 'POST',
            url: 'getCategoryList',
            data: {
                'brandid': brandid
            },
            success: function(data) {
//                // alert(data);
                $j('#category_list').empty();
                $j('#category_list').append(data);
//                loadOutlet();
//                loadPhysicalPlace();

            },
            error: function() {

            }
        });
}
</script>
<table width="100%"><tr><td>
            <table border='0' align='center' >

                <tr>
                    <td>Division Type</td>
                    <td>
                        <select name="reg_division_name" id="reg_division_name" style="width: 230px">
                            <option>Select Division</option>
                            <?php $_instance->drawDivision(); ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Brand</td>
                    <td>
                        <select name="reg_brand_name" id="reg_brand_name" onchange="loadcategory();" style="width: 230px">
                            <option>Select Brand</option>
                            <?php $_instance->drawBrand(); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category_list" id="category_list" style="width: 230px">
                            <?php // $_instance->getCategoryList('reg_brand_name'); ?>
                            <select>   
                                </td>
                                </tr>
                                <tr>
                                    <td>Item No</td>
                                    <td><?php echo form_input($reg_item_no); ?></td>
                                </tr>

                                <tr>
                                    <td>Item Name</td>
                                    <td><?php echo form_input($reg_item_name); ?></td>
                                </tr>
                                <tr>
                                    <td>Item Alias</td>
                                    <td><?php echo form_input($reg_item_alias); ?></td>
                                </tr>                                
                                <tr>
                                    <td>Item Account Code</td>
                                    <td><?php echo form_input($reg_item_account_code); ?></td>
                                </tr>


                                <tr>
                                    <td></td>
                                    <td>
                                        <table align='right'>
                                            <tr>
                                                <td><?php echo form_input($reg_item_reset); ?></td>
                                                <td><?php echo form_input($reg_item_add); ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </table></td></tr>
                                <tr><td align="center">
                                        <?php //echo $this->session->flashdata('insert_item'); ?>
                                        <?php echo validation_errors(TRUE); ?>
                                        <?php echo form_open('item/insertItem'); ?>
                                        <table width="80%" class="SytemTable" align='center' cellpadding="0" cellspacing="0" id="more_item_table">
                                            <thead>
                                                <tr>
                                                    <td>Division</td>
                                                    <td>Brand</td>
                                                    <td>Category</td>
                                                    <td>Item No</td>
                                                    <td>Item Account Code</td>
                                                    <td>Item Name</td>
                                                    <td>Item Alias</td>
                                                    <td>Edit</td>
                                                    <td>Remove</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>
                                    </td></tr>

                                <tr><td>
                                        <table border="0" width="15%" align="right">
                                            <tr>
                                                <td><input type="submit" value="save"></td>
                                            </tr>
                                        </table>
                                    </td></tr>
                                </table>
                                <?php echo form_close(); ?>
<table align="center">
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_item'); ?>
        </td>
    </tr>
</table>

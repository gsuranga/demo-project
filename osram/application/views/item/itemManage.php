<?php
/**
 * Description of itemManage
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
    
<?php
$_instance = get_instance();

$manage_item_name = array(
    "id" => "manage_item_name",
    "name" => "manage_item_name",
    "type" => "text",
    "autocomplete" => "off",
    'placeholder' => 'Select Item',
    "onfocus" => "list_item_by_category();"
);

$serach_data = array(
    "id" => "serach_data",
    "name" => "serach_data",
    "type" => "submit",
    "value" => "search"
);

$hiddn_token = array(
    "id" => "hiddn_token",
    "name" => "hiddn_token",
    "type" => "hidden"
);

$hiddn_item_id = array(
    "id" => "hiddn_item_id",
    "name" => "hiddn_item_id",
    "type" => "hidden"
);

$hiddn_token_type = array(
    "id" => "hiddn_token_type",
    "name" => "hiddn_token_type",
    "type" => "hidden"
);
?>

<?php echo form_open('item/drawIndexManageItem'); ?>
<table border="0" align="center" width="30%">

<!--    <tr>
        <td>Item Brand</td>
        <td>
            <select id="brandid" name="mnage_category" onchange="brandid();">
                <option>ALL</option>
<?php $_instance->getbrand(); ?>
            </select>
        </td>
    </tr>-->
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
                <option>Select Item Category</option>
                <?php $_instance->getCategoryList('reg_brand_name');  ?>
             <select>   
        </td>
    </tr>
<!--    <tr>
<td>Item Category</td>
<td>
<select id="mnage_category" name="mnage_category" onchange="get_item_category();">
    <option>ALL</option>
<?php $_instance->getCategoryList(); ?>
</select>
</td>
</tr>-->

                    <tr>
                        <td>Item Name <?php echo form_input($hiddn_token_type); ?></td>
                        <td><?php echo form_input($manage_item_name);
echo form_input($hiddn_token);
echo form_input($hiddn_item_id); ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <table align='right'>
                                <tr>
                                    <td>
                                        <?php echo form_input($serach_data); ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </table>
                    <?php echo form_close(); ?>


<?php
/**
 * Description of indexManageItem
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>
<table  width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Manage Item</td>
    </tr>
    <tr>
        <td>
            <?php $_instance->drawManageItem(); ?>
        </td>

    </tr>
    <tr>
        <td>
            <?php if (isset($_POST['hiddn_item_id'])) $_instance->drawItemFilterbyName(); ?>
        </td>
    </tr>
</table>

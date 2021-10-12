<?php
/**
 * Description of indexItemCategory
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Insert Item Category</td>
        <td>List Item Category</td>
        <td>Manage Item Category</td>
    </tr>
    <tr style="vertical-align: top">
        <td width="30%"><?php $_instance->drawInsertItemCategory(); ?></td>
        <td width="45%"><?php $_instance->drawViewItemCategory(); ?></td>
        <td width="30%"><?php $_instance->drawUpdateItemCategory(); ?></td>

    </tr>
</table>
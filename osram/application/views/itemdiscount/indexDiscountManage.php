<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$_instance = get_instance();
?>


<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>List Discount</td>
        <td>Manage Discount</td>
    </tr>
    <tr style="vertical-align: top">
        <td><?php $_instance->drawDiscountView(); ?></td>
        <td width ='30%'>
            <?php
            if (isset($_GET['id_employee_item_discount'])) {
                $_instance->drawDiscountManage($_GET['id_employee_item_discount']);
            }
            ?> 

        </td>
    </tr>

</table>
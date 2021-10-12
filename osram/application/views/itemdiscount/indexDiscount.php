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
        <td>Insert Discount</td>
        <td>List Discount</td>
    </tr>
    <tr style="vertical-align: top">
        <td width ='30%'><?php $_instance->drawaddDiscount(); ?> </td>
        <td><?php $_instance->drawDiscountView(); ?></td>
    </tr>

</table>
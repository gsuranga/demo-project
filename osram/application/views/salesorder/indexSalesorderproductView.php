<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = get_instance(); ?>


<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Sales Order Details
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top">
            <?php
            if (isset($_GET['id_sales_order'])) {
                $CI->getOrderAmounts($_GET['id_sales_order'],$_GET['type']);
            }
            
            ?>
        </td>
    </tr>
</table>

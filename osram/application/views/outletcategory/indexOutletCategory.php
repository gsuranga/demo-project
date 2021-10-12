<?php
/**
 * Description of indexOutletCategory
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php $CI = get_instance(); ?>


<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Register New Outlet Category
        </td>
        <td>
            List Of Outlet Category
        </td>
    </tr>
    <tr style="vertical-align: top">
        <td width="30%"> <?php $CI->drawOutletCategoryRegister(); ?></td>
        <td width="70%"><?php $CI->drawOutletCategoryView(); ?></td>
    </tr>
</table>

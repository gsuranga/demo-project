<?php
/**
 * Description of indexOutletCategoryView
 *
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 * 
 */
?>
<?php $CI = get_instance(); ?>


<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            List Outlet
        </td>
    </tr>
    <tr>
      <td width="70%"><?php $CI->viewOutletCategoryDetailsItem(); ?></td>  
        
    </tr>
    <tr style="vertical-align: top">
       <td style="vertical-align: top"> <?php
                if (isset($_POST['Outlet_category_type'])) {
                    //print_r($_POST);
                    $CI->viewOutletCategoryByFilterKey($_POST);
                }
                ?> </td>
    </tr>
</table>

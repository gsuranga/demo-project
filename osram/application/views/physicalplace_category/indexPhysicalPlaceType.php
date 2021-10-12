<?php 
/**
 * Description of indexPhysicalPlaceType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                Register Physical Place Category
            </td>
            <td>
                List Physical Place Category
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top; width: 35%;">
                <?php $CI->drawPhysicalPlaceCategoryRegister(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawPhysicalPlaceCategoryView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

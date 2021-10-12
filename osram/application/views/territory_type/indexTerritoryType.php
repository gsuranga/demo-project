<?php 
/**
 * Description of indexTerritoryType
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
                Register Territory Type
            </td>
            <td>
                List Territory Type
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top; width: 35%;">
                <?php $CI->drawTerritoryTypeRegister(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawTerritoryTypeView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

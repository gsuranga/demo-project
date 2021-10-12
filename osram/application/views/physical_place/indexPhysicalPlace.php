<?php 
/**
 * Description of indexPhysicalPlace
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td>
                Register Physical Place
            </td>
            <td>
                List Physical Place
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawPhysicalPlaceRegister(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawPhysicalPlaceView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

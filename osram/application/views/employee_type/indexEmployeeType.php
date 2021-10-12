<?php 
/**
 * Description of indexEmployeeType
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
                Register Employee Type
            </td>
            <td>
                List Employee Type
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top; width: 30%;">
                <?php $CI->drawEmployeeTypeRegister(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawEmployeeTypeView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

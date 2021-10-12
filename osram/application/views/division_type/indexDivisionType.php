<?php
/**
 * Description of indexDivisionType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<div id="content_div1">
    <table width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                Register Division Type
            </td>
            <td>
                List Division Type
            </td>
        </tr>
        <tr> 
            <td style="vertical-align: top; width: 30%;">

                <?php $CI->drawDivisionTypeRegister(); ?>
            </td>

            <td style="vertical-align: top">

                <?php $CI->drawDivisionTypeView(); ?>

            </td>
        </tr>
    </table>
</div>

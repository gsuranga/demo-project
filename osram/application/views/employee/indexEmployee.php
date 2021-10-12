<?php
/**
 * Description of indexEmployee
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<div id="content_div1">
    <table   width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow" >
            <td>
                Register Employee
            </td>
            <td>
                List Employee
            </td>
        </tr>
        <tr> 
            <td style="vertical-align: top;">
                <?php $CI->drawEmployeeRegister(); ?>
            </td>
            <td style="vertical-align: top;">
                <?php $CI->drawEmployeeView(); ?>
            </td>

        </tr>
    </table>
</div>

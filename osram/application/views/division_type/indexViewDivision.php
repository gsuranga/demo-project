<?php 
/**
 * Description of indexViewDivision
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance(); ?>
<div id="content_div1">
    <table width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td style="width: 30%;">
                List All Division
            </td>

        </tr>
        <tr> 

            <td style="vertical-align: top;">
                <?php $CI->drawDivisionView(); ?>
            </td>

        </tr>
    </table>
</div>

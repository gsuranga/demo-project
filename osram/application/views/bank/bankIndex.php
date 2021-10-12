<?php
/**
 * Description of indexDivision
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<div id="content_div1">
    <table  width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow">
            <td>
                Register Bank
            </td>
            <td>
                View Bank
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top;width: 35%">
                <?php $CI->drawBankView(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawViewBanks(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

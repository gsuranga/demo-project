<?php 
/**
 * Description of indexTerritory
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
                Add Territory
            </td>
            <td>
                View Territory
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawTerritoryRegister(); ?>
            </td>
            <td style="vertical-align: top">
                <?php $CI->drawTerritoryView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

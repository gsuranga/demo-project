<?php
/**
 * Description of indexEmployeeAssign
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<div id="content_div1">
    <table   width="100%" border="0" cellpadding="10">

        <tr class="ContentTableTitleRow" >
            <td style="vertical-align: top; width: 60%;">
                Assign Employee
            </td>
            <td style="vertical-align: top; width: 30%;">
                List Employee
            </td>
        </tr>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top; width: 60%;">
                <?php $CI->drawEmployeeAssign($_GET['empID']); ?>
            </td>
            <td style="vertical-align: top; width: 30%;">
                <?php $CI->drawEmployeeView(); ?>
            </td>
            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

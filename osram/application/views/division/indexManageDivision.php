<?php
/**
 * Description of indexManageDivision
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance(); 
?>

<div id="content_div1">

    <table width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">

                <td>
                    List Division
                </td>
                <td>
                    Manage Division
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawDivisionView(); ?>

            </td>
            <td style="vertical-align: top; width: 45%;">
                
                <?php $CI->viewDivisionFromID($_GET['division_idd']); ?>

            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

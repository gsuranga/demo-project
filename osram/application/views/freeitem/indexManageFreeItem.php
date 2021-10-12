<?php
/**
 * Description of indexManageDivisionType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance(); ?>

<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">

                <td>
                    List Division Type
                </td>
                <td>
                    Manage Division Type
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawDivisionTypeView(); ?>

            </td>
            <td style="vertical-align: top; width: 45%;">
                <?php $CI->viewDivisionTypeFromID($_GET['division_type_idd']); ?>

            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

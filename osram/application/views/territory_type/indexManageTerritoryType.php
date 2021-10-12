<?php 
/**
 * Description of indexManageTerritoryType
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>

<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">

                <td>
                    List Territory Type
                </td>
                <td>
                    Manage Territory Type
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawTerritoryTypeView(); ?>

            </td>
            <td style="vertical-align: top; width: 45%;">
                <?php $CI->viewTerritoryTypeFromID($_GET['territory_type_idd']); ?>

            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

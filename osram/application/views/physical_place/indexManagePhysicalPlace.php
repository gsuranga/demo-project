<?php 
/**
 * Description of indexManagePhysicalPlace
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
                    List Physical Place
                </td>
                <td>
                    Manage Physical Place
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->drawPhysicalPlaceView(); ?>

            </td>
            <td style="vertical-align: top; width: 45%;">
                <?php $CI->viewPhysicalPlaceFromID($_GET['physical_place_idd']); ?>

            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

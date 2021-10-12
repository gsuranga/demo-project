<?php
/**
 * Description of indexManageProductionView
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<?php $CI = & get_instance(); ?>

<div id="content_div1">

    <table  width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">

                <td>
                    List Production
                </td>
                <td>
                    Manage Production
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top">
                <?php $CI->getProductionList(); ?>

            </td>
            <td style="vertical-align: top; width: 45%;">

                <?php
                if (isset($_GET['production_id'])) {
                    $CI->viewProductionFromID($_GET['production_id']);
                }
                ?>

            </td>


            <!-- end table left side-->
            <!-- begin table left side-->

            <!-- end table right side-->
        </tr>
    </table>
</div>

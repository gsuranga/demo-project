<?php
/**
 * Description of indexManageTerritory
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php $CI = & get_instance(); ?>

<div id="content_div1">

    <table width="100%" border="0" cellpadding="10">
        <thead>
            <tr class="ContentTableTitleRow">

                <td>
                    Territory Details
                </td>
                <td>

                    <?php
                    if (isset($_GET['territory_idd'])) {

                        echo "Manage Territory";
                    } else if (isset($_GET['territory_idd2'])) {
                        echo "View Territory Map";
                    }
                    ?>
                </td>
            </tr>

        </thead>
        <tr> 
            <!-- table left side-->
            <td style="vertical-align: top;width: 45%;">
                <?php
                if (isset($_GET['territory_idd2'])) {
                    $CI->viewDevisionDetailsFromTerritoryID($_GET['territory_idd2']);
                } else if (isset($_GET['territory_idd'])) {
                    $CI->drawTerritoryView();
                }
                ?>

            </td>
            <td style="vertical-align: top; width: 55%;">
                <?php
                if (isset($_GET['territory_idd'])) {

                    $CI->viewTerritoryFromID($_GET['territory_idd']);
                } else if (isset($_GET['territory_idd2'])) {
                    $CI->viewDivisionFromTerritoryID($_GET['territory_idd2']);
                }
                ?>
                &ensp;
                <table width="100%" border="0" cellpadding="10">
                    <?php if (isset($_GET['id_territory_has_division1'])) { ?>
                        <tr class="ContentTableTitleRow"><td>Update Mapping</td></tr>
                    <?php }
                    ?>

                    <tr>
                        <td style="vertical-align: top;">
                            <?php
                            if (isset($_GET['id_territory_has_division1'])) {
                                $CI->viewDivisionFromDivisionID($_GET['id_territory_has_division1']);
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
</div>

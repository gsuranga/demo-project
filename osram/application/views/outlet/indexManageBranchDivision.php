<?php 
/**
 * Description of indexManageBranchDivision
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
                    Branch Details            
                </td>
                <td>
                    Division List
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width: 50%;">
                <?php
                if (isset($_GET['id_outlet_has_branch'])) {
                    $CI->viewBranchDetailsFromBranchID($_GET['id_outlet_has_branch']);
                }
                ?>
            </td>
            <td style="vertical-align: top;width:50%;">
                <?php
                if (isset($_GET['id_outlet_has_branch'])) {
                    $CI->viewDivisionListFromBranchID($_GET['id_outlet_has_branch']);
                }
                ?>
                &ensp;
                <table width="100%" border="0" cellpadding="10">
                    <?php if (isset($_GET['id_branch_has_division'])) { ?>
                        <tr class="ContentTableTitleRow"><td>Update Maping</td></tr>
                    <?php }
                    ?>

                    <tr>
                        <td style="vertical-align: top;">
                            <?php
                            if (isset($_GET['id_branch_has_division'])) {
                                $CI->viewManageDivisionDetailsFromId($_GET['id_branch_has_division']);
                            }
                            ?>
                        </td>
                    </tr>
                </table>


        </tr>

    </table>
</div>


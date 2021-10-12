<?php 
/**
 * Description of indexManageBranch
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
                    Branch List             
                </td>
                <td>
                    Manage Branch
                </td>

            </tr>

        </thead>
        <tr> 
            <td style="vertical-align: top;width: 60%;">
                <?php
                $CI->viewOutletDetailsFromId($_GET['id_outlet2']);
                ?>
            </td>
            <td style="vertical-align: top;width:40%;">
                <?php
                $CI->viewBranchDetailsFromId($_GET['id_outlet_has_branch']);
                ?>
            </td>


        </tr>
      
    </table>
</div>


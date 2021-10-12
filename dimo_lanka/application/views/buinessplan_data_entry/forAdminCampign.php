<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center"></td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#swot_analysis"><span>Creating Campaign Types</span></a></li>
                    <li><a href="#competitor_analysis"><span>Add Campaign Items</span></a></li>

                </ul>
                <div class="Tab_content" id="swot_analysis">
                    <?php $_instance->creatingCampaignTypes(); ?>
                </div>

                <div class="Tab_content" id="competitor_analysis">
                    <?php $_instance->addingnewItems(); ?>
                </div>

            </div>
        </td>
    </tr>
</table>


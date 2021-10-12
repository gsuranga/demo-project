<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open('campaign/addnewcampaigntype'); ?>

<table align="center">
    <tr>
        <td style="width: 60%">
            <table>
                <tr>
                    <td style="width:160px ">New Type:</td>
                    <td align="right"><input type="text" id="new_campaign_type" name="new_campaign_type"></></td>
                </tr>
                <tr style="height: 20px"></tr>
                <tr>
                    <td></td>
                    <td align="right"><input type="submit"></></td>
                </tr>

            </table>
        </td>
        
    </tr>


</table>
<? form_close('') ?>

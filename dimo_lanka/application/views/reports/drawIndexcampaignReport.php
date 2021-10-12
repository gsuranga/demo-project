<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
$_instance = get_instance();

?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10" >
    <tr class="ContentTableTitleRow">

        <td>Campaign Report</td>

    </tr>
    <tr>

        <td style="vertical-align: top;" ><?php $_instance->drawViewCampaignReport(); ?></td>
       

    </tr>
</table>


<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<form action="<?php echo $System['URL'] ?>part_analysis/drawIndexPartAnalysis">
    <table align="center" width="100%" cellsapcing="10" cellpadding="10">
        <tr class="SubTile">
            <td align="center" style="color: #000000;font-size: larger "><b>Part Analysis Details</b></td>
        </tr>
        <tr></tr>

        <tr>
            <td align="center"><?php $_instance->createPartNumberDetails(); ?></td>
        </tr>
        <tr></tr>

        <tr>
            <td align="center"><?php $_instance->createPartAnalysisDetails(); ?></td>
        </tr>
        <tr></tr>
<!--
        <tr class="SubTile" align="center">
            <td style="color: #184E69; "><b>Reasons Summary</b> </td>
        </tr>-->
    <!--    <tr>
            <td align="center"><?php // $_instance->createReasonsSummary();  ?></td>
        </tr>-->

<!--    <tr>
        <td>
            <table id="tbl_reasons">
                
            </table>
        </td>
    </tr>-->

        <tr align="right">
            <td align="right"><input type="submit"  value="Back"></td>
        </tr>
    </table>
</form>

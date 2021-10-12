<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php


$search_competitter_parts = array(
    'id' => 'search_competitter_parts',
    'name' => 'search_competitter_parts',
    'type' => 'submit',
    'value' => 'Search'
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>

<table align="right">
    <tr>
        <td>
            <input type="button" value="Print To Exel"/>
        </td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_competitor" align="center">
    <thead>
        <tr>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">TGP Number</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px" width="15%">Description</td>
            <td style="background-color: #003366;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">SP of TGP Number</td>
            <td style="background-color: #5C2F66;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Competitor Part number</td>
            <td style="background-color: #E13300;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Brand</td>
            <td style="background-color: #FFCB00;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Importer</td>
            <td style="background-color: forestgreen;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Selling Price of non genuine</td>
            <td style="background-color: darksalmon;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:white;text-shadow: 25px">Movement of non TGP</td>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->item_part_no; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->description; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->selling_price; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->competitor_part_no; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->brand; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->importer; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->selling_price_non_tgp; ?></td>
                    <td style="background-color: #00FFFFFF;border-top: 1px solid #000000;  border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" align="CENTER" valign="BOTTOM" sdnum="1033;1033;General"><font style="color:black;text-shadow: 25px"><?php echo $value->movement_in_dealer; ?></td>
                </tr>
                <?php
            }
        } else {
            ?> 
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>


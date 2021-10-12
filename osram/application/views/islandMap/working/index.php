<?php
/**
 * Jul 22, 2014 2:16:07 PM
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
$_instance = get_instance();
?>
<style type = "text/css">
    .Location {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        font-style: normal;
        line-height: normal;
        font-weight: bold;
        font-variant: normal;
        color: #000;
        background-color: #FFF;
        position: absolute;
        padding: 3px;
        margin: 0px;
        text-align: center;
        opacity: 0.8;
        filter: alpha(opacity = 80);
    }
    .Location:hover {
        color: #000;
        cursor: pointer;
        cursor: hand;
        font-size: 13px;
        z-index: 500;
        border: dotted 1px #000;
        -webkit-box-shadow: 0px 0px 10px 0px #000;
        box-shadow: 0px 0px 10px 0px #000;
        opacity: 1;
        filter: alpha(opacity = 100);
    }
    .Location span {
        font-size: 11px;
        font-weight: normal;
    }
    .Green {
        color: #090;
    }
    .Green:hover {
        color: #090;
        cursor: pointer;
        cursor: hand;
        font-size: 13px;
        z-index: 500;
        border: dotted 1px #090;
        -webkit-box-shadow: 0px 0px 10px 0px #090;
        box-shadow: 0px 0px 10px 0px #090;
        opacity: 1;
        filter: alpha(opacity = 100);
    }
    .RED {
        color: #F00;
    }
    .RED:hover {
        color: #F00;
        cursor: pointer;
        cursor: hand;
        font-size: 13px;
        z-index: 500;
        border: dotted 1px #F00;
        -webkit-box-shadow: 0px 0px 10px 0px #f00;
        box-shadow: 0px 0px 10px 0px #f00;
        opacity: 1;
        filter: alpha(opacity = 100);
    }
</style>
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Island Wide Tracking (Using Today Sales Orders)
            <input type="button" value="Save" style="float: right" onclick="save_as_img();"/>
        </td>
    </tr>
    <tr id="map">
        <td width="1024px" height="1448px" style="background-image:url(<?= $System['URL']; ?>public/images/island_map.jpeg);vertical-align:top;padding:0px;background-repeat:no-repeat;background-color: white;" >
            <table class="SytemTable" align="right" border="0">
                <thead>
                    <tr>
                        <th>
                            <?= date('h:i:s a'); ?>
                        </th>
                        <th>
                            <input type="submit" onclick="window.location.reload();" value="Refresh"/>
                        </th>
                    </tr>
                </thead>
                <?php
                $rif = $_instance->getRep_invoice_Info();
                $reps = $_instance->getReps();
                ?>
                <tbody>              
                    <tr>
                        <td style="color: #090;">Working</td>
                        <td style="color: #090;"><?= $rif[0]->working ?></td>
                    </tr>
                    <tr>
                        <td style="color: #60F;">Working But no Transactions within last hour</td>
                        <td style="color: #60F;"><?= ($rif[0]->working) - ($rif[0]->lhour) ?></td>
                    </tr>
                    <tr>
                        <td style="color: #F00;">Not Working</td>
                        <td style="color: #F00;"><?= (count($reps)) - ($rif[0]->working) ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?= count($reps); ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
            unset($rif);
            $t = 0;
            foreach ($reps as $rp) {
                $t+=$rs[0]->tot;
                $rs = $_instance->getRepStatus($rp->id_territory, $rp->id_territory_type);
                $lastHourStatus = $_instance->lastHourStatus($rp->id_employee_has_place);
                ?>
                <p class="Location" style="left:<?= $rp->left ?>px;top:<?= $rp->top ?>px;
                   <?php
                   $i = (int) $rs[0]->tot;
                   if (!$i) {
                       echo 'color: #F00;';
                   } elseif ($lastHourStatus) {
                       echo 'color: #090;';
                   } else {
                       echo 'color: #60F;';
                   }
                   ?>" onclick="toTimeReport(<?php echo $rp->id_employee?>)">
                       <?= $rp->name //. ' - ' . $rp->id_employee_has_place .'/'.$rp->id_territory ?>
                       <?= ' (' . (int) $rs[0]->cnt . '/' . (int) $rs[0]->allols . ') '; ?>
                    <br/>
                    <span><?= "R.s" . " " . number_format($rs[0]->tot, 2) ?></span></p>
                <?php
            }
            ?>
            <label><h3>Total Sale: <?= "R.s" . " " . number_format($t, 2) ?></h3></label>
        </td>
    </tr>
</table>




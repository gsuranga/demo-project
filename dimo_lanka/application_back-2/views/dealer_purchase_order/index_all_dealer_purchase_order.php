<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">All Dealer Purchase Orders</td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#pending_orders"><span>Pending Orders</span></a></li>
                    <li><a href="#accpt_orders"><span>Accepted Orders</span></a></li>
<!--                    <li><a href="#rejected_orders"><span>Rejected Orders</span></a></li>-->

                </ul>
                <div class="Tab_content" id="pending_orders">
                    <?php $_instance->drawAllPendingOrders(); ?>
                </div>

                <div class="Tab_content" id="accpt_orders">
                    <?php $_instance->drawAllAcceptedOrders($_POST); ?>
                </div>
                <!--                <div class="Tab_content" id="rejected_orders">
                <?php //$_instance->drawAllRejectedOrders($_POST); ?>
                                </div>-->

            </div>
        </td>
    </tr>
</table>


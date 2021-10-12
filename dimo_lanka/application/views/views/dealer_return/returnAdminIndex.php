<?php
// widuranga jayawickrama
// widurangajayawickrama@gmail.com

$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Dealer Return</td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#pending_orders_admin"><span>Pending Returns</span></a></li>
                    <li><a href="#accpt_orders_admin"><span>Accepted Returns</span></a></li>
                    <li><a href="#rejected_orders_admin"><span>Rejected Returns</span></a></li>
                </ul>
                <div class="Tab_content" id="pending_orders_admin">
                    <?php $_instance->drawAdminAcceptedReturn(); ?>
                </div>
                <div class="Tab_content" id="accpt_orders_admin">
                    <?php $_instance->AdminacceptedReturnView(); ?>
                </div>
                <div class="Tab_content" id="rejected_orders_admin">
                    <?php $_instance->AdminRejectedView(); ?>
                </div>
            </div>
        </td>
    </tr>
</table>


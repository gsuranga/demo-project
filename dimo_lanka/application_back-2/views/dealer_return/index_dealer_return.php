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
                    <li><a href="#pending_orders"><span>Pending Returns</span></a></li>
                    <li><a href="#accpt_orders"><span>Accepted Returns</span></a></li>
                    <li><a href="#rejected_orders"><span>Rejected Returns</span></a></li>
                </ul>
                <div class="Tab_content" id="pending_orders">
                    <?php $_instance->drawAllDealerReturns(); ?>
                </div>
                <div class="Tab_content" id="accpt_orders">
                    <?php $_instance->drawacceptedReturn(); ?>
                </div>
                <div class="Tab_content" id="rejected_orders">
                    <?php $_instance->rejectedDetails(); ?>
                </div>
            </div>
        </td>
    </tr>
</table>


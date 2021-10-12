<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
$j(function() {

    $j("#tabs").tabs();
});
</script>
<div id="tabs">
                <ul>
                    <li><a href="#warranty"><span>Warranty Issues</span></a></li>
                    <li><a href="#freeIsssue"><span>Free Issues</span></a></li>
                </ul>

 <div id="warranty" class="Tab_content ">
<table class="SytemTable" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Sales Order Id</td>
                    <td>Employee Name</td>
                    <td>Item Name</td>
                    <td>Item Account code</td>
                    <td>Outlet</td>
                    <td>Quantity</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extraData['free'] as $value) { 
                    if($value->type_sale=="Warrenty"){
                    ?>
                <tr>
                    <td><?php echo $value->added_date?></td>
                    <td><?php echo $value->added_time?></td>
                    <td><?php echo str_pad($value->id_sales_order, 12, "0", STR_PAD_LEFT)?></td>
                    <td><?php echo $value->emp_name ?></td>
                    <td><?php echo $value->item_name ?></td>
                    <td><?php echo $value->item_account_code ?></td>
                    <td><?php echo $value->outlet_name; ?></td>
                    <td><?php echo $value->free_issue_qty ?></td>
                </tr>
                <?php  } }?>
                
            </tbody>
        </table>
    </div>
    <div id="freeIsssue" class="Tab_content">
        <table class="SytemTable" width="100%" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Sales Order Id</td>
                    <td>Employee Name</td>
                    <td>Item Name</td>
                    <td>Item Account code</td>
                    <td>Outlet</td>
                    <td>Quantity</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extraData['free'] as $value) { 
                    if($value->type_sale=="Free Issues"){
                    ?>
                <tr>
                    <td><?php echo $value->added_date?></td>
                    <td><?php echo $value->added_time?></td>
                    <td><?php echo str_pad($value->id_sales_order, 12, "0", STR_PAD_LEFT)?></td>
                    <td><?php echo $value->emp_name ?></td>
                    <td><?php echo $value->item_name ?></td>
                    <td><?php echo $value->item_account_code ?></td>
                    <td><?php echo $value->outlet_name; ?></td>
                    <td><?php echo $value->free_issue_qty ?></td>
                </tr>
                <?php  } }?>
                
            </tbody>
        </table>

</div>
</div>
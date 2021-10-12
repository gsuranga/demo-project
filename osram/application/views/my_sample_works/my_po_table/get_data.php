<?php $_instance= get_instance();?>

<table width="100%" cellpadding="10" border="0" align="center" class="SytemTable">
    <tr>
    <thead>
        <td>A</td>
        <td>B</td>
        <td>C</td>
        <td>D</td>    
    </thead>
    </tr>
    
    <?php 
      //  foreach ($extraData['get_po_data'] as $value) { 
        foreach ($extraData as $value) { 
    ?>
    <tr>
        <td><?php echo $value->posm_order_detail_id	; ?></td>
        <td><?php echo $value->item; ?></td>
        <td><?php echo $value->quantity; ?></td>
        <td><?php echo $value->posm_order_id; ?></td>
    </tr>
    
    
        <?php } ?>
</table>    
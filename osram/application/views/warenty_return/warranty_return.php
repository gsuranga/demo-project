<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table id="wty" width="100%" cellpadding="10" border="0" align="center" class="SytemTable">
    
     <thead>
         <tr>
   
        <td>warranty Return Id</td>
        <td>Outlet Name</td>
        <td>Item Name</td>
        <td>Serial No</td>
        <td>Reason</td>    
        <td>Date</td>    
        <td>Time</td>    
   
    </tr>
     </thead>


    <?php    
    foreach ($extraData['getWarrantyReturn'] as $value) { ?>
        <tr>
<!--            <tbody>-->
             <td><?php echo $value->warrenty_return_id; ?></td>
            <td><?php echo $value->outlet_name; ?></td>
            <td><?php echo $value->item_name; ?></td>
            <td><?php echo $value->serial_no; ?></td>
            <td><?php echo $value->reason; ?></td>            
            <td><?php echo $value->date; ?></td>            
            <td><?php echo $value->time; ?></td>            
<!--            </tbody>-->
        </tr>
    <?php } ?>



</table>


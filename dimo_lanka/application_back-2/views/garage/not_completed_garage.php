<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_work_shop">
    <thead>
        <tr>
            <td>Garage Name</td>
            <td>Garage Address</td>
            <td>Garage Contact No</td>
            <td>Nearest TATA Dealer</td>
            <td>Remark</td>            
         
            <td>View</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $row = 0;
        if ($extraData != '') {
            foreach ($extraData as $value) {
                $row++;
                ?>
                <tr>
                    <td><?php echo $value->garage_name;?></td>
                    <td><?php echo $value->garage_address;?></td>
                    <td><?php echo $value->garage_contact_no;?></td>
                    <td><?php echo $value->nearest_tata_dealer;?></td>
                    <td><?php echo $value->remarks;?></td>
                   
                    <td><input type="button" value="view" onclick="view_garage('<?php echo $row; ?>','<?php echo $value->garage_id; ?>');" id="acc_view_<?php echo $row; ?>"></td>     
               <?php }
    }  else { ?> 
    <tfoot>
        <tr>
            <td colspan="3">No Records ..</td>
        </tr>
    </tfoot>
    </tbody>
<?php }
    ?>
</table>

<div style='display:none;'>
    <div id='acc_orders_div' style='padding:0px;border:1px soild black;min-height: 2000px;height:100px;'>
        
    </div>
    </div>

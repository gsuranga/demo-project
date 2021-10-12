<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<table class="SytemTable" width="100%">
    <thead>
        <tr>
            <td>Date</td>
            <td>Time</td>
            <td>Employee Name</td>
            <td>Invoice No</td>
            <td>Outlet Name</td>
            <td>Amount</td>
            <td>View</td>
            
        </tr>
    </thead>
    <tbody>
        <?php 
               foreach ($extraData as $data) { 
     print_r($extraData);
            ?>
       
        <tr>
            <td><?php echo $data->outlet_name ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
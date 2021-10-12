<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$row = 0;
?>
<table width="90%" class="SytemTable" align="center" id="pending_diliver_note" cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Delivery Note Number</td>
            <td>Purchase Order No</td>
            <td>Employee Name</td>
            <td>Date</td>
            <td>Time</td>
            <td>View</td>
        </tr>
    </thead>
    <tbody>

<?php
if (isset($extraData)) {

    foreach ($extraData as $value) {
        if ($value->id_good_received != '') {
            $row++;
            ?>
                    <tr>
                        <td><?php echo $value->dilivery_note_number; ?></td> 
                        <td><?php echo $value->purchase_order_number; ?></td> 
                        <td><?php echo $value->employee_first_name; ?></td> 
                        <td><?php echo $value->added_date; ?></td>
                        <td><?php echo $value->added_time; ?></td>
                        <td><a href="drawIndexDiliverDetails?cl_distributorHayleysid_dilivery_noteToken=<?php echo $value->id_dilivery_note; ?>">view</a></td>

                    </tr>  
        <?php
        }
    }
}
?>
    </tbody>
</table>

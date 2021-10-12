<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$row = 0;
?>

<!-- <table>
    <?php if($this->session->userdata('user_type') == 'Admin'){ ?><td><a  href="readDeliverNotes">Read Text Files</a></td><?php } ?>
</table>
 -->

<table width="90%" class="SytemTable" align="center" id="pending_diliver_note1" cellpadding="0" cellspacing="0" >
    <thead>
        <tr>
            <td>Delivery Note Number</td>
            <td>Purchase Order No</td>
            <td>Employee Name</td>
            <td>Date</td>
            <td>Time</td>
            <?php if($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Distributor"){ ?><td>To GRN </td><?php } ?>
            <td>View</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>

        <?php
        if (isset($extraData)) {

            foreach ($extraData as $value) {
                if ($value->id_good_received == '') {
                    $row++;
                    ?>
                    <tr id="row_<?php echo $row; ?>">
                        <td><?php echo $value->purchase_order_number; ?></td> 
                        <td><?php echo $value->dilivery_note_number; ?></td> 
                        <td><?php echo $value->employee_first_name; ?></td> 
                        <td><?php echo $value->added_date; ?></td>
                        <td><?php echo $value->added_time; ?></td>
                        <?php if($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Distributor"){ ?><td><a href="#" onclick="create_good_recived('<?php echo $row; ?>');">GRN</a><input type="hidden" id="hidden_purchase_order_<?php echo $row; ?>" value="<?php echo $value->id_dilivery_note; ?>"></td><?php } ?>
                        <td><a href="drawIndexDiliverDetails?cl_distributorHayleysid_dilivery_noteToken=<?php echo $value->id_dilivery_note; ?>">view</a></td>
                        <td><a href="#"  onclick="delete_diliver_order('<?php echo $row; ?>');"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png"/></a></td>
                    </tr>  
                    <?php
                }
            }
        }
        ?>
    </tbody>
</table>


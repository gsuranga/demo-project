<?php
/**
 * Description of employeeView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#e').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>

<table width="100%" id="e" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>

        <thead>
            <tr>
                <td>Name</td>
                <td>Nic</td>
                <td>Address</td>
                <td>Mobile</td>
                <td>Telephone</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Delete</td>
                <td>Edit</td>
                <td>View</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>
                <tr>
                    <td><?php echo $data['employee_first_name'] . ' ' . $data['employee_last_name']; ?></td>
                    <td><?php echo $data['employee_nic']; ?></td>
                    <td><?php echo $data['employee_address']; ?></td>
                    <td><?php echo $data['employee_mobile']; ?></td>
                    <td><?php echo $data['employee_telephone']; ?></td>
                    <td><?php echo $data['employee_email']; ?></td>
                    <td><?php echo $data['employee_gender']; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>employee/deleteEmployee?employee_idd=<?php echo $data['id_employee']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>employee/drawIndexEmployeeManage?employee_idd=<?php echo $data['id_employee']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>employee/drawIndexEmployeeManage?employee_idd2=<?php echo $data['id_employee']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview.png" /></a></td>

                </tr>

                <?php
            }
            ?>
        </tbody>
    <?php } else { ?>
        <thead>
            <tr>
                <td>No Record Found</td>

            </tr>
        </thead>
        <?php
    }
    ?>
</table>
<table>
    <tr>
        <td><?php echo $this->session->flashdata('delete_employee'); ?></td>
         <td>&ensp;<?php echo $this->session->flashdata('delete_employee_map');?></td>
    </tr>
</table>

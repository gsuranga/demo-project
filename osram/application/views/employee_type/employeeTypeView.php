<?php 
/**
 * Description of employeeTypeView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
      <?php if ($extraData != null) { ?>

    <thead>
        <tr>
            <td>Id</td>
            <td>Type</td>
            <td>Status</td>
            <td>Join Date</td>
            <td>Join Time</td>
            <td>Delete</td>
            <td>Edit</td>
           
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $data) {
                ?>

                <tr>
                    <td><?php echo $data['id_employee_type']; ?></td>
                    <td><?php echo $data['employee_type']; ?></td>
                    <td><?php echo $data['employee_type_status']; ?></td>
                    <td><?php echo $data['added_date']; ?></td>
                    <td><?php echo $data['added_time']; ?></td>
                  
                    <td><a href="<?php echo $System['URL']; ?>employee_type/deleteEmployeeType?employee_type_idd=<?php echo $data['id_employee_type'];?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>employee_type/drawIndexEmployeeTypeManage?employee_type_idd=<?php echo $data['id_employee_type'];?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

                </tr>

                <?php
        }
        ?>
    </tbody>
        <?php }else{  ?>
        <thead>
            <tr>
                <td>No Record Found</td>
               
            </tr>
        </thead>
        <?php
    }
?>
        <table>
        <tr>
            <td><?php echo $this->session->flashdata('delete_emp_type'); ?></td>
        </tr>
        </table>
</table>

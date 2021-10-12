<?php
/**
 * Description of employeeMapingView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?><table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">

    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Division</td>
                <td>Territory</td>
                <td>Physical Place</td>
                <td>Discount</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>
                <tr>
                    <td><?php echo $data->division_name; ?></td>
                    <td><?php echo $data->territory_name; ?></td>
                    <td><?php echo $data->physical_place_name; ?></td>
                    <td><?php echo $data->discount; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>employee/deleteEmployeeMap?employee_idd2=<?php echo $data->id_employee; ?>&id_employee_has_place2=<?php echo $data->id_employee_has_place; ?>""><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>employee/drawIndexEmployeeManage?employee_idd2=<?php echo $data->id_employee; ?>&id_employee_has_place2=<?php echo $data->id_employee_has_place; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
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
        <td>&ensp;<?php echo $this->session->flashdata('update_employee_map');?></td>
        <td>&ensp;<?php echo $this->session->flashdata('delete_employee_map');?></td>
    
    </tr>
</table>
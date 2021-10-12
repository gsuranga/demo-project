<?php
/**
 * Description of viewStore
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Store Code</td>
            <td>Store Name</td>
            <td>Employee Name</td> 
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $value) { ?>
            <tr> 
                <td> <?php echo $value->store_code; ?></td>
                <td> <?php echo $value->store_name; ?></td>
                <td> <?php echo $value->employee_first_name; ?></td>
                <td><a href="drawIndexStore?id_token=<?php echo $value->id_store; ?>&code=<?php echo $value->store_code; ?>&name=<?php echo $value->store_name; ?>&emp=<?php echo $value->employee_first_name; ?>&empno=<?php echo $value->id_employee_registration; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                <td><a href="deleteStore?id=<?php echo $value->id_store; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('update_store'); ?>
            <?php echo $this->session->flashdata('delete_store'); ?>
        </td>
    </tr>
</table>
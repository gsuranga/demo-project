<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
dfgdgdg
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Permission Type </td>
            <td>permission name</td>
            <td>Added Date</td>
            <td>Added Time</td>     
            <td>Delete</td>
            <td>Edit</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $data) { ?>
            <tr>

                <td><?php echo $data->permission_type; ?></td>
                <td><?php echo $data->permission_name; ?></td>
                <td><?php echo $data->added_date; ?></td>
                <td><?php echo $data->added_time; ?></td>
                <td><a href="deletePermission?id=<?php echo $data->id_permission; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                <td><a href="drawIndexPermissionManage?id_permission=<?php echo $data->id_permission; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

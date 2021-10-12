<?php
/**
 * Description of permissionTypeView
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>ID</td>
            <td>Permission Type </td>
            <td>Permission Type Icon</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($extraData as $data) { ?>
        <tr>
                <td><?php echo $data['id_permission_type']; ?></td>
                <td><?php echo $data['permission_type']; ?></td>
                <td style="text-align: center"><img src="<?php echo base_url() . "files/" . $data['permission_type_icon'] ?>" border="0" alt="" align="center" width="70" height="60"/> </td>
                <td><?php echo $data['added_date']; ?></td>
                <td><?php echo $data['added_time']; ?></td>

                <td><a href="<?php echo $System['URL']; ?>permission_type/deletePermissionType?id_permission_type=<?php echo $data['id_permission_type']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                <td><a href="<?php echo $System['URL']; ?>permission_type/drawIndexPermissionTypeManage?id_permission_type=<?php echo $data['id_permission_type']; ?>&pertype_token=<?php echo $data['permission_type'] ?>&image_token=<?php echo $data['permission_type_icon']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

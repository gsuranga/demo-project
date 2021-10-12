<?php
/**
 * Description of view_usertype
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$row_count = 0;
?>
<table>
    <tr><td></td>
        <td><?php echo $this->session->flashdata('update_usertype'); ?></td>
    </tr>
    <tr><td></td>
        <td><?php echo $this->session->flashdata('delete_usertype'); ?></td></tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">

    <thead>
        <tr>
            <td>User Type ID</td>
            <td>User Type</td>
            <td>Edit</td>
            <td>Delete</td>    
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $value) {
            $row_count++;
            ?>
            <tr>
                <td>
                    <?php echo $value['id_user_type']; ?>
                </td>
                <td><input type="hidden" name="<?php echo $value['id_user_type']; ?>" id="<?php echo $value['id_user_type']; ?>"> 
                    <?php echo $value['user_type']; ?>
                </td>
                <td>
                    <a href="drawindexUserType?id_token=<?php echo $value['id_user_type']; ?>&user_type_token=<?php echo $value['user_type'] ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"/></a>

                </td>
                <td>
                    <img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="delete_user_type('<?php echo $value['id_user_type']; ?>');"/>
                </td>
            </tr>
        <?php }
        ?>  
    </tbody>

</table>



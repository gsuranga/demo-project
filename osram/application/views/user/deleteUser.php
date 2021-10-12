<?php
/**
 * Description of deleteUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>

        <script type="text/javascript">// pagination link
            $j(document).ready(function() {
                var s = $j('#usertbl').dataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                });
                //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
            });
        </script>

<?php if($this->session->userdata('user_type') == "Admin"){ ?>
<table width="90%" class="SytemTable" cellpadding="0" cellspacing="0" id="usertbl">
    <thead><tr>
            <td>Login Name</td>
            <td>User Type</td>
            <td colspan="2">Status</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $value) { ?>
            <tr>
                <td><?php echo $value->user_username; ?></td>
                <td><?php echo $value->user_type; ?></td>
                <td><?php
                    if ($value->user_active == "1") {
                        echo "active";
                    } else {
                        echo "disable";
                    }
                    ?>          
                </td>
                <td>
                    <?php
                    if ($value->user_active == "1") {
                        ?>
                        <a href="changeUserStatus?a87ff679a2f3e71d9181a67b7542122c=<?php echo "Disable&8fa14cdd754f91cc6554c9e71929cce7"; ?>=<?php echo $value->id_user; ?>"  style="text-decoration: none;" id="<?php echo "Disable"
                        ?>"><?php echo "Disable"; ?></a>
                           <?php
                       } else {
                           ?>
                        <a href=changeUserStatus?a87ff679a2f3e71d9181a67b7542122c=<?php echo "Enable&8fa14cdd754f91cc6554c9e71929cce7"; ?>=<?php echo $value->id_user; ?>"  style="text-decoration: none;" id="<?php echo "Enable"
                           ?>" style="text-decoration: none;" id="<?php echo "Enable"
                           ?>"  ><?php echo "Enable"; ?></a>
                           <?php
                       }
                       ?> 
                </td>
                <td><a href="deleteUser?175a3630722a538d73e864ab51dc1cc1=<?php echo $value->id_user; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>
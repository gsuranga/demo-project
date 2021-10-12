<?php
/**
 * Description of messageView
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<?php
//print_r($extraData);
$_instance = get_instance();
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>      
            <td>Division Name</td>
            <td>Territory Name</td>
            <td>Employee Name</td>
            <td>Message</td>
            <td>Added date</td>
            <td>Added Time</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($extraData as $data) {
            ?>
            <tr>

                <td><?php
                    if ($data->id_division == NULL) {
                        echo 'ALL';
                    } else {
                        echo $data->division_name;
                    }
                    ?></td>
                <td><?php
                    if ($data->id_territory == NULL) {
                        echo "ALL";
                    } else {
                        echo $data->territory_name;
                    }
                    ?></td>
                <td><?php
                if ($data->id_employee_registration == NULL) {
                    echo "ALL";
                } else {
                    echo $data->employee_first_name;
                }
                ?></td>
                <td><?php echo $data->message; ?></td>
                <td><?php echo $data->added_date; ?></td>
                <td><?php echo $data->added_time; ?></td>
                <td><a href="<?php echo $System['URL']; ?>message/deleteMessage?id_message=<?php echo $data->id_message; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                <td><a href="drawIndexMessageManage?id_message=<?php echo $data->id_message;?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
            </tr>
<?php } ?>
    </tbody>
</table>

<?php
/**
 * Description of divisionTypeView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>

<script>

    function confirmationMsg(i) {
        
//        alert(i);
        
       var r = confirm("Do you want to delete division type ?");
        if (r === true)
        {
            var v = "<?php echo base_url(); ?>";
            var href = v + 'division_type/' + 'deleteDivisionType?division_type_idd=' + i;
            window.location.href = href;
        }
        else
        {
            window.location.href = '#';
        }
    }

</script>


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
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value['id_division_type']; ?></td>
                    <td ><?php echo $value['tbl_division_type_name']; ?></td>
                    <td align="center"><?php echo $value['division_status']; ?></td>
                    <td align="center"><?php echo $value['added_date']; ?></td>
                    <td align="center"><?php echo $value['added_time']; ?></td>

                    <!--<td align="center"><a href="<?php echo $System['URL']; ?>division_type/deleteDivisionType?division_type_idd=<?php echo $value['id_division_type']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>-->
                    <td align="center"><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value['id_division_type']; ?>);"></a></td>
                    <td align="center"><a href="<?php echo $System['URL']; ?>division_type/drawIndexDivisionTypeManage?division_type_idd=<?php echo $value['id_division_type']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
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
        <td><?php echo $this->session->flashdata('delete_division_type'); ?></td>
    </tr>
</table>

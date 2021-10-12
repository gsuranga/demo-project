
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_branch').dataTable();
    });
</script>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_branch">
    <thead>
        <tr>
            <td hidden="hidden">Branch Id</td>
            <td>Branch Category</td>
            <td>Branch Code</td>
            <td>Branch Account No</td>
            <td>Branch Name</td>
            <td>Area Name</td>
            <td>Sub Branch</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td hidden="hidden">Status</td>
            <td>Manage</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td hidden="hidden"><?php echo $value->branch_id; ?></td>
                    <td><?php echo $value->branch_type_name; ?></td>
                    <td><?php echo $value->branch_code; ?></td>
                    <td><?php echo $value->branch_account_no; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->area_name; ?></td>
                    <td align="center"><a style="text-decoration: none;" href="JavaScript:newPopup('drawIndexSubBranchPopup?token_sub_branch=<?php echo $value->branch_id; ?>');"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/subview3.png"></a></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td hidden="hidden"><?php echo $value->status; ?></td>
                    <td><a style="text-decoration: none;" href="drawIndexManageBranch?time_token=<?php echo md5(time()); ?>&token_branch_name=<?php echo $value->branch_name; ?>&token_branch_id=<?php echo $value->branch_id; ?>&token_branch_account_no=<?php echo $value->branch_account_no; ?>&token_area_name=<?php echo $value->area_name; ?>&token_area_id=<?php echo $value->area_id; ?>&token_branch_code=<?php echo $value->branch_code; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
                        <?php
                        }
                    } else {
                        ?>
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>
        </tfoot>
    </tbody>
<?php }
?>
</table>

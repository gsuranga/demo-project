
<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_apm').dataTable();
    });
    

function confirmationMsg(i) {

        $j("<div> Are you sure you want to Delete..?</>").dialog({
            modal: true,
            title: 'Delete',
            zIndex: 10000,
            autoOpen: true,
            width: '250',
            resizable: false,
            buttons: {
                Yes: function() {

                    var v = "<?php echo base_url(); ?>";
                    var href = v + 'tour_iteneray/' + 'deleteVisitCatogary?visit_category_id=' + i;
                    window.location.href = href;


                },
                No: function() {
                    $j(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $j(this).remove();
            }
        });
    }
</script>

<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_apm">
    <thead>
        <tr>
            <td>Category Name</td>
            <td>Category Code</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Delete</td>
            <td>Manage</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->category_name; ?></td>
                    <td><?php echo $value->category_code; ?></td>
                    <td><?php echo $value->added_date; ?></td>
                    <td><?php echo $value->added_time; ?></td>
                    <td><a href="#"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" onclick="confirmationMsg(<?php echo $value->visit_category_id; ?>);"/></a></td>
                    <td><a style="text-decoration: none;" href="drawIndexManagevisitCategory?token_visit_id=<?php echo $value->visit_category_id; ?>&token_visit_name=<?php echo $value->category_name; ?>&token_visit_code=<?php echo $value->category_code; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png"></a></td>     
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
<html>
    
    <title>Priority</title>
    <script type="text/javascript">
        $j(document).ready(function() {
            $j("#table-1").tableDnD();
        });

    </script>
    <table style="width: 100%">
        <tr>
            <td colspan="5" align="right"><input type="button" value="Confirm" style="background-color: green;color: white" onclick="arrangetable();"  ></></td>
        </tr>
    </table>
    <table id="table-1" cellspacing="0" cellpadding="2" class="SytemTable" style="width: 100%">
        <thead>
            <tr>
                <td>No</td>
                <td>Type</td>
                <td>Sent Date</td>
                <td>Date To Be Held</td>
                <td>View</td>
            </tr>
        </thead>
        <tbody>
            <?php $tablerow = 2 ?>
            
            <?php foreach ($extraData AS $values) { ?>
            <tr id="<?php echo $values->id_campaing ?>"><td id="campaingid_<?php echo $tablerow ?>" style="text-align: center"><?php echo $values->id_campaing ?></td><td style="text-align: center"><?php echo $values->campaign_type ?></td><td style="text-align: center"><?php echo $values->added_date ?></td><td style="text-align: center"><?php echo $values->campaign_date ?></td><td style="text-align: center"><img width="20" height="20" src="<?php echo $System['URL']; ?>images/view_s.png" onclick="show_more_detail(<?php echo $values->id_campaing ?>);" /></td></tr>

                <?php
                $tablerow++;
            }
            ?>

        </tbody>
        

    </table>
</html>


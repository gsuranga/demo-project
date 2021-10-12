<?php
$_instance = get_instance();
?>
            <script type="text/javascript">// pagination link
                 $j(document).ready(function() {
                 var s = $j('#stockTable').dataTable({
                     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
             });
            //        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
                });
            </script>

<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Stock Availability</td>

    </tr>
   
    <tr>
        <td >
            <?php $_instance->selectStockAvailability(); ?>
        </td>

    </tr>
</table>

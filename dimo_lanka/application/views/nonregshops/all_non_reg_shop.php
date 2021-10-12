<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
   $j(document).ready(function() {
       $j('#newLabel').html('');
       $j('#t2').dataTable();
   });
</script>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="t2" align="center">
    <thead>
        <tr>
            <td style="display: none">Shop Code</td>
            <td>Shop Name</td>
            <td>Address</td>
             <td>Contact No</td>
            <td>Remark</td>
            <td>City</td>
            <td>Branch</td>
            <td>Sales Officer</td>
            <td>Preference Yes/No</td>
          


        </tr>
    <tbody>
        <?php
        if ($extraData != '') {
            
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td style="display: none"><?php echo $value->shop_code; ?></td>
                    <td><?php echo $value->shop_name; ?></td>
                    <td><?php echo $value->shop_address; ?></td>
                    <td><?php echo $value->contact_no; ?></td>
                    <td><?php echo $value->remarks; ?></td>
                    <td><?php echo $value->city_name; ?></td>
                    <td><?php echo $value->branch_name; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td>
                         <?php
                        if ($value->preference == 1) {
                            echo 'Yes';
                            ?>
                            <?php
                        } else {
                            echo 'No';
                        }
                        ?>
                    </td>
                  

                </tr>

                <?php
            }
        } else {
            ?>
        <tfoot>
            <tr>
                <td colspan="3">No Records ..</td>
            </tr>

        </tfoot>
        <tr>
            <td></td>
            <td>&ensp;
                <?php echo $this->session->flashdata('remove_non_reg_shop');?>     
            </td>
        </tr>
    </tbody>
<?php }
?>
</table>


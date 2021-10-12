<?php
/**
 * Description of divisionTypeView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" border="0" cellpadding="10">
    <tr style="background-color: #def8c4;color: #009933;font-weight:bold" >
        <td>Free Item List</td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php
    if ($extraData != null) {
        ?>
        <thead>
            <tr>
                <td>ID</td>
                <td>Product Combination</td>
                <td style="width: 1px;"></td>
                <td>Product Free Issue</td>
                <td>Entered Date</td>
                <td>Entered Time</td>
                <td style="text-align: center">Remove</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData[0] as $value) {
                ?>
                <tr>
                    <td><?php echo $value['id_assort_free']; ?></td>
                    <td style="padding:  0px 0px 0px 5px; margin: 0px;">
                        <div class="free-issue-item-background-left" style="position: relative;">
                            <div  style=" text-align: center; background-color: #fff;width: 50px;position: absolute;height: 100%;right: -5px;top: -5px;z-index: 50;border: solid #d8f288;border-width: 5px 5px 5px 1px;" >
                                <table border="0" style="height: 100%; width: 100%">
                                    <tr><td style="background-color: #FFFFFF;padding: 0px; border: none;"></td></tr>
                                    <tr><td style="background-color: #FFFFFF; border: none;padding: 0px; color: #7C7C7C; text-align: center"><?php echo $value['assort_qty']; ?></td></tr>
                                    <tr><td style="background-color: #FFFFFF; border: none;padding: 0px"></td></tr>
                                </table>

                            </div>
                            <?php
                            foreach ($extraData[1][$value['id_assort_free']] AS $item) {
                                $item_name = $item['item_name'];
                                // print_r($item);
                                echo "<div class=\"free-issue-item\"
                        >" . $item_name . "</div>";
                            }
                            ?></div>
                    </td>
                    <td style="padding: 0px; margin: 0px; width: 1px;">
                        <div class="free-issue-arrow" style="
                        <?php
                        $com_count = count($extraData[1][$value['id_assort_free']]);
                        $free_count = count($extraData[2][$value['id_assort_free']]);
                        $border_top = 0.2;
                        $border_bottom = 0.2;
                        $border_left = 2.2;
                        $border_right = 0;
                        $border_height = 10;

                        if ($com_count == $free_count) {
                            $border_top = 0;
                            $border_bottom = 0;
                            $border_left = 2.2;
                            $border_right = 0;
                            $border_height = 10 + (30 * $com_count);
                        } else if ($com_count > $free_count) {
                            $border_height = 10 + (30 * $free_count);
                            $border_top = 0.21 + (1.2 * ($com_count - $free_count));
                            $border_bottom = $border_top;
                            $border_left = 2.2;
                            $border_right = 0;
                        } else if ($com_count < $free_count) {
                            $border_height = 10 + (30 * $com_count);
                            $border_top = 0.21 + (1.2 * ($free_count - $com_count));
                            $border_bottom = $border_top;
                            $border_left = 0;
                            $border_right = 2.2;
                        }

                        echo "border-top: " . $border_top . "em solid rgba(255, 255, 255, 0);";
                        echo "border-bottom: " . $border_bottom . "em solid rgba(255, 255, 255, 0);";
                        echo "height: " . $border_height . "px;";
                        echo "border-left: " . $border_left . "em solid;";
                        echo "border-right: " . $border_right . "em solid;";
                        ?>
                             "></div>
                    </td>
                    <td style="padding: 0px 5px 0px 0px; margin: 0px;">
                        <div class="free-issue-item-background-right">
                            <?php
//                            print_r($extraData[2][$value['id_assort_free']]);
                            foreach ($extraData[2][$value['id_assort_free']] AS $item) {
                                echo "<div class=\"free-issue-item\"
                        >" . $item['item_name'] . "<div style=\"float:right;\">" . $item['qty'] . "</div></div>";
                            }
                            ?></div>
                    </td>
                                        <td><?php echo $value['added_date']; ?></td>
                    <td><?php echo $value['added_time']; ?></td>
                    <td style="text-align: center">
                        <a href="deleteFreeitem?id_assort_free=<?php echo $value['id_assort_free'];?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a>
                    </td>
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
        <td>
            <?php echo $this->session->flashdata('delete_freeitem'); ?>
        </td>
    </tr>
</table>

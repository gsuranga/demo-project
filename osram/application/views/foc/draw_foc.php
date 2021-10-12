
<table width="90%" align="center">
    <tr>
        <td align="center">
            <div id="tabs">
<!--                <ul>
                    <li><a href="#pending"><span>Pending FOC</span></a></li>
                    <li><a href="#accpet"><span>Accepted FOC</span></a></li>

                </ul>-->
                <div class="Tab_content" id="pending">
                    <?php $user_type = $this->session->userdata('user_type'); ?>
                    <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Employee Name</td>
                                <td>Item Name</td>
                                <td>Item Account code</td>
                                <td>Outlet</td>
                                <td>serial_no</td>
                                <td>Reason</td>
                                <td>Quantity</td>
                                                    <?php
                    if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Regional Manager") {
                        ?> 
                                <!--<td>Accept</n><input type="checkbox" id="all_acc" name="all_acc" onchange="check_all_orders();"></td>-->
                    <?php } ?>
                            </tr>
                        </thead
                        <tbody>
                            <?php
                            
                            $count = 0;
                            foreach ($extraData as $value) {
                                $count+=1;
                                if ($value->accept_wr_status === '0') {
                                    ?>

                                    <tr>
                                        <!--<input type="" id="warr_rett_<?php echo $count ?>" name="warr_rett_<?php echo $count ?>" value="<?php echo $value->warrenty_return_id ?>">-->
                                        <td><?php echo $value->date ?>
                                            <input type="hidden" id="warr_rett_<?php echo $count ?>" name="warr_rett_<?php echo $count ?>" value="<?php echo $value->warrenty_return_id ?>">
                                        </td>
                                        <td><?php echo $value->time ?></td>
                                        <td><?php echo $value->full_name ?>
                                            <input type="hidden" id="emp_has_<?php echo $count ?>" name="emp_has_<?php echo $count ?>" value="<?php echo $value->id_employee_has_place ?>">

                                        </td>
                                        <td><?php echo $value->item_name ?>
                                            <input type="hidden" id="id_item_<?php echo $count ?>" name="id_item_<?php echo $count ?>" value="<?php echo $value->id_item ?>">
                                        </td>
                                        <td><?php echo $value->item_account_code ?></td>
                                        <td><?php echo $value->outlet_name ?></td>
                                        <td><?php echo $value->serial_no ?></td>
                                        <td><?php echo $value->reason ?></td>
                                        <td><?php echo $value->quantity ?>
                                            <input type="hidden" id="item_qty_<?php echo $count ?>" name="item_qty_<?php echo $count ?>" value="<?php echo $value->quantity ?>">
                                        </td>
                                                            <?php
                    if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Regional Manager") {
                        ?> 
                                        <!--<td align="center"><input type="checkbox" id="check_<?php echo $count ?>" name="check_<?php echo $count ?>"></td>-->

                    <?php } ?>
                                    </tr>

                                <?php }
                            }
                            ?>
                        <input type="hidden" id="raw_count" name="raw_count" value="<?php echo $count ?>" onclick="submit_accept();">
                        </tbody>
<!--                        <tr>
                            <td colspan="10" ><input type="button" align="right"></td>
                        </tr>-->
                    </table>
                    <?php
//                    if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Regional Manager") {
//                        ?>    
<!--                        <table align="right">
                            <tr>
                                <td style="border: #003399"><input type="button" align="right" value="Accept" onclick="submit_accept();"></td>
                            </tr>
                        </table>-->

                    <?php // } ?>

                </div>
<!--                <div class="Tab_content" id="accpet">
                    <table width="100%" class="SytemTable">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Employee Name</td>
                                <td>Item Name</td>
                                <td>Item Account code</td>
                                <td>Outlet</td>
                                <td>serial_no</td>
                                <td>Reason</td>
                                <td>Quantity</td>

                            </tr>
                        </thead
                        <tbody>
                            <?php
//                            $count = 0;
//                            foreach ($extraData as $value) {
//                                $count+=1;
//                                if ($value->accept_wr_status === '1') {
//                                    ?>

                                    <tr>
                                        <input type="" id="warr_rett_<?php echo $count ?>" name="warr_rett_<?php echo $count ?>" value="<?php echo $value->warrenty_return_id ?>">
                                        <td><?php echo $value->date ?>
                                            <input type="hidden" id="warr_rett_<?php echo $count ?>" name="warr_rett_<?php echo $count ?>" value="<?php echo $value->warrenty_return_id ?>">
                                        </td>
                                        <td><?php echo $value->time ?></td>
                                        <td><?php echo $value->full_name ?></td>
                                        <td><?php echo $value->item_name ?></td>
                                        <td><?php echo $value->item_account_code ?></td>
                                        <td><?php echo $value->outlet_name ?></td>
                                        <td><?php echo $value->serial_no ?></td>
                                        <td><?php echo $value->reason ?></td>
                                        <td><?php echo $value->quantity ?></td>


                                    </tr>

                                <?php // }
//                            }
                            ?>
                        <input type="hidden" id="raw_count" name="raw_count" value="<?php echo $count ?>" onclick="submit_accept();">
                        </tbody>
                        <tr>
                            <td colspan="10" ><input type="button" align="right"></td>
                        </tr>
                    </table>
                </div>-->

            </div>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><?php echo $this->session->flashdata('accept_foc'); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>


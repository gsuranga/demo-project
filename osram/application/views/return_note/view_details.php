<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div style="background: #FFFFFF">
    <?php foreach ($extraData as $value) { ?>
        <table  width="100%" >
            <tr>
                <td width="50%">
                    <table width="" >


                        <tr>
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px ;background: #B4DAFF">Employee Name</td>
                            <td ></td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo $value->full_name ?></td>
                        </tr>
                        <tr>
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px ;background: #B4DAFF">Outlet Name</td>
                            <td></td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo $value->outlet_name ?></td>
                        </tr>
                        <tr>  
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px ;background: #B4DAFF">Sales Order Id</td>
                            <td></td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo str_pad($value->id_sales_order, 12, "0", STR_PAD_LEFT); ?></td>
                        </tr>




                    </table> 
                </td>
                <td width="50%">
                    <table align="center"  width="100%">
                        <tr>
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px ;background: #B4DAFF">Territory</td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo $value->territory_name ?></td>
                        </tr>
                        <tr>
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px ;background: #B4DAFF">Order Date and Time</td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo $value->sales_date . '/ ' . $value->sales_time ?></td>
                        </tr>
                        <tr>
                            <td style="color: #000000;font-weight: bold;font-size:15px;vertical-align: central;width: 40%; height:30px;background: #B4DAFF">Invoiced Date and Time</td>
                            <td style="font-weight: bold;vertical-align: central;width: 60%;background: #edf6e4"><?php echo $value->in_date . '/ ' . $value->in_time ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="30px"></td>
                <td></td>
            </tr>
        </table>

        <?php
    }
    ?>

</div>

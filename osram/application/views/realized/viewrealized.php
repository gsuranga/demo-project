<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="<?php echo base_url() ?>cheque_realized/drawindexrealized" method="post">
    <input type="hidden" name="txt_outlet_namehidden" id="txt_outlet_namehidden">
    <table>
        <tr>
            <td>Cheque Status</td>
            <td>
                <select id="cmb_status" name="cmb_status">
                    <option value="3">Select Status</option>
                    <option value="0">Realize</option>
                    <option value="1">Non Realize</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Outlet Name</td>
            <td><input type="text" name="txt_outlet_name" id="txt_outlet_name" onfocus="getOutletsNames();" autocomplete="off"></td>
            <td>Start Date</td>
        <td><input type="text" name="txttren_date" id="txttren_date" readonly="true" autocomplete="off"></td>
       
        <td>End Date</td>
        <td><input type="text" name="txttrend_date" id="txttrend_date" readonly="true" autocomplete="off"></td>
            <td><input type="submit" name="Search" value="Search"></td>
        </tr>
        

    </table>
</form>
<table width="100%" class="SytemTable" align="center">
    <thead>
        <tr>
            <td>Order ID</td>
			<td>Outlet Name</td>
            <td>Bank Name</td>
            <td>Cheque No</td>
            <td>Cheque Payment</td>
            <td>Realized Date</td>
            <td>Added Date</td>
            <td>Added Time</td>
            <td>Status</td>
        </tr>
    </thead>
    <?php
   // print_r($extraData);
    if(count($extraData) > 0 && $extraData != ''){
    $json_decode = json_decode($extraData);

    foreach ($json_decode->locations as $value) {
       
        ?>
        <tr>
            <td><?php echo $value->id_sales_order ?></td>
			<td><?php echo $value->outlet_name ?></td>
            <td><?php echo $value->bank_name ?></td>
            <td><?php echo $value->cheque_no ?></td>
            <td align="right"><?php echo $value->cheque_payment ?></td>
            <td align="center"><?php echo $value->realized_date ?>
            <?php 
            /*$date_create = date_create($value->realized_date,  date($format));
            echo $date_create->format("%R%a days");*/
            ?>
            </td>
            <td align="center"><?php echo $value->date ?></td>
            <td align="center"><?php echo $value->time ?></td>
            <td>
                <?php
                if($value->realized_status == '1'){ ?>
                <a style="text-decoration: none;" href="changetoRealized?id_cheque_payment=<?php echo $value->id_cheque_payment ?>" >Not Complete</a>
                <?php }  else { ?>
                    Realized
               <?php  }
                ?>
            </td>

        </tr>

    <?php }} ?>

</table>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();

$id_physical_place = $_POST['id_physical_place'];
 $date_1 = $_POST['date_1'];
 $date_2 = $_POST['date_2'];
 $it_salesrep = $_POST['it_salesrep'];

if (count($extraData) > 0) {
    $json_decode = json_decode($extraData);
    $rows = 0;
    $rowsno = 1;

    $srqty = 0;
    $return_sr = 0;
    $return_mr = 0;
    $return_fr = 0;
    $return_wr = 0;

    foreach ($json_decode as $value) {

        $explode = explode('-', $value->full_item_name);
        $_retun_qty = $_instance->get_retun_qty($value->id_products, $id_physical_place , $date_1 , $date_2 , $it_salesrep);
        ?>
        <tr id="datarow_<?php echo $rows; ?>">
        <input type="hidden" id="row_org_<?php echo $rows; ?>" value="<?php echo $value->id_products; ?>">
        <td align="right" style="color: red"><?php echo $rowsno; ?></td>
        <td style="color: #000"><?php echo $explode[0]; ?></td>
        <td style="color: #000"><?php echo $explode[1]; ?></td>
        <td align="right" style="color: #000" id="lb0_<?php echo $value->id_products; ?>"><?php
            $_sales_qty = $_instance->get_sales_qty($value->id_products, $id_physical_place ,$date_1 , $date_2 , $it_salesrep);
            echo round($_sales_qty);
            $srqty += $_sales_qty;
            ?></td>
        <td align="right" style="color: #000" id="lb1_<?php echo $value->id_products; ?>">
            <?php
            
            $rowsno++;
            if (count($_retun_qty) > 0 && $_retun_qty[0]['id_return_type'] == 1) {
                echo round($_retun_qty[0]['qty_return']);
                $return_sr += $_retun_qty[0]['qty_return'];
            } else {
                echo '0';
            }
            ?>
        </td>
        <td align="right" style="color: #000" id="lb2_<?php echo $value->id_products; ?>">
            <?php
            if (count($_retun_qty) > 0 && $_retun_qty[1]['id_return_type'] == 2) {
                echo round($_retun_qty[1]['qty_return']);
                $return_mr += $_retun_qty[1]['qty_return'];
            } else {
                echo '0';
            }
            ?>

        </td>
        <td align="right" style="color: #000" id="lb3_<?php echo $value->id_products; ?>"><?php
            $_free_qty = $_instance->get_free_qty($value->id_products, $id_physical_place , $date_1 , $date_2 , $it_salesrep);
            echo round($_free_qty);
            $return_fr += $_free_qty;
            ?></td>
        <td align="right" style="color: #000" id="lb4_<?php echo $value->id_products; ?>"><?php
            $_warranty_qty = $_instance->get_warranty_qty($value->id_products, $id_physical_place , $date_1 , $date_2 , $it_salesrep);
            echo round($_warranty_qty);
            $return_wr += $_warranty_qty;
            ?></td>
        </tr>
        <?php
        $rows++;
    }
    ?>

<?php }
?>

        <tr id="total_div">
    <td colspan="3" align="right" style="color: #000000;font-size: medium">Total</td>
    <td align="right" style="color: #000;font-size: small;font-weight: bold"><?php echo $srqty; ?></td>
    <td align="right" style="color: #000;font-size: small;font-weight: bold"><?php echo $return_sr; ?></td>
    <td align="right" style="color: #000;font-size: small;font-weight: bold"><?php echo $return_mr; ?></td>
    <td align="right" style="color: #000;font-size: small;font-weight: bold"><?php echo $return_fr; ?></td>
    <td align="right" style="color: #000;font-size: small;font-weight: bold"><?php echo $return_wr; ?></td>

</tr>



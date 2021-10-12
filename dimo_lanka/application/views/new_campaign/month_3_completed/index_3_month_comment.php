<?php
//$from = date_create(date('Y-m-d'));
//$to = date_create($extraData['after_campaign_detail'][0]->added_date);
//$diff = abs(strtotime($to) - strtotime($from));
//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//echo $days;


$diff = dateDiff($extraData['after_campaign_detail'][0]->added_date, date('Y-m-d'));
if ($diff > 90) {
    if (empty($extraData['month_detail'])) {
        ?>
        <center>
            <h1 style="color: red"> No Comments</h1>
            <table>
                <tr>
                    <td>
                        <textarea id="commenttt_1"style="width: 250px;height: 50px" placeholder="Your Comment"></textarea>
                    </td>
                </tr>
                <tr style="height: 20px"></tr>
                <tr >
                    <td align="center">
                        <input type="button" value="send" style="border-color: green;background-color: white;color: green" onclick="add_comment(<?php echo $extraData['campaign_id'] ?>,'commenttt_1');"></>
                    </td>
                </tr>
            </table>
        </center>

        <?php
    } else {
        ?>
        <center>
            <table>
                <tr>
                    <td align="center">
                        <div style="color: blue">
                            <u>3 Month Completed Comments</u>     
                        </div>
                    </td>
                </tr>
                <tr style="height: 20px"></tr>
                <tr>
                    <td align="center" style="color: black">

                        <table>
                            <?php
                            foreach ($extraData['month_detail'] AS $mon_sales) {
                                ?>
                                <tr>
                                    <td><?php
                                        if ($mon_sales->type_id == 1) {
                                            Echo 'ASO';
                                        } else if ($mon_sales->type_id == 2) {
                                            echo 'APM';
                                        } else if ($mon_sales->type_id == 3) {
                                            echo 'HO';
                                        }
                                        ?></td>
                                    <td>:</td>
                                    <td><?php echo $mon_sales->comment ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <textarea id="commenttt_2" style="width: 250px;height: 50px" placeholder="Your Comment"></textarea>
                                </td>
                            </tr>
                            <tr style="height: 20px"></tr>
                            <tr >
                                <td align="center">
                                    <input type="button" value="send" style="border-color: green;background-color: white;color: green" onclick="add_comment(<?php echo  $extraData['campaign_id'] ?>,'commenttt_2');"></>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>
        <?php
    }
} else {
    ?>
    <center>
        <h1 style="color: red"><?php echo 90-$diff .' days to Complete'?></h1>
    </center>

<?php } ?>
<?php

function dateDiff($start, $end) {

    $start_ts = strtotime($start);

    $end_ts = strtotime($end);

    $diff = $end_ts - $start_ts;

    return round($diff / 86400);
}
?>


<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
?>
<!--<script type="text/javascript">
   
</script>-->

<table align="right" >
    <input type="text" placeholder="select month"style="width: 120px;text-align: center" id="holdsearchcalender"></><?php echo '&nbsp; '; ?>
    <input type="button" onclick="holdCampaignsearch();" id="holdcampaignsearch" value="Holded" style="background-color: #e2d384;color: white"></><?php echo '&nbsp; '; ?>
    <input type="button" onclick="rejectsearch();" id="holdcampaignsearch" value="Rejected" style="background-color: #ff6452;color: white"></>



    <?php
    $hold = array();
    $reject = array();
    ?>


    <tr>
        <td><input type="button" aling="right" value="give priority" id="prioritybutton" name="orderbutton" onclick="prioritycampaign();" style="border-style: groove;background-color: #948888;color: white"></></td>
    </tr>
</table>

<table class="SytemTable" style="width: 100%" id="notification">
    <thead>
        <tr style="">
            <td style="width: 10%">Campaign No</td>
            <td  style="width: 10%">Campaign Date</td>
            <td style="width: 20%">Status</td>
            <td style="width: 12%;border-left-color: blue">suggested Month</td>
            <td >Remark</td>
            <td style="width: 1%"></td>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData['res'] AS $value) { ?>
            <tr id="main_not_<?php echo $value->id_campaing ?>"<?php
            if ($value->apm_pending == 2 or $value->ho_pending == 2) {
                array_push($hold, array($value->id_campaing, $value->APM_DUE_DATE));
                ?> style="display: none;"<?php
                } elseif ($value->apm_pending == 3 or $value->ho_pending == 3) {
                    array_push($reject, $value->id_campaing);
                    ?> style="display: none;"<?php } ?>>
                <td><?php echo $value->id_campaing ?></td>
                <td><?php echo $value->campaign_date ?></td>
                <td ><?php
                    echo 'APM&nbsp;: ';
                    if ($value->apm_pending == 1) {
                        echo '<span style="color:green">accepted&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->Apm_added_date;
                    } elseif ($value->apm_pending == 2) {
                        echo '<span style="color:brown">hold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->Apm_added_date;
                    } elseif ($value->apm_pending == 3) {
                        echo '<span style="color:red">rejected&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->Apm_added_date;
                    } elseif ($value->apm_pending == 0) {
                        echo '<span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp-</span>';
                        echo $value->Apm_added_date;
                    }
                    ?>
                    </br>
                    <?php
                    echo 'HO &nbsp;&nbsp;&nbsp;:&nbsp;';
                    if ($value->ho_pending == 1) {
                        echo '<span style="text-align: right;color:green">accepted&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->HO_added_date;
                    } elseif ($value->ho_pending == 2) {
                        echo '<span style="color:brown">hold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->HO_added_date;
                    } elseif ($value->ho_pending == 3) {
                        echo '<span style="color:red">rejected&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                        echo $value->HO_added_date;
                    } elseif ($value->ho_pending == 0) {
                        echo '<span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp-</span>';
                        echo $value->HO_added_date;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($value->apm_pending == 2) {
                        echo 'APM&nbsp;: ';
                        echo $value->APM_DUE_DATE;
                    } elseif ($value->ho_pending == 2) {
                        echo 'HO&nbsp;&nbsp;: ';
                        echo $value->HO_DUE_DATE;
                    }
                    ?>
                </td>

                <td>
                    <div>
                        <?php
                        echo 'APM&nbsp;: ' . ' <textarea readonly="true">' . $value->APM_REMARK . '</textarea>';
                        ?>
                    </div>

                    </br>
                    <div>
                        <?php
                        echo 'HO &nbsp;&nbsp;&nbsp;: ' . ' <textarea readonly="true">' . $value->HO_REMARK . '</textarea>';
                        ?>
                    </div>

                </td>
                <td>
                    <?php
                    $time = new DateTime(2014 - 02 - 03);
                    $date = "04/30/1973";

//list($year, $month) =  explode("-", $date);
//echo "Month: $month; Day: $day; Year: $year<br />\n";
                    ?>
                    <?php if ($value->apm_pending == 1 & $value->ho_pending == 1) { ?>
                        <input type="button" value="Edit"style="width: 80px;background-color: greenyellow" onclick="finish(<?php echo $value->id_campaing_sales_officer ?>,<?php echo $value->id_campaing ?>);" id="finishbutton<?php echo $value->id_campaing ?>"></>
                    <?php } elseif ($value->apm_pending == 2 or $value->ho_pending == 2) { ?>
                        <input type="button" value="As New" style="width: 80px;background-color: greenyellow" onclick="asnew(<?php echo $value->id_campaing_sales_officer ?>,<?php echo $value->id_campaing ?>,<?php
                        if ($value->apm_pending === '') {
                            echo 0;
                        } else {
                            echo $value->apm_pending;
                        }
                        ?>,<?php
                        if ($value->ho_pending === NULL) {
                            echo 0;
                        } else {
                            echo $value->ho_pending;
                        }
                        ?>,<?php
                        if ($value->apm_pending == 2) {
                            list($year, $month) = explode("-", $value->APM_DUE_DATE);
                            echo $year . $month;
                        } elseif ($value->ho_pending == 2) {

                            list($year, $month) = explode("-", $value->HO_DUE_DATE);
                            echo $year . $month;
                        }
                        ?>);"></>
                        <?php echo '&nbsp;'; ?>
                        <input type="button" value="clear" style="width: 80px;background-color: red" onclick="clearbutton(<?php echo $value->id_campaing ?>);"></>

                           <?php } elseif ($value->apm_pending == 3 or $value->ho_pending == 3) { ?>
                        <input type="button" value="clear" style="width: 80px;background-color: red" onclick="clearbutton(<?php echo $value->id_campaing ?>);"></>
    <?php } ?>

                </td>
            </tr>
                <?php } ?>
    </tbody>
</table>



<div style='display:none;'>

    <div id='priority_campaign' style='padding:0px;border:1px soild black;min-height: 50px;height:400px;'>
        <table id="table-1" class="SytemTable" cellspacing="0" cellpadding="2" style="width: 100%">
            <thead>
                <tr>
                    <td>Campaign No</td>
                    <td>Campaign Type</td>
                    <td>Campaign Date</td>
                    <td>budget</td>
                    <td>Sent Date</td>
                </tr>
            </thead>

<!--            <tbody id="priority">
     
 </tbody>-->
            <tbody>
<?php $tablerow = 2 ?>
<?php foreach ($extraData['priority'] AS $values) { ?>
                    <tr id="<?php echo $values->id_campaing ?>"><td id="campaingid_<?php echo $tablerow ?>" style="text-align: center"><?php echo $values->id_campaing ?></td><td style="text-align: center"><?php echo $values->campaign_type ?></td><td style="text-align: center"><?php echo $values->campaign_date ?></td><td style="text-align: right"><?php echo number_format($values->budget, 2) ?></td><td style="text-align: center"><?php echo $values->added_date ?></td></tr>

                    <?php
                    $tablerow++;
                }
                ?>

            </tbody>

        </table>
        <table align="right">
            <tr><td><input type="button" value="submit" onclick="arrangetable();"></></td></tr>
        </table>
    </div>
</div>
<script>
        $j(function() {
            $j("#holdsearchcalender").datepicker({
                dateFormat: 'yy-mm',
                altField: "#order_date",
                altFormat: 'yy-mm'
            });
        });
        var isshowreject = 0;
        var isshowhold = 0;
        var holdarray =<?= json_encode($hold) ?>;
        var rejectarray =<?= json_encode($reject) ?>;


        function holdCampaignsearch() {
            for (var i = 0; i < holdarray.length; i++)
            {
                var hiderowid = holdarray[i][0];
                $j('#main_not_' + hiderowid).hide();
            }
            if ($j('#holdsearchcalender').val() === '') {
                for (var i = 0; i < holdarray.length; i++)
                {
                    var hiderowid = holdarray[i][0];
                    $j('#main_not_' + hiderowid).show();
                }
            }
            var datefield = $j('#holdsearchcalender').val();
            for (var i = 0; i < holdarray.length; i++)
            {
                var rowid = holdarray[i][0];
                var date = holdarray[i][1];


                if (datefield === date) {
                    // document.write(rowid + "<br>");
                    $j('#main_not_' + rowid).show();
                }
                // document.write(holdarray[i][0] + "<br>");
                // $j('#main_not_' + holdarray[i]).show();
                // result_style.display = 'main_not_'+holdarray[i];
            }
        }
        function rejectsearch() {
            if (isshowreject === 1) {
                isshowreject = 0;
                for (var i = 0; i < rejectarray.length; i++)
                {
                    // document.write(holdarray[i] + "<br>");
                    $j('#main_not_' + rejectarray[i]).hide();
                    // result_style.display = 'main_not_'+holdarray[i];
                }
                // result_style.display = 'main_not_'+holdarray[i];
            } else {
                isshowreject = 1;
                for (var i = 0; i < rejectarray.length; i++)
                {
                    // document.write(holdarray[i] + "<br>");
                    $j('#main_not_' + rejectarray[i]).show();
                    // result_style.display = 'main_not_'+holdarray[i];
                }
            }


        }

</script>
<!--<form name="tvc_form" id="tvc_form"> 
    <div style='display:none;'>


        <div id='campaign_finished' style='padding:0px;border:1px soild black;min-height: 50px;height:1000px;'>
            <table>
                <tbody>
                <td style="width: 98%;top: 0px">
                    <table style="top: 0px">
                        <tbody>
                            <tr>
                                <td style="width: 250px">Campaign type:</td>
                                <td><label id="campaign_type"></label></td>
                            </tr>
                            <tr style="height: 10px"></tr>
                        </tbody>
                    </table>
                    <table  align="right"style="width: 566px;left: 600px">
                        <tbody>
                            <tr>
                                <td>
                                    <table class="SytemTable" >
                                        <thead>
                                            <tr>
                                                <td style="width: 40%">Targeted Dealer</td>
                                                <td style="width: 30%">Current T/O</td>
                                                <td>Expected increase after three months</td>
                                            </tr>
                                        </thead>
                                        <tbody id="dealer_detail">

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr style="height: 30px"></tr>
                        <tr>
                            <td>Date:</td>
                            <td><label id="campaign_date"></label></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Objective:</td>
                            <td><textarea style="width: 501px;height: 60px" id="campaign_objective"></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td>Material Required from H/O	 :</td>
                            <td><textarea style="width: 501px;height: 60px" id="mrf" name="mrf"></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td style="width: 250px">Other requirements from branch:</td>
                            <td><textarea style="width: 501px;height: 60px" id="orfb" name="orfb"></textarea></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font style="color: green">Budget (Rs.):</font></td>
                            <td ><label id="budject"></label></td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr>
                            <td><font >Quotation:</font></td>
                            <td><a id="quatationfile" href="#"  target="_blank"></a></td>
                        </tr>
                        <tr style="height: 10px"></tr>

                        <tr>
                            <td colspan="10">
                                <table style='width:100%'>
                                    <tr>
                                        <td><hr></td>
                                        <td style='width:12%'>After Campaign</td>
                                        <td><hr></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr style="height: 10px"></tr>
                        <tr align="center">
                            <td><font style="color: green">Actual Cost (Rs.):</font></td>
                            <td ><input type="text" id="acctualcost"></input></td>
                        </tr>
                        <tr align="center">
                            <td><font >comments :</font></td>
                            <td><textarea style="width: 501px;height: 60px" id="comment" name="comment"></textarea></td>
                        </tr>
                        <tr align="center">
                            <td><font >Areas to improve :</font></td>
                            <td><textarea style="width: 501px;height: 60px" id="comment" name="comment"></textarea></td>
                        </tr>
                                              
<!--                        <form action="demo_form.asp">
                            Select images: <input type="file" name="img" multiple>
                            <input type="submit">
                        </form>
<tr><td>
        
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="" />

            <label for="userfile">File</label>
            <input type="file" name="userfile" id="userfile" size="20" />

            <input type="submit" name="submit" id="submit" />
                                    </td></tr>
</table>
</td>


</tbody>
</table>
</div>
</div>
</form>-->


<!--<script>
            $(function() {
                $('#upload_file').submit(function(e) {
                    e.preventDefault();
                    $.ajaxFileUpload({
                        url: 'upload_file',
                        secureuri: false,
                        fileElementId: 'userfile',
                        dataType: 'json',
                        data: {
                            'title': $('#title').val()
                        },
                        success: function(data, status)
                        {
                            if (data.status != 'error')
                            {
                                $('#files').html('<p>Reloading files...</p>');
                                refresh_files();
                                $('#title').val('');
                            }
                            alert(data.msg);
                        }
                    });
                    return false;
                });
            });

</script>-->
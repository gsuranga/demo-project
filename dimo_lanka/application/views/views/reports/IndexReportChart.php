
<?php
$acctual = $extraData['atpromotion'][0]->amount;
if(empty($acctual)){
    
    $acctual=0;
}
$firstmonthacctual = $extraData['firstmonth'][0]->amount;
if(empty($firstmonthacctual)){
    
    $firstmonthacctual=0;
}

$secondmonth = $extraData['secondmonth'][0]->amount;
if(empty($secondmonth)){
    
    $secondmonth=0;
}


$thiredmonth = $extraData['thiredmonth'][0]->amount;
if(empty($thiredmonth)){
    
    $thiredmonth=0;
}
$totaltarget = $extraData['atpromotion'][0]->Total_target;
if(empty($totaltarget)){
    
    $totaltarget=0;
}
 
//print_r($firstmonthacctual);
?>

<table align="centre" style="width: 100%" id="chartTable">
    <body >
    
    <tr><td align="center">
            <canvas id="myChart" width="800" height="500"></canvas>

        </td><td>
            <div>
                <hr style="color: orange;width: 20px;height: 10px;background:#336699 "></hr><label>Target</label>
                <br>

                <hr style="color: orange;width: 20px;height: 10px;background:#FF9900 "></hr><label>Actual</label>
                <br>
                <label>(Dot denotes whether<br> the sales has been<br> done or not in the <br>current month)</label>
                <br>
                <hr style="color: orange;width: 20px;height: 10px;background:#C0C0C0 "></hr><label>Average</label>
                <br>

            </div>
        </td></tr>
</body>
</table>

<script>
    $j(function() {
        var v0 =<?php print_r($totaltarget); ?>;
        var v0x=v0;
        console.log(v0);
        if(v0===0){
           v0='&nbsp;';
        }
        var v1 =<?php print_r($acctual); ?>;
        var v1x=v1;
          if(v1===0){
          v1='&nbsp;';
        }
        console.log(v1);
        var v2 =<?php print_r($firstmonthacctual) ?>;
        var v2x=v2;
          if(v2===0){
           v2='&nbsp;';
        }
        console.log(v2);
        var v3 =<?php print_r($secondmonth) ?>;
        var v3x=v3;
          if(v3===0){
            v3='&nbsp;';
        }
        console.log(v3);
        var v4 =<?php print_r($thiredmonth) ?>;
        var v4x=v4;
          if(v4===0){
            v4='&nbsp;';
        }
        console.log();

        var data = {
            labels: ["At the time of the promotion", "1 st month", "2 nd month", "3 rd month"],
            datasets: [
                {
                    fillColor: "rgba(0, 0, 0,0)",
                    strokeColor: "rgba(101, 153, 255,1)",
                    pointColor: "rgba(101, 153, 255,1)",
                    pointStrokeColor: "#fff",
                    data: [v1, , , v0]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(255, 153, 0,1)",
                    pointColor: "rgba(255, 153, 0,1)",
                    pointStrokeColor: "#fff",
                    data: [v1,v2,v3, v4]
                },
                {
                    fillColor: "rgba(0,0,0,0)",
                    strokeColor: "rgba(192, 192, 192,1)",
                    pointColor: "rgba(192, 192, 192,1)",
                    pointStrokeColor: "#7777",
                    data: [,(v1x+v2x)/2,(v1x+v2x+v3x)/3,(v1x+v2x+v3x+v4x)/4]
                }


            ]
        }

        var v3 = (v1 + v2);
        console.log(v3);
        var ctx = document.getElementById("myChart").getContext("2d");
        new Chart(ctx).Line(data);


    })

//new Chart(ctx).PolarArea(data,options);
</script>

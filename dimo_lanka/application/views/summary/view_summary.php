<?php $branchid; ?>
<html>

    <head>

    </head>

    <body>

        <div ng-app="summaryapp" ng-controller="summarycontroller">
            <table>
                <input type="hidden" value={{branch}} id="areaid_se"></input>
               
                <tr style="vertical-align: central">
                    <td>Branch :</td>
                    <td colspan="3">
                        <select  ng-options="branch.id as branch.name for branch in branchs" ng-model="branch" id="branchcombo" >
                           
                            <option  style="display:none" value="">select a branch</option>
                        </select> 

                        <!--                                                <br>selected: {{branch}}-->
                    </td>
                </tr>
                <tr>
                    <td>From :</td>
                    <td><input type="text" id="form_date" name="form_date"></></td>
                    <td>To :</td>
                    <td><input type="text" id="to_date" name="to_date" ></></td>
                    <td><input type="button" value="Search" ng-click="gettingdetail()"></></td>
                </tr>


            </table>
            <table style ="width: 100%"   class="SytemTable">
                <thead>
                    <tr>
                        <td rowspan="2">Business Channel</td>
                        <td colspan="4">OR THE PERIOD</td>
                        <td colspan="4">FOR FINANCIAL YEAR</td>

                    </tr>
                    <tr>

                        <td >Total T/O</td>
                        <td >Total Cost</td>
                        <td >Gross Profit</td>
                        <td >GP Margin %</td>
                        <td >Total T/O</td>
                        <td >Total Cost</td>
                        <td >Gross Profit</td>
                        <td >GP Margin %</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Field Sales</td>
                        <td style="text-align: right">{{details.dealersale | number}}</td>
                        <td style="text-align: right">{{details.dealercostvalue | number}}</td>
                        <td style="text-align: right">{{details.dealergpvalue | number}}</td>
                        <td style="text-align: right">{{details.dealergpmargin | number}}</td>

                        <td style="text-align: right">{{details.dealersaleyear | number}}</td>
                        <td style="text-align: right">{{details.dealercostvalueyear | number}}</td>
                        <td style="text-align: right">{{details.dealergpvalueyear | number}}</td>
                        <td style="text-align: right">{{details.dealergpmarginyear | number}}</td>
                    </tr>
                    <tr>
                        <td>Counter</td>
                        <td style="text-align: right">{{details.countersale | number}}</td>
                        <td style="text-align: right">{{details.countercostvalue | number}}</td>
                        <td style="text-align: right">{{details.countergpvalue | number}}</td>
                        <td style="text-align: right">{{details.countergpmargin | number}}</td>
                        
                        <td style="text-align: right">{{details.countersaleyear | number}}</td>
                        <td style="text-align: right">{{details.countercostvalueyear | number}}</td>
                        <td style="text-align: right">{{details.countergpvalueyear | number}}</td>
                        <td style="text-align: right">{{details.countergpmarginyear | number}}</td>
                    </tr>
                    <tr>
                        <td>Worshop Normal</td>
                        <td style="text-align: right">{{details.workshopNcount | number}}</td>
                        <td style="text-align: right">{{details.workshopNcostcount | number}}</td>
                        <td style="text-align: right">{{details.workshopNgpcount | number}}</td>
                        <td style="text-align: right">{{details.workshopNgpmargin | number}}</td>
                        
                        <td style="text-align: right">{{details.workshopNcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopNcostcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopNgpcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopNgpmarginyear | number}}</td>

                    </tr>
                    <tr>
                        <td>Work shop Warranty</td>
                        <td style="text-align: right">{{details.workshopWcount | number}}</td>
                        <td style="text-align: right">{{details.workshopWcostcount | number}}</td>
                        <td style="text-align: right">{{details.workshopWgpcount | number}}</td>
                        <td style="text-align: right">{{details.workshopWgpmargin | number}}</td>
                        
                        <td style="text-align: right">{{details.workshopWcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopWcostcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopWgpcountyear | number}}</td>
                        <td style="text-align: right">{{details.workshopWgpmarginyear | number}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Total Work shops</td>
                        <td style="font-weight: bold;text-align: right">{{details.wnto | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wncost | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wngross | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wngrossgp | number}}</td>
                        
                        <td style="font-weight: bold;text-align: right">{{details.wntoyear | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wncostyear | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wngrossyear | number}}</td>
                        <td style="font-weight: bold;text-align: right">{{details.wngrossgpyear | number}}</td>
                    </tr>
                    <tr>
                        <td>Institutional Sales</td>
                        <td style="text-align: right">{{details.instValue | number}}</td>
                        <td style="text-align: right">{{details.instCostValue | number}}</td>
                        <td style="text-align: right">{{details.instgross | number}}</td>
                        <td style="text-align: right">{{details.instgrossgp | number}}</td>
                        
                        <td style="text-align: right">{{details.instValueyear | number}}</td>
                        <td style="text-align: right">{{details.instCostValueyear | number}}</td>
                        <td style="text-align: right">{{details.instgrossyear | number}}</td>
                        <td style="text-align: right">{{details.instgrossgpyear | number}}</td>

                    </tr>
                    <tr>
                        <td>PDI</td>
                        <td style="text-align: right">{{details.pdiValue | number}}</td>
                        <td style="text-align: right">{{details.pdiCost | number}}</td>
                        <td style="text-align: right">{{details.pdigross | number}}</td>
                        <td style="text-align: right">{{details.pdigrossgp | number}}</td>
                        
                        <td style="text-align: right">{{details.pdiValueyear | number}}</td>
                        <td style="text-align: right">{{details.pdiCostyear | number}}</td>
                        <td style="text-align: right">{{details.pdigrossyear | number}}</td>
                        <td style="text-align: right">{{details.pdigrossgpyear | number}}</td>
                    </tr>
                   
                    <tr style="background-color: #d7e6e9;color: blue;font-weight: bold">
                        <td>Total</td>
                         <td style="text-align: right">{{details.totalValue | number}}</td>
                         <td style="text-align: right">{{details.totalCost | number}}</td>
                         <td style="text-align: right">{{details.totalgross | number}}</td>
                         <td style="text-align: right">{{details.totalgrossgp | number}}</td>
                         
                         <td style="text-align: right">{{details.totalValueyear | number}}</td>
                         <td style="text-align: right">{{details.totalCostyear | number}}</td>
                         <td style="text-align: right">{{details.totalgrossyear | number}}</td>
                         <td style="text-align: right">{{details.totalgrossgpyear | number}}</td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>
    

</body>

</html>
<style>
#spinningSquaresG{
position:relative;
width:240px;
height:29px}

.spinningSquaresG{
position:absolute;
top:0;
background-color:#1C296E;
width:29px;
height:29px;
-moz-animation-name:bounce_spinningSquaresG;
-moz-animation-duration:1.3s;
-moz-animation-iteration-count:infinite;
-moz-animation-direction:linear;
-moz-transform:scale(.3);
-webkit-animation-name:bounce_spinningSquaresG;
-webkit-animation-duration:1.3s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-direction:linear;
-webkit-transform:scale(.3);
-ms-animation-name:bounce_spinningSquaresG;
-ms-animation-duration:1.3s;
-ms-animation-iteration-count:infinite;
-ms-animation-direction:linear;
-ms-transform:scale(.3);
-o-animation-name:bounce_spinningSquaresG;
-o-animation-duration:1.3s;
-o-animation-iteration-count:infinite;
-o-animation-direction:linear;
-o-transform:scale(.3);
animation-name:bounce_spinningSquaresG;
animation-duration:1.3s;
animation-iteration-count:infinite;
animation-direction:linear;
transform:scale(.3);
}

#spinningSquaresG_1{
left:0;
-moz-animation-delay:0.52s;
-webkit-animation-delay:0.52s;
-ms-animation-delay:0.52s;
-o-animation-delay:0.52s;
animation-delay:0.52s;
}

#spinningSquaresG_2{
left:30px;
-moz-animation-delay:0.65s;
-webkit-animation-delay:0.65s;
-ms-animation-delay:0.65s;
-o-animation-delay:0.65s;
animation-delay:0.65s;
}

#spinningSquaresG_3{
left:60px;
-moz-animation-delay:0.78s;
-webkit-animation-delay:0.78s;
-ms-animation-delay:0.78s;
-o-animation-delay:0.78s;
animation-delay:0.78s;
}

#spinningSquaresG_4{
left:90px;
-moz-animation-delay:0.91s;
-webkit-animation-delay:0.91s;
-ms-animation-delay:0.91s;
-o-animation-delay:0.91s;
animation-delay:0.91s;
}

#spinningSquaresG_5{
left:120px;
-moz-animation-delay:1.04s;
-webkit-animation-delay:1.04s;
-ms-animation-delay:1.04s;
-o-animation-delay:1.04s;
animation-delay:1.04s;
}

#spinningSquaresG_6{
left:150px;
-moz-animation-delay:1.17s;
-webkit-animation-delay:1.17s;
-ms-animation-delay:1.17s;
-o-animation-delay:1.17s;
animation-delay:1.17s;
}

#spinningSquaresG_7{
left:180px;
-moz-animation-delay:1.3s;
-webkit-animation-delay:1.3s;
-ms-animation-delay:1.3s;
-o-animation-delay:1.3s;
animation-delay:1.3s;
}

#spinningSquaresG_8{
left:210px;
-moz-animation-delay:1.43s;
-webkit-animation-delay:1.43s;
-ms-animation-delay:1.43s;
-o-animation-delay:1.43s;
animation-delay:1.43s;
}

@-moz-keyframes bounce_spinningSquaresG{
0%{
-moz-transform:scale(1);
background-color:#1C296E;
}

100%{
-moz-transform:scale(.3) rotate(90deg);
background-color:#FFFFFF;
}

}

@-webkit-keyframes bounce_spinningSquaresG{
0%{
-webkit-transform:scale(1);
background-color:#1C296E;
}

100%{
-webkit-transform:scale(.3) rotate(90deg);
background-color:#FFFFFF;
}

}

@-ms-keyframes bounce_spinningSquaresG{
0%{
-ms-transform:scale(1);
background-color:#1C296E;
}

100%{
-ms-transform:scale(.3) rotate(90deg);
background-color:#FFFFFF;
}

}

@-o-keyframes bounce_spinningSquaresG{
0%{
-o-transform:scale(1);
background-color:#1C296E;
}

100%{
-o-transform:scale(.3) rotate(90deg);
background-color:#FFFFFF;
}

}

@keyframes bounce_spinningSquaresG{
0%{
transform:scale(1);
background-color:#1C296E;
}

100%{
transform:scale(.3) rotate(90deg);
background-color:#FFFFFF;
}

}

</style>
<div id="spinningSquaresG" style="display: none" >
<div id="spinningSquaresG_1" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_2" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_3" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_4" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_5" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_6" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_7" class="spinningSquaresG">
</div>
<div id="spinningSquaresG_8" class="spinningSquaresG">
</div>
</div>

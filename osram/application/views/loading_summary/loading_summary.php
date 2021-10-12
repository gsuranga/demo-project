<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
    </script>
</head>
<table width="100%" >
    <tr>
        <td width="40%">
            <table>
                <tr>
                    <td width="60%" >
                        <div style=" position: relative;top:-50px;">
                          <table border="0" align="top">
                            <tr>
                                <td>Select Invoice Date</td>
                                <td>:</td>
                                <td><input type="date" id="from" name="from" onchange="get_summery();"></td>
                            </tr>
                            <tr>
                                <td width='40%'>
                                    Select Brand 
                                </td>
                                <td>:</td>
                                <td width='60%'>
                                    <select id="brand_type" name="brand_type" onchange="select_item_name_brwise();">

                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td width='40%'>
                                    Select Category 
                                </td>
                                <td>:</td>
                                <td width='60%'>
                                    <select id="it_cetgory" name="it_cetgory" onchange="select_item_category_brwise();">

                                    </select>
                                </td>

                            </tr>
<!--                            <tr>
                                <td width='40%'>
                                    Select Distributor 
                                </td>
                                <td>:</td>
                                <td width='60%'>
                                    <select id="it_distributor" name="it_distributor" onchange="select_item_by_dis();">

                                    </select>
                                </td>

                            </tr>

                            <tr id="id_rep">
                                <td width='40%'>
                                    Select Sales Rep 
                                </td>
                                <td>:</td>
                                <td width='60%'>
                                    <select id="it_salesrep" name="it_salesrep" onclick="select_item_by_rep();">

                                    </select>
                                </td>

                            </tr>-->

                            <tr>
                                <td width='40%'>
                                    Select Item Name 

                                </td>
                                <td>:</td>
                                <td width='60%'>
                                    <select id="it_item_name" name="it_item_name"  onclick="set_select_item_to_table();">

                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>Select Distributor</td>
                                <td>:</td>
                                <td>
                                    <input type="text" id="dis_name" name="dis_name" autocomplete="off" placeholder="Select Distributor" onkeyup="get_distributor();">
                                    <input type="hidden" id="dis_phy" name="dis_phy">
                                    <input type="hidden" id="ehp_id" name="ehp_id">
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="button" id="btn" name="btn" value="Search" onclick="get_summery();"></td>
                            </tr>

                        </table>  
                        </div>
                        
                    </td>
                    <td width="40%">

                    </td>
                </tr>
            </table> 
        </td>
        <td width="60%">
            <div id="piechart_3d" style=" position: relative;right: 0px;width: 700px;height: 300px;top:0px;" border="1">

            </div>
        </td>
    </tr>
</table>

<!--<div id="piechart_3d" style="position: relative;width: 800px;height: 300px; background-color: #D0D0D0 ; float: right;top: -80px" border="1">-->

<table width="100%" id="effect">
    <tr>
        <td id="data"></td>
    </tr>
</table>


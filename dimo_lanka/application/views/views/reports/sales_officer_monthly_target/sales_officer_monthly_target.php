<?php
$_instance = get_instance();
?>
<style>
    #disablingDiv
    {
        /* Do not display it on entry */
        display: none; 

        /* Display it on the layer with index 1001.
           Make sure this is the highest z-index value
           used by layers on that page */
        z-index:1001;
        /* make it cover the whole screen */
        position: absolute; 
        top: 0%; 
        left: 0%; 
        width: 100%; 
        height: 100%; 

        /* make it white but fully transparent */
        background-color: #ffffff; 
        opacity: 0.5; 
        filter: alpha(opacity=00); 
    }
</style>
<table border="0" width="80%" align="center">
    <tr>
        <td style="text-align: left;">
            <table align="center" width="70%" border="0">
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Sales Officer :</td>
                    <td><input type="text" id="txt_so_name" name="txt_so_name" placeholder="Sales Officer" onfocus="getSalesOficerName();"></td>
                </tr>
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Code :</td>
                    <td><input type="text" id="so_code" name="so_code" placeholder="Code" onfocus="getSalesOfficerCode();"></td>
                </tr>
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Month :</td>
                    <td><input type="text" id="txt_target_month" name="txt_target_month" placeholder="Month"></td>
                </tr>
                <tr>
                    <td><input type="hidden" id="txt_hidden_so_id" name="txt_hidden_so_id"></td>
                    <td style="position: relative; left: 44px"><input type="button" name="btn_to_excel" value="To Excel" onclick="reportsToExcel('tbl_so_target', 'Line_item_wise_target_sales_officer_wise')"> 
                        <input type="button" id="btn_search" name="btn_search" value="Search" onclick="getSOWiseTarget();"></td>
                </tr>
            </table>
        </td>
        <td style="vertical-align: top">
            <table width="100%" border="0">
                <tr>
                    <td style="width: 80%;text-align: center;font-weight: 700;font-size: 15px; ">Total Actual < Total Minimum</td>
                    <td style="background-color: #ff0f14;border-style: ridge;border-color: #787878"></td>
                </tr>
                <tr>
                    <td style="width: 80%;text-align: center;font-weight: 700;font-size: 15px;">Total Actual < Total Target</td>
                    <td style="background-color: lightyellow;border-style: ridge;border-color: #787878"></td>
                </tr>
                <tr>
                    <td style="width: 80%;text-align: center;font-weight: 700;font-size: 15px;">Total Actual > Total Target</td>
                    <td style="background-color: springgreen;border-style: ridge;border-color: #787878"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div>
    &emsp;
</div>
<table align="center" width="90%"  class="dealer_ranking_css" id="tbl_so_target">
    <thead style="height: 50px;">
        <tr>
            <th style="font-weight: bold;color: #000; background-color: #005fbf;height: 25px;">No.</th>
            <th style="font-weight: bold;color: #000; background-color: #005fbf;height: 25px;">Part No.</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Description</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">BBF</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Total Target</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Total Actual</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Total Minimum (Target)</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Total Additional (Target)</th>
            <th style="font-weight: bold;color: #000;background-color: #005fbf;height: 25px;">Variance</th>
        </tr>
    </thead>
    <tbody id="so_target_body">

    </tbody>
</table>

<div id="disablingDiv" width="100%">

    <img src="<?php echo $System['URL'] ?>/public/images/pr.gif" id="loading_gif" style="display: none;position: fixed; top: 50%; left: 50%;transform: translate(-50%, -50%);"/>

</div>
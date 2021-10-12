<table border="0" width="80%" align="center">
    <tr>
        <td style="text-align: left;">
            <table align="center" width="70%" border="0">
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Dealer :</td>
                    <td><input type="text" id="txt_dealer_name" name="txt_dealer_name" placeholder="Dealer" onfocus="get_dealer_name();"></td>
                </tr>
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Account No. :</td>
                    <td><input type="text" id="txt_dealer_account" name="txt_dealer_account" placeholder="Account No." onfocus="get_dealer_acc_no();"></td>
                </tr>
                <tr>
                    <td style="color: #3C3C3C;font-weight: bolder">Month :</td>
                    <td><input type="text" id="txt_month" name="txt_month" placeholder="Month"></td>
                </tr>
                <tr>
                    <td><input type="hidden" id="txt_hidden_dealer_id" name="txt_hidden_dealer_id"></td>
                    <td style="position: relative; left: 44px"><input type="button" name="btn_to_excel" value="To Excel" onclick="reportsToExcel('tbl_dealer_target', 'Line_item_wise_target_dealer_wise')"> 
                        <input type="button" id="btn_search" name="btn_search" value="Search" onclick="getDealerWiseTarget();"></td>
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
<table align="center" width="90%"  class="dealer_ranking_css" id="tbl_dealer_target">
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
    <tbody id="dealer_target_body">

    </tbody>
</table>
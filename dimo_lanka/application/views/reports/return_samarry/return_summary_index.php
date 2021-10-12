<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    #printBtnDiv{
        position: relative;
        margin-top: 5px;
        margin-left: 740px;
    }
</style>
<table style="width: 100%; text-align: center">
    <thead>
    <tr class="ContentTableTitleRow">
        <td style="height: 20px;">Return Summary</td>
    </tr>
    </thead>
</table>
<center>
    <table>
        <tr>
            <td>Branch Name:</td>
            <td colspan="4" style="padding-bottom: 22px;">
                <input type="text" style="margin-left: 32px; width: 365px;" name="branchName" id="branchName" onfocus="getAreasName();" placeholder="Select Branch Name" autocomplete="off" />
                <input type="hidden" name="branchId" id="branchId"/>
            </td>
        </tr>
        <tr>
            <td>Date Range Selected</td>
            <td>From</td>
            <td><input type="text" name="startDate" id="startDate" placeholder="Select Start date" autocomplete="off"/></td>
            <td>To</td>
            <td><input type="text" name="endDate" id="endDate" onchange="viewReturnDetails();" placeholder="Select End Date" autocomplete="off"/></td>
        </tr>
    </table>
</center>
<div id="printBtnDiv">
    <input type="button" name="pri_btn" id="pri_btn" onclick="printReturnSummary();" value="Print"/>
    <input type="hidden" name="uesrName" id="uesrName" value="<?php echo $this->session->userdata('username');?>"/>
</div>
<center>
    <div id="return_dateils">
    <table style="margin-top: 30px; border: 2px solid #000000;">
        <thead style="background-color: #006cff; color: #ffffff; font-weight: 700; text-align: center;">
            <tr>
                <td style="width: 100px; height: 30px;">ASO</td>
                <td style="width: 100px;">Dealer Account</td>
                <td style="width: 200px;">Dealer Name</td>
                <td style="width: 200px;">Address</td>
                <td style="width: 110px;">Part Number</td>
                <td style="width: 200px;">Description</td>
                <td style="width: 80px;">Approved Quantity</td>
                <td style="width: 150px;">Reason</td>
                <td style="width: 100px;">Dealers Confirmation</td>
            </tr>
        </thead>
        <tbody id="viewReturnDetails">

        </tbody>
        
    </table>
        <div hidden="true">
            <table>
                
            </table>
        </div>
        </div>
</center>
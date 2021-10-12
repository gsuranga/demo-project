
<!--<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#tbl_apm').dataTable();
    });
</script>-->


<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table align="center" width="90%">
    <tr>
        <td>Part Number:</td>
        <td style=" float: right" width="80%">
            <input type="text" id="partnumber" name="partnumber" onfocus="get_part_no()"/>
        </td> 
        <td>
            <input type="hidden" id="itemid" name="itemid" autocomplete="off"/> </td>
        <td>Description</td>
        <td style=" float: right" width="80%">
            <input type="text" id="description" name="description" onfocus="get_desc()"/></td> 
        <td>
            <input type="hidden" id="item_id" name="item_id" autocomplete="off"> 
        </td>

    </tr>
    <tr>
        <td></td>
        <td style=" float: right">
            <input type="submit" id="submit_search" name="submit_search" value="Search" onclick="searchItems();"/>
        </td>
        <td>
            <input type="button" id="btn_availability_to_excel" name="btn_availability_to_excel" value="To Excel" onclick="ExportExcel('dlr_table','dlr_report');"></td>
        <td></td>


    </tr>  

</table>
<br><br>
<table class="dealer_ranking_css" width='100%' id="dlr_table" border="3">
    <thead>
        <tr>

            <th style="background-color: yellow" rowspan="2">Dealer Name</th>
            <th style="background-color: yellow" rowspan="2">Account Number</th>
            <th style="background-color: yellow" rowspan="2">sales officer</th>
            <th style="background-color: yellow" colspan="3">From Dimo to Dealer</th>
            <th style="background-color: yellow" rowspan="2">AVG movement from Dealer to Customer</th>
            <th style="background-color: yellow" rowspan="2">Current stock at the dealer</th>

        </tr>

        <tr>
            <th style="background-color: yellow">AVG Movement </th>
            <th style="background-color: yellow">Last invoice date</th>
            <th style="background-color: yellow">Last Invoiced Qty</th>
        </tr>
<!--        <tr>

            <th style="background-color: yellow" rowspan="3">Dealer Name</th>
            <th style="background-color: yellow" rowspan="3">Account Number</th>
            <th style="background-color: yellow" rowspan="3">sales officer</th>
            <th style="background-color: yellow" colspan="10">From Dimo to Dealer</th>
            <th style="background-color: yellow" rowspan="3">AVG movement from Dealer to Customer</th>
            <th style="background-color: yellow" rowspan="3">Current stock at the dealer</th>

        </tr>

        <tr>
            <th style="background-color: yellow" colspan="3">AVG Movement </th>
            <th style="background-color: yellow" colspan="3">Last invoice date</th>
            <th style="background-color: yellow" colspan="3">Last Invoiced Qty</th>
        </tr>-->

    </thead>
    <tbody id="bdy_dealer_stock">



    </tbody>
    <tfoot>
        <tr>
            <td colspan="6">No Records Found ..</td>
        </tr>
    </tfoot>

</table>

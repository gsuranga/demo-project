<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<h2 style="color: #005fbf">
    Brand / Item Wise Sales Report
</h2>

<div id="piechart" style="position: absolute;width: 500px;left: 695px;height: 350px;">
    
</div>
<table align="right" style="position: absolute;top: 145px;right: 20px;">    
                <tr>
                    <td><input type="text" id="pdfName" name="pdfName" placeholder="Enter a Name" /></td>
                    <td><input type="button" value="To PDF" onclick="getPDFPrint('brandnew');" /></td>
                    <td><input type="button" value="To Excel" onclick="reportsToExcel('nrndwisenew', 'brandwise.xls');" /></td>
                <input type="hidden" id="session" name="session" value="<?php echo $this->session->userdata('id_user') ?>" />
                <input type="hidden" id="topic" name="topic" value="" />
    </tr>
</table>
<table  width="100%" border="0" cellpadding="10">

    <tr>
        <td>
            <table width="50%" border="0" align="left" cellspacing="5" cellpadding="0" style="margin: 0;top: 10px;">
                <tr>
                    <td width='40%'>
                        Select Brand 
                    </td>
                    <td width='60%'>
                        <select id="brand_type" name="brand_type" onclick="select_item_name_brwise();">

                        </select>
                    </td>

                </tr>
                <tr>
                    <td width='40%'>
                        Select Category 
                    </td>
                    <td width='60%'>
                        <select id="it_cetgory" name="it_cetgory" onclick="select_item_category_brwise();">

                        </select>
                    </td>

                </tr>
                <tr>
                    <td width='40%'>
                        Select Distributor 
                    </td>
                    <td width='60%'>
                        <select id="it_distributor" name="it_distributor" onchange="select_item_by_dis();">

                        </select>
                    </td>

                </tr>

                <tr id="id_rep">
                    <td width='40%'>
                        Select Sales Rep 
                    </td>
                    <td width='60%'>
                        <select id="it_salesrep" name="it_salesrep" onclick="select_item_by_rep();">

                        </select>
                    </td>

                </tr>

                <tr>
                    <td width='40%'>
                        Select Item Name 

                    </td>
                    <td width='60%'>
                        <select id="it_item_name" name="it_item_name"  onclick="set_select_item_to_table();">

                        </select>
                    </td>

                </tr>
                <tr>
                    <td width='40%'>
                        Select Start Date 
                    </td>
                    <td width='60%'>
                        <input type="date" id="st_datebnr">
                    </td>

                </tr>
                <tr>
                    <td width='40%'>
                        Select End Date 
                    </td>
                    <td width='60%'>
                        <input type="date" id="en_datebnr" >
                        <input style="position: relative;width: 150px;margin: 0;left:  40px;" onclick="select_date_range_value();" type="button" value="search"/>
                    </td>

                </tr>

            </table>
            

<div id="brandnew">
    <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="nrndwisenew" style="position: relative;top: 30px;">

        <thead>
            <tr>
                <td style="color: #ffffff;background-color: #0134c5" >No.</td>
                <td style="color: #ffffff;background-color: #0134c5" >Item Name</td>
                <td style="color: #ffffff;background-color: #0134c5" >Item Account Code</td>
                <td style="color: #ffffff;background-color: #0134c5" >Sales Quantity</td>
                <td style="color: #ffffff;background-color: #0134c5" >Sales Return</td>
                <td style="color: #ffffff;background-color: #0134c5" >Market Return</td>
                <td style="color: #ffffff;background-color: #0134c5" >Free Item</td>
                <td style="color: #ffffff;background-color: #0134c5" >Warranty Return</td>
            </tr>
        </thead>
        <tbody id="tbl_brnad_body">

        </tbody>

    </table>
</div>
</td>
</tr>

</table>

<head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
                        google.load("visualization", "1", {packages: ["corechart"]});
    </script>
</head>

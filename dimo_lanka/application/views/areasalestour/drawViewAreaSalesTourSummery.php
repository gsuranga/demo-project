<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
   .ui-datepicker-calendar { display: none; }
</style>
<script>
//    function printdiv(printpage)
//    {
//        var rowCount = $j('#summery_table tr').length;
//        if (rowCount > 1) {
//            var salesmanname = $j('#salesofficer_name').val();
//            var salesmanaccount = $j('#account_number').val();
//            var year = $j('#txtYear').val();
//            var month = $j('#txtMonth').val();
//            // $j('#headline').html('Summary Of Expenses For Area Sales Tour')
//            var headstr = "<html><head><center style='font-size:30px'><u>Summary of Expenses for Area Sales Tour</u></center><br/><label style='font-size:20px'>" + salesmanname + "/" + salesmanaccount + "<label/><br/><label>Month:" + year + "-" + month + "</label style='height:20px'><br/><label>  </label><title></title></head><body>";
//            var footstr = "<table align='center' style='width:100%'><tr style='height:100px'></tr><tr><td style='text-align:center'>……………………………………</td><td style='text-align:center'>……………………………………</td></tr><tr><td style='text-align:center'>Signature of the Salesman    </td><td style='text-align:center'>Date</td></tr><tr style='height:30px'></tr><tr><td style='text-align:center'>……………………………………</td><td style='text-align:center'>……………………………………</td></tr><tr><td style='text-align:center'>Approved by ( BUM / GM / DIC )    </td><td style='text-align:center'>Date</td></tr><tr style='height:50px'></tr></table></label></body>";
//            var newstr = document.all.item(printpage).innerHTML;
//            var oldstr = document.body.innerHTML;
//            document.body.innerHTML = headstr + newstr + footstr;
//
//            window.print();
//            location.reload();
//            document.body.innerHTML = oldstr;
//            return false;
//        } else {
//            alert("No Records");
//        }
//
//    }
function printDiv(divName) {
    $j('#prin').hide();
    $j('#strat').hide();
    $j('#nar').hide();
    $j('#end').hide();
    $j('#day').hide();
    $j('#img').hide();
     $j('td:nth-child(9)').hide(); // hid these colmns for print
     $j('td:nth-child(8)').hide();
     $j('td:nth-child(7)').hide();
     $j('td:nth-child(6)').hide();
     $j('td:nth-child(5)').hide();
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
     $j('#prin').show();
      location.reload();
}
</script>

<center><label style="color: #000;" id="headline"></label></center>
<table>
    <tr style="height: 10px"></tr>
    <tr style="color:black">
        <?php if($this->session->userdata('typename')=='Super Admin'){?>
        <td><label style="font-weight: bold">Sales Officer:</label></td>
        <td><input type="text" style="width: 250px;" placeholder="Name" id="salesofficer_name" name="salesofficer_name" onfocus="get_Sales_officer_by_name();"></><input type="hidden" id="sales_officer_id_for" name="sales_officer_id_for"></></td>
        <td><input type="text" style="width: 250px" placeholder="Account Number" id="account_number" name="account_number"></></td>
        <?php }else if($this->session->userdata('typename')=='Sales Officer'){?>
    <input type="hidden" id="sales_officer_id_for" name="sales_officer_id_for" value="<?php echo $this->session->userdata('employe_id');?>"></>
        <?php }?>
        
    </tr>
    <tr style="height: 20px;"></tr>


</table>
<table align="center">
    <tr>
        <td><input type="text" name="txtFromYear" id="txtYear" class="date-picker-year" placeholder="Year"/></td>
        <td style="border-bottom-width: 0px"><input type="text" name="txtMonth" id="txtMonth" class="date-picker-month" placeholder="Month"/>
        </td>
<!--        <td><label>From:</label></td>
        <td style=""><input type="text" style="width: 250px" id="firstDate" name="firstDate"></></td>
        <td style="width: 2px"><label>To:</label></td>
        <td><input type="text" style="width: 250px" id="secondDate" name="secondDate"></></td>-->
        <td><input type="button" value="Create" id="createButton" onclick="SearchSummery();"></></td>
        <td style="width: 250px"></td>
        </tr>
    <tr style="height: 20px">
    <div id="waiting" style="display: none">
        <img   width="20" height="20" src="<?php echo $System['URL']; ?>public/images/ajax-loader.gif" />
    </div>
</tr>
</table>

<div style = "size: A4;display: none" id="div_print">
    <center style="size: A4">
        <h1 style="color: black"><u>Summary of Expenses for Area Sales Tour</u></h1>
        <table>
            <tr>
                <td style="width: 100%;">
                    <table align="center" style="color: black" >
                        <tr>
                            <td style="font-weight: bold">EPF No</td>

                            <td id="epf_no"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Payee's Name</td>
                            <td id="payes_name"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Vehicle No</td>
                            <td id="vehicle_no"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">IOU Taken Date</td>
                            <td id="iou_taken_date"></td>
                            <td></td>
                            <td style="vertical-align: top" id="prin"><input type="image" height="50px" width="50px"onclick="printDiv('div_print');" src="<?php echo $System['URL']; ?>public/images/printer.png"></></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">IOU Amount</td>
                            <td id="iou-amount"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Due Date</td>
                            <td id="due_date"></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tour Areas</td>
                            <td id="tour_area"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="detailTable">
                        <!--<table  align="center" cellsapcing="10" cellpadding="10" class="SytemTable" id="summery_table">-->
                        <table  align="center" border="1"  id="summery_table" style=" border-collapse: collapse;font-weight: bold">

                            <tbody id="summery_body">

                            </tbody>

                        </table>

                    </div>
                </td>
            </tr>
        </table>
        <table style="width: 50%;color: black" align="center">
            <tr style="height: 60px"></tr>
            <tr>
                <td style="border-top:dotted;text-align: center">Signature of the Salesman</td>
                <td style="width: 30px" ></td>
                <td style="border-top:dotted;text-align: center;width: 100px">date</td>
            </tr>
            <tr style="height: 60px"></tr>
            <tr>
                <td style="border-top:dotted;text-align: center">Approved by ( BUM / GM / DIC )</td>
                <td style="width: 30px;" ></td>
                <td style="border-top:dotted;text-align: center;width: 100px">date</td>
            </tr>
        </table>
    </center>
</div>



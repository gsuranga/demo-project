<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
$ci=  get_instance();
?>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('campaign/insertcampaign', array('id' => 'campaign_form_submit','name'=>'campaign_form_submit')); ?>
<!--<style type="text/css">
@media print{
  body{ background-color:#FFFFFF; background-image:none; color:#000000 }
  #ad{ display:none;}
  #leftbar{ display:none;}
  #contentarea{ width:100%;}
}
</style>-->

<table style="" align="center" width="100%">
    <tbody>
        <tr style="background: #a98f8f;color:  #002166">

            <td style="width: 10%;left: 5px" >Campaign type</td>
            <td >
                <select id="select_box" name="select_box"onchange="selectType();" style="width: 250px">
                    <?php foreach ($extraData As $val) { ?>
                    <option value="<?php echo $val->type_description ?>"> <?php echo $val->type_description ?></option>
                    <?php } ?>
                    
                    <option value="5">Other</option>
                </select>
                <div id="new_type">

                </div>
            </td>
        </tr>
        <tr style="background-color:  #d6d1c6;color:  #002166;">
            <td  >Targeted Dealer</td>
            <td style="left: 0px">
                <table width="100%" style="position: relative;left: -3px;"  >
                    <thead>
                        <tr>
                            <td style="width: 20%"></td>
                            <td style="width: 25%"></td>
                            <td style="width: 18%">Current T/O</td>
                            <td style="width: 18%">Expected increase after three months</td>
                            <td style="width: 2%"></td>
                        </tr>
<!--                        style="width: 40%"><img style="width: 20px;height: 20px;position: relative;top: 6px;right: -5px"src="<?php echo $System['URL']; ?>public/images/add2.png" onclick="newdealer();"></><input type="text"style="width: 230px"></> -->
                    </thead>
                    <tbody id="new_dealer">
                        <tr id="row_1">
                            <td>
                                <input type="text"style="width: 250px;color: blue" value="<?php echo set_value("dealer_1"); ?>"id="dealer_1" name="dealer_1" onkeypress="get_dealer(1);" placeholder="Account Number"></>
                                <input type="hidden" id="dealercount" name="dealercount" value="1"></>
                                <input type="hidden" id="dealar_id_1" name="dealar_id_1"></>
                            </td> 
                            <td>
                                <input type="text" style="color: blue" id="dealerName_1" onkeypress="get_dealer_name(1);" placeholder="Name"></>
                            </td>
                            <td>
                                <input style="text-align: right" readonly="true" type="text" id="to_1" name="to_1"/>
                            </td>
                            <td>
                                <input style="text-align: right" type="text" id="eia_1" name="eia_1"/>
                            </td>
                            <td>
                                <img style="width: 20px;height: 20px;"src="<?php echo $System['URL']; ?>public/images/add2.png" onclick="newdealer(1);"></>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div id="new_dealer_div">

                </div>
            </td>
        </tr>
        <tr style="background:  #d9d6cf;color:  #002166;">
            <td  >Date</td>
            <td >
                <input type="text" id="campaign_date" name="campaign_date" style="width: 250px"></>
            </td>
        </tr>
   
        <tr style="background:  #dbd6cd;color:  #002166;">
            <td  >Objective</td>
            <td >
                <textarea style="width: 1060px;height: 100px" id="objective" name="objective"></textarea>
            </td>
        </tr>

        <tr style="background:  #dbd6cd;color:  #002166;">
            <td  >Material Required from H/O</td>
            <td >
                <textarea style="width: 1060px;height: 100px"id="material" name="material"></textarea>
            </td>
        </tr>

        <tr style="background:  #dbd6cd;color:  #002166;">
            <td  >Other requirements from branch</td>
            <td >
                <textarea style="width: 1060px;height: 100px" id="other_requirement" name="other_requirement"></textarea>
            </td>
        </tr>
        <tr style="height: 20px">
            
        </tr>
        <tr style="background:  #c5d4d6;color:  #002166;">
            <td>Location</td>
            <td><input type="text" id="location_field" name="location_field" style="width: 1060px"></></td>
        </tr>
        <tr style="background:  #c5d4d6;color:  #002166;">
            <td>Department</td>
            <td><label id="department"></label></td>
        </tr>
        <tr style="background:  #c5d4d6;color:  #002166;">
            <td>Expected Number Of Participants</td>
            <td>
                <table>
                    <tr>
                        <td style="color: white">Invitees</td>
                        <td>:<input type="text" id="invitees" name="invitees" style="text-align: right" onkeyup="calculateEmployee();"></></td>
                    </tr>
                    <tr>
                        <td style="color: white">Dimo Employees</td>
                        <td>:<input type="text" id="dimo_employee" name="dimo_employee" style="text-align: right" onkeyup="calculateEmployee();" ></></td>
                    </tr>
                    <tr>
                        <td style="color: white">Total Employees</td>
                        <td>:<input type="text" id="total_employee" name="total_employee" style="text-align: right" readonly="true" ></></td>
                    </tr>
                </table>
            </td>
            
            
        </tr>
        <tr>
            <td><input type="hidden" id="estimate_row_count" name="estimate_row_count" value="1"></></td>
            <td style="background:  #c5d4d6;color:  #002166;">
                
                <table class="SytemTable" style="width: 100%" id="memo_table">
                    <thead>
                        <tr>
                            <td style="width: 50px"></td>
                            <td>Description</td>
                            <td>Estimated Cost Per Unit</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody id="memo_table_body" style="overflow:scroll;height: 10px;">
                        <tr id="row_meom_1">
                            <td>
                                <input type="button" value="+" id="memo_btn_1"onclick="addnewMemoDetail(1)"></>
                            </td>
                            <td>
                                <input type="text" id="description_memo_1" name="description_memo_1" ></>
                            </td>
                            <td>
                                <input type="text" id="estamate_cost_memo_1" name="estamate_cost_memo_1" onkeyup="claculateMemo(1);"></>
                            </td>
                            <td>
                                <input type="text" id="qty_memo_1" name="qty_memo_1" style="text-align: right" onkeyup="claculateMemo(1);"></>
                            </td>
                            <td id="total_field_1" style="text-align: right">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                 
            </td>
        </tr>
        <tr >
            <td ><font style="color:  #002166;">Budget (Rs.)</font></td>
            <td align="right">
                <input type="text" style="width: 250px;color:  #002166;text-align: right"readonly="true" id="budget" name="budget"></>
            </td>
        </tr>
       
        <tr style="background:  #dcd9d2;color:  #002166;">
            <td >Quotations </td>
            <td >
                <input type="file" name="userfile" size="20" />
            </td>
        </tr>
        <tr style="height: 50px"></tr>
        <tr>
            <td >

            </td>
            <td >
                <input type="button" value="Submit" onclick="checkVallied();"  />
            </td>
        </tr>

    </tbody>

<!--onclick="checkVallied();-->
</table>

<?php echo form_close(); ?>

<div id="div_print" hidden="true">
    <table id="print_memo_table" align="left" >
        
    </table>
</div>
<div id="div_print_detail" hidden="true"  style="width: 100%" align="center">
   
    <table id="print_description_memo_table_detail" align="center" border="1px" style="width: 100%;border-collapse:collapse;" >
        <thead style="border-width: medium">
            <tr>
                <td style="width: 60%;text-align: center">Description</td>
                <td style="width: 10%;text-align: center">Estimated Cost Per Unit</td>
                <td style="width: 10%;text-align: center">Quantity</td>
                <td style="width: 20%;text-align: center">Total</td>
            </tr>
            
        </thead>
        <tbody id="description_body">
            
        </tbody>
        <tfoot>
            <tr>
                <td style="font-weight:bold ">Total Cost</td>
                <td id="total_des" colspan="3" style="text-align: right;font-weight:bold ">0.00</td>
            </tr>
        </tfoot>
        
    </table>
</div>
<div id="div_print_staff" hidden="true"  style="width: 100%" align="center">
   
    <table id="memo_staff" align="center" border="0" style="width: 100%" >
        <tr>
            <td style="font-weight: bold">Prepared by</td>
            <td style="font-weight: bold">Checked by</td>
        </tr>
        <tr style="height: 10px">
            
        </tr>
         <?php $userdata = $this->session->userdata('employe_id')?>
        <tr>
            <td><?php echo $ci->getsalesofficer($userdata); ?></td>
            <td></td>
        </tr>
        <tr>
            <td>-------------------------------</td>
            <td>--------------------------------</td>
        </tr>
        <tr>
            <td>name of the ASO</td>
            <td>APM</td>
        </tr>
        
        
        <tr style="height: 20px"></tr>
        <tr>
            <td style="font-weight: bold">Approved by</td>
            <td style="font-weight: bold">Approved by</td>
        </tr>
        <tr style="height: 10px">
            
        </tr>
       
        <tr style="">
            <td></td>
            <td></td>
        </tr>
        <tr style="height: 5px">
            <td>-----------------------------------------------</td>
            <td>-----------------------------------------------</td>
        </tr>
        <tr>
            <td>MM - Muthumal Soyza</td>
            <td>COO - Vijitha Bandara</td>
        </tr>
        
    </table>
</div>


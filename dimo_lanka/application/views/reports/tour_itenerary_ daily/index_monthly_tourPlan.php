<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Monthly Tour Plan Report
 </td>
    </tr>
 </table>
<?php  echo form_open('tour_itenerary_daily/index_itenerary_Report'); ?>
 <table>
 <tr>
        <td><input type="hidden" id="sales_officer_id" name="sales_officer_id" readonly="ture"  value="<?php echo $this->session->userdata('employe_id'); ?>"></td>
    </tr>
    <tr>
        <td>Month</td>
        
        <td><input type="text" name="select_date1" id="select_date1"/></td>
        <td><input type="hidden" id="select_date_id" name="select_date_id" /></td>
        <td><input type="text" id="sales_officer" placeholder="Sales Officer" name="sales_officer" onfocus="all_sales_officer()"/></td>
        <td><input type="submit" name="Search" id="Search" value="Search" /></td>
    </tr>
    </table>
<?php echo form_close(); ?>
<table   align="center" class="SytemTable" width='100%' >
    <thead>
        <tr>
            <td rowspan="2" style="background-color: #999;">Date</td>
            <td rowspan="2" style="background-color: #999;">Area</td>
            <td rowspan="2" style="background-color: #999;">Target Customer </td>
            <td rowspan="2" style="background-color: #999;">Types of Customer</td>
            <td colspan="2" style="background-color: #999;"><font style=" color: #ffffff">Target </td>          
        </tr>
        <tr>
             <td style="background-color: #999;">Sales</td>
             <td style="background-color: #999;">Collection</td>    
        </tr>
        </thead>
 
    <tbody

        <?php $_instance->getmonthlytourPlan();  ?>
        
        
       
    </tbody>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insert_budget
 *
 * @author SHDINESH
 */
$_instance = get_instance();
?>

<table class="SystemTable" width="40%" align="center" >
    <thead>
    </thead>
    <tbody>
        <tr>
            <td>Select a budget type.</td>
            <td><select id="cmb_budget_type" onchange="showBudgetType();">
                    <option>----Select a type----</option>
                    <option>Sales type wise</option>
                    <option>Area wise</option>
                    <option>Branch wise</option>
                    <option>Sales Officer wise</option>

                </select> </td>
            <td></td>      
        </tr>
        <tr>
            <td>Month</td>
            <td> <input type="text" id="month_picker" name="month_picker" style="border-style: groove" onchange="getAllSalesTypes();"></td>
        </tr>

    </tbody>
</table>
<div>
    &nbsp;


</div>

<div id="sales_type_div" class="sales_type_div" style="display: none">
    <?php
    $_instance->drawUpdateSalesTypeBudget();
    ?>;
</div>

<div id="area_wise_div" class="area_wise_div"style="display: none;">
    <?php //$_instance->drawInsertAreaWiseBudget()   ?>;
</div>
<div id="branch_wise_div" class="branch_wise_div"style="display: none;">
    <?php //$_instance->drawInsertBranchWiseBudget()   ?>;
</div>
<div id="sales_officer_wise_div" class="sales_officer_wise_div"style="display: none;">
    <?php //$_instance->drawInsertSalesOfficerViceBudget()   ?>;
</div>
<?php

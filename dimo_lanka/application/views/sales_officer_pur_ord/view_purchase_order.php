<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
$_instance = get_instance();

$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
//    'onfocus' => 'get_Sales_officer_by_name();'
);
$sales_account_no = array(
    'id' => 'sales_account_no',
    'name' => 'sales_account_no',
    'type' => 'text',
    'autocomplete' => 'off',
//    'onfocus' => 'get_Sales_officer();'
);
$btn_search = array(
    'id' => 'btn_search ',
    'name' => 'btn_search',
    'type' => 'button',
    'value' => 'Search',
    'onclick'=>'getData();'
);
?>

<table width="100%" border="0" cellpadding="10">
    <input type="hidden" id="salesOfficerID" name="salesOfficerID"></input>
  
    <tr class="ContentTableTitleRow">
        <td>
            View Purchase Order
        </td>
        
    </tr>
    <tr><td>
            
            <table border="0" align='center' width="50%" >

                <tbody>
               
                    <tr style="width: 50%">
                        <td>Sales Officer Name</td>
                        <td align="right"><?php echo form_input($sales_officer_name); ?></td>
                    </tr>
                    <tr>
                        <td>Sales Officer Acc No</td>
                        <td align="right"><?php echo form_input($sales_account_no); ?></td>
                    </tr>
                    <tr>
                        <td></td>
<!--                        <td align="right"><?php echo form_input($btn_search); ?></td>-->
                    </tr>

                </tbody>
            </table>
            
        </td>


    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#accpt_orders"><span>Pending Purchase Orders</span></a></li>
                    <li><a href="#pending_orders"><span>accept Purchase Order</span></a></li>
<!--                    <li><a href="#reject_orders"><span>Reject Purchase Order</span></a></li>-->

                </ul>
                <div class="Tab_content" id="accpt_orders">
                    <?php
                    $_instance->viewPendingPurchaseOrder($_POST);
                    
                       
                   
                    ?>
                </div>
                <div class="Tab_content" id="pending_orders">
                    <?php
                     $_instance->viewAcceptedPurchaseOrder($_POST);
                        
                 
                    ?>
                </div>
<!--                <div class="Tab_content" id="reject_orders">
                    <?php
                     $_instance->viewrejectPurchaseOrder($_POST);
                        
                 
                    ?>
                </div>-->
            </div>
        </td>

    </tr>

</table>

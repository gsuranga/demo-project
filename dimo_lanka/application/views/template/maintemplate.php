<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="UTF-8">
            <meta name="format-detection" content="telephone-no">
                <meta name="viewport" content="user-scalable=no, initial-scale=1,minimum-scale=1, maximum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
                    <!-- Title -->
                    <title>Distributing Management System</title>
                    <style>
                        #notification_detais{
                            width: 350px;
                            height: 200px;
                            background-color: #e9e2e2;
                            position: absolute;
                            top: 30px;
                            left: -315px;
                            margin-bottom: 0;
                            margin-left: 0;
                            margin-right: 0;
                            margin-top: 0;
                            right: 0;
                            bottom: 0;
                            padding: 0;
                            margin: 0;
                            overflow: scroll;


                        }
                    </style>
                    <!-- Title -->
                    <!-- Links -->
                    <!--   -->
                    <link rel="shortcut icon" href="<?php echo $System['URL'] ?>public/images/DIMO-Lanka.jpg" style="width: 10px;height: 10px"/>
                    <link href="<?php echo $System['URL']; ?>public/templateobjects/UI/template.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/templateobjects/menu/css/jquery-ui.css" />   
                    <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/jquery.ptTimeSelect.css" />
                    <link rel="stylesheet" href="<?php echo $System['URL']; ?>public/templateobjects/menu/css/mootools/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
                    <link rel="stylesheet" href="<?php echo $System['URL']; ?>public/css/knowTheKng.css" type="text/css" media="screen" charset="utf-8" />        
                    <!--Mootools-->
                    <script src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/mootools/mootools.js" type="text/javascript" ></script>
                    <script src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/mootools/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>

                    <!--       ToolTip-->
                    <script src="<?php echo $System['URL']; ?>public/tooltip/jquery-ui.js" type="text/javascript" charset="utf-8"></script>
                    <link href="<?php echo $System['URL']; ?>public/tooltip/jquery-ui.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript" >
                        var Timer = 0;
                        window.addEvent('domready', function () {
                            var myMenu = new MenuMatic();
                        });
                    </script>


                    <!-- Jquerys-->
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery-1.9.1.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery-ui.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery.ptTimeSelect.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/jquery.mtz.monthpicker.js"></script>

                    <!--        Color Box js-->
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/colorbox/jquery.colorbox-min.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/colorbox/jquery.colorbox.js"></script>             
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/jquery.timer.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/angular/angular.min.js"></script>
                    <!--dragabletable-->
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/tablejs/tablednd.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/knowTheKing.js"></script>
                    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/setupKnowTheKing.js"></script>         
            <!--    <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/colorbox/jquery.min"></script>-->


                    <!--        Color Box-->
                    <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/jquery/colorbox/colorbox.css" />

                    <link href="<?php echo $System['URL']; ?>public/fullcalendar/fullcalendar.css" rel='stylesheet' />
                    <link href="<?php echo $System['URL']; ?>public/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print' />
                    <script src="<?php echo $System['URL']; ?>public/fullcalendar/lib/moment.min.js"></script>
                    <script src="<?php echo $System['URL']; ?>public/fullcalendar/fullcalendar.min.js"></script>
                    <!--Chart-->
                    <script src="<?php echo $System['URL']; ?>public/Chart.js"></script>

                    <link rel="stylesheet" href="<?php echo $System['URL']; ?>public/notificationbox/box.css"></link>

                    <script type="text/javascript">
                        var $j = $.noConflict();
                        $j(function () {
                            $j("#notification_detais").hide();
                        });
                    </script>        
                    <script type="text/javascript">
                        //var $j = $.noConflict();
                        $j(function () {
                            $j("#content > table").attr("cellspacing", "10");
                            $j("#content > div > table").attr("cellspacing", "10");
                        });


                    </script>

                    <!-- Loded Css and js From Controller Class -->
                    <script>
                        var myVar = setInterval(function () {
                            myTimer()
                        }, 1000);

                        function myTimer()
                        {
                            var d = new Date();
                            var t = d.toLocaleTimeString();
                            document.getElementById("timeprint").innerHTML = t;
                        }

                    </script>
                    <?php
                    date_default_timezone_set('Asia/Colombo');
                    if (isset($System['CSS'])) {
                        foreach ($System['CSS'] as $css) {
                            echo '<link rel="stylesheet" type="text/css" href="' . $System['URL'] . 'application/views/' . $css . '.css" />';
                        }
                    }
                    if (isset($System['JS'])) {
                        foreach ($System['JS'] as $js) {
                            echo '<script type="text/javascript" src="' . $System['URL'] . 'application/views/' . $js . '.js"></script>';
                        }
                    }

                    $username = $this->session->userdata('username');
                    $typename = $this->session->userdata('typename');

                    $employe_id = $this->session->userdata('employe_id');
                    ?>
                    <!-- Loded Css and js From Controller Class -->

                    <script>
                        var URL = '<?php echo $System['URL']; ?>';
                        var EMPLOYEE_ID = '<?php echo $this->session->userdata('employe_id'); ?>';
                        var username = '<?php echo $this->session->userdata('name'); ?>';
                        var user_types = '<?php echo $this->session->userdata('typename'); ?>';

                    </script>
                    </head>

                    <body>
                        <table id="mainTable"  border="0" cellpadding="0" cellspacing="0" style="margin-left: 0px; left: 0px">
                            <tr id="headerRow" >
                                <td colspan="2">
                                    <a href="http://localhost/dimo_lanka/index/index"><img src="<?php echo $System['URL']; ?>public/images/DIMO-Lanka.jpg" width="60"  height="60" alt="Logo" id="logo" /></a>
                                    <?php if ($typename != '') { ?>
                                        <table align="right" style="font-weight: bold">
                                            <tr style="height: 20px;font-size: 15px">
                                                <td style="text-align: right">You Are Loged-in As <?php echo '&nbsp;' . $username; ?></td>
                                            </tr>
                                            <tr style="height: 20px">
                                                <td style="text-align: right">Date: <?php echo date('Y-m-d'); ?></td>

                                            </tr>
                                            <tr style="height: 20px">
                                                <td style="text-align: right" id="timeprint"></td>

                                            </tr>
                                        </table>
                                    <?php }
                                    ?>
                                </td>

                            </tr>
                            <?php if (!isset($_REQUEST['k']) && !isset($_REQUEST['token_purchase_order_iD']) && !isset($_REQUEST['token_meeting_type_token']) && !isset($_REQUEST['token_meeting_group']) && !isset($_REQUEST['token_return_cheque']) && !isset($_REQUEST['token_sub_branch'])) { ?>
                                <tr id="menuRow">

                                    <td colspan="2">

                                        <!--Menu-->
                                        <!-- BEGIN Menu | !isset($_REQUEST['x'])-->

                                        <ul id="nav">
                                            <?php if ($typename == "Super Admin") { ?>
                                                <li><a href="#">Configure</a>
                                                    <ul>
                                                        <li><a href="">User Type</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>user_type/drawIndexUserType">Register</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Bank</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>bank/drawIndexBank">Register</a></li> 
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Cities & Districts</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>citydistricts/drawIndexCityDistricts">Register</a></li> 
                                                                <li> <a href="<?php echo $System['URL'] ?>citydistricts/drawIndexCityDistrictsView"> All Cities & Districts</a></li> 
                                                            </ul>
                                                        </li>
                                                        <li><a href="<?php echo $System['URL'] ?>vat/drawIndexVat">Vat</a></li>
                                                        <li><a href="#">E-Mail</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>email/drawIndexConfigEmail">Configuration</a></li>
                                                            </ul>
                                                        </li>

                                                    </ul>

                                                </li>
                                            <?php } ?>

                                            <li><a href="#">Register</a>
                                                <ul>
                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li> <a href="">User</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>user/drawIndexUser">Register</a></li>
                                                                <li><a href="<?php echo $System['URL'] ?>user/drawManageIndexUser">Manage</a></li>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li><a href="#">Area</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>area/drawIndexArea">Register</a></li> 
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li> <a href="">Branch</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>branch/drawIndexBranch">Register Branch</a></li>
                                                                <li> <a href="<?php echo $System['URL'] ?>branch_type/indexBranchType">Register Branch Category</a></li> 
                                                                <li> <a href="<?php echo $System['URL'] ?>sub_branch/indexSubBranch">Register Sub Branch</a></li> 

                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li><a href="#">APM</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>apm/drawIndexApm">Register</a></li> 
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                                        <li> <a href="">Sales Officer</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>sales_officer/drawIndexSalesOfficer">Register</a></li>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Super Admin" || $typename == "APM" || $typename == "Sales Officer") { ?>
                                                        <li><a href="#">Dealer</a>
                                                            <ul>
                                                                <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                                                    <li> <a href="<?php echo $System['URL'] ?>delar/drawIndexDelar">Register</a></li> 
                                                                    <li> <a href="<?php echo $System['URL'] ?>dealer_location/index_dealer_location">Dealer Location</a></li> 
                                                                <?php } ?>
                                                                <?php if ($typename == "Sales Officer") { ?>
                                                                    <li> <a href="<?php echo $System['URL'] ?>delar/drawIndexDelar">Update</a></li> 
                                                                <?php } ?>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>


                                                    <li><a href="#">Customer</a>

                                                        <ul>


                                                            <?php if ($typename == "APM" || $typename == "Sales Officer") { ?>

                                                                <li> <a href="<?php echo $System['URL'] ?>customer/search_vehicle_index">Register</a></li> 

                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?>

                                                                <li> <a href="<?php echo $System['URL'] ?>customer/veiw_customer_admin_view">All Customers</a></li> 

                                                            <?php } ?>


                                                            <?php if ($typename == "Sales Officer") { ?>

                                                                <li> <a href="<?php echo $System['URL'] ?>customer/veiw_customerDetails">All Customers</a></li> 

                                                            <?php } ?>
                                                        </ul>
                                                    </li>  


                                                    <?php if ($typename != "Super Admin") { ?>

                                                        <li>

                                                            <a href="#" >Reset</a>

                                                            <ul>

                                                                <?php if ($typename != "Super Admin") { ?>

                                                                    <li>

                                                                        <li><a href="<?php echo $System['URL']; ?>reset/drawIndexreset">User Name and Password</a>
                                                                        </li>

                                                                    </li>
                                                                <?php } ?>



                                                            </ul>

                                                        </li>

                                                    <?php } ?>









                                                    <?php if ($typename == "Super Admin" || $typename == "Sales Officer") { ?> 
                                                        <li><a href="#">Garages</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>garage/drawIndexGarage">Register Garage</a></li>  
                                                                <li> <a href="<?php echo $System['URL'] ?>garage/drawIndexAllGarage">All Garages</a></li>  


                                                            </ul>

                                                        </li>
                                                    <?php } ?>

                                                    <li><a href="#">Vehicles</a>
                                                        <ul>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_type/drawIndexVehicleType">Vehicle Types</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_brand/drawIndexVehicleBrand">Vehicle Brands</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_model/drawIndexVehicleModel">Vehicle Models</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_sub_model/drawIndexVehicleSubModel">Vehicle Sub Models</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_part_type/drawIndexVehiclePartType">Vehicle Part Types</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin") { ?> 
                                                                <li> <a href="<?php echo $System['URL'] ?>vehicle_repair_type/drawIndexVehicleRepairType">Vehicle Repair Types</a></li>  
                                                            <?php } ?>
                                                            <?php if ($typename == "Super Admin" || $typename == "Sales Officer") { ?>      

                                                                                                                                                                                                                                                                                                                                                                                                                <!--                                                <li><a href="<?php //echo $System['URL']                                                   ?>vehicle/drawRegisterVehicleFormIndex">Register</a></li>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li><a href="<?php //echo $System['URL']                                                   ?>vehicle/darwViewVehicleDetailsIndex">Search</a></li>-->



                                                            <?php } ?>
                                                        </ul>
                                                    </li>



                                                    <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                                        <li> <a href="">Workshops</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>workshop/drawIndexWorkshop">Register</a></li>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>

                                                    <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                                        <li> <a href="">Counters</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>counter/drawIndexCounter">Register</a></li>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>

                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li> <a href="">Designation</a>
                                                            <ul>
                                                                <li><a href="<?php echo $System['URL'] ?>salesdesignation/drawIndexdesignation">Register</a></li>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                    <?php if ($typename == "Sales Officer" || $typename == "Super Admin") { ?>
                                                        <li><a href="#">New Shops</a>
                                                            <ul>
                                                                <?php if ($typename == "Sales Officer") { ?>
                                                                    <li> <a href="<?php echo $System['URL'] ?>non_reg_shops/drawIndexNonRegShops">Register</a></li> 
                                                                <?php } ?>
                                                                <?php if ($typename == "Super Admin") { ?>
                                                                    <li> <a href="<?php echo $System['URL'] ?>non_reg_shops/drawIndexAllNonRegShop">All New Shops</a></li> 
                                                                <?php } ?>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>



                                            </li>                  
                                        </ul>
                                        <li><a href="#">Parts</a>
                                            <ul>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>item/drawIndexUploadItems">Upload</a></li>

                                                <?php } ?>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>item/drawIndexItem">Register</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin" || $typename == "APM" || $typename == "Sales Officer" || $typename == "Dealer") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>item/drawIndexAllPartNumbers">All TGP Parts</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>item/drawIndexUploadimages">Images</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>product_failures/drawIndexProductFailres">Product Failures</a></li>
                                                <?php } ?>

                                            </ul>
                                        </li> 
                                        <?php if ($typename == "Sales Officer") { ?>

                                            <li><a href="#">Market Feedback</a>
                                                <ul>

                                                    <li><a href="#">Competitor Parts</a>
                                                        <ul>
                                                            <li><a href="<?php echo $System['URL'] ?>competitor_parts/drawIndexCompetitorPart">Add Competitor Parts</a></li>
                                                            <li><a href="<?php echo $System['URL'] ?>competitor_parts/drawIndexSalesManWiseCompetitorParts">All Competitor Parts </a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <li> <a href="<?php echo $System['URL'] ?>product_failures/drawIndexProductFailres">Product Failures</a></li>
                                                    </li>
                                                    <li>
                                                        <li> <a href="<?php echo $System['URL'] ?>part_analysis/drawIndexPartAnalysis">Part analysis</a></li>
                                                    </li>

                                                </ul>
                                            </li>


                                        <?php } ?>

                                        <li><a href="#">Purchase Orders</a>
                                            <ul>
                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li><a href="#">Purchase Orders</a>
                                                        <ul>
                                                            <!--<li><a href="<?php echo $System['URL'] ?>sales_officer_pur_ord/drawIndex_S_O_Pur_Ord">New Purchase Order</a></li>-->
                                                            <li><a href="<?php echo $System['URL'] ?>new_so_po/drawIndex_new_so_po">Create New Purchase Order</a></li>
                        <!--                                            <li><a href="<?php echo $System['URL'] ?>sales_officer_pur_ord/drawIndex_view_purchase_order">Manage Order</a></li>-->
                                                            <li><a href="<?php echo $System['URL'] ?>new_so_po/draw_index_manage_order">Manage Purchase Order</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>speciol_pramotion/drawIndex_speciolPro_ViewMain">All Special Promotions</a></li>

                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin" ) { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>dealer_purchase_order/drawIndexAllPurchaseOrders">Dealer Purchase Orders</a></li> 
                        <!--                                    <li><a href="<?php echo $System['URL'] ?>sales_officer_pur_ord_deliver/drawIndex_S_O_Pur_Ord_deliver">Sales Officer Purchase Orders</a></li>-->
                                                <?php } ?>
                                                <?php if ($typename == "Sales Officer" ) { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>dealer_return/drawIndexAllDealerReturns">Dealer Returns</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin" || $typename == "payment") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>dealer_return/adminReturnIndex">Dealer Returns</a></li>
                                                <?php } ?>
                                            </ul>

                                        </li>



                                        <?php if ($typename == "Super Admin" || $typename == "Sales Officer" || $typename == "payment") { ?>

                                            <li><a href="#">Payments</a>
                                                <ul>
                                                    <li> <a href="<?php echo $System['URL'] ?>delarpayment/drawIndexDelarPayment">Dealer Payment</a></li> 
                                                    <li> <a href="<?php echo $System['URL'] ?>completed_payments/drawIndexCompletedPayments">Dealer Completed Payments</a></li> 
                                                    <li> <a href="<?php echo $System['URL'] ?>cheque_realized/drawIndexChequeRealized">Dealer Cheque Realisation</a></li>
                                                    <li><a href="#">Dealer Cheque Returns</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>dealer_cheque_returns/drawIndexDealerChequeReturns">Create Dealer Cheque Returns</a></li> 
                                                            <li> <a href="<?php echo $System['URL'] ?>dealer_cheque_returns/drawIndexReturnCheque">All Dealer Return Cheques</a></li>
                                                        </ul>
                                                    </li>
                                                    <li> <a href="<?php echo $System['URL'] ?>payment_history/drawIndexPaymentHistory">Dealer Payment History</a></li> 
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndex_payment_Report">Payments and Returns Report</a></li> 

                                                </ul>

                                            </li>
                                        <?php } ?>
                                        <?php if ($typename == "Super Admin") { ?>
                                            <li><a href="#">Sales</a>
                                                <ul>
                                                    <li> <a href="<?php echo $System['URL'] ?>sales/drawIndexUploadSales">Upload</a></li> 
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/new_draw_loss_sales">Loss Sales</a></li> 
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealersSalesReport">Dealer Sales</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                        <li><a href="#">Targets</a>
                                            <ul>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li><a href="#">Budgets</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>budget/drawIndexBudget">New Budget</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>budget/drawIndexManageBudget">Manage Budget</a></li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <!--                                                    <li><a href="#">Special Promotions</a>
                                                                                                            <ul>
                                                                                                                <li> <a href="<?php //echo $System['URL']     ?>speciol_pramotion/drawIndex_speciolProView">Add Special Promotions</a></li>
                                                                                                                <li> <a href="<?php //echo $System['URL']     ?>speciol_pramotion/drawIndex_speciolPro_ViewMain">Manage Special Promotions</a></li>
                                                                                                            </ul>
                                                                                                        </li>-->
                                                <?php } ?>
                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>s_o_monthly_target/drawIndexSOMonthlyTarget">Line Item wise Target</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li> 


                                        <?php if ($typename == "Dealer") { ?>
                                            <li><a href="#">Dealer Purchases</a>
                                                <ul>
                                                    <li><a href="<?php echo $System['URL'] ?>dealer_accept_order/drawIndexDelearAccept">Daler Accept Order</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                        <?php if ($typename == "Sales Officer") { ?>
                                            <li><a href="#">Sales Visits</a>
                                                <ul>
                                                    <?php //if ($typename == "Super Admin") { ?>
                        <!--                                    <li> <a href="<?php //echo $System['URL']                                                 ?>tour_iteneray/drawViewIndex_Tour_Itenerary">Visit Category</a></li>
                
                                                        <li> <a href="<?php //echo $System['URL']                                                 ?>tour_iteneray/drawViewIndex_Visit_Purpose">Visit Purpose</a></li>  -->
                                                    <?php // } ?>
                                                    <?php if ($typename == "Sales Officer") { ?>
                                                        <li><a href="#">Tour Plan</a>

                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>tour_iteneray/drawViewIndex_TourPlan">Add Tour Plan</a></li>
                                                                <li> <a href="<?php echo $System['URL'] ?>tour_iteneray/drawIndex_Tour_planViewMain">Manage Tour Plan</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Tour Itinerary</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>tour_iteneray/drawViewIndex_DailySumary">New Tour Itinerary</a></li>
                                                                <li> <a href="<?php echo $System['URL'] ?>tour_iteneray/drawView_index_dailySumary">Summary</a></li>
                                                            </ul>
                                                        </li>

                                                    <?php } ?>
                                                    <?php if ($typename == "Sales Officer") { ?>
                                                        <li><a href="<?php echo $System['URL'] ?>areasalestour/drawIndexAreaSalesTourInputSheet">Expenses For Sales Tour</a>
                                                        <?php } ?>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                        <li><a href="#">Marketing Activities</a>
                                            <ul>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>campaign/drawIndexcampaignType">New Type</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>new_campaign/drawIndexnewcampaign">New campaign</a></li>
                                                <?php } ?>
                                                <li><a href="<?php echo $System['URL'] ?>new_campaign/drawIndexcampaigncalender">Marketing Activity Calender</a></li>
                                                <li>
    <!--                                                    <a href="<?php echo $System['URL'] ?>new_campaign/draw_index_notification">Notification</a>-->
                                                    <a href="<?php echo $System['URL'] ?>reports/drawIndexcampaigneffectiveness">Campaign Effectiveness</a>

                                                </li>
                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>branding/drawIndexBranding">Brandings</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php if ($typename == "Sales Officer") { ?>
                                            <li><a href="#">Reports</a>
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo $System['URL'] ?>manthwise_summary/drawIndexManthlysummary">Tour Itenerary - Month Wise Summary</a>
                                                    </li>
                                                    <li> 
                                                        <a href="<?php echo $System['URL'] ?>tour_itenerary_daily/drawIndextour_itenerary_daily">Tour Itenerary Daily</a>
                                                    </li>
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerRanking">Dealer Ranking</a></li>
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealersSalesReport">Dealer Sales</a></li>
                                                    <li><a href="">Stocks</a>
                                                        <ul>
                                                            <li><a href="<?php echo $System['URL'] ?>stockreport/drawIndexstockreport">VSD Stock</a></li>

                                                            <li> <a href="<?php echo $System['URL'] ?>delars_stock_report/drawIndexdelarsstockreport">Dealer Stock Movement</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>delars_stock_report/drawIndexStockAvailability">Parts movement at the Dealer</a></li>
                                                        </ul>
                                                    </li>
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealersAllSalesReport">Dealer Movement</a></li>
                                                    <li> <a href="<?php echo $System['URL'] ?>areasalestour/drawIndexAreaSalesTourSummery">Summary Of Expenses For Area Sales Tour</a></li>
                                                    <li> <a href="<?php echo $System['URL'] ?>reports/drawIndex_salesman_wise_Profitability">Sales Man Wise Profitability-Monthly</a></li>
                                                    <li><a href="">Returns</a>
                                                        <ul>
                                                            <li> 
                                                                <a href="<?php echo $System['URL'] ?>reports/drawIndexSalesManWiseReturnOverall">Sales Man Wise Return - Overall</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="">Target Reports</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerWiseTarget">Dealer wise</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="<?php echo $System['URL'] ?>part_analysis_report/drawIndexPartAnalysisSummary">Part Analysis Summary</a>
                                                    </li>
                                                    <li>
                                                        <li><a href="<?php echo $System['URL'] ?>dealer_stock_report/dealer_stock">Dealer Stock Report</a></li>
                                                    </li>
                                                </ul>

                                            </li>
                                        <?php } ?>
                                        <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                            <li><a href="#">Reports</a>
                                                <ul>
                                                    <li> <a href="">Sales Reports</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDLR_Report">DLR Report</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/competitorPart_Report">Competitor Part Report</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/dealer_wise_loss_sales_rpt">Dealer Wise Loss Sales Report</a></li>
                                                            <!--<li> <a href="<?php // echo $System['URL'] ?>reports/date_wise_loss_sales_rpt">Date Wise Loss Sales Report</a></li>-->
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDailySalesSummary">Daily Sales Summary</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexSalesOfficerWiseSummary">Yearly Sales Summary</a></li>                                            
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerRanking">Dealer Rankings</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerSalesReport">Field Sales</a></li>
                                                            <li><a href="<?php echo $System['URL'] ?>s_o_monthly_target/drawIndexSOMonthlyTargetReport">Sales Officer Monthly Target</a></li>
                                                            <li><a href="<?php echo $System['URL'] ?>s_o_monthly_target/drawIndexDelarWiseMonthlyTarget">Branch Wise Monthly Target</a></li>
                                                            <li><a href="<?php echo $System['URL'] ?>s_o_monthly_target/drawIndexAreaWiseMonthlyTarget">Overall Monthly Target</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealersAllSalesReport">Dealer Movement</a></li>
                                                            
                                                        </ul>
                                                    </li>
                                                    <li> <a href="">Salesman Targets</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/draw_index_select_month">Overall</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/draw_index_sales_officer_monthly_target">Sales Officer wise</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerWiseTarget">Dealer wise</a></li>
                                                        </ul>
                                                    </li>
                                                     <?php if ($typename == "Super Admin" || $typename == "APM") { ?>
                                                    <li> <a href="">Dealer</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/dealer_profile_report">Dealer Profiles</a></li>
                                                            
                                                        </ul>
                                                    </li>
                                                     <?php } ?>
                                                    <li><a href="">Campaign</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexcampaignReport"> Campaign Report</a></li>
        <!--                                                            <li> <a href="<?php echo $System['URL'] ?>reports/drawIndexcampaigneffectiveness">Campaign Effectiveness</a></li>-->
                                                        </ul>
                                                    </li>
                                                    <?php if ($typename == "Super Admin") { ?>
                                                        <li><a href="">Sales Profitability</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL'] ?>areasalestour/drawIndexAreaSalesTourSummery">Summary Of Expenses For Area Sales Tour</a></li>
                                                                <li> <a href="<?php echo $System['URL'] ?>reports/drawIndex_salesman_wise_Profitability">Sales Man Wise Profitability-Monthly</a></li>
                                                                <li> <a href="<?php echo $System['URL'] ?>reports/drawView_Profitability_aso">Summery</a></li>

                                                            </ul>
                                                        </li>
                                                    <?php } ?>

                                                    <li><a href="">Tour Itenarary</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>tour_iteneray/drawIndex_DailySumary_ViewMain">Tour Itenarary Summary</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>tour_itenerary_daily/index_itenerary_Report">Monthly Tour Plan Report</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>manthwise_summary/drawIndexManthlysummary">Tour Itenerary - Month Wise Summary</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>tour_itenerary_daily/drawIndextour_itenerary_daily">Tour Itenerary Daily</a></li>

                                                        </ul>
                                                    </li>

                                                    <li><a href="">GPS Map Report</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>gps_map_show/drawIndexGPS">Purchase order GPS Location map</a></li> 
                                                            <li> <a href="<?php echo $System['URL'] ?>gps_map_show/gps_tour_itenerary_index">Tour Itinerary Tracking</a></li> 

                                                        </ul>
                                                    </li>

                                                    <li><a href="">Stocks</a>
                                                        <ul>

                                                            <li><a href="<?php echo $System['URL'] ?>stockreport/drawIndexstockreport">VSD Stock</a></li>

                                                            <li> <a href="<?php echo $System['URL'] ?>delars_stock_report/drawIndexdelarsstockreport">Dealer Stock Movement</a></li>
                                                            <li> <a href="<?php echo $System['URL'] ?>delars_stock_report/drawIndexStockAvailability">Parts Movement</a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="">Returns</a>
                                                        <ul>
                                                            <li> 
                                                                <a href="<?php echo $System['URL'] ?>reports/drawIndexSalesManWiseReturnOverall">Sales Man Wise Return - Overall</a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo $System['URL'] ?>reports/drawIndexDealerWiseReturn">Dealer wise - Overall</a>
                                                            </li>
                                                            <li> 
                                                                <a href="<?php echo $System['URL'] ?>return_sammary/index">Return Summary</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php } ?>  

                                        <li><a href="#">Reminders</a>
                                            <ul>
                                                <li><a href="#">Meeting Utilities</a>
                                                    <ul>
                                                        <li> <a href="<?php echo $System['URL'] ?>meeting_type/drawIndexMeetingType"> Meeting Type</a></li> 
                                                        <li> <a href="<?php echo $System['URL'] ?>meeting_topic/drawIndexMeetingTopic"> Meeting Topic</a></li>  
                                                    </ul>
                                                </li>

                                                <?php if ($typename == "Super Admin") { ?> 
                                                    <li> <a href="<?php echo $System['URL'] ?>meeting_minute/drawIndexMeetingMinute">Create Meeting</a></li>  
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin" || $typename == "Sales Officer" || $typename = "APM") { ?> 
                                                    <li> <a href="<?php echo $System['URL'] ?>meeting_reminder/drawIndexMeetingReminder">Meeting Reminders</a></li>
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>meeting_decision/drawIndexMeetingDecision">Create Meeting Decision</a></li>  
                                                <?php } ?>
                                                <?php if ($typename == "Super Admin" || $typename == "Sales Officer" || $typename = "APM") { ?>
                                                    <li> <a href="<?php echo $System['URL'] ?>meeting_decision_review/drawIndexMeetingDecision">Meeting Decision Review</a></li>  
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php if ($typename == "Super Admin") { ?>             
                                            <li><a>Profile</a><ul>
                                                    <li><a href="#">Parts</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>partmovement_profile/indexPartMovement"> Line Item movement report</a></li> 
                                                            <li> <a href="#">ABC</a>
                                                                <ul>
                                                                    <li><a href="<?php echo $System['URL'] ?>abc/indexOverallReport">Overall</a></li>
                                                                    <li><a>Branch wise</a>
                                                                        <ul>
                                                                            <li><a>Field Sales</a></li>
                                                                            <li><a>Counters</a></li>
                                                                            <li><a>W/S Normal</a></li>
                                                                            <li><a>W/S Warranty</a></li>
                                                                        </ul>

                                                                    </li>


                                                                </ul>
                                                            </li> 
                                                            <li><a href="<?php echo $System['URL'] ?>summary/indexSummary">summary</a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Campaign</a>
                                                        <ul>
                                                            <li> <a href="<?php echo $System['URL'] ?>buinessplan_data_entry/forAdmin">Creating Campaign</a></li> 
                                                            <li> <a href="<?php  echo $System['URL'] ?>buinessplan_data_entry/summaryView">Campaign View</a></li> 
                  
                                                        </ul>
                                                    </li>
                                                </ul></li>
                                        <?php } ?>
                                        <?php if ($typename == "APM") { ?>
                                            <li><a>Profile</a><ul>
                                                    <li><a href="<?php echo $System['URL'] ?>buinessplan_data_entry/drawIndexBusinessplanDataEntry">Business plan - data entry</a></li>
                                                    <li><a href="<?php echo $System['URL'] ?>buinessplan_data_entry/summaryView">Campaign View</a></li> 
                                                </ul></li>  
                                        <?php } ?> 


                                        <li><a>Promotion</a>
                                            <ul>
                                                <?php if ($typename == "Super Admin") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>kit_promotion/drawIndexKitPromotion">KIT Promotion</a></li>
                                                    <li><a href="<?php echo $System['URL'] ?>special_price/drawIndexSpecialPrice">Special Price</a></li>
                                                    <li><a href="<?php echo $System['URL'] ?>bid_promotion/drawIndexBidPromotion">BID Promotion</a></li>
                                                    <li><a href="<?php echo $System['URL'] ?>promotion_view/drawIndexPromotionView">Special Promotion View</a></li>
                                                <?php } ?> 

                                                <?php if ($typename == "Sales Officer") { ?>
                                                    <li><a href="<?php echo $System['URL'] ?>kit_promotion_summary/drawIndexKitPromotionSummary">KIT Promotion Summary</a></li>
                                                    <li><a href="<?php echo $System['URL'] ?>special_price_summary/drawIndexSpecialPriceSummary">Special Prices Summary</a></li>
        <!--                                                    <li><a href="<?php // echo $System['URL']     ?>bid_promotion/drawIndexBidPromotion">BID Promotion</a></li>-->
                                                    <li><a href="<?php echo $System['URL'] ?>bid_promotion_summary/drawIndexBidPromotionSummary">BID Promotion Summary</a></li>
                                                <?php } ?> 


                                            </ul>
                                        </li>
                                        <!--                        <li><a href="#">Reminders</a>
                                                                    <ul>
                                        <?php if ($typename == "Super Admin") { ?> 
                                                                                                                                                                                                                <li> <a href="<?php echo $System['URL'] ?>meeting_minute/drawIndexMeetingMinute">Create Meeting</a></li>  
                                        <?php } ?>
                                                                        <li> <a href="<?php echo $System['URL'] ?>meeting_reminder/drawIndexMeetingReminder">Meeting Reminders</a></li>  
                                                                        <li> <a href="<?php echo $System['URL'] ?>meeting_decision/drawIndexMeetingDecision">Create Meeting Decision</a></li>  
                                                                        <li> <a href="<?php echo $System['URL'] ?>meeting_decision/drawIndexMeetingDecisionDiscussion">Meeting Decision</a></li>  
                                                                    </ul>
                                                                </li>-->

                                        <li id="menu5" style="float:right;border-left:solid 1px #15c2c8;border-right:none;" ><a href="<?php echo $System['URL'] ?>login/logout">Log Out</a></li>
                                        <li id="menu6" style="float:right;border-left:solid 1px #15c2c8;border-right:none;" ><div onclick="show_custom_notifications();" id="notify" style="float: right;text-align:center;color:#fbf1f1;width: 26px;height: 30px;background-image: url('<?php echo $System['URL'] ?>public/images/no_fs.png')">

                                            </div>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div id="notification_detais"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </li>


                                    <?php } ?>

                                </td>

                            </tr>
                            <script type="text/javascript">

                                function sendviewrequest(url, meeting_id) {
                                    var left = (screen.width - (screen.width * 50) / 100);
                                    var top = (screen.width - (screen.width * 50) / 100);
                                    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=350, width=700, height=600");

                                }

                                function changemeeting(meeting_id) {
                                    $j.ajax({
                                        type: 'POST',
                                        url: URL + 'meeting_reminder/chenheMeetingasview',
                                        data: {'meeting_id': meeting_id},
                                        success: function (data) {
                                            window.close();
                                            show_custom_notifications();
                                        },
                                        error: function () {

                                        }
                                    });

                                }


                                var click_count = 1;
                                function hide_notification() {
                                    $j("#notification_detais").hide();
                                }

                                $j(function () {
                                    refrshing_notifications();
                                });

                                function refrshing_notifications() {
                                    var timer = $j.timer(function () {

                                        $j.ajax({
                                            type: 'POST',
                                            url: URL + 'meeting_minute/checkMeetings',
                                            data: {'employee_id': EMPLOYEE_ID},
                                            success: function (data) {
                                                if (EMPLOYEE_ID == 0) {
                                                    timer.stop();
                                                }
                                                var meeting_details = JSON.parse(data);
                                                var tempcount = meeting_details['count'];
                                                if (Timer !== tempcount) {

                                                    $j('#notify').css('background-image', 'url(' + URL + 'public/images/fs.png' + ')');
                                                    $j('#notify').text(tempcount);
                                                    if (tempcount == 0) {
                                                        $j('#notify').css('background-image', 'url(' + URL + 'public/images/no_fs.png' + ')');
                                                    }
                                                    //show_custom_notifications();

                                                } else {

                                                    if (tempcount == 0) {
                                                        $j('#notify').css('background-image', 'url(' + URL + 'public/images/no_fs.png' + ')');
                                                    }
                                                }
                                                Timer = meeting_details['count'];

                                            },
                                            error: function () {

                                            }
                                        });

                                    });
                                    timer.set({time: 5000, autostart: true});
                                }

                                function show_custom_notifications() {
                                    $j('#notification_detais').html('');
                                    click_count++;
                                    var count_show = click_count % 2;
                                    if (count_show == 0) {
                                        $j("#notification_detais").show();
                                    } else {
                                        $j("#notification_detais").hide();
                                    }


                                    $j.ajax({
                                        type: 'POST',
                                        url: URL + 'meeting_minute/viewnotifications',
                                        data: {'employee_id': EMPLOYEE_ID},
                                        success: function (data) {

                                            $j('#notification_detais').html(data);
                                        },
                                        error: function () {

                                        }
                                    });
                                }


                            </script>
                            <tr>
                                <td colspan="3" height="10"></td>
                            </tr>
                            <tr id="contentRow" valign="top" >
                                <td width="20">&nbsp;</td>
                                <td id="content">

                                    <?php
                                    $this->template->draw($page, false);
                                    ?>

                                </td>
                                <td width="20">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" height="10"></td>
                            </tr>
                            <tr id="footerRow">
                                <td>&nbsp;</td>  
                                <td style="color: #B6B6B6;text-align: right;">
                                    <table align="right">
                                        <tr>

                                            <td>
                                                <a target="_blank" style="text-decoration: none;color: #8c8383"href="http://www.ceylonlinux.com/">Powered By Ceylon Linux (pvt) Ltd</a>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                    </body>
                    </html>
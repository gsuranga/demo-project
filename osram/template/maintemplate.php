<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Title -->
        <title>Distributing Managemant System</title>
        <!-- Title -->
        <!-- Links -->
        <!--   -->
        <link href="<?php echo $System['URL']; ?>public/templateobjects/UI/template.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/templateobjects/menu/css/jquery-ui.css" />   
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/jquery.ptTimeSelect.css" />
        <link rel="stylesheet" href="<?php echo $System['URL']; ?>public/templateobjects/menu/css/mootools/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />

        <!--Mootools-->
        <script src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/mootools/mootools.js" type="text/javascript" ></script>
        <script src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/mootools/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" >
            window.addEvent('domready', function() {
                var myMenu = new MenuMatic();
            });
        </script>

        <!-- Jquerys-->
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/templateobjects/menu/js/jquery.ptTimeSelect.js"></script>
        <script type="text/javascript">
            var $j = $.noConflict();
        </script>


        <script type="text/javascript">
            //var $j = $.noConflict();
            $j(function() {
                $j("#content > table").attr("cellspacing", "10");
                $j("#content > div > table").attr("cellspacing", "10");
            });


        </script>
        <!-- Loded Css and js From Controller Class -->
        <?php
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
        $user_type = $this->session->userdata('user_type');
        $log_disbtr = $this->session->userdata('id_employee');
        $id_employee = $this->session->userdata('id_employee_has_place');
        $id_employee_registration = $this->session->userdata('id_employee_registration');
        $employee_name = $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name');
        ?>
        <!-- Loded Css and js From Controller Class -->

        <script>
            var URL = '<?php echo $System['URL']; ?>';
        </script>
    </head>

    <body>

        <table id="mainTable"  border="0" cellpadding="0" cellspacing="0" >
            <tr id="headerRow">
                <td colspan="3">
                    <a href="<?php echo $System['URL']; ?>index/index"><img src="<?php echo $System['URL']; ?>public/templateobjects/UI/logo.png" width="145" height="69" alt="Logo" id="logo" /></a>
                    <p id="userAndTime">You Are Loged-in As <?php echo $employee_name; ?> <br/>
                        <?php echo "Date :" . date('Y:m:d'); ?>&ensp;</p>
                    <input type="hidden" name="log_user_type" id="log_user_type" value="<?php echo $user_type; ?>"/>
                    <input type="hidden" name="log_id_employee" id="log_id_employee" value="<?php echo $id_employee; ?>"/>
                    <input type="hidden" name="id_employee_registration" id="id_employee_registration" value="<?php echo $id_employee_registration; ?>"/>
                    <input type="hidden" name="log_employee_name" id="log_employee_name" value="<?php echo $employee_name; ?>"/>
                    <input type="hidden" name="log_disbtr" id="log_disbtr" value="<?php echo $log_disbtr; ?>"/>
                </td>
            </tr>
            <tr id="menuRow">


                <td colspan="3">

                    <!--Menu-->
                    <!-- BEGIN Menu -->
                    <ul id="nav">
                        <?php if ($user_type == "Admin") { ?>
                            <li> <a href="#">Config</a>
                                <ul>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Division Type</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL'] ?>division_type/indexDivisionType">Register</a></li>
                                                <li><a href="<?php echo $System['URL'] ?>division_type/indexViewDivisionType">List</a></li>
                                            </ul>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Territory Type</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL'] ?>territory_type/indexTerritoryType">Register</a></li>
                                                <li><a href="<?php echo $System['URL'] ?>territory_type/indexViewTerritoryType">List</a></li>
                                            </ul>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Physical Place Type</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>physical_place_category/indexPhysicalPlaceCategory">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>physical_place_category/indexViewTerritoryType">List</a></li>
                                            </ul>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Employee Type</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>employee_type/indexEmployeeType">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>employee_type/drawIndexViewEmployeeType">List</a></li>
                                            </ul>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li><a href="#">User Type</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>user_type/drawindexUserType">Create Type</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Outlet Category</a> 
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>outlet_category/indexOutletCategory">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>outlet_category/indexOutletCategoryView">List</a></li>
                                            </ul>

                                        </li>
                                    <?php } ?>

                                </ul>

                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin") { ?>
                            <li> <a href="#">Registration</a>
                                <ul>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Division</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>division/indexDivision">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>division/indexdrawViewDivision">List</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Territory</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>territory/indexTerritory">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>territory/indexViewTerritory">List</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Physical Place</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>physical_place/indexPhysicalPlace">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>physical_place/indexViewPhysicalPlace">List</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Employee</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>employee/indexEmployee">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>employee/drawViewEmployee">List</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <li><a href="#">User</a> 
                                        <ul>
                                            <?php if ($user_type == "Admin") { ?>
                                                <li>
                                                    <a href="<?php echo $System['URL']; ?>user/drawindexUser">Create</a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <a href="<?php echo $System['URL']; ?>user/drawindexManageUser">Manage</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="#">Route</a> 
                                        <ul>                                                 
                                            <li>
                                                <a href="<?php echo $System['URL']; ?>routeplane/drawAddRoutePlan">Create Route Plan</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $System['URL']; ?>routeplane/drawUpdateRoutePlan">Update Route Plan</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Outlet</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>outlets/indexOutlet">Register</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>outlets/drawIndexViewOutlet">List</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Bank</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>bank/drawBankIndex">Register</a></li>
                                            </ul>
                                        <?php } ?>


                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin") { ?>
                            <li> <a href="#">Item</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>itemcategory/drawIndexItemCategory">Item Category</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li><a href="#">Item</a>
                                            <ul>
                                                <li>
                                                    <a href="<?php echo $System['URL']; ?>item/drawIndexItem">Register</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo $System['URL']; ?>item/drawIndexManageItem">Manage</a>
                                                </li>

                                            </ul>
                                        </li>      
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>itemdiscount/drawindexDiscount">Discount Map</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li id="menu5" ><a href="<?php echo $System['URL']; ?>batch/drawIndexBatch">Batch</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li class="current"> <a href="<?php echo $System['URL']; ?>product/drawIndexProduct">Products</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li class="current"> <a href="<?php echo $System['URL']; ?>freeitem/indexFreeItem">Free Item</a>
                                        </li>
                                    <?php } ?>


                                </ul>

                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                            <li class="current"> <a href="<?php echo $System['URL']; ?>store/drawIndexStore">Store</a>
                            </li>
                        <?php } ?>

                        <?php if ($user_type == "Admin") { ?>
                            <li><a href="#">Van Stock</a>
                                <ul>
                                    <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexVanStock">Add Stock</a> </li>
                                    <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">View Stock</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexAsignVAN">Assign Van</a></li>
                                </ul>
                            </li>

                        <?php } else if ($user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                            <li><a href="#">Van Stock</a>
                                <ul>
                                    <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexVanStock">Add Stock</a> </li>
                                    <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">View Stock</a></li>
                                </ul>
                            </li>
                        <?php } ?>



                        <?php if ($user_type == "Sales Rep") { ?>
                            <!--                            <li><a href="#">View Stock</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">Stock</a>
                            
                                                                </li>
                            
                                                            </ul>
                                                        </li>-->
                        <?php } ?>           

                        <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                            <li> <a href="#">Goods</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li><a href="#">Purchase Order</a> 
                                            <ul>
                                                <?php if ($user_type == "Distributor" || $user_type == "Admin") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>purchase_order/drawIndexPurchase">Register</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>purchase_order/drawIndexManagePurchase">Manage</a>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>diliverynote/drawIndexDiliverNotes">Delivery Notes</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>good_received/drawIndexGoodRecived">Goods Received</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>stock/drawIndexStock">Stock</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>warenty_return/warentyreturnIndex">Warranty Return</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>stock_take/stocktakeindex">Stock Take</a>

                                        </li>
                                    <?php } ?>

                                </ul>

                            </li>

                        <?php } ?>

                        <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                            <li> <a href="#">Merchandising</a>
                                <ul>                                 

                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>posm/posmIndex">POSM</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>market_survey/marketsurveyindex">Market Survey</a>

                                        </li>
                                    <?php } ?>

                                </ul>

                            </li>

                        <?php } ?>

                        <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                            <li> 
                                <a href="<?php echo $System['URL']; ?>payment_remark/paymentremarkindex">Payment</a>
                            </li>


                        <?php } ?>

                        <?php if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                            <li><a href="#">Sales Order</a>
                                <ul>
                                    <?php if ($user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>salesorder/drawIndexSalesOrder">Add Order</a></li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>salesorder/drawindexSearchSalesOrder">View Order</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin") { ?>
                            <li><a href="#">Target</a>
                                <ul>
                                    <li><a href="#">Territory Wise Target</a>
                                        <ul>
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawindexTer">Create Target</a></li>     
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawviewtterwise">Search Target</a></li>  
                                        </ul>
                                    </li>

                                    <li><a href="#">Employee Wise Target</a>
                                        <ul>
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawindexemp">Create Target</a></li>     
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawviewtterwiseemployee">Search Target</a></li>  
                                        </ul>
                                    </li>

                                </ul>

                            </li>

                        <?php } ?>

                        <?php if ($user_type == "Admin") { ?>
                            <li><a href="#">Reports</a>
                                <ul>
                                    <li> <a href="<?php echo $System['URL']; ?>reports/viewGpsInfomations">GPS Tracking</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawSalesIndex">Sales Orders</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/itemWiseSalesOrderReportIndex">Item Wise Sales Report</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawStockAvailability">Stock Availability</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawMarketReturn">Market Returns</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawSalesReturn">Sales Returns</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawFreeIssue">Free Issue</a></li>  
                                    <li> <a href="<?php echo $System['URL']; ?>reports/drawIndexGoodRecived">Stock History</a></li>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawIndexManagePurchase">Distributor Purchasing</a></li>  
                                    <li><a href="<?php echo $System['URL']; ?>reports/productmovementReportIndex">Product Movement</a></li>    
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawTimeReportIndex">Time Report</a></li>     
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawindexPaymentsReports">Payments</a></li>     
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawUnproductiveCallIndex">Unproductive</a></li>

                                    <li><a href="#">Target Vs Achievement</a>
                                        <ul>
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawTargetVsAchievmentIndex">Territory Wise</a></li>  
                                            <li><a href="<?php echo $System['URL']; ?>reports/drawTargetVsAchievmentEmpWiseIndex">Employee Wise</a></li>  
                                        </ul>
                                    </li>
                            </li>
                        </ul>

                    <?php } ?>


                    <li id="menu5" style="float:right;border-left:solid 1px #0134c5;border-right:none;" ><a href="<?php echo $System['URL'] ?>login/logout">Log Out</a></li>
                    </ul>
                </td>
            </tr>
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
                <td style="color: #B6B6B6;text-align: right;">Developed By Ceylon Linux (pvt) Ltd.</td>
                <td>&nbsp;</td>
            </tr>
        </table>

    </body>
</html>

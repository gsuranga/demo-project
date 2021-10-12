<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Title -->
        <title>Distributor Management System</title>
        <!-- Title -->
        <!-- Links -->
        <!--   -->
        <link href="<?php echo $System['URL']; ?>public/templateobjects/UI/template.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/templateobjects/menu/css/jquery-ui.css" />   
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/jquery.ptTimeSelect.css" />
<!--        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/map.css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/css/jquery.dataTables.css" />
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
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/knowTheKing.js"></script>
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/setupKnowTheKing.js"></script>
		<script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/jquery/setupDataTable.js"></script>

<!--        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/system/js/system.js"></script>-->

	<!-- Colorbox-->
        <link rel="stylesheet" type="text/css" href="<?php echo $System['URL']; ?>public/colorbox/colorbox.css" />
<!--     <script type="text/javascript" src="<?php echo $System['URL']; ?>public/colorbox/jquery.colorbox-min.js"></script>-->
        <script type="text/javascript" src="<?php echo $System['URL']; ?>public/colorbox/jquery.colorbox.js"></script>
        <!--<script type="text/javascript" src="<?php echo $System['URL']; ?>public/colorbox/jquery.min.js"></script>-->
            
        <!-- Colorbox-->

        <script type="text/javascript">
            var $j = $.noConflict();

            $j(function() {
                $j("input").attr('autocomplete', 'off');
            })
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
            var EMPLOYEE = '<?php echo $this->session->userdata('id_employee'); ?>';
            var UserType = '<?php echo $this->session->userdata('user_type'); ?>'
            var PlaceID = '<?php echo $this->session->userdata('id_employee_has_place'); ?>'
            var PHYSICALPLCAE = '<?php echo $this->session->userdata('id_physical_place'); ?>'
            var EmpName = '<?php echo $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name'); ?>'

        </script>
    </head>

    <body>

        <table id="mainTable"  border="0" cellpadding="0" cellspacing="0" >
            <tr id="headerRow">
                <td colspan="3">
                    <a href="<?php echo $System['URL']; ?>index/index"><img src="<?php echo $System['URL']; ?>public/templateobjects/UI/logo.png" width="145" height="69" alt="Logo" id="logo" /></a>
                    <?php if ($user_type != '') { ?>
                        <p id="userAndTime">You Are Loged-in As <?php echo $employee_name; ?> <br/>
                            <?php echo "Date :" . date('Y:m:d'); ?>&ensp;</p>



                    <?php }
                    ?>

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

                        <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
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

                                    <?php if ($user_type == "Admin") { ?>
                                        <li><a href="#">User</a> 
                                            <ul>
                                                <?php if ($user_type == "Admin") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>user/drawindexUser">Register</a>
                                                    </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="<?php echo $System['URL']; ?>user/drawindexManageUser">Manage</a>
                                                </li>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin") { ?>
                                        <!--<li><a href="#">Route</a> 
                                            <ul>
                                                <?php if ($user_type == "Admin") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>routeplane/drawAddRoutePlan">Register</a>
                                                    </li>
                                                <?php } ?>

                                                <li>
                                                    <a href="<?php echo $System['URL']; ?>routeplane/drawUpdateRoutePlan">Update Route Plan</a>
                                                </li>
                                            </ul>
                                        </li>-->
                                    <?php } ?>

                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
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
										
										
                                   <?php if ($user_type == "Admin") { ?>
                                        <li> <a href="#">Regional Manager</a>
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>regional_mng/drawRegional_mng">Register</a></li>
                                            </ul>
                                    <?php } ?>


                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin") { ?>
                            <li> <a href="#">Item</a>
                                <ul>
								<?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>brand/drawIndexbrand">Brand</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>itemcategory/drawIndexItemCategory">Item Category</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
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
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                       <!--  <li><a href="<?php echo $System['URL']; ?>itemdiscount/drawindexDiscount">Discount Map</a>
                                        </li> -->
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li id="menu5" ><a href="<?php echo $System['URL']; ?>batch/drawIndexBatch">Batch</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li class="current"> <a href="<?php echo $System['URL']; ?>product/drawIndexProduct">Products</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                       <!-- <li class="current"> <a href="<?php echo $System['URL']; ?>freeitem/indexFreeItem">Free Item</a>
                                        </li> -->
                                    <?php } ?>


                                </ul>

                            </li>
                        <?php } ?>
                        <?php if ($user_type == "Admin") { ?>
                            <!--                            <li><a href="#">Van Stock</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexVanStock">Add Stock</a> </li>
                                                                <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">View Stock</a></li>
                                                                <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexAsignVAN">Assign Van</a></li>
                                                            </ul>
                                                        </li>-->

                        <?php } else if ($user_type == "Distributor" || $user_type == "Sales Rep") { ?>
                            <!--                               <li><a href="#">Van Stock</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexVanStock">Add Stock</a> </li>
                                                                <li><a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">View Stock</a></li>
                                                            </ul>
                                                        </li>-->
                        <?php } ?>



                        <?php if ($user_type == "Sales Rep") { ?>
                            <!--                            <li><a href="#">View Stock</a>
                                                            <ul>
                                                                <li> <a href="<?php echo $System['URL']; ?>van_stock/drawIndexViewVanStock">Stock</a>
                            
                                                                </li>
                            
                                                            </ul>
                                                        </li>-->
                        <?php } ?>                      
                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                            <li class="current"> <a href="<?php echo $System['URL']; ?>store/drawIndexStore">Store</a>
                            </li>
                        <?php } ?>


                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep") { ?>
                            <li><a href="#">View Stock</a>
                                <ul>
                                    <li> <a href="<?php echo $System['URL']; ?>stock/drawIndexStock">Stock</a>

                                    </li>

                                </ul>
                            </li>
                        <?php } ?>           

                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
                            <li> <a href="#">Goods</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
                                        <li><a href="#">Purchase Order</a> 
                                            <ul>
                                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive ") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>purchase_order/drawIndexPurchase">Register</a>
                                                    </li>

                                                <?php } ?>
                                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
                                                    <li>
                                                        <a href="<?php echo $System['URL']; ?>purchase_order/drawIndexManagePurchase">Manage</a>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>diliverynote/drawIndexDiliverNotes">Delivery Notes</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
                                        <li> <a href="<?php echo $System['URL']; ?>good_received/drawIndexGoodRecived">Goods Received</a>

                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Executive") { ?>
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
                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep" || $user_type == "Regional Manager") { ?>
                            <li><a href="#">Sales Order</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>salesorder/drawIndexSalesOrder">Add Order</a></li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep" || $user_type == "Regional Manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>salesorder/drawindexSearchSalesOrder">View Order</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
						
						<?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep" || $user_type == "Regional Manager") { ?>
                            <li><a href="#">Return Note</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>return_note/drawIndex_return_note">Add Return Note</a></li>
                                    <?php } ?>
                                    
                                </ul>
                            </li>
                        <?php } ?>
						
						
						<?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" ||  $user_type == "Sales Rep") { ?>
                            <li><a href="#">FOC</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" ||  $user_type == "Sales Rep") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>foc/index_draw_foc">View FOC</a></li>
                                    <?php } ?>
                                    
                                </ul>
                            </li>
                        <?php } ?>
						
						
						
                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Sales Rep" || $user_type == "Distributor") { ?>
                            <li><a href="#">Target</a>
                                <ul>
					<li><a href="#">Rep Wise Target</a>
                                        <ul>

                                            <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Sales Rep") { ?>
                                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Distributor" ) { ?>
                                                <li><a href="<?php echo $System['URL']; ?>rep_wise_target/drawindexRepwiseTarget">Create Rep Target</a></li> 
                                                <?php } ?>
                                                <li><a href="<?php echo $System['URL']; ?>rep_wise_target/index_view_allt_target">View Rep Target</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>repwisetarget/drawindexreptarget">Target Vs Achievement</a></li> 

                                            <?php } ?>                                      

                                        </ul>
                                        
                                        
                                    </li>
						
								


                                </ul>

                            </li>

                        <?php } ?>
                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>
                            <li>
                                <a href="#" >GPS Report</a>
                                <ul>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/viewGpsInfomations">Sales Order Tracking</a></li>
                                    <?php } ?>
                                    <?php /* if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/viewGpsUnproduct">GPS Tracking-Unproduct</a></li>
                                    <?php } */?>
									<?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>islandMap/drawWorkingMap">Daily Sales Order Tracking</a></li>

                                    <?php } ?>
									
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>reports/drawIslandWideIndex">Island Wide Sales</a></li>

                                    <?php } ?>
									<?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>reports/drawallmaps">Productive & Unproductive Tracking</a></li>

                                    <?php } ?>
				<?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>rep_tracking/drawIndex_rep_tracking">Rep Tracking</a></li>

                                    <?php } ?>
                                    
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                            <li>
                                <a href="#" >Payment</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/drawPaymentsReports">All Payments</a></li>
                                    <?php } ?>

                                    <?php // if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                        <!--                                        <li><a href="<?php echo $System['URL']; ?>reports/drawindexPaymentsReports">Payments</a></li>-->
                                    <?php // } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>disexpenses/indexSummary">Cash Summary Details</a></li>
                                    <?php } ?>
                                    <?php // if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                <!--<li><a href="<?php echo $System['URL']; ?>paymentsummary/indexPaymentSummary">Payment Summary</a></li>-->
                                    <?php // } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/drawChequedetailsIndex">Cheque Details</a></li>
                                    <?php } ?>
                                    <?php // if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                <!--<li><a href="<?php echo $System['URL']; ?>paymentsummary/indexPaymentSummary">Cheque Summary</a></li>-->
                                    <?php // } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager") { ?>
                                        <li>
                                            <a href="<?php echo $System['URL']; ?>cheque_realized/drawindexrealized">Cheque Realize</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/draw_payment_outstanding_index">Payment Outstanding</a></li>  
                                    <?php } ?>



                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager"|| $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>
                            <li><a href="#">Reports</a>
                                <ul>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager"|| $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales Manager - User" || $user_type == "Distributor" || $user_type == "Regional Manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/drawSalesIndex">Sales Orders</a></li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "Distributor") { ?>
                                       <!-- <li><a href="<?php echo $System['URL']; ?>reports/drowIndex_item_list_summery">Item List summery</a></li>-->


                                    

                                <?php } ?>
								 
                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager"|| $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawIndexManagePurchase">Distributor Purchasing</a></li>  
                                <?php } ?>


                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawIndexGoodRecived">Stock History</a></li>
                                <?php } ?>

                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawStockAvailability">Stock Availability</a></li>
                                <?php } ?>
                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawMarketReturn">Market Returns</a></li>
                                <?php } ?>
                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawSalesReturn">Sales Returns</a></li>
                                <?php } ?>
                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>reports/drawFreeIssue">Free Issue</a></li>
                                <?php } ?>

                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") { ?>
                                  <li><a href="<?php echo $System['URL']; ?>reports/drawDailySalesIndex">Distributor / Rep Wise Sales</a></li>
                                <?php } ?>
                                    

                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales Manager - User" || $user_type == "Distributor" || $user_type == "Regional Manager") { ?>
                                    <li><a href="<?php echo $System['URL']; ?>brand_wise_new/functionindex">Brand / Item Wise Sales Report</a></li>
                                <?php } ?>
                                    
                                    
                                    
                                <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales manager") { ?>
                                   <!-- <li><a href="<?php echo $System['URL']; ?>reports/drawindexdailyitems">Daily Items</a></li>-->
                                <?php } ?>

                               



                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/productmovementReportIndex">Product Movement</a></li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                        <li><a href="#">Time Report</a>
                                            
                                            <ul>
                                                <li><a href="<?php echo $System['URL']; ?>reports/drawTimeReportIndex">Rep Wise Time Report</a></li>
                                                <li><a href="<?php echo $System['URL']; ?>diswise_timereport/drawTimeReportIndex">Distributor Wise Time Report</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales manager" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>
                                        <li><a href="<?php echo $System['URL']; ?>reports/drawUnproductiveCallIndex">Unproductive</a></li>
                                    <?php } ?>

                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>


                                        <li><a href="<?php echo $System['URL']; ?>reports/drawNonInvoicedOutletIndex">Non Invoiced Outlets</a></li>
                                    <?php } ?>
                                    <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>deleted_invoices/draw_index_deleted_invoices">Removed Invoices</a></li>
                                    <?php } ?>
									 <?php if ($user_type == "Admin" || $user_type == "SBU Head" || $user_type == "National Sales manager" || $user_type == "Manager" || $user_type == "Assist Manager" || $user_type == "Distributor" || $user_type == "Area Sales Manager - User" || $user_type == "Regional Manager") { ?>

                                        <li><a href="<?php echo $System['URL']; ?>loading_summary/index_loading_summary">Loading Summery</a></li>
                                    <?php } ?>

                                </ul>
                            </li>


                        <?php } ?>

                        <?php if ($user_type == "Distributor") { ?>
                            <li><a href="#">Expenses</a>
                                <ul>

                                    <li><a href="<?php echo $System['URL']; ?>disexpenses/indexDisExpenses"> Expenses</a></li>
                                </ul>
                            </li>


                        <?php } ?>

                        <?php if ($user_type != 'Admin' && $user_type != '') { ?>
                            <li> <a href="#">Setting</a>
                                <ul>
                                    <li>
                                        <a href="<?php echo $System['URL']; ?>user/drawindexManageUser">Change Password</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($user_type != '') { ?>
                            <li id="menu5" style="float:right;border-left:solid 1px #00cc00;border-right:none;" ><a href="<?php echo $System['URL'] ?>login/logout">Log Out</a></li>
                        <?php }
                        ?>            


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
                <td width="20">&nbsp;

                </td>
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
<ul class="menu">
    <li style="width: 120px;" id="logo_li">
        <a href="<?= URL; ?>" class="parent"> <img src="<?= URL; ?>public/images/logo.png" width="64" height="75" alt="home" title="Home" style="position: absolute; left: -20px; top: -20px; "/> <span></span> </a>
    </li>

    <?php if ($this->access->registration) { ?>
    <li><a href="#" class="parent"><span>Registration</span></a>
        <div>
            <ul>
                <?php if ($this->access->registration_user) { ?>
                <li><a href="<?php echo URL; ?>user/index" class="parent"><span> User </span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_zone) { ?>
                <li><a href="<?php echo URL; ?>zone/index" class="parent"><span> Zone </span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_item) { ?>
                <li><a href="<?php echo URL; ?>product/index" class="parent"><span>Item</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_dealer_add) { ?>
                <li><a href="<?php echo URL; ?>outlet/index" class="parent"><span>Dealer</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_Asm_Manager) { ?>
                <li><a href="<?php echo URL; ?>asm_mapping/index_asm" class="parent"><span>ASM Mapping</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_DSR) { ?>
                <li><a href="<?php echo URL; ?>dsr_manager/index" class="parent"><span>DSR</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_DSR_route_mapper) { ?>
                <li><a href="<?php echo URL; ?>dsr_zone_manager/index" class="parent"><span>DSR Route Mapper</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_dealer_Route_Mapper) { ?>
                <li><a href="<?php echo URL; ?>dealer_route_mapper/index" class="parent"><span>Dealer Route Mapper</span></a></li>
                <?php } ?>
                <?php if ($this->access->registration_dealer_Credit_Limit_Mapper) { ?>
                <li><a href="<?php echo URL; ?>creditlimit_mapper/index_credit" class="parent"><span>Dealer Credit Limit Mapper</span></a></li>
                <?php } ?>
                <?php if ($this->access->registration_distributor_Price_Manager) { ?>
                <li><a href="<?php echo URL; ?>dis_price_manager/index" class="parent"><span>Distributor Price Manager</span></a></li>
                <?php } ?>

                <?php if ($this->access->registration_special_discount_dealers) { ?>
                <li><a href="<?php echo URL; ?>outlet_special_discount/index" class="parent"><span> Special Price Dealers</span></a></li>
                <?php } ?>
                <?php if ($this->access->registration_vehicle_manager) { ?>
                <li><a href="<?php echo URL; ?>vehicle/index" class="parent"><span> Vehicle Manager </span></a></li>
                <?php } ?>
            </ul>
        </div>
    </li>
    <?php } ?>
    <?php if ($this->access->Invoice_Manager) { ?>  
    <li><a href="<?php echo URL; ?>direct_invoice/index" class="parent"><span>Invoice Manager </span></a></li>
    <?php } ?>


    <?php if ($this->access->Goods) { ?>
    <li><a href="#" class="parent"><span>Goods</span></a>

        <div>
            <ul>
                <?php if ($this->access->Goods_purchase_order) { ?>
                <li><a href="<?= URL; ?>purchase_order/index" class="parent"><span>Purchase Order</span></a></li>
                <?php } ?>
                <?php if ($this->access->Goods_delever_notes) { ?>
                <li><a href="<?= URL; ?>deliver_note/index" class="parent"><span>Deliver Notes</span></a></li>
                <?php } ?>
                <?php if ($this->access->Goods_grn) { ?>
                <li><a href="<?= URL; ?>grn/index"><span>G R N</span></a></li>
                <?php } ?>
<!--                // nilushi add opening balanace-->
                <?php if ($this->access->Goods_Openning_balance) { ?>
                <li><a href="<?= URL; ?>Openning_balance/index"><span>Openning balance</span></a></li>
                <?php } ?>                  

                <?php if ($this->access->Goods_manual_grn) { ?>
                <li><a href="<?= URL; ?>dis_grn/index"><span>Manual G R N</span></a></li>
                <?php } ?>
            </ul>
        </div>
    </li>
    <?php } ?>

    <?php if ($this->access->Loading) { ?>
        <li><a href="#"><span>loading</span></a>
            <div>
                <ul>
                    <?php if ($this->access->Loading_create_issue_note) { ?>
                        <li><a href="<?= URL; ?>issue_note/index"><span>Create Issue Note</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Loading_accessories_issue) { ?>
                        <li><a href="<?= URL; ?>issue_note/draw_issue_note"><span>Stores - Accessories Issues</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Loading_ceylinder_count) { ?>
                        <li><a href="<?= URL; ?>issue_note/loadissuenote_security"><span>Security - Cylinder Count</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Loading_view_issuenote) { ?>
                        <li><a href="<?= URL; ?>issue_note/loadIsuueNoteList"><span>View Issue Note</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Loading_dispatch) { ?>
                        <li><a href="<?= URL; ?>moblie_stock/loadMobileStockRequest"><span>Dispatch</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>                       
    <?php } ?>
    <?php if ($this->access->Unloading) { ?>
        <li><a href="" class="parent"><span>Unloading</span></a>
            <div>
                <ul>
                    <?php if ($this->access->Unloading_SO) { ?> 
                        <li><a href="<?= URL; ?>session_stock_unload/drawSessionUnloadSecurity" class="parent"><span>Unloading SO</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Unloading_Logistic) { ?> 
                        <li><a href="<?= URL; ?>session_stock_unload/" class="parent"><span> Logistics Officer </span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Unloading_rep) { ?> 
                        <li><a href="<?= URL; ?>session_stock_unload/unload_by_rep" class="parent"><span> Unloading Rep </span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>   
    <?php } ?>

    <?php if ($this->access->DailyRoutine) { ?>
        <li><a href="#"><span> Daily Routine </span></a>
            <div>
                <ul>
                    <?php if ($this->access->DailyRoutine_active_routines) { ?>
                        <li><a href="<?= URL; ?>moblie_stock/loadCurrnetSessionStock"><span>Active Routines</span></a></li>
                    <?php } ?>

                    <?php if ($this->access->DailyRoutine_closed_routines) { ?>
                        <li><a href="<?= URL; ?>moblie_stock/loadClosedSessionStock"><span>Closed Routines</span></a></li>
                    <?php } ?>

                    <?php if ($this->access->DailyRoutine_routine_credit_Details) { ?>
                        <li><a href="<?= URL; ?>reports/routineCreditDetailsIndex"><span>Routines Credit Details</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
    <?php } ?> 


    <?php if ($this->access->configurations_admin) { ?>
        <li class="last"><a href="<?PHP echo URL; ?>config/index"><span> Config </span></a></li>
    <?php } ?>
    <?php if ($this->access->Reports) { ?>
        <li><a href=""><span>Reports</span></a>
            <div>
                <ul>
                    <?php if ($this->access->Reports_stock_availability) { ?>
                        <li><a href="<?php echo URL; ?>stock_availability/currentStockAvailability" class="parent"><span>Stock Availability</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Reports_credit_age_analysis) { ?>
                        <li><a href="<?php echo URL; ?>credit_age_analysis" class="parent"><span>Credit Age Analysis</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Reports_SalesReports) { ?>
                  <!---      <li><a href="<?php echo URL; ?>sales_reports/index" class="parent"><span>Sales Reports</span></a> -->
                        <li><a href="" class="parent"><span>Sales Reports</span></a>
                            <div>
                                <ul>
                                    <?php if ($this->access->Reports_SalesReports_multi_task_sales_report) { ?>
                                        <li><a href="<?= URL; ?>sales_report_auto/" class="parent"><span>Sales Report</span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->access->Reports_not_visited_dealers) { ?>
                        <li><a href="<?php echo URL; ?>not_visited_dealers/not_visited_dealers" class="parent"><span>Not visited Dealers Reports</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Reports_debit_report) { ?>
                        <li><a href="<?php echo URL; ?>debit_report/index" class="parent"><span>Debit Reports</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Reports_Distribur_wise_summery) { ?>
                        <li><a href="<?php echo URL; ?>dis_all_summery/index_summery" class="parent"><span>Distributor Wise Summery</span></a></li>
                    <?php } ?>

                    <?php if ($this->access->Reports_Unproductive_Call_Report) { ?>
                        <li><a href="<?php echo URL; ?>unproductive_report/" class="parent"><span>Unproductive Call Report</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Reports_DailyReports) { ?>
                        <li><a href=""><span>Daily Reports</span></a>
                            <div>
                                <ul>
                                    <?php if ($this->access->Reports_DailyReports_goods) { ?>
                                        <li><a href="<?php echo URL; ?>reports/index" class="parent"><span> Goods </span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->access->Reports_FinanceReports) { ?>  
                        <li><a href="#" class="parent"><span> Finance Reports </span></a>
                            <div>
                                <ul>
                                    <?php if ($this->access->Reports_FinanceReports_Return_Chq_summery) { ?> 
                                        <li><a href="<?= URL; ?>return_cheque/drawReturnChecque" class="parent"><span>Return Chq Summary</span></a></li> 
                                    <?php } ?>
                                    <?php if ($this->access->Reports_FinanceReports_Exceeded_Credit_Limit_Report) { ?> 
                                        <li><a href="<?= URL; ?>exceeded_credit_limit/drawExceededCreditLimit" class="parent"><span>Exceeded Credit Limit Report </span></a></li>
                                    <?php } ?>
                                    <?php if ($this->access->Reports_FinanceReports_Chq_Collection_Summery_Report) { ?> 
                                        <li><a href="<?= URL; ?>cheque_collection/drawChequeSummary" class="parent"><span>Cheque collection summary report</span></a></li>
                                    <?php } ?>
                                    <?php if ($this->access->Reports_FinanceReports_Total_DealerList_Report) { ?> 
                                        <li><a href="<?= URL; ?>stop_order/drawSalesReport" class="parent"><span>Stop order list report</span></a></li>
                                    <?php } ?>                                    
                                    <?php if ($this->access->Reports_FinanceReports_Total_DealerList_Report_Tabs) { ?> 
                                        <li><a href="<?= URL; ?>total_dealer_list/draw_total_dealer_list" class="parent"><span>Total Dealer List report</span></a></li>
                                    <?php } ?>

                                    <?php if ($this->access->Reports_FinanceReports_Daily_Collection_Report) { ?> 
                                        <li><a href="<?= URL; ?>dealer_list_total/draw_dealer_list_total" class="parent"><span>Total Dealer List report-tabs</span></a></li>
                                    <?php } ?>
                                    <?php if ($this->access->Reports_FinanceReports_Daily_Collection_Report) { ?> 
                                        <li><a href="<?= URL; ?>collection_sales_report/drawCollectionSales" class="parent"><span>Daily Collection Report</span></a></li>
                                    <?php } ?>                                
                                    <?php if ($this->access->Reports_FinanceReports_Dealer_Visits_and_Deliveries) { ?> 
                                        <li><a href="<?= URL; ?>dealer_wise_deliveries/index_dealer_wise_deliveries" class="parent"><span>Dealer Visits and Deliveries</span></a></li>
                                    <?php } ?>   
                                    <?php if ($this->access->Reports_FinanceReports_Cost_Per_Ceylinder) { ?> 
                                        <li><a href="<?= URL; ?>cost_per_cylinder/" class="parent"><span>Cost Per Cylinder</span></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->access->Reports_OtherReports) { ?>   
                        <li><a href="#" class="parent"><span> Other Reports </span></a>
                            <div>
                                <ul>
                                    <?php if ($this->access->Reports_OtherReports_RouteDeviation_Report) { ?>  
                                        <li ><a href="<?php echo URL; ?>route_deviation_report/index" class="parent"><span>Route Deviation Report</span></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->access->Reports_stock_availability) { ?>  
                        <li ><a href="<?php echo URL; ?>stock_count/drawSalesReport" class="parent"><span>Stock Count</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
    <?php } ?>

    <?php if ($this->access->Operations) { ?>
        <li><a href="#" class="parent"><span> Operations </span></a>
            <div>
                <ul>

                    <?php if ($this->access->Operations_GPS_Map) { ?> 
                        <li><a href="<?= URL; ?>gmapsRoute/" class="parent"><span>GPS Map</span></a></li> 
                    <?php } ?>
                    <?php if ($this->access->Operations_Routine_Summery_Shortage) { ?> 
                        <li><a href="<?= URL; ?>shortage_summery/" class="parent"><span>Routine Summery Shortages</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Operations_Routine_Notification_Manager) { ?> 
                        <li><a href="<?= URL; ?>notifications/notificationManager/" class="parent"><span>Notification Manager</span></a></li>
                    <?php } ?>

                </ul>
            </div>
        </li>
    <?php } ?>

    <?php if ($this->access->Daily_Routine_Admin) { ?>

        <li><a href="#" class="parent"><span>Daily Routine Admin </span></a>
            <div>
                <ul>
                    <?php if ($this->access->Daily_Routine_Admin_Incomplete_Routine) { ?>
                        <li><a href="<?= URL; ?>incomplete_routine/index" class="parent"><span>Incomplete Routine</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Daily_Routine_Admin_complete_Routine) { ?>
                        <li><a href="<?= URL; ?>complete_routine/index" class="parent"><span>Complete Routine</span></a></li>
                    <?php } ?>
                    <?php if ($this->access->Daily_Routine_Admin_islandmap) { ?>
                        <li><a href="<?= URL; ?>complete_routine/drawInvoiceList" class="parent"><span>Island Map</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
    <?php } ?>

    <?php if ($this->access->LorrySummery) { ?>
        <li>
            <a href="" class="parent"><span>Lorry Summery</span></a>
            <div>
                <ul>
                    <?php if ($this->access->LorrySummery_LorrySummery) { ?>
                        <li><a href="<?= URL; ?>dis_summery/draw_lorry_summery" class="parent"><span>Lorry Summery</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
    <?php } ?>

    <li>
        <a href="<?= URL ?>/notifications/notificationManager" target="_blank"><span id="notific" style="height:25px;"></span></a>
    </li>

</ul>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//echo $this->session->userdata('employe_id');
?>

<table style="width: 100%" >
    <tr>
        <td align="center" style="width: 60%">
            <div style="display: none" id="ajax_lod">
                <img width="50" height="50" src="<?php echo $System['URL']; ?>images/712.gif" />
            </div>

        </td>
        <td>
            <table align="right">
                <tr>
                    <td style="font-size: 20px">Search By Date</></td>
                    <td</td>
                    <td><input type="text" placeholder="From" id="from_date" value="<?php echo date("Y-m-d",strtotime("-1 week"))  ?>" ></></td>
                    <td><input type="text" placeholder="To" id="to_date" value="<?php echo date("Y-m-d")  ?>"></></td>

                </tr>
                <tr>
                    <td style="font-size: 20px">Search By Dealer</></td>
                    <td</td>
                    <td><input type="text" placeholder="Shop Name" onkeypress="get_dealer_shop();" id="shop_name" ></></td>
                    <td><input type="text" placeholder="Dealer Account No" onkeypress="get_shop_account_no();" id="dealer_account_no_manage"></><input type="hidden" id="dealer_id_manage"></></td>

                </tr>
                <tr style="height: 10px"></tr>
                <tr>
                    <td </td>
                    <td</td>
                    <td><input type="button" value="Search All" style="background-color: #949999;color: white;width: 60%" onclick="get_purchase_order('1');"></></td>
                    <td align="right"><input type="button" value="Search" style="background-color: #949999;color: white;width: 60%"  onclick="get_purchase_order('2');"></></td>

                </tr>
            </table>
        </td>

    </tr>
</table>

<table width="100%" border="0" cellpadding="10">
    <tr>
        <td>
            <div id="tabs">
                <ul>

                    <li><a href="#assign_purchase_order"><span>Assign Purchase Orders</span></></a></li>
                    <li><a href="#dealer_pending_purchase_order"><span>Dealer-Pending Purchase Orders</span></a></li>
                    <li><a href="#dimo_pending_purchase_order"><span>Dimo-Pending Purchase Orders(Dealer accepted)</span></a></li>
                    <li><a href="#dimo_accept_purchase_order"><span>Dimo-Accept Purchase Orders</span></a></li>
                    <li><a href="#rejected_purchase_order"><span>Rejected Purchase Orders</span></a></li>
                    <li><a href="#saved_purchase_order"><span>Saved Purchase Orders</span></a></li>


                </ul>

                <div class="Tab_content" id="assign_purchase_order"  >
                    <table class="SytemTable" style="width: 100%" id="assign_purchase_order_table">
                        <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>Assign</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="assign_purchase_order_body">


                        </tbody>
                    </table>
                </div>
                <div class="Tab_content" id="dealer_pending_purchase_order" >
                    <table class="SytemTable" style="width: 100%" id="dealer_pending_purchase_order_table">
                        <thead>
                            <tr>
<!--                                <td>Order No</td>-->
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="dealer_pending_purchase_order_body">


                        </tbody>
                    </table>
                </div>
                <div class="Tab_content" id="dimo_pending_purchase_order">
                    <table class="SytemTable" style="width: 100%" id="dimo_pending_purchase_order_table">
                        <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>Create By</td>
                                <td>Assigned/Not</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="dimo_pending_purchase_order_body">


                        </tbody>
                    </table>
                </div>
                <div class="Tab_content" id="dimo_accept_purchase_order" >
                    <table class="SytemTable" style="width: 100%" id="dimo_accept_purchase_order_table">
                        <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>Create By</td>
                                <td>Assigned/Not</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="dimo_accept_purchase_order_body">


                        </tbody>
                    </table>
                </div>
                <div class="Tab_content" id="rejected_purchase_order" >
                    <table class="SytemTable" style="width: 100%" id="rejected_purchase_order_table">
                        <thead>
                            <tr>
<!--                                <td>Order No</td>-->
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>Reason</td>
                                <td>Create By</td>
                                <td>Assigned/Not</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="rejected_purchase_order_body">


                        </tbody>
                    </table>
                </div>
                <div class="Tab_content" id="saved_purchase_order" >
                    <table class="SytemTable" style="width: 100%" id="saved_purchase_order_table">
                        <thead>
                            <tr>
<!--                                <td>Order No</td>-->
                                <td>Dealer Account No</td>
                                <td>Shop Name</td>
                                <td>Order Date</td>
                                <td>Order Time</td>
                                <td>Total Discount</td>
                                <td>Net Amount(with Vat)</td>
                                <td>View</td>
                            </tr>
                        </thead>
                        <tbody id="saved_purchase_order_body">


                        </tbody>
                    </table>
                </div>

            </div>
        </td>

    </tr>
</table>
<!--pagiiiiiiiiiiiiiiiiii-->


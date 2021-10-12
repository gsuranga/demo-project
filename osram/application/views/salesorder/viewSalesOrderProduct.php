<?php
/**
 * Description of allTerritoryTypeCombo
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$_instance = get_instance();
?>
<script>
    function get_product(id) {
        $j("#" + id).autocomplete({
            source: "getProduct",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function(event, data) {
                $j('#item_price_1').val(data.item.product_cost);
//                $j('#item_id_' + id).val(data.item.id_products);

            }
        });
    }
</script>

<div class="ViewPanel">
    
    
    <table border="0"width="50%" cellpadding="10" cellspacing="10" align="left">
    <?php if ($extraData != null) { ?>
        <?php
        foreach ($extraData['id_sales_order'] as $data) {
            ?>
    <tr style="background: #edf6e4">
        <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Category Name :</td>
                <td><?php echo $data['outlet_category_name']; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Territory :</td>
                <td><?php echo $data['territory_name']; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Outlet Name :</td>
                <td><?php echo $data['outlet_name']; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Address :</td>
                <td><?php echo $data['branch_address']; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Added Date :</td>
                <td><?php echo $data['added_date']." - ".$data['added_time']; ?></td>
            </tr>
            
        <?php } ?>
    <?php } else { ?>
        <thead>
            <tr>
                <td>No Record Found</td>

            </tr>
        </thead>
        <?php
    }
    ?>
</table>
    
    <table align="right" border="0" class="PageSummery" cellpadding="5" cellspacing="3" >
            <tr>
                <td width="200">Sales Amount</td>
                <td align="right" width="100" >
                    <?php
                        echo number_format($extraData['sales_amount'][0]->total,2);      
                    ?>
                    
                </td>
            </tr>
            <tr>
                <td>Market Return Amount</td>
                <td align="right" >
                    <?php
                        echo number_format($extraData['market_amount'][0]['total'], 2);;      
                    ?>
                    
                </td>
            </tr>
            <tr>
                <td>Sales Return Amount</td>
                <td align="right" >
                    <?php
                        echo number_format($extraData['return_amount'][0]['total'], 2);;      
                    ?>
                    
                </td>
            </tr>
            <tr class="Special">
                <td>NET Amount</td>
                <td align="right" >
                    <?php
                    $netValue=$extraData['sales_amount'][0]->total-($extraData['market_amount'][0]['total']+$extraData['return_amount'][0]['total']);
                        echo number_format($netValue, 2);     
                    ?>
                    
                </td>
            </tr>
        </table>
</div>

                <div id="tabs">
                    <ul>
                        <li><a href="#order_items"><span>Sales Order Product List</span></a></li>
                        <li><a href="#sales_return"><span>Sales Return</span></a></li>
                        <li><a href="#market_returns"><span>Market Returns</span></a></li>
                        <li><a href="#free_item"><span>Free Item</span></a></li>
                        <li><a href="#warrenty_item"><span>Warranty_item</span></a></li>

                    </ul>
                    <div class="Tab_content" id="order_items">
                        <?php
                        if (isset($_GET['id_sales_order'])) {
                            $_instance->viewSalesOrderDetails($_GET['id_sales_order']);
                            
                        }
                        ?>
                        
                    </div>

                    <div class="Tab_content" id="market_returns">
                        <?php
                        if (isset($_GET['id_sales_order'])) {
                            $_instance->viewMarketReturns($_GET['id_sales_order'],$extraData['type']);
                        }
                        ?>
                    </div>

                    <div class="Tab_content" id="sales_return">
                        <?php
                        if (isset($_GET['id_sales_order'])) {
                            $_instance->viewSalesReturns($_GET['id_sales_order'],$extraData['type']);
                        }
                        ?>
                    </div>

                    <div class="Tab_content" id="free_item">
                       <?php if (isset($_GET['id_sales_order'])) {
                            $_instance->viewfreeitem($_GET['id_sales_order']);
                        } ?>
                    </div>
                    <div id="warrenty_item" class="Tab_content" >
                        <?php if (isset($_GET['id_sales_order'])) {
                            $_instance->viewWarrantyitem($_GET['id_sales_order']);
                        } ?>
                    </div>

                </div>
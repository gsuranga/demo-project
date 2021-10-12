<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" href="<?php echo $System['URL']; ?>public/slidingpanel/css/style.css"> 
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/modernizr.js"></script> <!-- Modernizr -->
<script src="<?php echo $System['URL']; ?>public/slidingpanel/js/main.js"></script> 


<center>
    <table class="ContentTableTitleRow" >
        <tr>
            <td>Dealer Name</td>
            <td><input type="text" name="daeler_name" onfocus="getDelaterName();" id="daeler_name" placeholder="Select Dealer Name" autocomplete="off"/></td>
        <input type="hidden" name="dealer_id" id="dealer_id"/>
        <!--<td></td>-->
        <td>Account No.</td>
        <td><input type="text" name="account_num" onfocus="getDealerCode();" id="account_num" placeholder="Select Account No" autocomplete="off"/></td>
<!--        <td>Date</td>
        <td><input type="text" name="date" id="date" placeholder="Select date" autocomplete="off"/></td>-->
<!--        <td>Time</td>
        <td></td>
        <td></td>-->
        </tr>
        <tr>
<!--            <td>Time</td>
            <td><input type="time" name="time" id="time" placeholder="Select Time" autocomplete="off"/></td>-->
            <td>Invoice No.</td>
            <td><input type="text" name="invoice_no" onfocus="getInvoiceNo();" id="invoice_no" placeholder="Select Invoice No" autocomplete="off"/></td>
            <!--<td></td>-->
            <td>WIP No.</td>
            <td><input type="text" name="wip_no" id="wip_no" onfocus="getWIPno();" placeholder="Select WIP No" autocomplete="off"/></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="text" name="date_start" id="date_start" placeholder="Select date" autocomplete="off"/> </td>
            <td></td>
            <td><input type="text" name="date_end" id="date_end" placeholder="Select date"  autocomplete="off"/></td>

<!--            <td>Time</td>
            <td><input type="time" name="time" id="time" placeholder="Select Time" autocomplete="off"/></td>-->
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            
            <td style="margin-right: 255px;"><input style="background-color: #334A4A;" type="button" name="search_btn" id="search_btn" value="Search" onclick="getInvoiceDetailsDateWise();"/></td>
           
        </tr>

    </table>
</center>
<!--<img href="#0" src="images/no_fs.png"  class="cd-btn"  style="text-decoration: none;cursor: pointer;width: 50px" ></img>-->
<table style="margin-top: 20px;"  align="center" width="75%">
    <thead>
        <tr class="ContentTableTitleRow">
            <td style="text-align: center;">Line No</td>
            <td style="text-align: center;">Dealer Name</td>
            <td style="text-align: center;"> Dealer Acc. No.</td>
            <td style="text-align: center;">Date</td>
            <td style="text-align: center;">Time</td>
            <td style="text-align: center;">Amount</td>
            <td style="text-align: center;">Invoice No.</td>
            <td style="text-align: center;">WIP No.</td>
            <td style="text-align: center;">View Invoice</td>
        </tr>
    </thead>
    <tbody id="add_details" style="border-color: #006cff;">

        
    </tbody>
</table>
<!--<div class="cd-panel from-right">
        <header class="cd-panel-header">
            <h1>Title Goes Here</h1>
            <a href="#0" class="cd-panel-close">Close</a>
        </header>

        <div class="cd-panel-container">
            <div class="cd-panel-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate. Sapiente modi officiis nulla sed ullam, amet placeat, illum necessitatibus, eveniet dolorum et maiores earum tempora, quas iste perspiciatis quibusdam vero accusamus veritatis. Recusandae sunt, repellat incidunt impedit tempore iusto, nostrum eaque necessitatibus sint eos omnis! Beatae, itaque, in. Vel reiciendis consequatur saepe soluta itaque aliquam praesentium, neque tempora. Voluptatibus sit, totam rerum quo ex nemo pariatur tempora voluptatem est repudiandae iusto, architecto perferendis sequi, asperiores dolores doloremque odit. Libero, ipsum fuga repellat quae numquam cumque nobis ipsa voluptates pariatur, a rerum aspernatur aliquid maxime magnam vero dolorum omnis neque fugit laboriosam eveniet veniam explicabo, similique reprehenderit at. Iusto totam vitae blanditiis. Culpa, earum modi rerum velit voluptatum voluptatibus debitis, architecto aperiam vero tempora ratione sint ullam voluptas non! Odit sequi ipsa, voluptatem ratione illo ullam quaerat qui, vel dolorum eligendi similique inventore quisquam perferendis reprehenderit quos officia! Maxime aliquam, soluta reiciendis beatae quisquam. Alias porro facilis obcaecati et id, corporis accusamus? Ab porro fuga consequatur quisquam illo quae quas tenetur.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque similique, at excepturi adipisci repellat ut veritatis officia, saepe nemo soluta modi ducimus velit quam minus quis reiciendis culpa ullam quibusdam eveniet. Dolorum alias ducimus, ad, vitae delectus eligendi, possimus magni ipsam repudiandae iusto placeat repellat omnis veritatis adipisci aliquam hic ullam facere voluptatibus ratione laudantium perferendis quos ut. Beatae expedita, itaque assumenda libero voluptatem adipisci maiores voluptas accusantium, blanditiis saepe culpa laborum iusto maxime quae aperiam fugiat odit consequatur soluta hic. Sed quasi beatae quia repellendus, adipisci facilis ipsa vel, aperiam, consequatur eaque mollitia quaerat. Iusto fugit inventore eveniet velit.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque similique, at excepturi adipisci repellat ut veritatis officia, saepe nemo soluta modi ducimus velit quam minus quis reiciendis culpa ullam quibusdam eveniet. Dolorum alias ducimus, ad, vitae delectus eligendi, possimus magni ipsam repudiandae iusto placeat repellat omnis veritatis adipisci aliquam hic ullam facere voluptatibus ratione laudantium perferendis quos ut. Beatae expedita, itaque assumenda libero voluptatem adipisci maiores voluptas accusantium, blanditiis saepe culpa laborum iusto maxime quae aperiam fugiat odit consequatur soluta hic. Sed quasi beatae quia repellendus, adipisci facilis ipsa vel, aperiam, consequatur eaque mollitia quaerat. Iusto fugit inventore eveniet velit.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam accusamus obcaecati nisi eveniet quo veniam quibusdam veritatis autem accusantium doloribus nam mollitia maxime explicabo nemo quae aspernatur impedit cupiditate dicta molestias consectetur, sint reprehenderit maiores. Tempora, exercitationem, voluptate. Sapiente modi officiis nulla sed ullam, amet placeat, illum necessitatibus, eveniet dolorum et maiores earum tempora, quas iste perspiciatis quibusdam vero accusamus veritatis. Recusandae sunt, repellat incidunt impedit tempore iusto, nostrum eaque necessitatibus sint eos omnis! Beatae, itaque, in. Vel reiciendis consequatur saepe soluta itaque aliquam praesentium, neque tempora. Voluptatibus sit, totam rerum quo ex nemo pariatur tempora voluptatem est repudiandae iusto, architecto perferendis sequi, asperiores dolores doloremque odit. Libero, ipsum fuga repellat quae numquam cumque nobis ipsa voluptates pariatur, a rerum aspernatur aliquid maxime magnam vero dolorum omnis neque fugit laboriosam eveniet veniam explicabo, similique reprehenderit at. Iusto totam vitae blanditiis. Culpa, earum modi rerum velit voluptatum voluptatibus debitis, architecto aperiam vero tempora ratione sint ullam voluptas non! Odit sequi ipsa, voluptatem ratione illo ullam quaerat qui, vel dolorum eligendi similique inventore quisquam perferendis reprehenderit quos officia! Maxime aliquam, soluta reiciendis beatae quisquam. Alias porro facilis obcaecati et id, corporis accusamus? Ab porro fuga consequatur quisquam illo quae quas tenetur.</p>
            </div>  cd-panel-content 
        </div>  cd-panel-container 
    </div>-->



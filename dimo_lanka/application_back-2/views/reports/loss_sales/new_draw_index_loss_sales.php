
<center>
    <p> </p>
    <table>
        <tr style="height: 10pt"><td></td></tr>
        <tr><td style="background: #fedede"><b>&nbsp; Select Month &nbsp;  </b></td><td><input type="text" id="month_picker" name="month_picker" style="border-style: groove" onchange="view_sales()"   title="Month" ></td>
            <td style="width: 30pt" ></td><td style="background: #fedede"><b>&nbsp;&nbsp;&nbsp;&nbsp;View &nbsp;&nbsp;&nbsp;</b></td><td><select style="width: 100pt" id="type_view" onchange="view_sales()"><option value="0">All</option><option value="1">Stock Loss</option><option value="2">Value Loss</option></select></td>
        </tr>

    </table>
    <p>&nbsp</p>
    <p></p>




    <table class="SytemTable" width="50%" cellpadding="5" cellspacing="5" id="tbl_loss_sales">
        <thead id="tbl_thead"><th></th>
        <th>DEALER NAME</th><th>PART NUMBER</th><th class="ab"><label id="type_view">LOSS TYPE </label></th><th>QUANTITY</th>
        </thead>
        <tbody id="tbl_body">
        </tbody>
    </table>
</center>
$j(function() {
    var x='x';
   getalldelrAcc(x);
   getalldelr(x);
  

  
});




function getSalesOfficer() {
    
      $j("#sales_officer").autocomplete({
        source: "getSalesOfficer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#sales_officer').val(data.item.sales_officer_name);
            var sloffcer= data.item.sales_officer_name;
           // $j('#res1').val(data.item.description);
           // $j('#res2').val(data.item.model);
//            $j('#com_sales').val(data.item.sales_officer_name);
//            $j('#dealer').val(data.item.delar_account_no);
getalldelr(sloffcer);
getponumbers(sloffcer);
invoiceNumber(sloffcer);
getalldelrAcc(sloffcer);

        }
    });
}
function invoiceNumber(id) {
   
 var idd = id;
$j.ajax({
        url: 'getinvoponumbers?invo='+idd,
        method: 'GET',
        success: function (data) {
       
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#res2').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#res2').append(
                      
                         '<option value="'+ y[i]['invoice'] +'"  selected >' + y[i]['invoice'] + '</option>'
                     
                            );}
            } else {

                $j('#res2').append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
        }
    }); 
}
function getalldelr(sloffcer){
   
 var idd = sloffcer;
$j.ajax({
        url: 'getalldelr?del='+idd,
        method: 'GET',
        success: function (data) {
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#del').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#del').append(
                      
                         '<option value="'+ y[i]['delar_id'] +'"  selected >' + y[i]['delar_name'] + '</option>'
                     
                            );}
            } else {

                $j('#del').append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
        }
    }); 
     asoLog();
}



function getalldelrAcc(sloffcer){
 var idd = sloffcer;
$j.ajax({
        url: 'getalldelrAcc?del='+idd,
        method: 'GET',
        success: function (data) {
       
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#delAcc').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#delAcc').append(
                      
                         '<option value="'+ y[i]['delar_id'] +'" selected >' + y[i]['delar_account_no'] + '</option>'
                     
                            );}
            } else {

                $j('#delAcc').append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
            
        }
    }); 
}
function invoiceGet(value){
     var valufrom = value;
    $j.ajax({
        url: 'getpurch?valufrom='+valufrom,
        method: 'GET',
         success: function (data) {
             
         var x = JSON.parse(data);
      
            console.log(x);
            var y = x[0];

                $j('#podate').val(y.date);
                $j('#invo').val(y.po);
               // document.getElementById("test1").innerHTML =(y.date) ;
               // document.getElementById("test1").innerHTML =(y.po) ;
                document.getElementById("test2").innerHTML =(y.wip) ;
                document.getElementById("test3").innerHTML =(y.date_edit) ;
                document.getElementById("test4").innerHTML =(y.time) ;
                $j('#resl').append(
                      
                         '<option value="'+ y['po'] +'"  selected >' + y['po'] + '</option>'
                     
                            );

            }
    });

}
function getDealerAccNo(){
        $j("#dealer_accNo").autocomplete({
        source: "getDealerAcc",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_accNo').val(data.item.delar_account_no);
            $j('#sales_officer').val(data.item.sales_officer_name);
            $j('#hidden_dealer_id').val(data.item.delar_id);
            $j('#dealer_name').val(data.item.delar_name);
            // $j('#res1').val(data.item.description);
            // $j('#res2').val(data.item.model);


        }
    });

}


function getponumbers(sloffcer){
    
 var sale = sloffcer;

$j.ajax({
        url: 'getponumbers?salesoff='+sale,
        method: 'GET',
        success: function (data) {
       
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#resl').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#resl').append(
                      
                         '<option value="'+ y[i]['purchase_order_number'] +'"  selected >' + y[i]['purchase_order_number'] + '</option>'
                     
                            );}
            } else {

                $j('#resl').append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
        }
    });  
}
function getDelponumbers(id){
 var po = id;

$j.ajax({
        url: 'getDelponumbers?po='+po,
        method: 'GET',
        success: function (data) {
          var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#resl').empty();
            
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    $j('#resl').append(
                      
                         '<option value="'+ y[i]['purchase_order_number'] +'"  selected >' + y[i]['purchase_order_number'] + '</option>'
                     
                            );}
            } else {

                $j('#resl').append(
                        
                        '<option value="audi" >No Purchase Order</option>'
                        );
            }
        }
    });  
}



function ponumberGet(value){
   var valufrom = value;
    $j.ajax({
        url: 'getdatefromvalue?valufrom='+valufrom,
        method: 'GET',
         success: function (data) {
            
         var x = JSON.parse(data);
      
            console.log(x);
            var y = x[0];

                $j('#podate').val(y.date);
//                $j('#invo').val(y.invoice);
                $j('#test1').val(y.invoice);
               // document.getElementById("test1").innerHTML =(y.date) ;
//                document.getElementById("test1").innerHTML =(y.invoice) ;
                document.getElementById("test2").innerHTML =(y.wip) ;
                document.getElementById("test3").innerHTML =(y.date_edit) ;
                document.getElementById("test4").innerHTML =(y.time) ;
                $j('#res2').append(
                      
                         '<option value="'+ y['invoice'] +'"  selected >' + y['invoice'] + '</option>'
                     
                            );

            }
    });
    
   
}
function getinvoice(){
       $j("#test1").autocomplete({
        source: "getinvoAll",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#test1').val(data.item.invoice);
//            $j('#sales_officer').val(data.item.sales_officer_name);
//            $j('#hidden_dealer_id').val(data.item.delar_id);
//            $j('#dealer_name').val(data.item.delar_name);
            // $j('#res1').val(data.item.description);
            // $j('#res2').val(data.item.model);
             $j('#res2').append(
                      
                         '<option value="'+ data.item.invoice+'"  selected >' + data.item.invoice + '</option>'
                     
                            );
        }
    });
}



//function ponumberGet(value){
//   var valufrom = value;
//    $j.ajax({
//        url: 'getdatefromvalue?valufrom='+valufrom,
//        method: 'GET',
//         success: function (data) {
//             
//         
//            var x = JSON.parse(data);
////        alert(data);         
////    alert();       
//            console.log(x);
//            var y = x[0];
//             if (y.length > 0) {
//                for (var i = 0; i < y.length; i++) {
//                
//                // alert( y[i]['purchase_order_number']);
////                $j('#purch').val(y[i]['purchase_order_number']);
////                $j('#invoice').val(y[i]['invoice']);
////                $j('#wip').val(y[i]['wip']);
////                }}
////               
//        
//                $j('#podate').val(y[i].date);
//                document.getElementById("test1").innerHTML =(y[i].invoice) ;
//                document.getElementById("test2").innerHTML  =(y[i].wip) ;
//                document.getElementById("test3").innerHTML = (y[i].date_edit);
//                document.getElementById("test4").innerHTML = (y[i].time) ;
//                
//                
//                
//                }}
//               
//     
//            }
//    });
//    
//   
//}

function getdelarName(){
    
  $j("#dealer_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
             $j('#dealer_name').val(data.item.delar_name);
            $j('#dealer_accNo').val(data.item.delar_account_no);
             $j('#sales_officer').val(data.item.sales_officer_name);
             $j('#hidden_dealer_id').val(data.item.delar_id);
            


        }
    });
    
    
}
function getDealrWLoss(){
  
 var salesoff = $j('#sales_officer').val();
 var po = $j('#resl').val();
 var invo = $j('#res2').val();

    $j.ajax({
          url: 'getDealrWLoss?salofficer='+salesoff +'&po='+po+'&invo='+invo,
          
      //  url: 'getDealrWLoss?salofficer='+salesoff,
        method: 'GET',
        success: function (data) {
        // alert(data);
            var x = JSON.parse(data);
            
            console.log(x);
            var y = x[0];
           
            var tot = 0;
            var text = 'Total';
           
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body_a').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
            
                    $j('#tbl_acc_body_a').append(
                          
                            '<tr onclick="InvoiceNo_putter(\'' + y[i]['item_part_no'] + '\');">'+
                            '<td >' + y[i]['item_part_no'] + '</td>' +
                            '<td>' + y[i]['description'] + '</td>' +
                            '<td>' + y[i]['sellP'] + '</td>' +
                            '<td>' + y[i]['item_qty'] + '</td>' +
                            '<tr>'
                    
                            );
                     tot =  tot+ parseFloat(y[i]['lossS']);
                } 
//                 $j('#tbl_acc_body_a').append(
//                '</tbody>'+
//                
//                '<tr>'
//                        +'<td ></td>'+
//                    '<td > </td>'+
//                    '<td ></td>' +    
//                    '<td >'+ text+'</td>'+
//                    '<td >'+tot +'</td> </tr>'    
//                
//                
//                );
                
            } else {

                $j('#tbl_acc_body_a').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }
        }
    });
    $j.ajax({
          url: 'getDealrWLossT?salofficer='+salesoff +'&po='+po+'&invo='+invo,
          
      //  url: 'getDealrWLoss?salofficer='+salesoff,
        method: 'GET',
        success: function (data) {
           
         
            var x = JSON.parse(data);
            
            console.log(x);
            var y = x[0];
           
            var tot = 0;
            var text = 'Total';
           
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body_b').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {

                    $j('#tbl_acc_body_b').append(
                            '<tr>'+
                            '<td>' + y[i]['part_no'] + '</td>' +
                            '<td>' + y[i]['qty'] + '</td>' +
                            '<tr>'
                            );
                    
                } 
//                 $j('#tbl_acc_body_a').append(
//                '</tbody>'+
//                
//                '<tr>'
//                        +'<td ></td>'+
//                    '<td > </td>'+
//                    '<td ></td>' +    
//                    '<td >'+ text+'</td>'+
//                    '<td >'+tot +'</td> </tr>'    
//                
//                
//                );
                
            } else {

                $j('#tbl_acc_body_b').append(
                        '<tr><td>No records found</td></tr>'
                        );
          }
       }
    });
}

function InvoiceNo_putter(id){
    alert(id);
}
function delaC(value){
    var val = value;
    $j.ajax({
        url: 'delaC?val='+val,
        method: 'GET',
         success: function (data) {
             var x = JSON.parse(data);
      
            console.log(x);
            var y = x[0];
             
                $j('#delAcc').append(
                      
                         '<option value="'+ y['delar_id'] +'"  selected >' + y['delar_account_no'] + '</option>'
                     
                            );

getDelponumbers(value);
            }
    });
    
}
//delar_name
function delrN(value){
    var val = value;
    $j.ajax({
        url: 'delrN?val='+val,
        method: 'GET',
         success: function (data) {
             var x = JSON.parse(data);
      
            console.log(x);
            var y = x[0];
             
                $j('#del').append(
                      
                         '<option value="'+ y['delar_id'] +'"  selected >' + y['delar_name'] + '</option>'
                     
                            );


            }
    });
}
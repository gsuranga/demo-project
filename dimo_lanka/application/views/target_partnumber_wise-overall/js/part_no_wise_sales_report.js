
$j("document").ready(function(){
    
    $j("#totalTarget").attr("readonly","true");
         
});


function percentage(){
    
    var per = $j("#per").val();
    var oldPrice = $j("#totalTarget").val();
    var newPrice = ((100-per)/100)*oldPrice;
    $j("#priceNew").val(newPrice);
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    part_analysis_reasons();

});

function part_analysis_reasons(){
    $j.ajax({
        type: 'POST',
        url: 'getReasons',
        data: {
        },
        success: function(data) {
            var result = JSON.parse(data);
//            var tot = 0;
//            for (var x = 0; x < result.length; x++) {
//                tot += parseFloat(result[x]['qty']);
//            }
//            $j('#actual').val(tot.toFixed(0));
//            var balance = target - tot;
//            $j('#balance').val(balance.toFixed(0));
        },
        error: function() {
        }
    });
}
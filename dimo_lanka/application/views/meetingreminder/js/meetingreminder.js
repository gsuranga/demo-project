/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {
    $j("#tabs").tabs();
});
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=350, width=700, height=600");

}

function window_discard() {

    window.close()

}

$j(document).ready(function(){
$j("#menu-title").click(function(e){
    e.preventDefault();
   if($j("#menu").is(":hidden") ) {
    $j("#menu").show();
   }
   else
   {
    $j("#menu").hide();
   }
});
});

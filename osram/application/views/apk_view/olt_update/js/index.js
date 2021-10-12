/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */

$j(function() {
    $j.getJSON(URL + 'apk_view/getOutletCats', function(data) {
        console.log(data);
    });
});
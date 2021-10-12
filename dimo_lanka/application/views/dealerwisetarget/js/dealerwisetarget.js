/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$j(function() {
    $j(function() {
        var year = new Date().getFullYear();
        $j('#month_picker').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: year,
            startYear: 2000,
            finalYear: year,
            monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        });
    });
});
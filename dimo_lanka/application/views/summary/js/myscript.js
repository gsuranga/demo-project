$j(function() {
    $j("#form_date").datepicker({
        dateFormat: "yy-mm-dd"

    });
    $j("#to_date").datepicker({
        dateFormat: "yy-mm-dd"

    });
});
angular.module("summaryapp", [])
        .controller("summarycontroller", function($scope, $http) {
            $scope.branchs = [];
            $scope.details = [];

            var responsePromise = $http.get("getBranchs");
            responsePromise.success(function(data, status, headers, config) {
                $scope.branchs = angular.fromJson(data);

            });
            responsePromise.error(function(data, status, headers, config) {
                alert("Can't Access !");
            });
            //------------------Get All Details---------------------//
            $scope.gettingdetail = function(e)
            {
                var selectedid = $j('#areaid_se').val();
                var fromdate = $j('#form_date').val();
                var todate = $j('#to_date').val();
               $j("#spinningSquaresG").css("display", "block");
                var responsedetails = $http.get("getDetails?branchID="+selectedid+"&from_date="+fromdate+"&todate="+todate);
                responsedetails.success(function(data, status, headers, config) {
                    $scope.details = angular.fromJson(data);
                    $j("#spinningSquaresG").css("display", "none");

                });
                console.log(selectedid);
            };
        });



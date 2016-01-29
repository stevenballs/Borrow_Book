'use strict';

var app =  angular.module('BorrowBooks', []);

app.controller('MainCtrl', function($scope, $http,$filter) {

	$http.get('/BorrowBook_New/index.php/get/addresstype').then(function(response) {
		$scope.addressType = response.data;
	});

	$scope.dataCustomer = {};
  $scope.dataCustomerList = [];
  $scope.dataBorrowBook = {};
  $scope.itemBorrow = [];
  $scope.dataBookList = [];
  $scope.slTypeJson = {};

  $scope.disabledBtnBorrow = false;

  $scope.pageLoad = function(){
  $http({
          method  : 'GET',
          url     : '/BorrowBook_New/index.php/get/customers',
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
                    //console.log(data);
                    var temArr = [];
                    angular.forEach(data, function (values) {

                          var obj = {id:values.id,fullname:values.first_name+" "+values.last_name};
                          temArr.push(obj);
                        
                          //console.log(obj);
                      });

                    $scope.dataCustomerList = temArr;
                   
                 })
                 .error(function (xhr, status, error) {
                   alert("เกิดข้อผิดพลาด");
                 });
                 
  }

$scope.pageLoad();

 $scope.showBorrowByCustomer = function(){
  $http({
          method  : 'GET',
          url     : '/BorrowBook_New/index.php/get/getbookbyid/'+$scope.dataCustomerList.id,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
                   //console.log(data);
                    $scope.itemBorrow = data;
                    if(data.length >= 3){
                        $scope.disabledBtnBorrow = true;
                    }
                    else{
                      $scope.disabledBtnBorrow = false;
                    }
                   
                 })
                 .error(function (xhr, status, error) {
                   alert("เกิดข้อผิดพลาด");
                 });
                 
  }

 $scope.showBookAll = function(){
  $http({
          method  : 'GET',
          url     : '/BorrowBook_New/index.php/get/getbookall',
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
                   // console.log(data);
                    $scope.dataBookList = data;
         })
         .error(function (xhr, status, error) {
           alert("เกิดข้อผิดพลาด");
         });
                 
  }
  $scope.showBookAll();

  $scope.insertBorrowBook = function()
  {
         var date = new Date();
         var currentMonth = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
         var tmsysdate = date.getFullYear().toString()+"/"+ (currentMonth).toString()+"/"+date.getDate().toString() ;


        var temObj = {profile_id:$scope.dataCustomerList.id,
                      book_id:$scope.dataBookList.id,
                      check_out_date:$filter('date')($scope.dataBorrow.txtCheckOutDate, 'yyyy/MM/dd'),
                      due_date:tmsysdate,
                      return_date:$filter('date')($scope.dataBorrow.txtReturnDate, 'yyyy/MM/dd')
                    };

        var temItemBorrow = $scope.itemBorrow;
        $http({
          method  : 'POST',
          url     : '/BorrowBook_New/index.php/post/insertborrow',
          data    : temObj,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
                    $scope.itemBorrow =  data;
                    alert("เพิ่มข้อมูลลูกค้าสำเร็จ");
                 })
                 .error(function (xhr, status, error) {
                   alert("เกิดข้อผิดพลาด");
                 });
  }

	$scope.submitCustomer = function()
   {
		$http({
          method  : 'POST',
          url     : '/BorrowBook_New/index.php/post/customer',
          data    : $scope.dataCustomer,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
         			$scope.dataCustomer = {};
                    alert("เพิ่มข้อมูลลูกค้าสำเร็จ");
                 })
                 .error(function (xhr, status, error) {
                   alert("เกิดข้อผิดพลาด");
                 });
	}

  $scope.showDataJSON = function()
  {
      $http({
          method  : 'GET',
          url     : '/BorrowBook_New/index.php/get/exporttypejson/'+$scope.slTypeJson.id,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function (data) {
                    
                     var dataTypeJson = [];
                     var temBook = {};
                     if($scope.slTypeJson.id == 1){
                        angular.forEach(data, function (values) {
                             
                             $http({
                              method  : 'GET',
                              url     : '/BorrowBook_New/index.php/get/exporttypejsonbook/'+values.profile_id,
                              headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
                             }).success(function (data) {
                                       temBook = data;
                                       
                             })
                             .error(function (xhr, status, error) {
                               alert("เกิดข้อผิดพลาด");
                             });


                        var temJson = {first_name:values.first_name,
                                        last_name:values.last_name,
                                        home_address:values.address1,
                                        work_address :values.address2,
                                        books:temBook}
                                dataTypeJson.push(temJson);
                          //console.log(dataTypeJson);
                      }); 

                    }
                    else if($scope.slTypeJson.id == 2){
                      dataTypeJson = [];
                      angular.forEach(data, function (values) {
                          var objAddress = {line1:values.address1,
                                            line2:values.address2,
                                            city :values.city,
                                            country:values.country,
                                            zip_code:values.zip_code};
                          dataTypeJson.push(objAddress);
                      }); 
                    }
                    else if($scope.slTypeJson.id == 3){
                      dataTypeJson = [];
                      angular.forEach(data, function (values) {
                          var objBook = {title:values.title,
                                        author:values.author};
                          dataTypeJson.push(objBook);
                      }); 
                    }

                    $('#display').html(JSON.stringify(dataTypeJson).toString());
                    //$scope.dataBookList = data;
         })
         .error(function (xhr, status, error) {
           alert("เกิดข้อผิดพลาด");
         });
  }


 


});
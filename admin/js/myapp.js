  $(document).ready(function() {
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http, $filter, $sce) {
$scope.errMsg = "";
$scope.genrenames = "";
$scope.consolenames = "";
var pageArr = ["index.php","addproducts.php","inventory.php"];

$http.get("../api/getGenre.php")
    .then(function (response) {$scope.genrenames = response.data.records;});
$http.get("../api/getConsole.php")
    .then(function (response) {$scope.consolenames = response.data.records;});
    $http.get("../api/getRegion.php")
    .then(function (response) {$scope.regionnames = response.data.records;});

    $http.get("../api/getEmployee.php")
    .then(function (response) {$scope.employeenames = response.data.records;});

$http.get("../api/getProducts.php")
    .then(function (response) {console.log(response);$scope.products = response.data.data;});

$http.get("../api/getstore.php")
    .then(function (response) {console.log(response);$scope.store = response.data.data;});



window.onload = AddLive();

function AddLive() {
    var loc = window.location.href;
    var entryArray = loc.split("/");
    var t = entryArray.length;
    var check = entryArray[t-1];
    var e = pageArr.indexOf(check);
        $('.menu_li').removeClass("is-active");
    $('#m_'+e).addClass("is-active");
    var editPage = check.split("?");
    if(editPage[0] == "edit.php")
    {
      getEdit();
    }
    if(check == "index.php")
    {
        $('#search').fadeIn();
        $('#search_icon').fadeIn();
    }
     else if(check == "")
    {
        $('.menu_li').removeClass("is-active");
        $('#m_0').addClass("is-active");
        $('#search').fadeIn();
        $('#search_icon').fadeIn();
    }
    else
    {
        $('#search').hide();
        $('#search_icon').hide();
    }
    }



$scope.changePage = function(e) {
    var e = e;
    window.location = pageArr[e];
}


$scope.delete = function(e, name){
  var id = e;
  var name = name;
  if (confirm('Are you sure you want to delete ' + name + '?')) {
  $.ajax({

                url: '../api/deleteProduct.php',
                data: 'id='+id,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  console.log(data);
                  $scope.errMsg = data.message;
                  $scope.$apply(); 
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
          $http.get("../api/getProducts.php")
    .then(function (response) {console.log(response);$scope.products = response.data.data;});
                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.$apply(); 
                
                console.log(error);
          },
              
                
                });

}

}

$scope.deleteStore = function(id, aid){
  var id = id;
  var aid = aid;
  if (confirm('Are you sure you want to delete the store?')) {
  $.ajax({

                url: '../api/deleteStore.php',
                data: 'id='+id+'&aid='+aid,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  console.log(data);
                  $scope.errMsg = data.message;
                  $scope.$apply(); 
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
          $http.get("../api/getstore.php")
    .then(function (response) {console.log(response);$scope.store = response.data.data;});
                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.$apply(); 
                
                console.log(error);
          },
              
                
                });

}

}

$scope.deleteGenre = function(e, name, type){
  var id = e;
  var name = name;
  var type = type;
  if (confirm('Are you sure you want to delete ' + name + '?')) {
  $.ajax({

                url: '../api/deleteType.php',
                data: 'id='+id+'&type='+type,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  console.log(data);
                  $scope.errMsg = data.message;
                  $scope.$apply(); 
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                         if(type == 'genre')
                         {
                      $http.get("../api/getGenre.php")
                  .then(function (response) {$scope.genrenames = response.data.records;});
                  }
                  if(type == 'console')
                  {
                    $http.get("../api/getConsole.php")
                      .then(function (response) {$scope.consolenames = response.data.records;});
                  }
                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.$apply(); 
                
                console.log(error);
          },
              
                
                });

}

}

$scope.AddType = function(e){
	var choice = e;
	if(choice == 1)
	{
		var name = $('#genrename').val();
	}
	if(choice == 2)
	{
		var name = $('#consolename').val();
	}
		if(name == "")
			{
  				$scope.errMsg = "Please enter the name";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                   
			}
			else
			{
				$.ajax({

                url: '../api/genre_add.php',
                data: 'name='+name+'&choice='+choice,
                dataType: "json",
                type: 'POST',

                success: function(data){
                	console.log(data);
                  $scope.errMsg = data.message;
                  $scope.$apply(); 
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $http.get("../api/getGenre.php")
    .then(function (response) {$scope.genrenames = response.data.records;});
$http.get("../api/getConsole.php")
    .then(function (response) {$scope.consolenames = response.data.records;});
                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.$apply(); 
                
      					console.log(error);
  				},
              
                
              	});
			}

};

$scope.addStore = function(){
    var street = $('#street').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var zipcode = $('#zipcode').val();
    var store = $('#region').val();
    var manager = $('#employee').val();
    var test = isNaN(city);
    if(street == "")
      {
          $scope.errMsg = "Please enter the street";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(city == "")
      {
          $scope.errMsg = "Please enter the city";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(state == "")
      {
          $scope.errMsg = "Please enter the state";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(zipcode == "")
      {
          $scope.errMsg = "Please enter the zipcode";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(zipcode.length > 5)
      {
          $scope.errMsg = "Please enter a valid zipcode";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(manager == "")
      {
          $scope.errMsg = "Please select a manager";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else if(store == "")
      {
          $scope.errMsg = "Please select a store";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                   
      }
      else
      {
        $.ajax({

                url: '../api/addStore.php',
                data: 'street='+street+'&city='+city+'&state='+state+'&zipcode='+zipcode+'&manager='+manager+'&store='+store,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  console.log(data);
                  $scope.errMsg = data.message;
                  var add = data.address_id;
                  var m_id = data.m_id;
                  
                  $http.get("../api/updateEmp.php?add="+add+"&m_id="+m_id)
    .then(function (response) {console.log(response);});
    $http.get("../api/getstore.php")
    .then(function (response) {console.log(response);$scope.store = response.data.data;});
                  $scope.$apply(); 
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      

                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.$apply(); 
                
                console.log(error);
          },
              
                
                });

      }


}


$('[data-open-details]').click(function (e) {
  e.preventDefault();
  $(this).next().toggleClass('is-active');
  $(this).toggleClass('is-active');
});




//gen data agg


 $scope.genContent = function() {

$http.get("../api/getagg.php?gen=topList")
    .then(function (response) {console.log(response);$scope.topList = response.data.data;});

    $.ajax({

                url: '../api/getagg.php',
                data: 'gen=top',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.barData = data.data;
                     $scope.genBar();

                },
                error: function(error){

      console.log(error);
  },
              
                
              });

$.ajax({

                url: '../api/getagg.php',
                data: 'gen=sales',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.pieData = data.data;
                     $scope.genPie();

                },
                error: function(error){

      console.log(error);
  },
              
                
              });

$.ajax({

                url: '../api/getagg.php',
                data: 'gen=process',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.process = data.data[0].total;
                },
                error: function(error){

      console.log(error);
  },
              
                
              });


$.ajax({

                url: '../api/getagg.php',
                data: 'gen=level',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.lowest = data.data;
                    $.ajax({

                url: '../api/getagg.php',
                data: 'gen=msale',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.salesLow = data.data;
                    $scope.genBar2();
                },
                error: function(error){

      console.log(error);
  },
              
                
              });
                    
                },
                error: function(error){

      console.log(error);
  },
              
                
              });


$.ajax({

                url: '../api/getagg.php',
                data: 'gen=today',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.today = data.data[0].count;
                },
                error: function(error){

      console.log(error);
  },
              
                
              });

$.ajax({

                url: '../api/getagg.php',
                data: 'gen=region',
                dataType: "json",
                type: 'POST',

                success: function(data){
                    console.log(data);
                    $scope.region = data.data;
                    $scope.genPie2();
                },
                error: function(error){

      console.log(error);
  },
              
                
              });



  }


  $scope.genPie = function() {
    
    var fusioncharts = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container-2',
    width: '100%',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Total 3 products by Sales",
            "subCaption": "Game Store",
            "numberPrefix": "",
            "showBorder": "0",
            "use3DLighting": "0",
            "enableSmartLabels": "1",
            "startingAngle": "310",
            "showLabels": "1",
            "showPercentValues": "1",
            "showLegend": "0",
            "defaultCenterLabel": "Sales",
            "centerLabel": "$label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "1",
            "useDataPlotColorForLabels": "1",
            "theme": "fint"
        },
        "data": [{
            "label": $scope.pieData[0].name,
            "value": $scope.pieData[0].sales
        },{
            "label": $scope.pieData[1].name,
            "value": $scope.pieData[1].sales
        }, {
            "label": $scope.pieData[2].name,
            "value": $scope.pieData[2].sales
        }]
    }
}
);

    fusioncharts.render();


}

  $scope.genPie2 = function() {
FusionCharts.ready(function () {
    var ageGroupChart = new FusionCharts({
        type: 'pie2d',
        renderAt: 'chart-container-4',
        width: '450',
        height: '300',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Regions with the highest sales",
                "subCaption": "Game Store",
                "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                "bgColor": "#ffffff",
                "showBorder": "0",
                "use3DLighting": "0",
                "showShadow": "0",
                "enableSmartLabels": "0",
                "startingAngle": "0",
                "showPercentValues": "1",
                "showPercentInTooltip": "0",
                "decimals": "1",
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "subcaptionFontBold": "0",
                "toolTipColor": "#ffffff",
                "toolTipBorderThickness": "0",
                "toolTipBgColor": "#000000",
                "toolTipBgAlpha": "80",
                "toolTipBorderRadius": "2",
                "toolTipPadding": "5",
                "showHoverEffect":"1",
                "showLegend": "1",
                "legendBgColor": "#ffffff",
                "legendBorderAlpha": '0',
                "legendShadow": '0',
                "legendItemFontSize": '10',
                "legendItemFontColor": '#666666'
            },
            "data": [
                {
                    "label": $scope.region[0].name,
                    "value": $scope.region[0].sum
                }, 
                {
                    "label": $scope.region[1].name,
                    "value": $scope.region[1].sum
                }
            ]
        }
    }).render();
});

}


  $scope.genBar = function() {
    var fusioncharts2 = new FusionCharts({
    type: 'column2d',
    renderAt: 'chart-container-1',
    id: 'myChart',
    width: '100%',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Top 5 Products",
            "subcaption": "Game Store",
            "xaxisname": "Products",
            "yaxisname": "Quantity",
            "numberprefix": "",
            "theme": "fint"
        },
        "data": [{
            "label": $scope.barData[0].name,
            "value": $scope.barData[0].sum
        }, {
             "label": $scope.barData[1].name,
            "value": $scope.barData[1].sum
        }, {
           "label": $scope.barData[2].name,
            "value": $scope.barData[2].sum
        }, {
            "label": $scope.barData[3].name,
            "value": $scope.barData[3].sum
        }, {
            "label": $scope.barData[4].name,
            "value": $scope.barData[4].sum
        }]
    }
}
);
    fusioncharts2.render();


  }

  $scope.genBar2 = function() {
    FusionCharts.ready(function () {    
    var revenueChart = new FusionCharts({
        type: 'mscolumn2d',
        renderAt: 'chart-container-3',
        width: '500',
        height: '300',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "Products with low quantity and their sales",
                "subCaption": "Game Store",
                "xAxisname": "Names",
                "yAxisName": "quantity",
                "theme": "fint"
            },
            "categories": [{
                "category": [{
                    "label": $scope.lowest[0].prodname
                }, {
                    "label": $scope.lowest[1].prodname
                }, {
                    "label": $scope.lowest[2].prodname
                }]
            }],
            "dataset": [{
                "seriesname": "Lowest Quantity",
                
                // Hide this series in the initial view
                "initiallyhidden": "1",
                
                "data": [{
                    "value": $scope.lowest[0].sum
                }, {
                    "value": $scope.lowest[1].sum
                }, {
                    "value": $scope.lowest[2].sum
                }]
            }, {
                "seriesname": "Sales for product",
                "data": [{
                    "value": $scope.salesLow[0].Sales
                }, {
                    "value": $scope.salesLow[1].Sales
                }, {
                    "value": "0"
                }]
            }]
        }
    }).render();   
});
  }


});

});
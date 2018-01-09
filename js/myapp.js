$(document).foundation()

     	var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http, $filter, $sce) {

$http.get("api/getGenre.php")
    .then(function (response) {$scope.genrenames = response.data.records;});
$http.get("api/getConsole.php")
    .then(function (response) {$scope.consolenames = response.data.records;});
    $http.get("api/getRegion.php")
    .then(function (response) {$scope.regionnames = response.data.records;});

$scope.getSearch = function(e){
	var e = e;
  if(e == "2")
  {
    var sort = $('#sortValueSearch').val();
  }
  else
  {
    var sort = '';
  }
	var name = $('#search').val();
	var genre = $('#genre_id').val();
	var con = $('#console_id').val();
	var type = $('#type').val();
	if(name == '' && genre == '' && con == '' && type == '')
	{
		alert("please select an value");
	}
	else
	{
		$.ajax({

                url: 'api/search.php',
                data: 'name='+name+'&genre='+genre+'&console='+con+'&type='+type+'&sort='+sort,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  var msg = data.message;
                  if(msg == 'Got it')
                  {
                	$('#main-content-section-search').slideDown();
                	 $('html,body').animate({
        scrollTop: $("#main-content-section-search").offset().top},
        'slow');

                	 $scope.pageSearch = data.data;
                	 $scope.$apply();
                  }
                  if(msg == 'No Product present')
                  {
                    alert("Sorry we do not have that");
                  }
                	console.log(data);
                    
                
                
                },
                error: function(error){
                   
                
      					console.log(error);
  				},
              
                
              	});
	}

}


$scope.logout = function(){

alert("You have been logged out");
}
$scope.addCart = function(id, index){
	var id = id;
	var index = index;
	var quantity = $('#quantity_'+index).val();
  var zipcode = $('#zipcode_'+index).val();
	if(quantity == '')
	{
		alert("please select quantity");
	}
  else if(zipcode == '')
  {
    alert("Please enter zipcode");
  }
  else if(zipcode.length > 5)
  {
    alert("Please enter valid zipcode");
  }
	else
	{
	$.ajax({

                url: 'api/addCart.php',
                data: 'id='+id+'&quantity='+quantity+'&zipcode='+zipcode,
                dataType: "json",
                type: 'POST',

                success: function(data){
                	console.log(data);
                    alert(data.message);
                
                
                },
                error: function(error){
                   
                
      					console.log(error);
  				},
              
                
              	});
	}

}

$scope.checkOut = function(){
	$.ajax({

                url: 'api/checkOut.php',
                dataType: "json",
                type: 'POST',

                success: function(data){
                	console.log(data);
                    alert(data.message);
                    var mes = data.message;
                    if(mes == 'Please complete the payment.')
                    {
                        $('.cart').slideUp();
                        $('.card-details').slideDown();

                    }
                
                },
                error: function(error){
                   
                
      					console.log(error);
  				},
              
                
              	});

}

$scope.loadData = function(e){
	var e = e;
	if(e == 'main')
	{
		$http.get("api/getTop.php")
    .then(function (response) {
    	console.log(response);
    	$scope.topProducts = response.data.data;
    	

    });
	}
	if(e == 'Game')
	{
		$http.get("api/getData.php?id="+e)
    .then(function (response) {
    	$scope.pageData = response.data.data;
    	

    });
	}
  if(e == 'Accessory')
  {
    $http.get("api/getData.php?id="+e)
    .then(function (response) {
      $scope.pageData = response.data.data;
      

    });
  }
  if(e == 'Console')
  {
    $http.get("api/getData.php?id="+e)
    .then(function (response) {
      $scope.pageData = response.data.data;
      

    });
  }
	if(e == 'Cart')
	{
		$http.get("api/getCart.php")
    .then(function (response) {
    	console.log(response);
      if(response.data.message == 'Got it')
      {
    	$scope.pageData = response.data.data.rows;
    	$scope.total = response.data.data.total[0];
      $scope.totalQuantity = response.data.data.quantity[0];
    }
    else
    {
      $('.no-cart').fadeIn();
      $('.cart').fadeOut();
    }
    	
    });
	}
  if(e == 'User')
  {
    $('#login-form').slideUp();
    $('.after-login').slideDown();
    $http.get("api/getUserData.php")
    .then(function (response) {console.log(response);$scope.userData = response.data.data;});
    $http.get("api/getPrevious.php")
    .then(function (response) {console.log(response);$scope.userPrevious = response.data.data});

  }
  if(e == 'Finished')
  {
    $('.done').fadeIn();
    $('.no-cart').fadeOut();
  }


}



$scope.errMsg = "";
$scope.email="";
$scope.password="";

$("#email").focus(function(){
 $("#email_lb").addClass("login_label_after");
});
$("#email").focusout(function(){
    if($scope.email == "")
  {
 $("#email_lb").removeClass("login_label_after");
}
});

$("#password").focus(function(){
 $("#password_lb").addClass("login_label_after");
});
$("#password").focusout(function(){
    if($scope.password == "")
  {
 $("#password_lb").removeClass("login_label_after");
}
});


 $scope.Sort = function() {
  var sort = $('#sortValue').val();
  var e = $('#sort_id').val();
  if(sort == '')
  {
    alert("Please select a value");
  }
  else
  {
       $http.get("api/getData.php?id="+e+"&sort="+sort)
    .then(function (response) {
      $scope.pageData = response.data.data;
  });
}

 }

  $scope.SortSearch = function() {
  var sort = $('#sortValue').val();
  var e = $('#sort_id').val();
  if(sort == '')
  {
    alert("Please select a value");
  }
  else
  {
       $http.get("api/getData.php?id="+e+"&sort="+sort)
    .then(function (response) {
      $scope.pageData = response.data.data;
  });
}

 }

 $scope.login = function() {
 	var email = $('#email').val();
 	var pass = $('#password').val();
 	 var x = $('#email').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
           if(email == "")
			{
  				$scope.errMsg = "Your Email seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();    
			}
			else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
			{
 				$scope.errMsg = "Your Email seems to be incorrect";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply(); 
    		}
    		else if(pass == "") 
			{
 				$scope.errMsg = "Your Password seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply(); 
    		}
    		else
    		{
    			$.ajax({

                url: 'api/login.php',
                data: 'email='+email+'&password='+pass,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  
                	console.log(data);
                  $scope.errMsg = data.message;
                  if($scope.errMsg != 'Error, user not found')
                  {
                      $http.get("api/getUserData.php")
    .then(function (response) {console.log(response);$scope.loadData('User');});
                  }
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
               
                
      					console.log(error);
  				},
              
                
              	});
    		}

 }

  $scope.initialCheck = function() {
  	var fname = $('#fname').val();
  	var lname = $('#lname').val();
  	var email = $('#pemail').val();
  	var x = $('#pemail').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    var pass = $('#cpassword').val();
    var pass_two = $('#password_two').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var zipcode = $('#zipcode').val();
    var choice = $('#type').val();
    if(fname == "")
    {
    	$scope.errMsg = "Your First Name seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(lname == "")
    {
    	$scope.errMsg = "Your Last Name seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(email == "")
			{
  				$scope.errMsg = "Your Email seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();    
			}
			else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
			{
 				$scope.errMsg = "Your Email seems to be incorrect";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply(); 
    		}
        else if(pass == "")
    {
    	$scope.errMsg = "Your Password seems to be missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
     else if(pass_two != pass)
    {
    	$scope.errMsg = "Your Password must match";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(street == "")
    {
    	$scope.errMsg = "Your Street is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(city == "")
    {
    	$scope.errMsg = "Your City is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(state == "")
    {
    	$scope.errMsg = "Your State is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(zipcode == "")
    {
    	$scope.errMsg = "Your zipcode is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(zipcode.length > 5)
    {
      $scope.errMsg = "Your zipcode is incorrect";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(choice != ''){
    
    	$('.first').slideUp();
    	$('.second-'+choice).slideDown();
    }
    else
    {
    	$scope.errMsg = "Your type is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }



  }

$scope.deleteCart = function(e, name) {
  var id = e;
  var name = name;
    if (confirm('Are you sure you want to delete ' + name + '?')) {
  $.ajax({

                url: 'api/deleteCart.php',
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
                 $scope.loadData('Cart');
                
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


    $scope.signUp = function(e) {
    	var fname = $('#fname').val();
  	var lname = $('#lname').val();
  	var email = $('#pemail').val();
  	var x = $('#pemail').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    var pass = $('#cpassword').val();
    var pass_two = $('#password_two').val();
    var street = $('#street').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var zipcode = $('#zipcode').val();
    var choice = $('#type').val();
    var bname = $('#bname').val();
    var income = $('#income').val();
    var age = $('#age').val();
    var pincome = $('#pincome').val();
    var gender = $('#gender').val();
   	var martial = $('#martial').val();
   	var bname = $('#bname').val();
   	var income = $('#income').val(); 
   	if(choice == "business")
   	{
   		if(bname == "")
    {
    	$scope.errMsg = "Your Business name is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(income == "")
    {
    	$scope.errMsg = "Your Business income is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else
    {
    	$.ajax({

                url: 'api/signup.php',
                data: 'fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass+'&street='+street+'&city='+city+'&state='+state+'&zipcode='+zipcode+'&choice='+choice+'&bname='+bname+'&income='+income,
                dataType: "json",
                type: 'POST',

                success: function(data){
                	console.log(data);
                  $scope.errMsg = data.message;
                  if($scope.errMsg != 'Erro')
                  {
                   $http.get("api/getUserData.php")
    .then(function (response) {console.log(response);$scope.loadData('User');});
  }
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
                
                
      					console.log(error);
  				},
              
                
              	});
    }
   	}
   	if(choice == "home")
   	{
   		if(age == "")
    {
    	$scope.errMsg = "Your age is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(pincome == "")
    {
    	$scope.errMsg = "Your income is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(gender == "")
    {
    	$scope.errMsg = "Your gender is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(martial == "")
    {
    	$scope.errMsg = "Your martial status is missing";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else
    {
    	$.ajax({

                url: 'api/signup.php',
                data: 'fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass+'&street='+street+'&city='+city+'&state='+state+'&zipcode='+zipcode+'&choice='+choice+'&age='+age+'&income='+pincome+'&gender='+gender+'&martial='+martial,
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
                
                
                },
                error: function(error){
                     $scope.errMsg = "Some error occured";
				$("#error").slideDown();
                         setTimeout(function(){
						$("#error").slideUp();
                  }, 3000);      
                $scope.apply(); 
                
      					console.log(error);
  				},
              
                
              	});
    }
   	}

    }


 $scope.editInfo = function() {
    $('.update_user').slideToggle();
 }

  $scope.updateInfo = function() {
    var fname = $('#fname_u').val();
    var lname = $('#lname_u').val();
    var email = $('#pemail_u').val();
    var x = $('#pemail_u').val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    var pass = $('#cpassword_u').val();
    var pass_two = $('#password_two_u').val();
    var street = $('#street_u').val();
    var city = $('#city_u').val();
    var state = $('#state_u').val();
    var zipcode = $('#zipcode_u').val();
    var address_id = $('#address_id').val();
    var customer_id = $('#customer_id').val();
    if(fname == "")
    {
      $scope.errMsg = "Your First Name seems to be missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(lname == "")
    {
      $scope.errMsg = "Your Last Name seems to be missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(email == "")
      {
          $scope.errMsg = "Your Email seems to be missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();    
      }
      else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
      {
        $scope.errMsg = "Your Email seems to be incorrect";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply(); 
        }
        else if(pass == "")
    {
      $scope.errMsg = "Your Password seems to be missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
     else if(pass_two != pass)
    {
      $scope.errMsg = "Your Password must match";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(street == "")
    {
      $scope.errMsg = "Your Street is missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(city == "")
    {
      $scope.errMsg = "Your City is missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(state == "")
    {
      $scope.errMsg = "Your State is missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else if(zipcode == "")
    {
      $scope.errMsg = "Your zipcode is missing";
        $("#error").slideDown();
                         setTimeout(function(){
            $("#error").slideUp();
                  }, 3000);      
                $scope.apply();  
    }
    else
    {
      $.ajax({

                url: 'api/updateUser.php',
                data: 'fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass+'&street='+street+'&city='+city+'&state='+state+'&zipcode='+zipcode+'&customer_id='+customer_id+'&address_id='+address_id,
                dataType: "json",
                type: 'POST',

                success: function(data){
                  console.log(data);
                  $http.get("api/getUserData.php")
    .then(function (response) {console.log(response);$scope.loadData('User');});
                  $scope.errMsg = data.message;
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

    


});
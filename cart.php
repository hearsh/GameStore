<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if($_SESSION["temp_user"] == '')
{
  $_SESSION["temp_user"] = uniqid();
}

?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/svg/foundation-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

        <script>
 setTimeout(function() {

var intro_overlay = $('.overlay'); 
 var preload = $('#preloader');

            
            setTimeout(function(){
                preload.addClass('active-preload');
                preload.delay(300).fadeOut(300);
            }, 1400);
            
            setTimeout(function(){ 
                intro_overlay.addClass('overlay-active');
            }, 1650);



   setTimeout(function() {
$('.middle_text').animate({"opacity":"1"});
$('.bottom_text').animate({"opacity":"1"});
}, 2000);
          


}, 1000);





</script>
  </head>
  <body>
 
<div ng-app="myApp" ng-controller="myCtrl">



<?php
if(isset($_REQUEST["checkout"]))
{
  ?>
<div ng-init="loadData('Finished')" ></div>
  <?php
}
?>
<div ng-init="loadData('Cart')" ></div>
<div class="overlay"><div id="preloader"></div></div>
 <div data-abide-error class="alert callout" id="error" data-closable style="display: none;">
  <button class="close-button" aria-label="Close alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
   <i class="fi-alert"></i> {{errMsg}}
  </div>

<div class="login-bg">


    <div class="top-content-section">
   <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text"><img src="img/logo.png" class="logo" alt="logo"></li>
          <li><a href="index.php"><i class="fi-home"></i> Home</a></li>
          <li><a href="games.php"><i class="fi-play"></i> Games</a></li>
          <li><a href="console.php"><i class="fi-closed-caption"></i> Console</a></li>
          <li><a href="accessories.php"><i class="fi-plus"></i> Accessories</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="cart.php"><i class="fi-shopping-cart"></i> My Cart</a></li>
          <li><a href="cart.php"><i class="fi-torso"></i> My Account</a></li>
          <?php if($_SESSION["user_login"] == 1)
          {
            echo '<li><a href="logout.php"><i class="fi-unlock"></i> Logout</a></li>';
          }?>
           
        </ul>
      </div>
    </div>
  </div>
<div class="grid-x rown grid-padding-x grid-margin-x">
<div class="cell medium-6">


<div class="done container-block" style="display:none;">
<h5 class="center">Your Payment was successful, expect the order in 2 to 4 days.<br/>
  If you have any questions contact us at <a href="">support@gamestore.com</a></h5>

</div>

<div class="no-cart" style="display:none;">
<h2 class="center">Your cart is empty</h2>

</div>

<div class="cart" >
  <h2 class="center">Your cart</h2>
  <table>
  <thead>
    <tr>
      <th >Product Name</th>
      <th>Quantity</th>
      <th >Price</th>
      <th >Delete</th>
    </tr>
  </thead>
  <tbody class="table-class">
    <tr class="table-class" ng-repeat="x in pageData">
      <td>{{x.name}}</td>
      <td>{{x.quantity}}</td>
      <td>${{x.price}}</td>
      <td><i ng-click="deleteCart(x.cart_id, x.name)" class='fi-trash'></i></td>
    </tr>
    <tr>
      <td>
        Total
      </td>
      <td>{{totalQuantity}}</td>
      <td>${{total}}</td>
      <td></td>
    </tr>
    
  </tbody>
</table>
<div class="center">
<button class="button large success" ng-click="checkOut()">Check out</button>
</div>
</div>

<div class="card-details" style="display:none;">
  <h2 class="center">Its Payment time (Paise de Lavde)</h2>
  <form action="api/payment.php" method="POST" data-abide novalidate>
   <input type="hidden" value="{{total}}" name="total">
  <div class="grid-x grid-padding-x">
    <div class="cell small-6">
       <div data-abide-error class="alert callout" data-closable style="display: none;position:relative;top:0px;right:0px;">
   <i class="fi-alert"></i> Errors in your form
    <button class="close-button" aria-label="Close alert" type="button"  data-close>
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="cell medium-6 ">

<input type="text" placeholder="Card Name" required >
 <span class="form-error">There is an error.</span>

</div>
<div class="cell medium-6">
<input type="number" placeholder="Card Number" pattern="card" required >
 <span class="form-error">There is an error.</span>
</div>
</div>
                  <div class="grid-x grid-padding-x">
                    <div class="small-4 cell">
                      <select required >
                        <option value="">Month</option>
                        <option value="january">01</option>
                        <option value="february">02</option>
                        <option value="march">03</option>
                        <option value="april">04</option>
                        <option value="may">05</option>
                        <option value="june">06</option>
                        <option value="july">07</option>
                        <option value="august">08</option>
                        <option value="september">9</option>
                        <option value="october">10</option>
                        <option value="november">11</option>
                        <option value="december">12</option>
                      </select>
                    </div>
                    <div class="small-4 cell">
                      <select required >
                        <option value="">Year</option>
                        <option value="year5">2023</option>
                        <option value="year6">2022</option>
                        <option value="year7">2021</option>
                        <option value="year8">2020</option>
                        <option value="year1">2019</option>
                        <option value="year2">2018</option>
                      </select>
                    </div>
                    <div class="small-4 cell">
                      <input type="number" placeholder="CVV" pattern="cvv" required >
                       <span class="form-error">There is an error.</span>
                    </div>
                  </div>
                  <input class="button expanded" value="Pay and confirm" type="submit">
</div>
<div class="cell small-6 container-block">
<p>
Billing Address:<br/>
<div ng-repeat="x in userData">
{{x.street}}, {{x.city}}, {{x.state}}<br/>{{x.zipcode}}
</div>
</p>
<p>*Note : Any card information provided will not be saved, so go ahead we are not looking.</p>

</div>
</div>
</form>

</div>




</div>
<div class="cell medium-6  rown">
 
 <?php

if($_SESSION["user_login"] != 1)
{
  
 ?> 
<div id="login-form" >
<ul class="tabs login-tab" data-tabs id="example-tabs">
  <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Login</a></li>
  <li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">Create an account</a></li>
</ul>
<div class="tabs-content" data-tabs-content="example-tabs">
  <div class="tabs-panel is-active" id="panel1">

    <h4>Login To Your Account</h4>
      <div class="LoginForm-inputContainer">
  <label id="email_lb" class="login_label">Email</label>
  <input type="text" ng-model="email" id="email" value="" name="email" class="input_cust" required> 
</div>

      <div class="LoginForm-inputContainer">
  <label id="password_lb" class="login_label">Password</label>
  <input type="password" ng-model="password" id="password" value="" name="password" class="input_cust" required> 
</div>

<button ng-click="login()" id="first" class="btn btn-1 third">
      <svg>
        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
      </svg>
     LOGIN
    </button>


     </div>
  <div class="tabs-panel" id="panel2">
    <h4>Create Your Account</h4>
    <div class="first">
    <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
        <input type="text" required placeholder="First Name" name="fname" id="fname">
    </div>
    <div class="cell  medium-6 ">
        <input type="text" placeholder="Last Name" required name="lname" id="lname">
    </div>
     </div>
     <div class="grid-x">
      <div class="cell">
        <input type="email" placeholder="Email" required name="email" id="pemail">

      </div>
      </div>
      <div class="grid-x">
      <div class="cell">
        <input type="password" id="cpassword" placeholder="Enter Password" name="password" required >

      </div>
      </div>
       <div class="grid-x">
      <div class="cell">
         <input type="password" placeholder="Re-enter password" id="password_two" required data-equalto="password">

      </div>
      </div>
      <div class="grid-x">
      <div class="cell">
         <input type="text" placeholder="Street" required id="street" name="street" >

      </div>
      </div>
      <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <input type="text" placeholder="City" required id="city" name="city" >

      </div>
      <div class="cell medium-6">
       <select name="state" id="state">
        <option value="">Please select a State</option>
        <option ng-repeat='x in regionnames' value="{{x.name}}">{{x.name}}</option>
       </select>
      </div>
      </div>
      <div class="grid-x">
      <div class="cell">
         <input type="number" placeholder="Zipcode" required id="zipcode" name="zipcode" >

      </div>
      </div>
      <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
      <select name="type" id="type">
        <option value="">Select Type</option>
        <option value="business">Business</option>
        <option value="home">Home</option>

      </select>

      </div>
      <div class="cell medium-6">
        <button type="submit" class="button expanded" ng-click="initialCheck()">Next</button>
      </div>
      </div>
    </div>

    <div class="second-business">
    <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <input type="text" placeholder="Business name" id="bname" name="bname">

      </div>
      <div class="cell medium-6">
         <input type="number" placeholder="Annual Income" id="income" name="income">

      </div>
      </div> 
      <div class="grid-x">
        <div class="cell">
<button class="button expanded" ng-click="signUp('1')">Sign me up</button>
</div>
      </div>     

    </div>
    <div class="second-home">
    <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <input type="number" placeholder="Age" id="age" name="age">

      </div>
      <div class="cell medium-6">
         <input type="number" placeholder="Income" id="pincome" name="income">

      </div>
      </div> 
      <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <select id="gender" required>
          <option value="">Select a Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>

      </div> 
      <div class="cell medium-6">
         <select id="martial" required>
          <option value="">Select a Martial Status</option>
          <option value="married">Married</option>
          <option value="single">Single</option>
        </select>
      </div>
      </div>
      <div class="grid-x">
        <div class="cell">
<button class="button expanded" ng-click="signUp('2')">Sign me up</button>
</div>
      </div>     

    </div>

</div>

</div>
</div>
<?php
}
if($_SESSION["user_login"] == 1)
{?>
<div ng-init="loadData('User')" ></div>
<?php
}
?>
<div class="after-login" style="display: none;">
  
<ul class="tabs login-tab" data-tabs id="example-tabs">
  <li class="tabs-title is-active"><a href="#panel3" data-tabs-target="panel3" aria-selected="true">Your Account</a></li>
  <li class="tabs-title"><a data-tabs-target="panel4" href="#panel4">Previous Orders</a></li>
</ul>
<div class="tabs-content" data-tabs-content="example-tabs">
  <div class="tabs-panel is-active" id="panel3">
    <div ng-repeat='x in userData'>
<h5>Welcome : {{x.first_name}} {{x.last_name}}</h5>
<p>
Billing Address <br/>
Street : {{x.street}}<br/>
City : {{x.city}}<br/>
State : {{x.state}}<br/>
Zipcode : {{x.zipcode}}
  </p>
  <p>
<button class="button" ng-click="editInfo()">Edit Info</button>
  </p>

<div class="update_user">

<input type="hidden" value="{{x.address_id}}" id="address_id">
<input type="hidden" value="{{x.customer_id}}" id="customer_id">
  <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
        <input type="text" required placeholder="First Name" value="{{x.first_name}}" name="fname" id="fname_u">
    </div>
    <div class="cell  medium-6 ">
        <input type="text" placeholder="Last Name" required value="{{x.last_name}}" name="lname" id="lname_u">
    </div>
     </div>
     <div class="grid-x">
      <div class="cell">
        <input type="email" placeholder="Email" required value="{{x.email}}" name="email" id="pemail_u">

      </div>
      </div>
      <div class="grid-x">
      <div class="cell">
        <input type="password" id="cpassword_u" value="{{x.password}}" placeholder="Enter Password" name="password" required >

      </div>
      </div>
       <div class="grid-x">
      <div class="cell">
         <input type="password" placeholder="Re-enter password" value="{{x.password}}" id="password_two_u" required data-equalto="password">

      </div>
      </div>
      <div class="grid-x">
      <div class="cell">
         <input type="text" placeholder="Street" required id="street_u" value="{{x.street}}" name="street" >

      </div>
      </div>
      <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <input type="text" placeholder="City" required id="city_u" value="{{x.city}}" name="city" >

      </div>
      <div class="cell medium-6">
        <select name="state" id="state_u">
        <option value="">Please select a State</option>
        <option selected value="{{x.state}}">{{x.state}}</option>
        <option ng-repeat='x in regionnames' value="{{x.name}}">{{x.name}}</option>
       </select>
        
      </div>
      </div>
      <div class="grid-x grid-padding-x">
      <div class="cell medium-6">
         <input type="number" placeholder="Zipcode" required id="zipcode_u" value="{{x.zipcode}}" name="zipcode" >

      </div>
      <div class="cell medium-6">
        <button type="submit" class="button expanded" ng-click="updateInfo()">Next</button>
      </div>
      </div>
   
    </div>
</div>

     </div>
  <div class="tabs-panel" id="panel4">
<h5>Your previous orders</h5>

       <table>
  <thead>
    <tr>
      <th >Product Name</th>
      <th>Quantity</th>
      <th >Price</th>
    </tr>
  </thead>
  <tbody class="table-class">
    <tr class="table-class" ng-repeat="x in userPrevious">
      <td>{{x.name}}</td>
      <td>{{x.quantity}}</td>
      <td>${{x.price}}</td>
    </tr>
    
  </tbody>
</table>

    </div>

</div>
</div>



</div>



</div>

</div>

<footer>
<div class="grid-x grid-padding-x">
<div class="cell medium-6">
<p>Copyrights of GameStore </p>
</div>
<div class="cell medium-6" >
  <p style="float:right">
Created by : Ankur / Harshavardhan / Hearsh
</p>
</div>
</div>
</footer> 


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    <script src="js/myapp.js"></script>
  </body>
</html>

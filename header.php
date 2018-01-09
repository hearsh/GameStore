<?php
session_start();
error_reporting(0);
if( $_SESSION["temp_user"] == '')
{
  $_SESSION["temp_user"] = uniqid();
}


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$page = explode("/", $actual_link);
//echo $page[5];
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
      <div class="overlay"><div id="preloader"></div></div>
<?php
$logout = isset($_REQUEST['logout']) ? $_REQUEST['logout'] : '';
if($logout == "yes")
{
  ?>
<div ng-init="logout()" ></div>
  <?php
}
?>

      <div class="hero-full-screen">

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

  <div class="middle-content-section">
    <?php 
      if($page[5] == 'index.php')
      {

    ?>
    <h1>What are you looking for?</h1>
    <div class="grid-x grid-padding-x">
      <div class="cell auto">
        <input type="text" placeholder="Search by name" name="search" id="search">
      </div>
      <div class="cell auto">
        <select required name="console_id" id="console_id">
     <option value="">Search by console</option>
    <option ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
  </select>
      </div>
      <div class="cell auto">
        <select required name="genre_id" id="genre_id">
    <option value="">Select by genre</option>
    <option ng-repeat="x in genrenames" value="{{x.id}}">{{x.name}}</option>
  </select>
</div>
<div class="cell auto">
        <select required name="type" id="type">
    <option value="">Select by Type</option>
    <option value="Game">Games</option>
    <option value="Accessory">Accessories</option>
    <option value="Console">Console</option>
  </select>
</div>
 <div class="cell auto">
        <button class="button expanded" ng-click="getSearch('1')">Search</button>
</div>
 </div>
<?php
}

?>
    <?php 
      if($page[5] == 'games.php')
      {

    ?>
    <input type="hidden" value="Game" id="type">
    <h1>What games are you looking for?</h1>
    <div class="grid-x grid-padding-x">
      <div class="cell medium-3">
        <input type="text" placeholder="Search by name" name="search" id="search">
      </div>
      <div class="cell medium-3">
        <select required name="console_id" id="console_id">
     <option value="">Search by console</option>
    <option ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
  </select>
      </div>
      <div class="cell medium-3">
        <select required name="genre_id" id="genre_id">
    <option value="">Select by genre</option>
    <option ng-repeat="x in genrenames" value="{{x.id}}">{{x.name}}</option>
  </select>
</div>
 <div class="cell medium-3">
        <button class="button expanded" ng-click="getSearch('1')">Search</button>
</div>
 </div>
<?php
}

?>

    <?php 
      if($page[5] == 'accessories.php')
      {

    ?>
    <input type="hidden" value="Accessory" id="type">
    <h1>What Accessories are you looking for?</h1>
    <div class="grid-x grid-padding-x">
      <div class="cell medium-4">
        <input type="text" placeholder="Search by name" name="search" id="search">
      </div>
      <div class="cell medium-4">
        <select required name="console_id" id="console_id">
     <option value="">Search by console</option>
    <option ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
  </select>
   <input type="hidden" value="" id="genre_id">
      </div>
 <div class="cell medium-4">
        <button class="button expanded" ng-click="getSearch('1')">Search</button>
</div>
 </div>
<?php
}

?>

 <?php 
      if($page[5] == 'console.php')
      {

    ?>
    <input type="hidden" value="Console" id="type">
    <h1>What Consoles are you looking for?</h1>
    <div class="grid-x grid-padding-x">
      <div class="cell medium-4">
        <input type="text" placeholder="Search by name" name="search" id="search">
      </div>
      <div class="cell medium-4">
        <select required name="console_id" id="console_id">
     <option value="">Search by console</option>
    <option ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
  </select>
      </div>
      <input type="hidden" value="" id="genre_id">
      
 <div class="cell medium-4">
        <button class="button expanded" ng-click="getSearch('1')">Search</button>
</div>
 </div>
<?php
}

?>
   
  </div>

  <div class="bottom-content-section" data-magellan data-threshold="0">
    <a href="#main-content-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
  </div>

</div>
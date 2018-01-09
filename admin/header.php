<?php
session_start();
if($_SESSION["login"] != "ok")
{
  header('location: login.php');
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/svg/foundation-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

      <script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
  <script type="text/javascript" src="fusioncharts/fusioncharts.charts.js"></script>
  <script type="text/javascript" src="fusioncharts/fusioncharts.powercharts.js"></script>
  <script type="text/javascript" src="fusioncharts/fusioncharts.zoomscatter.js"></script>
  <script type="text/javascript" src="fusioncharts/fusioncharts.maps.js"></script>
  <script type="text/javascript" src="fusioncharts/maps/fusioncharts.worldwithcountries.js"></script>
  <script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.fint.js"></script>
  </head>
  <body>
    <div class="admin" ng-app="myApp" ng-controller="myCtrl">
   <div class="sm_admin-header">
<h1>Welcome Admin</h1>

   </div>

      <div class="sm_admin-sidebar">
<h1>Dashboard</h1>
<ul class="menu vertical">
  <li class="menu_li is-active" id="m_0"><a href="index.php" id="m_0" ng-click="changePage(0)"><i class="fi-home"></i> Home</a></li>
  <li class="menu_li " id="m_1" ><a href="addproducts.php" ng-click="changePage(1)"><i class="fi-plus"></i> Add Inventory</a></li>
  <li class="menu_li " id="m_2"><a href="inventory.php"  ng-click="changePage(2)"><i class="fi-list-thumbnails"></i> Inventory</a></li>
   <li><a href="logout.php"><i class="fi-unlock"></i> Logout</a></li>
</ul>

   </div>



<div class="container">
  <div class="inner_container">

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/foundation-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>
  <body>
    <div class="row admin Login-formContainer" ng-app="myApp" ng-controller="myCtrl">
<center><h1>LOG IN TO YOUR ACCOUNT</h1>
  <div class="row">
<form method="post" action="query.php" id="myform" data-abide novalidate>
 <div data-abide-error class="alert callout" data-closable style="display: none;">
  <button class="close-button" aria-label="Close alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
    <p><i class="fi-alert"></i> Login Failed or you do not have access.</p>
  </div>
  <div class="LoginForm-inputContainer">
  <label id="email_lb" class="login_label ">Username</label>
<input type="text" ng-model="email" name="email" id="email" class="input_cust" required>
</div>
  <div class="LoginForm-inputContainer">
 <label id="pass_lb" class="login_label ">Password</label>
<input type="password" ng-model="pass" name="password" id="pass" class="input_cust" required>
</div>
  <div class="LoginForm-inputContainer">
<input type="submit" id="btn-login" name="submit" class="button expanded " value="Login">
</div>
</form></center>
</div>


</div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>

  </body>
</html>

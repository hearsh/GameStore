Foundation.Abide.defaults.patterns['number_only'] = /^[+]?\d*(?:[\,]\d+)?$/;
Foundation.Abide.defaults.patterns['price'] = /^[+]?\d*(?:[\.\,]\d+)?$/;
$(document).foundation();



  $(document).ready(function() {
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http, $filter, $sce) {
$scope.email = "";
$scope.pass = "";


        setTimeout(function(){$('.alert').fadeOut(10000);}, 1000);

$("#email").focus(function(){
 $("#email_lb").addClass("login_label_after");
});
$("#email").focusout(function(){
    if($scope.email == "")
  {
 $("#email_lb").removeClass("login_label_after");
}
});

$("#pass").focus(function(){
 $("#pass_lb").addClass("login_label_after");
});
$("#pass").focusout(function(){
    if($scope.pass == "")
  {
 $("#pass_lb").removeClass("login_label_after");
}
});

$("#myform").submit(function(e){
  $('#btn-login').addClass('disabled');
  e.preventDefault();
  
var email = $('#email').val();
var pass = $('#pass').val();

 $.ajax({

                url: 'query.php',
                data: 'email='+email+'&password='+pass,
                type: 'POST',

                success: function(data){
     var e = data;
     console.log(e);
     if(e == 1)
     {
      window.location = "index.php";
     } 
     if(e == 0)
     {
$('.alert').fadeIn();
          setTimeout(function(){ 
             $('.alert').fadeOut(10000);
              $('#btn-login').removeClass('disabled');
   });
     }   
                  
                 
                },
                error: function(error){
                  $('#btn-login').removeClass('disabled');
                $('.alert').fadeIn();
          setTimeout(function(){ 
             $('.alert').fadeOut(10000);
   });                   
      console.log(error);

  },
              
                
              });

});


});

});




    

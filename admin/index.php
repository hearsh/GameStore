<?php
include('header.php');
?>
<div ng-init="genContent()" ></div>
 <div class="row">
 	<div class="medium-6 columns center">
<h4>Total orders processed till now : {{process}}</h4>

</div>
<div class="medium-6 columns center">
<h4>Total orders processed today : {{today}}</h4>
</div>
<hr/>
 </div>
 <div class="row">
 	<div class="medium-6 columns" style="padding:0px;">
<div id="chart-container-1">FusionCharts will render here</div>
</div>
<div class="medium-6 columns" style="padding:0px;">
<div id="chart-container-2">FusionCharts will render here</div>
</div>
 </div>
 <div class="row">
<div class="medium-6 columns" style="padding:0px;">
<div id="chart-container-3">FusionCharts will render here</div>
</div>
<div class="medium-6 columns" style="padding:0px;">
<div id="chart-container-4">FusionCharts will render here</div>
</div>

 </div>
 <div class="row rown">
<div class="medium-12 columns">
	<h4>All Processed Orders</h4>
<table class="hover unstriped bord">
        <thead>
          <tr>
            <th>Transaction Id</th>
            <th>Customer Name</th>
            <th>Datee</th>
            <th>Total Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in topList">
                <td>{{x.transaction_id}}</td>
                <td>{{x.first_name}} {{x.last_name}}</td>
                <td>{{x.date}}</td>
                <td>{{x.total_amount}}</td>
                </tr>
          
        </tbody>
      </table>

</div>
 </div>



<?php
include('footer.php');
?>




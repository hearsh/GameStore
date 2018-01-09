<?php
include('header.php');
?>
 <div data-abide-error class="alert callout" id="error" data-closable style="display: none;">
  <button class="close-button" aria-label="Close alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
   <i class="fi-alert"></i> {{errMsg}}
  </div>
  <div class="row">
<div class="medium-12 columns">
  <h3>Products</h3>
  <div class="input-group">
  <span class="input-group-label">Search</span>
  <input type="text" placeholder="search" style="margin:0px;" ng-model="search">
</div>

</div>
  </div>
<div class="row">
<div class="medium-12 columns">
    <div class="callout" ng-repeat="x in products | filter:search">
      <div class="row">
<div class="medium-2 columns">
 <p>
Class : {{x.class}}
</p> 
<p>
Name : {{x.name}}
</p>
</div>
<div class="medium-2 columns">
<p>
Quantity : {{x.inventory_quantity}}
</p>
<p>
Price : ${{x.price}}
</p>
</div>
<div class="medium-6 columns">
<p>Description<br/>
{{x.description}}
</p>
  </div>
  <div class="medium-2 columns">
<a href="addproducts.php?id={{x.product_id}}&store_id={{x.store_id}}" class="button success">Edit</a>
<button class="button alert" ng-click="delete(x.product_id, x.name)">Delete</button>
  </div>
      </div>


</div>


</div>
</div> 
<?php
include('footer.php');
?>




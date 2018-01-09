
<?php
include('header.php');
?>
<div ng-init="loadData('Console')" ></div>


<div id="main-content-section-search" style="display:none;">
  <div class="grid-x grid-container rown grid-padding-x">
      <div class="medium-3 medium-offset-3 cell">
        <select id="sortValueSearch">
          <option value="">Select a value to sort by</option>
          <option value="name">Name</option>
          <option value="price">Price</option>
        </select>
      </div>
      <div class="medium-3 cell">
        <button ng-click="getSearch('2')" class="button expanded">Sort my search</button>
      </div>

    </div>
<div class="grid-x grid-container rown grid-padding-x">
    <div class="cell">
    <h2 class="center">Your search</h2>
    <hr class="center-ball" />
  </div>
<div class="cell medium-4 " ng-repeat="x in pageSearch">
<div class="card card-product">
  <div class="card-product-img-wrapper">
    <a ng-click="addCart(x.product_id, $index)" class="button expanded">Add to Cart</a>
    <a ><img src="api/{{x.image}}"></a>
  </div>
  <div class="card-section">
    <a href="#"><h5 class="card-product-name">{{x.name}}</h5></a>
    <h5 class="card-product-price">${{x.price}}</h5>
    <p>
      <select id="quantity_{{$index}}" required>
          <option value="">Select a quantity</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
        </select>
    </p>
    <p>
      <label>Enter Zipcode to check availability
<input type="number" name="zipcode" id="zipcode_{{$index}}">
</label>
    </p>
    <p class="card-product-description">{{x.description}}</p>
  </div>
</div>

</div>
</div>

</div>

<div class="grid-x grid-container rown grid-padding-x">
      <div class="medium-3 medium-offset-3 cell">
        <input type="hidden" id="sort_id" value="Console">
        <select id="sortValue">
          <option value="">Select a value to sort by</option>
          <option value="name">Name</option>
          <option value="price">Price</option>
        </select>
      </div>
      <div class="medium-3 cell">
        <button ng-click="Sort()" class="button expanded">Sort my search</button>
      </div>

    </div>

<div id="main-content-section" data-magellan-target="main-content-section">

 <div class="grid-x grid-container rown grid-padding-x">
    <div class="cell">
    <h2 class="center">Console</h2>
    <hr class="center-ball" />
  </div>
<div class="cell medium-4 " ng-repeat="x in pageData">
<div class="card card-product">
  <div class="card-product-img-wrapper">
    <a ng-click="addCart(x.product_id, $index)" class="button expanded">Add to Cart</a>
    <a ><img src="api/{{x.image}}"></a>
  </div>
  <div class="card-section">
    <a href="#"><h5 class="card-product-name">{{x.name}}</h5></a>
    <h5 class="card-product-price">${{x.price}}</h5>
    <p>
      <select id="quantity_{{$index}}" required>
          <option value="">Select a quantity</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
        </select>
    </p>
    <p>
      <label>Enter Zipcode to check availability
<input type="number" name="zipcode" id="zipcode_{{$index}}">
</label>
    </p>
    <p class="card-product-description">{{x.description}}</p>
  </div>
</div>

</div>
</div>

</div>


<?php
include('footer.php');
?>
<?php
include('header.php');
include('../api/config/config.php');
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$name=$quantity=$price=$console=$genre=$class=$desc='';
$store_id = isset($_REQUEST["store_id"]) ? $_REQUEST["store_id"] : '';
$image = isset($_REQUEST['image']) ? $_REQUEST['image'] : '';
if($id != '')
{

$sql = "SELECT * FROM product p, inventory i
where p.product_id = '$id' and i.product_id = '$id'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $desc = $row["description"];
        $price = $row["price"];
        $quantity = $row["quantity"];
        $class = $row["class"];
        $console = $row["console_id"];
        $genre = $row["genre_id"];
        if($image != 'change')
        {
        $image = $row["image"];
        }
        else
        {
          $image = '';
        }
    }
    
} else {
    echo "Error there be in the force";
}

}

?>

 <div data-abide-error id="error" class="alert callout" data-closable style="display: none;">
  <button class="close-button" aria-label="Close alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
    <p><i class="fi-alert"></i> {{errMsg}}</p>
  </div>
<div class="row">
<div class="medium-12 columns">


<ul class="tabs" data-tabs id="example-tabs">
  <li class="tabs-title is-active"><a data-tabs-target="panel3" href="#panel3">Add Product</a></li>
  <li class="tabs-title"><a href="#panel1" aria-selected="true">Add Genre</a></li>
  <li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">Add Console type</a></li>
  <li class="tabs-title"><a data-tabs-target="panel4" href="#panel4">Add Store</a></li>
</ul>

<div class="tabs-content" data-tabs-content="example-tabs">

  <div class="tabs-panel" id="panel3">
    <fieldset class="fieldset">
  <legend>Add a new Product</legend>
  <form method="post" action="../api/addProduct.php" enctype="multipart/form-data" data-abide novalidate>
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
 <div class="row">
<div class="medium-4 columns">
 <label>Enter Name
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="" required>
        <span class="form-error">
          This field cannot be empty.
        </span>
      </label>
</div>
<div class="medium-4 columns">
 <label>Enter Quantity
        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>" placeholder="" pattern="number_only" required>
        <span class="form-error">
          Incorrect data or empty value.
        </span>
      </label>
</div>

<div class="medium-4 columns">
 <label>Enter Price
        <input type="number" name="price" id="price" placeholder="" value="<?php echo $price; ?>" pattern="price" required>
        <span class="form-error">
          Incorrect data or empty value.
        </span>
      </label>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label>Select Console
  <select required name="console_id" id="console_id">
     <option value="">Select an option</option>
     <option ng-if="x.id =='<?php echo $console; ?>'" selected ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
    <option ng-if="x.id !='<?php echo $console; ?>'" ng-repeat="x in consolenames" value="{{x.id}}">{{x.name}}</option>
  </select>
  <span class="form-error">
          This cannot be left empty.
        </span>
</label>
</div>
<div class="medium-3 columns">
<label>Select Genre
  <select required name="genre_id" id="genre_id">
    <option value="">Select an option</option>
    <option ng-if="x.id =='<?php echo $genre; ?>'" selected ng-repeat="x in genrenames" value="{{x.id}}">{{x.name}}</option>
    <option ng-if="x.id !='<?php echo $genre; ?>'" ng-repeat="x in genrenames" value="{{x.id}}">{{x.name}}</option>
  </select>
    <span class="form-error">
          This cannot be left empty.
        </span>
</label>
</div>
<div class="medium-3 columns">
<label>Select Class
  <select required name="class" id="class">
    <option value="">Select an option</option>
    <?php 
    if($class != '')
    {
      echo '<option selected value="'.$class.'">'.$class.'</option>';
    }
    ?>
    
    <option value="Game">Games</option>
    <option value="Accessory">Accessory</option>
    <option value="Console">Console</option>
  </select>
    <span class="form-error">
          This cannot be left empty.
        </span>
</label>
</div>

<div class="medium-3 columns">
<label>Select Store
  <select required name="store" id="store">
    <option value="">Select an option</option>
    <?php 
    if($store != '')
    {
      echo '<option selected value="'.$store.'">'.$store.'</option>';
    }
    ?>
    <option ng-if="x.store_id =='<?php echo $store_id; ?>'" selected ng-repeat="x in store" value="{{x.store_id}}">{{x.street}}</option>
    <option ng-repeat="x in store" value="{{x.store_id}}">{{x.street}}</option>
  </select>
    <span class="form-error">
          This cannot be left empty.
        </span>
</label>
</div>
  </div>
<div class="row">
<div class="medium-12 columns">
<label>Add Description
<textarea name="description" rows="4" cols="4" id="description" placeholder="Enter a description here" required>
<?php
echo $desc;
?>
</textarea>
  <span class="form-error">
          This cannot be left empty.
        </span>
</label>

</div>
  </div>
<div class="row">
  <div class="medium-6 medium-centered columns">
    <div class="row">
<div class="medium-6 columns">

  <?php
if($image == '')
{
  ?>
<label for="FileUpload" class="button expanded">Upload a image File</label>
<input type="file" name="FileUpload" id="FileUpload" accept="image/*" class="show-for-sr" required>
  <span class="form-error">
          This cannot be left empty.
        </span>

<?php
}
?>

  <?php
if($image != '')
{
  ?>
  <div class="row">
    <div class="medium-8 columns">
<div class="thumbnail">
      <img src="../api/<?php echo $image; ?>">
      <input type="hidden" value="<?php echo $image; ?>" name="image">
    </div>
    </div>
    <div class="medium-4 columns">
      <a href="addproducts.php?id=<?php echo $id; ?>&image=change" class="button">Change</a>
    </div>
  </div>

<?php
}
?>
</div>
<div class="medium-6 columns">
 <button class="button expanded" type="submit" value="Submit">Submit</button>
  </div>
</div>
</div>

</div>

</form>
</fieldset>

 </div>

  <div class="tabs-panel is-active" id="panel1">

<fieldset class="fieldset">
  <legend>Add a new Genre</legend>
 <div class="row">
<div class="medium-12 columns">
<div class="input-group">
  <span class="input-group-label">Enter a Genre Name</span>
  <input class="input-group-field" name="genrename" id="genrename" type="text" >
  <div class="input-group-button">
    <input type="submit" class="button" ng-click="AddType('1')" value="Submit">
  </div>
</div>

</div>

 </div>

</fieldset>

 <table class="hover unstriped bord">
        <thead>
          <tr>
            <th>Genre Id</th>
            <th>Genre Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in genrenames">
                <td>{{x.id}}</td>
                <td>{{x.name}}</td>
                <td><i ng-click="deleteGenre(x.id, x.name, 'genre')" class='fi-trash'></i></td>
                </tr>
          
        </tbody>
      </table>

    </div>
  <div class="tabs-panel" id="panel2">
    <fieldset class="fieldset">
  <legend>Add a new Console</legend>
 <div class="row">
<div class="medium-12 columns">
<div class="input-group">
  <span class="input-group-label">Enter a Console Name</span>
  <input class="input-group-field" name="consolename" id="consolename" type="text" >
  <div class="input-group-button">
    <input type="submit" class="button" ng-click="AddType('2')" value="Submit">
  </div>
</div>

</div>

 </div>
 <table class="hover unstriped bord">
        <thead>
          <tr>
            <th>Console Id</th>
            <th>Console Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in consolenames">
                <td>{{x.id}}</td>
                <td>{{x.name}}</td>
                <td><i ng-click="deleteGenre(x.id, x.name, 'console')" class='fi-trash'></i></td>
                </tr>
          
        </tbody>
      </table>

</fieldset>

 </div>


   <div class="tabs-panel" id="panel4">
    <fieldset class="fieldset">
  <legend>Add a new Store</legend>
 <div class="row">
<div class="medium-4 columns">
   <label>Enter street
       <input type="text" required id="street" name="street" >
      </label>
</div>
<div class="medium-4 columns">
   <label>Enter city
       <input type="text" required id="city" name="city" >
      </label>
</div>
<div class="medium-4 columns">
   <label>Enter State
       <input type="text" required id="state" name="state" >
      </label>
</div>
 </div>
  <div class="row">
<div class="medium-4 columns">
   <label>Enter Zipcode
       <input type="number" maxlength="5"  required id="zipcode" name="zipcode" >
      </label>
</div>
<div class="medium-4 columns">
   <label>Enter Region
       <select name="region" id="region">
        <option value="">Please select a region</option>
        <option ng-repeat='x in regionnames' value="{{x.id}}">{{x.name}}</option>
       </select>
      </label>
</div>

<div class="medium-4 columns">
   <label>Enter Manager
       <select name="employee" id="employee">
        <option value="">Please select a manager</option>
        <option ng-repeat='x in employeenames' value="{{x.id}}">{{x.first_name}} {{x.last_name}}</option>
       </select>
      </label>
</div>

</div>
<div class="row">
<div class="medium-4 columns">
<button ng-click="addStore()" class="button expanded">Add Store</button>
</div>
</div>


 <table class="hover unstriped bord">
        <thead>
          <tr>
            <th>Store id</th>
            <th>Address</th>
            <th>Manager</th>
            <th>Region</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="x in store">
                <td>{{x.store_id}}</td>
                <td>{{x.street}}, {{x.city}}, {{x.state}}, {{x.zipcode}}</td>
                <td>{{x.first_name}} {{x.last_name}}</td>
                <td>{{x.name}}</td>
                <td><i ng-click="deleteStore(x.store_id, x.address_id)" class='fi-trash'></i></td>
                </tr>
          
        </tbody>
      </table>

</fieldset>

 </div>



</div>


</div>
</div>


<?php
include('footer.php');
?>




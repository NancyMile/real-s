<?php
  require '../../includes/config/database.php';
  $db = connectionDD();

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo"<pre>";
    //   var_dump($_POST);
    // echo"</pre>";

    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $rooms = $_POST['rooms'];
    $bathrooms = $_POST['bathrooms'];
    $garages = $_POST['garages'];
    $sellerId = $_POST['sellerId'];

    //save record on db
    $query = "INSERT INTO properties (title,price,description,rooms,bathrooms,garages,seller_id)
      VALUES('$title',$price,'$description','$rooms','$bathrooms','$garages','$sellerId')";
    //echo $query;
    $result = mysqli_query($db,$query);
    if($result){
      echo "Saved!!";
    }
  }

  require '../../includes/functions.php';
  addTemplate('header');
?>
<main class="contenedor section">
    <h1>Create</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <form class="formulario" method="POST" action="/admin/properties/create.php">
      <fieldset>
        <legend>Genral Info</legend>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="price">
        <label for="title">Image</label>
        <input type="file" id="image" accept="image/jpeg,image/png">
        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
      </fieldset>
      <fieldset>
        <legend>Property Info</legend>
        <label for="rooms">Rooms</label>
        <input type="number" id="rooms" name="rooms" min="1" max="9" placeholder="Eg: 3">
        <label for="bathrooms">Bathrooms</label>
        <input type="number" id="bathrooms" name="bathrooms" min="1" max="4" placeholder="Eg: 3">
        <label for="garages">Garages</label>
        <input type="number" id="garages" name="garages" min="1" max="3" placeholder="Eg: 3">
      </fieldset>
      <fieldset>
        <legend>Seller Info</legend>
        <label for="name">Name</label>
        <select name="sellerId">
          <option value="" selected disabled>-- Select --</option>
          <option value="1">Nancy</option>
          <option value="2">Maria</option>
        </select>
      </fieldset>
      <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
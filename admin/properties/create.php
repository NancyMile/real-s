<?php
  require '../../includes/app.php';
  use App\Property;

  authenticated();

  $db = connectionDB();

  //get sellers
  $query = "SELECT * FROM sellers";
  $result = mysqli_query($db,$query);

  $title = '';
  $price = '';
  $description = '';
  $rooms = '';
  $bathrooms = '';
  $garages = '';
  $sellerId = '';

  //executes after the user sends the form
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $property = new Property($_POST);
    $errors = $property->validate();

    //check that $errors array is empty
    if(empty($errors)){
      /** upload files **/

      //create folder
      $imagesFolder = '../../images/';
      //check if the folder already exists
      if(!is_dir($imagesFolder)){
        mkdir($imagesFolder);
      }
      // generate a unique imagename
      $imageName = md5(uniqid(rand(),true)).".jpg";

      //upload the image
      move_uploaded_file($image['tmp_name'],$imagesFolder.$imageName);
      //exit;

      $property->saving();
    }
  }
  addTemplate('header');
?>
<main class="contenedor section">
    <h1>Create</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>
    <?php if(isset($message)): ?>
      <div class="alert message">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <form class="formulario" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
      <fieldset>
        <legend>Genral Info</legend>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title" value="<?php echo $title; ?>">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="price" value="<?php echo $price; ?>">
        <label for="title">Image</label>
        <input type="file" id="image" accept="image/jpeg,image/png" name="image">
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo $description; ?></textarea>
      </fieldset>
      <fieldset>
        <legend>Property Info</legend>
        <label for="rooms">Rooms</label>
        <input type="number" id="rooms" name="rooms" min="1" max="9" placeholder="Eg: 3" value="<?php echo $rooms; ?>">
        <label for="bathrooms">Bathrooms</label>
        <input type="number" id="bathrooms" name="bathrooms" min="1" max="4" placeholder="Eg: 3" value="<?php echo $bathrooms; ?>">
        <label for="garages">Garages</label>
        <input type="number" id="garages" name="garages" min="1" max="3" placeholder="Eg: 3" value="<?php echo $garages; ?>">
      </fieldset>
      <fieldset>
        <legend>Seller Info</legend>
        <label for="name">Name</label>
        <select name="seller_id">
          <option value="" selected disabled>-- Select --</option>
            <?php while($seller = mysqli_fetch_assoc($result)) : ?>
              <option <?php echo $seller['id'] === $sellerId ? 'selected': ''; ?> value="<?php echo $seller['id']?>"><?php echo $seller['name'].' '.$seller['lastname'] ?></option>
            <?php endwhile; ?>
        </select>
      </fieldset>
      <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
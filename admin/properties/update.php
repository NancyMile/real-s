<?php
require '../../includes/app.php';
$auth = authenticated();
if(!$auth){
  header('location: /');
}

 // validate url valid ID
 $id =$_GET['id'];
 $id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
 header('Location: /admin');
}
  $db = connectionDB();

  //get specific property
  $query = "SELECT * FROM properties where id = $id";
  $result = mysqli_query($db,$query);
  $property = mysqli_fetch_assoc($result);

   //get sellers
   $query = "SELECT * FROM sellers";
   $result = mysqli_query($db,$query);

  //error messages
  $errors = [];

  $title = $property['title'];
  $price = $property['price'];
  $description = $property['description'];
  $rooms = $property['rooms'];
  $bathrooms = $property['bathrooms'];
  $garages = $property['garages'];
  $sellerId = $property['seller_id'];

  //executes after the user sends the form
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo"<pre>";
    //   var_dump($_POST);
    // echo"</pre>";

    // echo"<pre>";
    //   var_dump($_FILES);
    // echo"</pre>";
    //exit;

    $title = mysqli_real_escape_string($db,$_POST['title']);
    $price = mysqli_real_escape_string($db,$_POST['price']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $rooms = mysqli_real_escape_string($db,$_POST['rooms']);
    $bathrooms = mysqli_real_escape_string($db,$_POST['bathrooms']);
    $garages = mysqli_real_escape_string($db,$_POST['garages']);
    $sellerId = mysqli_real_escape_string($db,$_POST['sellerId']);
    $date = date('Y/m/d');
    $image = $_FILES['image'];
    // var_dump($image['name']);
    // exit;

    if(!$title){
      $errors[] = 'Please enter title';
    }
    if(!$price){
      $errors[] = 'Please enter price';
    }
    if(strlen($description) < 50){
      $errors[] = 'Please enter description min 50 characters';
    }
    if(!$rooms){
      $errors[] = 'Please enter rooms';
    }
    if(!$bathrooms){
      $errors[] = 'Please enter bathrooms';
    }
    if(!$garages){
      $errors[] = 'Please enter garages';
    }
    if(!$sellerId){
      $errors[] = 'Please select the seller';
    }

    //validate size of image (max 100 Kb)
    $size = 1000 * 100;

    if($image['size'] > $size){
      $errors[] = 'Image size must be less that 100 kb';
    }

    // echo"<pre>";
    //   var_dump($errors);
    // echo"</pre>";
    //exit;

    //check that $errors array is empty
    if(empty($errors)){
      /** upload files **/

      //create folder
      $imagesFolder = '../../images/';
      //check if the folder already exists
      if(!is_dir($imagesFolder)){
        mkdir($imagesFolder);
      }

      $imageName = '';
      //check if the image already exists
      if($image['name']){
        unlink($imagesFolder.$property['image']);

        // generate a unique imagename
        $imageName = md5(uniqid(rand(),true)).".jpg";

        //upload the image
        move_uploaded_file($image['tmp_name'],$imagesFolder.$imageName);
        //exit;
      }else{
        $imageName = $property['image'];
      }

      //update record on db
      $query = "UPDATE properties SET title = '$title', price = $price, image = '$imageName ', description = '$description', rooms = $rooms,
      bathrooms = $bathrooms, garages = $garages, seller_id = $sellerId WHERE id = $id";
      // echo $query;
      // exit;

      $result = mysqli_query($db,$query);
      if($result){
      // redirect to admin
      header('Location: /admin?result=2');
      }
    }
  }

  addTemplate('header');
?>
<main class="contenedor section">
    <h1>Update Property</h1>
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

    <form class="formulario" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Genral Info</legend>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title" value="<?php echo $title; ?>">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="price" value="<?php echo $price; ?>">
        <label for="title">Image</label>
        <input type="file" id="image" accept="image/jpeg,image/png" name="image">
        <img src="/images/<?php echo $property['image'] ; ?>" alt="image" class="image-small">
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
        <select name="sellerId">
          <option value="" selected disabled>-- Select --</option>
            <?php while($seller = mysqli_fetch_assoc($result)) : ?>
              <option <?php echo $seller['id'] === $sellerId ? 'selected': ''; ?> value="<?php echo $seller['id']?>"><?php echo $seller['name'].' '.$seller['lastname'] ?></option>
            <?php endwhile; ?>
        </select>
      </fieldset>
      <input type="submit" value="Update" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
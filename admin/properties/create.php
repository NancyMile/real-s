<?php
  require '../../includes/app.php';
  use App\Property;
  use Intervention\Image\ImageManagerStatic as Image;

  authenticated();

  $db = connectionDB();

  //get sellers
  $query = "SELECT * FROM sellers";
  $result = mysqli_query($db,$query);

  //executes after the user sends the form
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //create a new instance
    $property = new Property($_POST);

    // generate a unique imagename
    $imageName = md5(uniqid(rand(),true)).".jpg";

    if($_FILES['image']['tmp_name']){
      //resize image with  intervention image
      $image = Image::make($_FILES['image']['tmp_name'])->fit(800,600);
      $property->setImage($imageName);
    }

    $errors = $property->validate();

    //check that $errors array is empty
    if(empty($errors)){
      //create folder for uploading images
      if(!is_dir(IMAGES_FOLDER)){
        mkdir(IMAGES_FOLDER);
      }

      ///save image on server
      $image->save(IMAGES_FOLDER.$imageName);

      //save on db
      $result = $property->saving();

      if($result){
        //redirect user
        header('location: /admin?result=1');
      }
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
    <?php include '../../includes/templates/form_properties.php'; ?>
    <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
use App\Property;
use Intervention\Image\Image;

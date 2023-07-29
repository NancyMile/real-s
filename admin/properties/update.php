<?php

use App\Property;
use App\Seller;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
authenticated();

// validate url valid ID
 $id =$_GET['id'];
 $id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
 header('Location: /admin');
}

  $property = Property::find($id);

  //get sellers
  $sellers = Seller::all();
  //error messages
  $errors = Property::getErrors();

  //executes after the user sends the form
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //debugear($_POST);
    $args = $_POST['property'];

    $property->sincronnise($args);
    //debugear($property);

    $errors = $property->validate();
     //debugear($errors);

    // generate a unique imagename
    $imageName = md5(uniqid(rand(),true)).".jpg";

    //debugear($_FILES['property']);

    if($_FILES['property']['tmp_name']['image']){
      //resize image with  intervention image
      $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
      $property->setImage($imageName);
    }

    //check that $errors array is empty
    if(empty($errors)){
      if($_FILES['property']['tmp_name']['image']){
        //save image
        $image->save(IMAGES_FOLDER.$imageName);
      }
        //update record
        $result = $property->saving();
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
      <?php include '../../includes/templates/form_properties.php' ?>
      <input type="submit" value="Update" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
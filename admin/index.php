<?php
  require '../includes/app.php';
  authenticated();
  use App\Property;
  use App\Seller;

   //Implement a method to get the properties using active record
    $properties = Property::all();
    $sellers = Seller::all();

  //display conditional message
  $result = $_GET['result'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $id = $_POST['id'];
  $id = filter_var($id,FILTER_VALIDATE_INT);

  if($id){
    $type = $_POST['type'];

    if(validateContentType($type)){
      //is valid type
      if($type === 'property'){
        //remove the file
        $property = Property::find($id);
        $property->delete();
      }elseif($type === 'seller'){
        //remove the file
        $seller = Seller::find($id);
        $seller->delete();
      }
    }
  }
}
addTemplate('header');
?>
<main class="contenedor section">
    <h1>Admin Page</h1>
    <?php $message = displayMessages(intval($result));
      if($message){ ?>
        <p class="alert success"> <?php echo sanitizingHtml($message); ?> </p>
      <?php } ?>
    <a href="/admin/properties/create.php" class="btn btn-green">Create Property</a>
    <a href="/admin/sellers/create.php" class="btn btn-yellow">Create Seller</a>
      <h2>Properties</h2>
    <table class="properties">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Image</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- display results-->
      <tbody>
        <?php foreach($properties as $property): ?>
        <tr>
          <td><?php echo $property->id;?></td>
          <td><?php echo $property->title;?></td>
          <td><img src="/images/<?php echo $property->image;?>" alt="image" class="image-table"></td>
          <td>$ <?php echo $property->price;?></td>
          <td>
            <a href="/admin/properties/update.php?id=<?php echo $property->id; ?>" class="btn-yellow-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $property->id; ?>">
              <input type="hidden" name="type" value="property">
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <h2>Sellers</h2>
    <table class="properties">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- display results-->
      <tbody>
        <?php foreach($sellers as $seller): ?>
        <tr>
          <td><?php echo $seller->id;?></td>
          <td><?php echo $seller->name. ' '.$seller->lastname;?></td>
          <td><?php echo $seller->phone;?></td>
          <td>
            <a href="/admin/sellers/update.php?id=<?php echo $seller->id; ?>" class="btn-yellow-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
              <input type="hidden" name="type" value="seller">
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</main>
<?php
  addTemplate('footer');
?>
<?php
  require '../includes/app.php';
  authenticated();
  use App\Property;

   //Implement a method to get the properties using active record
    $properties = Property::all();

  //display conditional message
  $result = $_GET['result'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $id = $_POST['id'];
  $id = filter_var($id,FILTER_VALIDATE_INT);

  if($id){
    //remove the file
    $property = Property::find($id);
    $property->delete();
  }
}
addTemplate('header');
?>
<main class="contenedor section">
    <h1>Admin Page</h1>
    <?php if(intval($result) === 1): ?>
      <p class="alert success">Add Created!</p>
    <?php elseif(intval($result) === 2): ?>
    <p class="alert success">Add Updated!</p>
    <?php elseif(intval($result) === 3): ?>
    <p class="alert success">Add Deleted!</p>
    <?php endif; ?>
    <a href="/admin/properties/create.php" class="btn btn-green">Create</a>

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
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>

    </table>

</main>
<?php
  //close connection
  mysqli_close($db);
  addTemplate('footer');
?>
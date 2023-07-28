<?php
  require '../includes/app.php';
  addTemplate('header');
  $auth = authenticated();
  if(!$auth){
    header('location: /');
  }

  //import the conection
  $db = connectionDB();

  //query
  $query = "SELECT * FROM properties";
  $resultQuery = mysqli_query($db,$query);

  //display conditional message
  $result = $_GET['result'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $id = $_POST['id'];
  $id = filter_var($id,FILTER_VALIDATE_INT);

  if($id){
    //remove the file
    $query = "SELECT image FROM properties WHERE id = $id";
    $result = mysqli_query($db,$query);
    $property = mysqli_fetch_assoc($result);

    unlink('../images/'.$property['image']);

    //remove  property
    $query = "DELETE FROM properties WHERE id = $id";
    $result = mysqli_query($db,$query);

    if($result){
      header('Location: /admin?result=3');
    }
  }
}
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
        <?php while($propiety = mysqli_fetch_assoc($resultQuery)): ?>
        <tr>
          <td><?php echo $propiety['id'];?></td>
          <td><?php echo $propiety['title'];?></td>
          <td><img src="/images/<?php echo $propiety['image'];?>" alt="image" class="image-table"></td>
          <td>$ <?php echo $propiety['price'];?></td>
          <td>
            <a href="/admin/properties/update.php?id=<?php echo $propiety['id']; ?>" class="btn-yellow-block">Update</a>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $propiety['id']; ?>">
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>

    </table>

</main>
<?php
  //close connection
  mysqli_close($db);
  addTemplate('footer');
?>
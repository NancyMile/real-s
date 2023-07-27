<?php
  //import the conection
  require '../includes/config/database.php';
  $db = connectionDB();

  //query
  $query = "SELECT * FROM properties";
  $resultQuery = mysqli_query($db,$query);

  //display conditional message
  $result = $_GET['result'] ?? '';

  //includes template
  require '../includes/functions.php';
  addTemplate('header');
?>
<main class="contenedor section">
    <h1>Admin Page</h1>
    <?php if(intval($result) === 1): ?>
      <p class="alert success">Add Created!</p>
    <?php elseif(intval($result) === 2): ?>
    <p class="alert success">Add Updated!</p>
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
            <a href="#" class="btn-red-block">Delete</a>
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
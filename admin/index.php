<?php
  require '../includes/functions.php';
  addTemplate('header');

  $result = $_GET['result'] ?? '';
?>
<main class="contenedor section">
    <h1>Admin Page</h1>
    <?php if(intval($result) === 1): ?>
      <p class="alert success">Add Created!</p>
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
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td><img src="/images/" alt="image" class="image-table"></td>
          <td></td>
          <td>
            <a href="#" class="btn-yellow-block">Update</a>
            <a href="#" class="btn-red-block">Delete</a>
          </td>
        </tr>
      </tbody>

    </table>

</main>
<?php addTemplate('footer'); ?>
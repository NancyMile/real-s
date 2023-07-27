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
</main>
<?php addTemplate('footer'); ?>
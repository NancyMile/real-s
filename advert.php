<?php
  require 'includes/app.php';
  addTemplate('header');
?>
    <main class="contenedor section">
      <h1>Adverts</h1>
      <?php
        $limit = 9;
        include 'includes/templates/adverts.php';?>
    </main>
    <?php addTemplate('footer'); ?>
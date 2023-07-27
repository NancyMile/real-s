<?php
  require 'includes/functions.php';
  addTemplate('header');
?>
    <main>
      <h1>Adverts</h1>
      <?php
        $limit = 9;
        include 'includes/templates/adverts.php';?>
    </main>
    <?php addTemplate('footer'); ?>
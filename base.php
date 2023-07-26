<?php
  require 'includes/functions.php';
  addTemplate('header');
?>
  <body>
    <header class="header">
      <div class="contenedor header-content">
        <div class="bar">
          <a href="/">
            <img src="build/img/logo.svg" alt="logo" />
          </a>
          <div class="menu-mobile">
            <img src="build/img/barras.svg" alt="menu">
          </div>
          <div class="right">
            <img class="dark-mode-button" src="build/img/dark-mode.svg">
            <nav class="navigation">
              <a href="about.php">About</a>
              <a href="advert.php">Adverts</a>
              <a href="blog.php">Blog</a>
              <a href="contact.php">Contact Us</a>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <main>
      <h1>Pagina</h1>
    </main>
    <?php addTemplate('footer'); ?>
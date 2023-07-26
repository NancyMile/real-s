<?php
  include './includes/templates/header.php';
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
    <main class="contenedor section">
      <h1>Contact Us</h1>
       <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp">
          <source srcset="build/img/destacada3.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/destacada3.jpg" alt="contact">
       </picture>
       <h2>Please fill the form.</h2>
       <form class="formulario">
        <fieldset>
          <legend>Personal Information</legend>
          <label for="name">Name</label>
          <input type="text" name="name" id="name"placeholder="name">
          <label for="email">Email</label>
          <input type="email" name="email" id="email"placeholder="email">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone"placeholder="phone">
          <label for="message">Message</label>
          <textarea id="message"></textarea>
        </fieldset>
        <fieldset>
          <legend>Property Information</legend>
          <label for="options">Sell or Rent</label>
          <select id="options">
            <option value="" disabled selected>-- Select --</option>
            <option value="sell">Sell</option>
            <option value="rent">Rent</option>
          </select>
          <label for="price">Price</label>
          <input type="number" min="1" name="price" id="price" placeholder="price">
        </fieldset>
        <fieldset>
          <legend>Contact</legend>
          <p>Best way to contact</p>
          <div class="contact-by">
            <label for="contact-phone">Phone</label>
            <input type="radio" name="contact" value="phone" id="phone">
            <label for="contact-email">Email</label>
            <input type="radio" name="contact" value="email" id="email">
          </div>
          <p>For phone call please select:</p>
          <label for="date">date</label>
          <input type="date" id="date">
          <label for="time">time</label>
          <input type="time" id="time" min="09:00" max="17:00">
        </fieldset>
        <input type="submit" value="Send" class="btn-green">
       </form>
    </main>
    <footer class="footer section">
      <div class="contenedor contenedor-footer">
        <nav class="navigation">
          <a href="about.php">About</a>
          <a href="advert.php">Adverts</a>
          <a href="blog.php">Blog</a>
          <a href="contact.php">Contact Us</a>
        </nav>
      </div>
      <p class="copyright">All Rights reserved.</p>
    </footer>
    <script src="build/js/bundle.min.js"></script>
  </body>
</html>
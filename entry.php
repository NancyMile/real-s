<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Real State</title>
    <link rel="stylesheet" href="build/css/app.css" />
  </head>
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
              <a href="about.html">About</a>
              <a href="advert.html">Adverts</a>
              <a href="blog.html">Blog</a>
              <a href="contact.html">Contact Us</a>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <main  class="contenedor section contenido-centrado">
      <h1>Beach House</h1>
      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="advert view">
      </picture>
      <div class="resume">
        <p class="info-meta">Published: <span>02/07/2023</span> by: <span>Admin</span></p>
        <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book.
        </p>
        <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book.
        </p>
      </div>
    </main>
    <footer class="footer section">
      <div class="contenedor contenedor-footer">
        <nav class="navigation">
          <a href="about.html">About</a>
          <a href="advert.html">Adverts</a>
          <a href="blog.html">Blog</a>
          <a href="contact.html">Contact Us</a>
        </nav>
      </div>
      <p class="copyright">All Rights reserved.</p>
    </footer>
    <script src="build/js/bundle.min.js"></script>
  </body>
</html>
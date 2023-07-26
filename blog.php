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
    <main class="contenedor section contenido-centrado">
      <h1>Our Blog</h1>
      <article class="entry-blog">
        <div class="image">
          <picture>
            <source srcset="build/img/blog3.webp" type="image/webp" />
            <source srcset="build/img/blog3.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/blog3.jpg" alt="blog" />
          </picture>
        </div>
        <div class="text-entry">
          <a href="entry.php">
            <h4>Balcony, stunning views.</h4>
            <p>Published: <span>02/07/2023</span> by: <span>Admin</span></p>
            <p>
              orem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy
              text ever since the 1500s, when an unknown printer took a
            </p>
          </a>
        </div>
      </article>
      <article class="entry-blog">
        <div class="image">
          <picture>
            <source srcset="build/img/blog4.webp" type="image/webp" />
            <source srcset="build/img/blog4.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/blog4.jpg" alt="blog" />
          </picture>
        </div>
        <div class="text-entry">
          <a href="entry.php">
            <h4>Swimming Pool on terrace.</h4>
            <p>Published: <span>02/07/2023</span> by: <span>Admin</span></p>
            <p>
              orem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy
              text ever since the 1500s, when an unknown printer took a
            </p>
          </a>
        </div>
      </article>
      <article class="entry-blog">
        <div class="image">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp" />
            <source srcset="build/img/blog1.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/blog1.jpg" alt="blog" />
          </picture>
        </div>
        <div class="text-entry">
          <a href="entry.php">
            <h4>Balcony, stunning views.</h4>
            <p>Published: <span>02/07/2023</span> by: <span>Admin</span></p>
            <p>
              orem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy
              text ever since the 1500s, when an unknown printer took a
            </p>
          </a>
        </div>
      </article>
      <article class="entry-blog">
        <div class="image">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp" />
            <source srcset="build/img/blog2.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/blog2.jpg" alt="blog" />
          </picture>
        </div>
        <div class="text-entry">
          <a href="entry.php">
            <h4>Swimming Pool on terrace.</h4>
            <p>Published: <span>02/07/2023</span> by: <span>Admin</span></p>
            <p>
              orem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy
              text ever since the 1500s, when an unknown printer took a
            </p>
          </a>
        </div>
      </article>
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
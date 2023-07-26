<?php
  include './includes/templates/header.php';
?>
    <main>
      <h1>About Us</h1>
      <div class="icons-about">
        <div class="icon">
          <img src="build/img/icono1.svg" alt="icon" loading="lazy" />
          <h3>Security</h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </p>
        </div>
        <!--end icon-->
        <div class="icon">
          <img src="build/img/icono2.svg" alt="icon" loading="lazy" />
          <h3>Price</h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </p>
        </div>
        <!--end icon-->
        <div class="icon">
          <img src="build/img/icono3.svg" alt="icon" loading="lazy" />
          <h3>Time</h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.
          </p>
        </div>
        <!--end icon-->
      </div>
    </main>
    <section class="section contenedor">
      <h2>Properties for sale</h2>
      <div class="container-adverts">
        <div class="advert">
          <picture>
            <source srcset="build/img/anuncio1.webp" type="image/webp" />
            <source srcset="build/img/anuncio1.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/anuncio1.jpg" alt="advert" />
          </picture>
          <div class="content-advert">
            <h3>luxury house on the lake</h3>
            <p>House with great view and price!</p>
            <p class="price">3,000,000</p>
            <ul class="icons-characteristics">
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icon batrooms"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icon garage"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icon rooms"
                />
                <p>4</p>
              </li>
            </ul>
            <a class="btn btn-yellow-block" href="advert.php">Property</a>
          </div>
          <!-- content advert-->
        </div>
        <!--end advert-->
        <div class="advert">
          <picture>
            <source srcset="build/img/anuncio2.webp" type="image/webp" />
            <source srcset="build/img/anuncio2.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/anuncio2.jpg" alt="advert" />
          </picture>
          <div class="content-advert">
            <h3>Luxury finished house</h3>
            <p>House with great view and price!</p>
            <p class="price">2,000,000</p>
            <ul class="icons-characteristics">
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icon batrooms"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icon garage"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icon rooms"
                />
                <p>4</p>
              </li>
            </ul>
            <a class="btn btn-yellow-block" href="advert.php">Property</a>
          </div>
          <!-- content advert-->
        </div>
        <!--end advert-->
        <div class="advert">
          <picture>
            <source srcset="build/img/anuncio3.webp" type="image/webp" />
            <source srcset="build/img/anuncio3.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/anuncio3.jpg" alt="advert" />
          </picture>
          <div class="content-advert">
            <h3>Luxury house</h3>
            <p>House with great view and price!</p>
            <p class="price">1,500,000</p>
            <ul class="icons-characteristics">
              <li>
                <img
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icon batrooms"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icon garage"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icon"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icon rooms"
                />
                <p>4</p>
              </li>
            </ul>
            <a class="btn btn-yellow-block" href="advert.php">Property</a>
          </div>
          <!-- content advert-->
        </div>
        <!--end advert-->
      </div>
      <!--end container-adverts-->
      <div class="display_all align-right">
        <a class="btn-green" href="advert.php">More Properties</a>
      </div>
    </section>
    <section class="image-contact">
      <h2>Find your next home</h2>
      <p>Please fill the form, We will get back to you shortly!</p>
      <a class="btn-yellow" href="contact.php">Cantact Us</a>
    </section>
    <div class="contenedor section low-section">
      <section class="blog">
        <h3>Our blog</h3>
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
              <p class="info-meta">Published: <span>02/07/2023</span> by: <span>Admin</span></p>
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
              <p class="info-meta">Published: <span>02/07/2023</span> by: <span>Admin</span></p>
              <p>
                orem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a
              </p>
            </a>
          </div>
        </article>
      </section>
      <section class="testimonials">
        <h3>Testimmonials</h3>
        <div class="testimonial">
          <blockquote>
            <p>
              Letraset sheets containing Lorem Ipsum passages, and more recently
              with desktop publishing software like Aldus PageMaker including
              versions of Lorem Ipsu
            </p>
          </blockquote>
        </div>
      </section>
    </div>
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
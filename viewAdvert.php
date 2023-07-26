<?php
  require 'includes/functions.php';
  addTemplate('header');
?>
    <main  class="contenedor section contenido-centrado">
      <h1>Beach House</h1>
      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="advert view">
      </picture>
      <div class="resume">
        <p class="price">80,000,000</p>
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
    <?php addTemplate('footer'); ?>
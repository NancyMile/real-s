<?php
  $id = $_GET['id'];
  $id = filter_var($id,FILTER_VALIDATE_INT);

  if(!$id){
    header('location: /');
  }
    require 'includes/config/database.php';
    $db =connectionDB();
    $query = "SELECT * FROM properties WHERE id = $id";
    $results = mysqli_query($db,$query);

    if(!$results->num_rows){
      header('location: /');
    }

    $propery = mysqli_fetch_assoc($results);

  require 'includes/functions.php';
  addTemplate('header');
?>
    <main  class="contenedor section contenido-centrado">
      <h1><?php echo $propery['title']; ?></h1>
        <img loading="lazy" src="/images/<?php echo $propery['image']; ?>" alt="advert view">
      <div class="resume">
        <p class="price"><?php echo $propery['price']; ?></p>
        <ul class="icons-characteristics">
            <li>
              <img
                class="icon"
                loading="lazy"
                src="build/img/icono_wc.svg"
                alt="icon batrooms"
              />
              <p><?php echo $propery['bathrooms']; ?></p>
            </li>
            <li>
              <img
                class="icon"
                loading="lazy"
                src="build/img/icono_estacionamiento.svg"
                alt="icon garage"
              />
              <p><?php echo $propery['garages']; ?></p>
            </li>
            <li>
              <img
                class="icon"
                loading="lazy"
                src="build/img/icono_dormitorio.svg"
                alt="icon rooms"
              />
              <p><?php echo $propery['rooms']; ?></p>
            </li>
          </ul>
          <p>
          <?php echo $propery['description']; ?>
          </p>
      </div>
    </main>
    <?php
      mysqli_close($db);
      addTemplate('footer');
    ?>
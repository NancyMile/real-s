<?php
  require '../../includes/config/database.php';
  $db = connectionDD();

  require '../../includes/functions.php';
  addTemplate('header');
?>
<main class="contenedor section">
    <h1>Create</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <form class="formulario">
      <fieldset>
        <legend>Genral Info</legend>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="price">
        <label for="title">Image</label>
        <input type="file" id="image" accept="image/jpeg,image/png">
        <label for="description">Description</label>
        <textarea id="description"></textarea>
      </fieldset>
      <fieldset>
        <legend>Property Info</legend>
        <label for="rooms">Rooms</label>
        <input type="number" id="rooms" min="1" max="9" placeholder="Eg: 3">
        <label for="bathrooms">Bathrooms</label>
        <input type="number" id="bathrooms" min="1" max="4" placeholder="Eg: 3">
        <label for="garage">Garage</label>
        <input type="number" id="rooms" min="1" max="3" placeholder="Eg: 3">
      </fieldset>
      <fieldset>
        <legend>Seller Info</legend>
        <label for="name">Name</label>
        <select id="name">
          <option value="" selected disabled>-- Select --</option>
          <option value="Nancy">Nancy</option>
          <option value="maria">Maria</option>
        </select>
      </fieldset>
      <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
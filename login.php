<?php
  require 'includes/functions.php';
  addTemplate('header');
?>
    <main class="contenedor section contenido-centrado">
        <h1>Init Session</h1>
        <form class="formulario">
        <fieldset>
          <legend>Email and Password</legend>
          <label for="email">Email</label>
          <input type="email" name="email" id="email"placeholder="email">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" placeholder="password">
         </fieldset>
         <input type="submit" value="login" class="btn-green">
        </form>
    </main>
<?php addTemplate('footer'); ?>
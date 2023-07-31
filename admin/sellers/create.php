<?php
require '../../includes/app.php';
use App\Seller;
authenticated();

$seller = new Seller;
//error messages
$errors = Seller::getErrors();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //debugear($_POST);
    $seller = new Seller($_POST['seller']);

    //validate
    $errors = $seller->validate();

    if(empty($errors)){
        $seller->saving();
    }
}
addTemplate('header');
?>
<main class="contenedor section">
    <h1>Create Seller</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>
    <?php if(isset($message)): ?>
      <div class="alert message">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <form class="formulario" method="POST" action="/admin/sellers/create.php">
    <?php include '../../includes/templates/form_sellers.php'; ?>
    <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>
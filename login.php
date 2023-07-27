<?php
    require 'includes/config/database.php';
    $db = connectionDB();

    //authenticate user
    $errors = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $pass = mysqli_real_escape_string($db,$_POST['password']);

        if(!$email){
            $errors [] = 'Email incorrect';
        }

        if(!$pass){
            $errors [] = 'Password incorrect';
        }

        //var_dump($errors);

        if(empty($errors)){
            //check if the user exist
            $query = "select * from users WHERE email = '$email'";
            var_dump($query);
            $result = mysqli_query($db,$query);
            if($result->num_rows){
                // check that the password is correct
                $user = mysqli_fetch_assoc($result);

                //verify  pass
                $auth = password_verify($pass, $user['password']); //returns true or false

                if($auth){
                    //authenticated
                }else{
                    $errors[] = "Password incorrect";
                }

            }else{
                $errors[] = 'This user do not exists.';
            }
        }
    }

  //includes heder
  require 'includes/functions.php';
  addTemplate('header');
?>
    <main class="contenedor section contenido-centrado">
        <h1>Init Session</h1>
        <?php foreach($errors as $error):?>
            <p class="alert error">
                <?php echo $error; ?>
            </p>
        <?php endforeach; ?>
        <form class="formulario" method="POST" novalidate>
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
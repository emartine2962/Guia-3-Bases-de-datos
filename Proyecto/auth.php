<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('username','password' );
validate_fields($req_fields);
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

if(empty($errors)){
  $user_id = authenticate($username, $password);
  if($user_id){
    //iniciar la variable global session
     $session->login($user_id);
    //Actualizar la sesion si es otro usuario el que se loguea
     updateLastLogIn($user_id);
     $session->msg("s", "Bienvenido al sistema de reportes Rappi.");
     redirect('home.php',false);

  } else {
    $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
    redirect('index.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}

?>

<?php
  require 'controllers/class.User.php';
  require 'controllers/class.Form.php';

  $User = new User();
  $Form = new Form();

  $page = $_GET['page'];

  switch($page){
    case 'create-new-user':
      if(! $User->is_auth)
        $page = 'profile';
    break;

    case 'new-user':
        $page = 'new-user';
    break;

    case 'profile':
      if(! $User->is_auth)
        $page = 'login';
    break;

    default:
      $page = 'login';
    break;
  }
  $form = $Form->loadForm($page);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>

  <body>
    <?php echo $form; ?>
  </body>
</html>

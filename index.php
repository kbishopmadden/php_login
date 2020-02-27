<?php
  require 'lib/class.User.php';
  require 'lib/class.Form.php';

  $User = new User();
  $Form = new Form();

  $page = $_GET['page'];

  switch($page){
    case 'newUser':
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

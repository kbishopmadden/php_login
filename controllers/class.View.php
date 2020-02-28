<?php
  require 'class.User.php';
  class View{
    private $view;
    function __construct( $view ){
      $this->init( $view );
    }

    function init( $view ){
      $this->setView( $view );
    }

    function setView( $view ){
      $this->view = $this->authView( $view );
    }

    function authView( $view ){
      $User = new User();
      switch($view){
        case 'new-user':
        case 'create-new-user':
          if(! $User->is_auth)
            $view = 'profile';
        case 'profile':
          if(! $User->is_auth)
            $view = 'login';
        default:
          $view = 'login';
        break;
      }
      return $view;
    }

    function getContents( $view, $ext="html" ){
      switch($view){
        case 'login':
        case 'new-user':
        case 'profile':
          $view = "views/{$view}.{$ext}";
          break;
        default:
          die('Invalid Page');
      }

      return file_get_contents($view);
    }

    function display(){
      echo $this->getContents($this->view);
    }
  }

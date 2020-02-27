<?php
  class Form{
    private $ext = 'html';

    function __construct(){
      $this->init();
    }

    function init(){
    }

    function loadForm($form){
      $ext = $this->ext;
      switch($form){
        case 'login':
          $form = "login.{$ext}";
        break;
        case 'new-user':
          $form = "{$form}.{$ext}";
        break;
        case 'profile':
          $form = "{$form}.{$ext}";
        break;
        default:
          die('Invalid Form');
      }
      return file_get_contents("views/".$form);
    }
  }

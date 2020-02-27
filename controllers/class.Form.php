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
          $form = "signin.{$ext}";
        break;
        case 'newUser':
          $form = "{$form}.{$ext}";
        break;
        default:
          die('Invalid Form');
      }
      return file_get_contents($form);
    }
  }

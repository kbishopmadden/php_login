<?php
  class Form{
    private $ext = 'html';

    function loadForm($form){
      switch($form){
        case 'login':
        case 'new-user':
        case 'profile':
          $form = "views/{$form}.{$this->ext}";
          break;
        default:
          die('Invalid Form');
      }

      return file_get_contents($form);
    }
  }

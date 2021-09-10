<?php

namespace Controllers;

trait CheckCharacter
{
   public function check_character($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
}

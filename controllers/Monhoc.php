<?php

namespace Controllers;

use Models\Database;

class Monhoc
{
   public static function index()
   {
      $sql = "SELECT * FROM monhoc";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      if ($pre) {
         return $pre;
      } else {
         return false;
      }
   }
}

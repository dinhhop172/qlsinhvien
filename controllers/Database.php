<?php

namespace Controllers;

use Exception;
use PDO;

class Database
{
   private static $instance;

   public static function getConnect()
   {
      try {
         if (empty(self::$instance)) {
            self::$instance = new PDO(
               'mysql:host=localhost;dbname=qlsinhvien',
               'root',
               '',
               array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
         }
      } catch (Exception $e) {
         echo "connection failed " . $e->getMessage();
      }
      return self::$instance;
   }
}

<?php

namespace Controllers;

class Session
{
   public static function getSession($key)
   {
      if (isset($_SESSION[$key])) {
         return $_SESSION[$key];
      } else {
         return false;
      }
   }
   public static function setSession($key, $value)
   {
      $_SESSION[$key] = $value;
   }

   public static function unsetSession($session)
   {
      if (isset($_SESSION[$session])) {
         unset($_SESSION[$session]);
      }
   }
}

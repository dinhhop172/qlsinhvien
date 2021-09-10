<?php

namespace Controllers;

use Models\Database;
use Models\Monhoc as ModelsMonhoc;
use PDO;

class Monhoc extends ModelsMonhoc
{
   use CheckCharacter;

   public static function index()
   {
      return ModelsMonhoc::showAll("SELECT * FROM monhoc");
   }


   public function store()
   {
      return ModelsMonhoc::add("INSERT INTO monhoc(tenmonhoc, sotinchi) VALUES(:tenmonhoc, :sotinchi)");
   }

   public function update()
   {
      return ModelsMonhoc::upgrade($_POST, "UPDATE monhoc SET tenmonhoc=:tenmonhoc, sotinchi=:sotinchi WHERE mamonhoc=:id");
   }

   public function delete($id)   
   {
      return ModelsMonhoc::destroy($id, "DELETE FROM monhoc WHERE mamonhoc=:id");
   }
}

<?php

namespace Controllers;

use Exception;
use Models\Database;
use Models\Sinhvien as ModelsSinhvien;
use PDO;

// require_once '../vendor/autoload.php';
// require_once 'CheckCharacter.php';
// require_once 'Database.php';
// require_once 'Session.php';
// require_once 'StatusInsert.php';

class Sinhvien extends ModelsSinhvien
{
   use CheckCharacter;

   public static function index()
   {
      return ModelsSinhvien::showAll("SELECT * FROM sinhvien");
   }
   
   public function store()
   {
      return ModelsSinhvien::add("INSERT INTO sinhvien(hoten, sdt, diachi) VALUES(:hoten, :sdt, :diachi)");
   }

   public function update()
   {
      return ModelsSinhvien::upgrade($_POST, "UPDATE sinhvien SET hoten=:hoten, sdt=:sdt, diachi=:diachi WHERE masv=:id");
   }

   public function delete($id)
   {
      return ModelsSinhvien::destroy($id, "DELETE FROM sinhvien WHERE masv=:id");
   }

   // public static function issetId($id)
   // {
   //    $sql = "SELECT * FROM sinhvien WHERE masv = :id";
   //    $pre = Database::getConnect()->prepare($sql);
   //    $pre->bindParam(':id', $id, PDO::PARAM_INT);
   //    $pre->execute();
   //    if ($pre->rowCount() == 0) {
   //       return false;
   //    }
   //    return $pre;
   // }
}

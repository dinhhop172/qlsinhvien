<?php

namespace Controllers;

use Exception;
use PDO;

// require_once '../vendor/autoload.php';
// require_once 'CheckCharacter.php';
// require_once 'Database.php';
// require_once 'Session.php';
// require_once 'StatusInsert.php';

class Sinhvien
{
   use CheckCharacter;

   public static function index()
   {
      $sql = "SELECT * FROM sinhvien";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      if ($pre) {
         return $pre;
      }
      return false;
   }
   public function store()
   {
      $hoten = isset($_POST['hoten']) ? $this->check_character($_POST['hoten']) : null;
      $sdt = isset($_POST['sdt']) ? $this->check_character($_POST['sdt']) : null;
      $diachi = isset($_POST['diachi']) ? $this->check_character($_POST['diachi']) : null;
      if (!empty($hoten) && !empty($sdt) && !empty($diachi) && isset($_POST['add_student'])) {
         if (!is_numeric($sdt) || strlen($sdt) < 10 || strlen($sdt) > 10) {
            session_start();
            Session::setSession('errInsert', "<script>alert('Số điện thoại phải là 10 số');</script>");
            header("location: ../views/sinhvien/create.php");
            exit();
         }
         $sql = "INSERT INTO sinhvien(hoten, sdt, diachi) VALUES(:hoten, :sdt, :diachi)";
         $pre = Database::getConnect()->prepare($sql);
         $pre->bindParam(':hoten', $hoten, PDO::PARAM_STR);
         $pre->bindParam(':sdt', $sdt, PDO::PARAM_STR);
         $pre->bindParam(':diachi', $diachi, PDO::PARAM_STR);
         $pre->execute();
         if ($pre) {
            session_start();
            Session::setSession('succInsert', "<script>alert('Thêm sinh viên thành công');</script>");
         } else {
            return false;
         }
      } else {
         session_start();
         Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
      }
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

   public function update($data)
   {
      $id = isset($_POST['masv']) ? $this->check_character($data['masv']) : null;
      $hoten = isset($_POST['hoten']) ? $this->check_character($data['hoten']) : null;
      $sdt = isset($_POST['sdt']) ? $this->check_character($data['sdt']) : null;
      $diachi = isset($_POST['diachi']) ? $this->check_character($data['diachi']) : null;

      if (!empty($hoten) && !empty($sdt) && !empty($diachi) && isset($_POST['update_student'])) {
         if (!is_numeric($sdt) || strlen($sdt) < 10 || strlen($sdt) > 10) {
            session_start();
            Session::setSession('errInsert', "<script>alert('Số điện thoại phải là 10 số');</script>");
            header("location: ../index.php");
            exit();
         }
         $sql = "UPDATE sinhvien SET hoten=:hoten, sdt=:sdt, diachi=:diachi WHERE masv=:id";
         $pre = Database::getConnect()->prepare($sql);
         $pre->bindParam(':hoten', $hoten, PDO::PARAM_STR);
         $pre->bindParam(':id', $id, PDO::PARAM_INT);
         $pre->bindParam(':sdt', $sdt, PDO::PARAM_STR);
         $pre->bindParam(':diachi', $diachi, PDO::PARAM_STR);
         $pre->execute();
         if ($pre) {
            session_start();
            Session::setSession('succInsert', "<script>alert('Sửa sinh viên thành công');</script>");
         } else {
            return false;
         }
      } else {
         session_start();
         Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
      }

      // print_r($_POST);
      // $pre = Database::getConnect()->prepare($sql);
      // $pre->bindParam(':id', $id, PDO::PARAM_INT);
      // $pre->execute();
      // if ($pre->rowCount() == 0) {
      //    return false;
      // }
      // return $pre;
   }
}

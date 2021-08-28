<?php

namespace Controllers;

use Models\Database;
use PDO;

class Diemthi
{
   use CheckCharacter;
   public static function index()
   {
      $sql = "SELECT sinhvien.masv , diemthi.masinhvien, diemthi.mamonhoc, diemthi.id,
       sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi FROM ((diemthi 
      JOIN sinhvien ON diemthi.masinhvien = sinhvien.masv) 
      JOIN monhoc ON diemthi.mamonhoc = monhoc.mamonhoc) ORDER BY sinhvien.masv DESC";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      if ($pre) {
         return $pre;
      } else {
         return false;
      }
   }

   public function store()
   {
      $masinhvien = isset($_POST['masinhvien']) ? $this->check_character($_POST['masinhvien']) : null;
      $mamonhoc = isset($_POST['mamonhoc']) ? $this->check_character($_POST['mamonhoc']) : null;
      $diemso = isset($_POST['diemso']) ? $this->check_character($_POST['diemso']) : null;
      $lanthi = isset($_POST['lanthi']) ? $this->check_character($_POST['lanthi']) : null;
      if (!empty($masinhvien) && !empty($mamonhoc) && !empty($diemso) && !empty($lanthi) && isset($_POST['add_point'])) {
         if (!is_numeric($diemso) || !is_numeric($lanthi) || $diemso > 10 || $diemso < 1 || $lanthi < 1 || $lanthi > 10) {
            session_start();
            Session::setSession('errInsert', "<script>alert('Điểm thi và lần thi phải bé hơn 11 và lớn hơn 0');</script>");
            header("location: ../views/diemthi/create.php");
            exit();
         }
         $sql = "INSERT INTO diemthi(masinhvien, mamonhoc, diemso, lanthi) VALUES(:masinhvien, :mamonhoc, :diemso, :lanthi)";
         $pre = Database::getConnect()->prepare($sql);
         $pre->bindParam(':masinhvien', $masinhvien, PDO::PARAM_INT);
         $pre->bindParam(':mamonhoc', $mamonhoc, PDO::PARAM_INT);
         $pre->bindParam(':diemso', $diemso, PDO::PARAM_INT);
         $pre->bindParam(':lanthi', $lanthi, PDO::PARAM_INT);
         $pre->execute();
         if ($pre) {
            session_start();
            Session::setSession('succInsert', "<script>alert('Thêm điểm thi thành công');</script>");
         } else {
            return false;
         }
      } else {
         session_start();
         Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
      }
   }


   public function update($data)
   {
      $id = isset($_POST['id']) ? $this->check_character($data['id']) : null;
      $masinhvien = isset($_POST['masinhvien']) ? $this->check_character($data['masinhvien']) : null;
      $mamonhoc = isset($_POST['mamonhoc']) ? $this->check_character($data['mamonhoc']) : null;
      $diemso = isset($_POST['diemso']) ? $this->check_character($data['diemso']) : null;
      $lanthi = isset($_POST['lanthi']) ? $this->check_character($data['lanthi']) : null;
      if (!empty($masinhvien) && !empty($mamonhoc) && !empty($diemso) && !empty($lanthi)) {
         if (!is_numeric($diemso) || !is_numeric($lanthi) || $diemso > 10 || $diemso < 1 || $lanthi < 1 || $lanthi > 10) {
            session_start();
            Session::setSession('errInsert', "<script>alert('Điểm thi và lần thi phải bé hơn 11 và lớn hơn 0');</script>");
            header("location: ../views/diemthi/create.php");
            exit();
         }
         // $array = [$id, $masinhvien, $mamonhoc, $diemso, $lanthi];
         $sql = "UPDATE diemthi SET masinhvien=:masinhvien, mamonhoc=:mamonhoc, diemso=:diemso, lanthi=:lanthi WHERE id=:id";
         // $sql = "UPDATE diemthi SET masinhvien=?, mamonhoc=?, diemso=?, lanthi=? WHERE masinhvien=? AND mamonhoc=? AND id=?";
         $pre = Database::getConnect()->prepare($sql);
         $pre->bindParam(':masinhvien', $masinhvien, PDO::PARAM_STR);
         $pre->bindParam(':mamonhoc', $mamonhoc, PDO::PARAM_STR);
         $pre->bindParam(':diemso', $diemso, PDO::PARAM_STR);
         $pre->bindParam(':lanthi', $lanthi, PDO::PARAM_STR);
         $pre->bindParam(':id', $id, PDO::PARAM_STR);
         $pre->execute();
         if ($pre) {
            session_start();
            Session::setSession('succInsert', "<script>alert('Sửa điểm thi thành công');</script>");
         } else {
            return false;
         }
      } else {
         session_start();
         Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
      }
   }

   public function delete($id)
   {
      $sql = "DELETE FROM diemthi WHERE id=:id";
      $pre = Database::getConnect()->prepare($sql);
      $pre->bindParam(':id', $id, PDO::PARAM_INT);
      $pre->execute();
      if ($pre) {
         session_start();
         Session::setSession("succDelete", "<script>alert('Xóa điểm thi thành công');</script>");
      }
   }
}

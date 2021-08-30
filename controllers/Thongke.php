<?php

namespace Controllers;

use Models\Database;

class Thongke extends Database
{
   public static function sinhVienThiLai()
   {
      $sql = "SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
         FROM diemthi 
         JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
         JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
         WHERE diemthi.lanthi >= 2 AND diemthi.lanthi <=3";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      return $pre;
   }
   public static function diemSinhVienTren()
   {
      $sql = "SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
      FROM diemthi 
      JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
      JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
      WHERE diemthi.diemso >= 8 AND diemthi.lanthi=1";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      return $pre;
   }
   public static function diemSinhVienDuoi()
   {
      $sql = "SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
      FROM diemthi 
      JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
      JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
      WHERE diemthi.diemso < 5";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      return $pre;
   }
   public static function diemTrungBinh()
   {
      $sql = "SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
      FROM diemthi 
      JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
      JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
      WHERE diemthi.diemso < 5";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      return $pre;
   }
}

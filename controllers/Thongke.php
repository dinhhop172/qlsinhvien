<?php

namespace Controllers;

use Models\Thongke as ModelsThongke;
use Models\Database;
use PDO;

class Thongke extends ModelsThongke
{
   public static function sinhVienThiLai()
   {
      return ModelsThongke::sinhVienThiLai1("SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
            FROM diemthi 
            JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
            JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
            WHERE diemthi.lanthi >= 2 AND diemthi.lanthi <=3");
   }

   public static function diemSinhVienTren()
   {
      return ModelsThongke::diemSinhVienTren1("SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
            FROM diemthi 
            JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
            JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
            WHERE diemthi.diemso >= 8 AND diemthi.lanthi=1");
   }

   public static function diemSinhVienDuoi()
   {
      return ModelsThongke::diemSinhVienDuoi1("SELECT sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi
            FROM diemthi 
            JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
            JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
            WHERE diemthi.diemso < 5");
   }
   public static function diemTrungBinh()
   {

      return ModelsThongke::diemTrungBinh1("SELECT sinhvien.hoten, AVG(diemthi.diemso) as dtb
            FROM diemthi
            JOIN sinhvien ON diemthi.masinhvien=sinhvien.masv
            JOIN monhoc ON diemthi.mamonhoc=monhoc.mamonhoc
            GROUP BY diemthi.masinhvien ORDER BY dtb DESC");
      // $result = Database::getConnect()->query($sql);
      // $dtb = [];
      // while ($row = $result->fetch()) {
      //    $dtb[] = $row;
      // }
      // return $dtb;
   }
}

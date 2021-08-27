<?php

namespace Controllers;

use Models\Database;

class Diemthi
{
   public static function index()
   {
      $sql = "SELECT sinhvien.masv, sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso FROM ((diemthi 
      RIGHT JOIN sinhvien ON diemthi.masinhvien = sinhvien.masv) 
      LEFT JOIN monhoc ON diemthi.mamonhoc = monhoc.mamonhoc)";
      $pre = Database::getConnect()->prepare($sql);
      $pre->execute();
      if ($pre) {
         return $pre;
      } else {
         return false;
      }
   }



   public static function store()
   {
   }
}

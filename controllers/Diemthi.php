<?php

namespace Controllers;

use Models\Database;
use Models\Diemthi as ModelsDiemthi;
use PDO;

class Diemthi extends ModelsDiemthi
{
   use CheckCharacter;

   public static function index()
   {
      return ModelsDiemthi::showAll("SELECT sinhvien.masv , diemthi.masinhvien, diemthi.mamonhoc, diemthi.id,
          sinhvien.hoten, monhoc.tenmonhoc, diemthi.diemso, diemthi.lanthi FROM ((diemthi 
         JOIN sinhvien ON diemthi.masinhvien = sinhvien.masv) 
         JOIN monhoc ON diemthi.mamonhoc = monhoc.mamonhoc) ORDER BY sinhvien.masv DESC");
   }

   public function store()
   {
      ModelsDiemthi::add("INSERT INTO diemthi(masinhvien, mamonhoc, diemso, lanthi) VALUES(:masinhvien, :mamonhoc, :diemso, :lanthi)");
   }


   public function update()
   {
      return ModelsDiemthi::upgrade($_POST, "UPDATE diemthi SET masinhvien=:masinhvien, mamonhoc=:mamonhoc, diemso=:diemso, lanthi=:lanthi WHERE id=:id");
   }

   public function delete($id)
   {
      return ModelsDiemthi::destroy($id, "DELETE FROM diemthi WHERE id=:id");
   }
}

<?php

use Controllers\Diemthi;
use Controllers\Monhoc;
use Controllers\Sinhvien;

// require_once '../controllers/Sinhvien.php';
// require_once '../controllers/CheckCharacter.php';
require_once '../vendor/autoload.php';

if (isset($_POST['add_student'])) {
   $addStudent = new Sinhvien();
   $addStudent->store();
   header("location: sinhvien/create.php");
}
if (isset($_POST['update_student'])) {
   $updateStudent = new Sinhvien();
   $updateStudent->update();
   header("location: ../index.php");
}
if (isset($_GET['deletesv'])) {
   $id = isset($_GET['id']) ? $_GET['id'] : null;
   $deleteSv = new Sinhvien();
   $deleteSv->delete($id);
   header("location: ../index.php");
}
if (isset($_POST['add_subject'])) {
   $addSubject = new Monhoc();
   $addSubject->store();
   header("location: monhoc/create.php");
}
if (isset($_POST['update_subject'])) {
   $updateSubject = new Monhoc();
   $updateSubject->update();
   header("location: monhoc/index.php");
}

if (isset($_GET['deletemh'])) {
   $id = isset($_GET['id']) ? $_GET['id'] : null;
   $deleteMh = new Monhoc();
   $deleteMh->delete($id);
   header("location: monhoc/index.php");
}

if (isset($_POST['add_point'])) {
   $addPoint = new Diemthi();
   $addPoint->store();
   header("location: diemthi/create.php");
}

if (isset($_POST['update_point'])) {
   $updateDiemthi = new Diemthi();
   $updateDiemthi->update();
   header("location: diemthi/index.php");
}

if (isset($_GET['deletedt'])) {
   $id = isset($_GET['id']) ? $_GET['id'] : null;
   $deleteDt = new Diemthi();
   $deleteDt->delete($id);
   header("location: diemthi/index.php");
}
// select monhoc.tenmonhoc FROM diemthi
// JOIN monhoc ON diemthi.mamonhoc = monhoc.mamonhoc
// JOIN sinhvien ON sinhvien.masv = diemthi.masinhvien
// WHERE sinhvien.masv = 36 AND monhoc.mamonhoc NOT IN (monhoc.mamonhoc)


// $sql = "INSERT INTO diemthi (masinhvien, mamonhoc, diemso, lanthi)
         // SELECT s.masv, m.mamonhoc, :diemso, :lanthi
         // FROM sinhvien s, monhoc m
         // WHERE s.masv = :masinhvien
         // AND m.mamonhoc = :mamonhoc";
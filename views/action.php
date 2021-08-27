<?php

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
   $updateStudent->update($_POST);
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
   $updateSubject->update($_POST);
   header("location: monhoc/index.php");
}

if (isset($_GET['deletemh'])) {
   $id = isset($_GET['id']) ? $_GET['id'] : null;
   $deleteMh = new Monhoc();
   $deleteMh->delete($id);
   header("location: monhoc/index.php");
}

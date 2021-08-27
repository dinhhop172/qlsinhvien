<?php

use Controllers\Sinhvien;

// require_once '../controllers/Sinhvien.php';
// require_once '../controllers/CheckCharacter.php';
require_once '../vendor/autoload.php';

if (isset($_POST['add_student'])) {
   $ok = new Sinhvien();
   $ok->store();
   header("location: sinhvien/create.php");
}
if (isset($_POST['update_student'])) {
   $update = new Sinhvien();
   $update->update($_POST);
   header("location: ../index.php");
}

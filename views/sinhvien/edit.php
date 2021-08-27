<?php

use Controllers\Session;
use Controllers\Sinhvien;

session_start();
require_once '../../vendor/autoload.php';
require_once '../temp/header.php';

$idSv = isset($_GET['id']) ? $_GET['id'] : null;
$data = Sinhvien::issetId($idSv);
if ($data) {
   while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
      echo "<pre>";
      print_r($row);
?>
      <?= Session::getSession('errInsert') ?>
      <?= Session::getSession('succInsert') ?>
      <div class="container mt-5">
         <div class="row">
            <div class="col-md-8 offset-md-2">
               <div class="card">
                  <div class="card-body">
                     <form action="../action.php?id=$row['masv']" method="POST" role="form">
                        <legend>Thêm thông tin sinh viên</legend>

                        <div class="form-group">
                           <label for="">Họ tên</label>
                           <input type="text" name="hoten" class="form-control" value="<?= $row['hoten'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Số điện thoại</label>
                           <input type="text" name="sdt" class="form-control" value="<?= $row['sdt'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="">Địa chỉ</label>
                           <input type="text" name="diachi" class="form-control" value="<?= $row['diachi'] ?>">
                        </div>

                        <a href="../../index.php" class="btn btn-success">Back</a>
                        <button type="submit" name="update_student" class="btn btn-primary">Submit</button>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php
      Session::unsetSession('errInsert');
      Session::unsetSession('succInsert');
   }
} else {
   ?>
   <div class="container">
      <div class="row justify-content-center" style="height: 100vh;">
         <div class="col-md-12 text-center" style="display: flex;
                                                      justify-content: center;
                                                      align-items: center;
                                                      flex-direction: column;">
            <span class="display-1 d-block">404</span>
            <div class="mb-4 lead">The page you are looking for was not found.</div>
            <a href="../../index.php" class="btn btn-link">Back to Home</a>
         </div>
      </div>
   </div>
<?php
}
require_once '../temp/footer.php';
?>
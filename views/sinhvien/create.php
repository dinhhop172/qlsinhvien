<?php

use Controllers\Session;
use Controllers\Sinhvien;

session_start();
require_once '../../vendor/autoload.php';
require_once '../temp/header.php';
// require_once '../../controllers/Session.php';
?>
<?= Session::getSession('errInsert') ?>
<?= Session::getSession('succInsert') ?>
<div class="container mt-5">
   <div class="row">
      <div class="col-md-8 offset-md-2">
         <div class="card">
            <div class="card-body">
               <form action="../action.php" method="POST">
                  <legend class="bg-info text-white text-center py-2">Thêm thông tin sinh viên</legend>

                  <div class="form-group">
                     <label for="">Họ tên</label>
                     <input type="text" name="hoten" class="form-control" id="" value="<?= isset($_POST['hoten']) ? $_POST['hoten'] : '' ?>" placeholder="Họ tên">
                  </div>
                  <div class="form-group">
                     <label for="">Số điện thoại</label>
                     <input type="text" name="sdt" class="form-control" id="" value="" placeholder="Số điện thoại">
                  </div>
                  <div class="form-group">
                     <label for="">Địa chỉ</label>
                     <input type="text" name="diachi" class="form-control" id="" value="" placeholder="Địa chỉ">
                  </div>

                  <a href="../../index.php" class="btn btn-success">Back</a>
                  <button type="submit" name="add_student" class="btn btn-primary">Submit</button>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
<?php
require_once '../temp/footer.php';
Session::unsetSession('errInsert');
Session::unsetSession('succInsert');
?>
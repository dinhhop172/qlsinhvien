<?php

use Controllers\Session;

session_start();
require_once '../../vendor/autoload.php';
require_once '../temp/header.php';
?>
<?= Session::getSession('errInsert') ?>
<?= Session::getSession('succInsert') ?>
<div class="container mt-5">
   <div class="row">
      <div class="col-md-8 offset-md-2">
         <div class="card">
            <div class="card-body">
               <form action="../action.php" method="POST">
                  <legend class="bg-info text-white text-center py-2">Thêm môn học</legend>

                  <div class="form-group">
                     <label for="">Tên môn học</label>
                     <input type="text" name="tenmonhoc" class="form-control" id="" placeholder="Input field">
                  </div>
                  <div class="form-group">
                     <label for="">Số tín chỉ</label>
                     <input type="text" name="sotinchi" class="form-control" id="" placeholder="Input field">
                  </div>
                  <a href="index.php" class="btn btn-success">Trở lại</a>
                  <button type="submit" name="add_subject" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
Session::unsetSession('errInsert');
Session::unsetSession('succInsert');
require_once '../temp/footer.php';
?>
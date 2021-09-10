<?php session_start();

use Controllers\Monhoc;
use Controllers\Session;
use Controllers\Sinhvien;

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
                  <legend class="bg-info text-white text-center py-2">Thêm điểm thi</legend>

                  <div class="form-group">
                     <label for="">Chọn sinh viên</label>
                     <select name="masinhvien" class="form-control" required="required">
                        <option>---Chọn---</option>
                        <?php
                        $sv = Sinhvien::index();
                        while ($row = $sv->fetch(PDO::FETCH_ASSOC)) { ?>
                           <option value="<?= $row['masv'] ?>"><?= $row['hoten'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="">Chọn môn học</label>
                     <select name="mamonhoc" class="form-control" required="required">
                        <option>---Chọn---</option>
                        <?php
                        $mh = Monhoc::index();
                        while ($row = $mh->fetch(PDO::FETCH_ASSOC)) { ?>
                           <option value="<?= $row['mamonhoc'] ?>"><?= $row['tenmonhoc'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="">Điểm số</label>
                     <input type="text" name="diemso" class="form-control" placeholder="Nhập điểm">
                  </div>
                  <div class="form-group">
                     <label for="">Lần thi</label>
                     <input type="text" name="lanthi" class="form-control" placeholder="Lần thi">
                  </div>
                  <a href="index.php" class="btn btn-success">Trở lại</a>
                  <button type="submit" name="add_point" class="btn btn-primary">Submit</button>
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
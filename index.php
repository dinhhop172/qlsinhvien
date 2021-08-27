<?php session_start();

use Controllers\Session;
use Controllers\Sinhvien;

require_once './vendor/autoload.php';
require_once 'views/temp/header.php';

$sinhvien = Sinhvien::index();
?>
<section class="container pt-5">
   <?= Session::getSession('errInsert') ?>
   <?= Session::getSession('succInsert') ?>
   <?= Session::getSession('succDelete') ?>
   <div class="row mb-3">
      <div class="col-md-12">
         <h3 class="text-center">Danh sách sinh viên</h3>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-md-12">
         <a href="views/monhoc/index.php" class="btn btn-success float-left mr-2">Môn học</a>
         <a href="views/diemthi/index.php" class="btn btn-success float-left">Điểm thi</a>
         <a href="views/sinhvien/create.php" class="btn btn-success float-right">Thêm</a>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table">
               <tr>
                  <th>*</th>
                  <th>Họ tên</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th></th>
               </tr>
               <?php
               $masv = 1;
               while ($row = $sinhvien->fetch(PDO::FETCH_ASSOC)) {
                  // foreach ($data->fetchAll() as $row) {
                  // $array = explode(' ', $row['diemso']);
                  // $re[] = $row;
                  // echo "<pre>";
                  // print_r($re);
               ?>
                  <tr>
                     <td><?= $masv++ ?></td>
                     <td><?= $row['hoten'] ?></td>
                     <td><?= $row['sdt'] ?></td>
                     <td><?= $row['diachi'] ?></td>
                     <td>
                        <a data-toggle="modal" data-target="#<?= $row['masv'] ?>" class="btn text-white btn-info">Sửa</a>
                        <a href="views/action.php?id=<?= $row['masv'] ?>&deletesv" onclick="return confirm('Chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
                     </td>
                  </tr>

                  <div class="modal fade" id="<?= $row['masv'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header bg-info text-white">
                              <h5 class="modal-title">Sửa sinh viên</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="views/action.php" method="POST" role="form">
                                 <input type="hidden" value="<?= $row['masv'] ?>" name="masv">
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
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" name="update_student" class="btn btn-primary">Submit</button>
                              </form>

                           </div>
                        </div>
                     </div>
                  </div>
               <?php } ?>
            </table>
         </div>
      </div>
   </div>
</section>

<?php
Session::unsetSession("errInsert");
Session::unsetSession("succInsert");
Session::unsetSession('succDelete');
require_once 'views/temp/footer.php';
?>
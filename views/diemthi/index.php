<?php session_start();

use Controllers\Diemthi;
use Controllers\Monhoc;
use Controllers\Session;
use Controllers\Sinhvien;

require_once '../../vendor/autoload.php';
require_once '../temp/header.php';

$data = Diemthi::index();
?>

<section class="container pt-5 pb-5 mb-5">
   <?= Session::getSession('errInsert') ?>
   <?= Session::getSession('succInsert') ?>
   <?= Session::getSession('succDelete') ?>
   <div class="row mb-3">
      <div class="col-md-12">
         <h3 class="text-center">Danh sách điểm thi</h3>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-md-12">
         <a href="../monhoc/index.php" class="btn btn-success float-left mr-2">Môn học</a>
         <a href="../../index.php" class="btn btn-success float-left mr-2">Sinh viên</a>
         <a href="../thongke/index.php" class="btn btn-success float-left">Thống kê</a>
         <a href="create.php" class="btn btn-success float-right">Thêm</a>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table">
               <tr>
                  <th>*</th>
                  <th>Tên sinh viên</th>
                  <th>Tên môn học</th>
                  <th>Điểm</th>
                  <th>Lần thi</th>
                  <th></th>
               </tr>
               <?php
               $diem_id = 1;
               while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
               ?>
                  <tr>
                     <td><?= $diem_id++ ?></td>
                     <td><?= $row['hoten'] ?></td>
                     <td><?= $row['tenmonhoc'] ?></td>
                     <td><?= $row['diemso'] ?></td>
                     <td><?= $row['lanthi'] ?></td>
                     <td>
                        <a data-toggle="modal" data-target="#<?= $row['id'] ?>" class="btn btn-info">Sửa</a>
                        <a href="../action.php?id=<?= $row['id'] ?>&deletedt" onclick="return confirm('Chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
                     </td>
                  </tr>

                  <div class="modal fade" id="<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header bg-info text-white">
                              <h5 class="modal-title">Sửa điểm thi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">

                              <form action="../action.php" method="POST">
                                 <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                 <div class="form-group">
                                    <label for="">Chọn sinh viên</label>
                                    <select name="masinhvien" class="form-control" required="required">
                                       <option>---Chọn---</option>
                                       <?php
                                       $datasv = Sinhvien::index();
                                       while ($sv = $datasv->fetch(PDO::FETCH_ASSOC)) { ?>
                                          <option <?= ($row['masinhvien'] == $sv['masv'] ? 'selected' : '') ?> value="<?= $sv['masv'] ?>"><?= $sv['hoten'] ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="">Chọn môn học</label>
                                    <select name="mamonhoc" class="form-control" required="required">
                                       <option>---Chọn---</option>
                                       <?php
                                       $datamh = Monhoc::index();
                                       while ($mh = $datamh->fetch(PDO::FETCH_ASSOC)) { ?>
                                          <option <?= ($row['mamonhoc'] == $mh['mamonhoc'] ? 'selected' : '') ?> value="<?= $mh['mamonhoc'] ?>"><?= $mh['tenmonhoc'] ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="">Điểm số</label>
                                    <input type="text" name="diemso" value="<?= $row['diemso'] ?>" class="form-control" placeholder="Nhập điểm">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Lần thi</label>
                                    <input type="text" name="lanthi" value="<?= $row['lanthi'] ?>" class="form-control" placeholder="Lần thi">
                                 </div>
                                 <a href="index.php" class="btn btn-success">Trở lại</a>
                                 <button type="submit" name="update_point" class="btn btn-primary">Submit</button>
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
require_once '../temp/footer.php';
?>
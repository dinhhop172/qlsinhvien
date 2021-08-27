<?php session_start();

use Controllers\Monhoc;
use Controllers\Session;

require_once '../../vendor/autoload.php';
require_once '../temp/header.php';

$monhoc = Monhoc::index();
?>


<section class="container pt-5">
   <?= Session::getSession('errInsert') ?>
   <?= Session::getSession('succInsert') ?>
   <?= Session::getSession('succDelete') ?>
   <div class="row mb-3">
      <div class="col-md-12">
         <h3 class="text-center">Danh sách môn học</h3>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-md-12">
         <a href="../../index.php" class="btn btn-success float-left mr-2">Sinh viên</a>
         <a href="../diemthi/index.php" class="btn btn-success float-left">Điểm thi</a>
         <a href="create.php" class="btn btn-success float-right">Thêm</a>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table">
               <tr>
                  <th>*</th>
                  <th>Tên môn học</th>
                  <th>Số tín chỉ</th>
                  <th></th>
               </tr>
               <?php
               $mamh = 1;
               while ($row = $monhoc->fetch(PDO::FETCH_ASSOC)) {
               ?>
                  <tr>
                     <td><?= $mamh++ ?></td>
                     <td><?= $row['tenmonhoc'] ?></td>
                     <td><?= $row['sotinchi'] ?></td>
                     <td>
                        <a href="" data-toggle="modal" data-target="#<?= $row['mamonhoc'] ?>" class="btn btn-info">Sửa</a>
                        <a href="../action.php?id=<?= $row['mamonhoc'] ?>&deletemh" onclick="return confirm('Chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
                     </td>
                  </tr>



                  <div class="modal fade" id="<?= $row['mamonhoc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header bg-info text-white">
                              <h5 class="modal-title">Sửa môn học</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form action="../action.php" method="POST">
                                 <input type="hidden" value="<?= $row['mamonhoc'] ?>" name="mamonhoc">
                                 <div class="form-group">
                                    <label for="">Tên môn học</label>
                                    <input type="text" name="tenmonhoc" class="form-control" value="<?= $row['tenmonhoc'] ?>" placeholder="Input field">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Số tín chỉ</label>
                                    <input type="text" name="sotinchi" class="form-control" value="<?= $row['sotinchi'] ?>" placeholder="Input field">
                                 </div>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" name="update_subject" class="btn btn-primary">Submit</button>
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
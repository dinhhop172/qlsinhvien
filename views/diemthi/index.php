<?php

use Controllers\Diemthi;

require_once '../../vendor/autoload.php';
require_once '../temp/header.php';

$data = Diemthi::index();
?>

<section class="container pt-5">
   <div class="row mb-3">
      <div class="col-md-12">
         <h3 class="text-center">Danh sách điểm thi</h3>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-md-12">
         <a href="../monhoc/index.php" class="btn btn-success float-left mr-2">Môn học</a>
         <a href="../../index.php" class="btn btn-success float-left">Sinh viên</a>
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
                     <td>
                        <a href="" class="btn btn-info">Sửa</a>
                        <a href="" class="btn btn-danger">Xóa</a>
                     </td>
                  </tr>
               <?php } ?>
            </table>
         </div>
      </div>
   </div>
</section>

<?php

require_once '../temp/footer.php';
?>
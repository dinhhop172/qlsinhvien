<?php

use Controllers\Monhoc;
use Controllers\Sinhvien;
use Controllers\Thongke;

require_once '../../vendor/autoload.php';
require_once '../temp/header.php';

?>

<div class="container mt-5 mb-5">
   <div class="row">
      <div class="col-md-12">
         <h3 class="text-center">Thống kê</h3>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-md-12">
         <a href="../../index.php" class="btn btn-info float-left mr-2">Sinh viên</a>
         <a href="../diemthi/index.php" class="btn btn-info float-left mr-2">Điểm thi</a>
         <a href="../monhoc/index.php" class="btn btn-info float-left">Môn học</a>
      </div>
   </div>
   <div class="row">
      <div class="col-md-8 offset-md-2">
         <div id="accordion">
            <div class="card">
               <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                     <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Những sinh viên có môn học bị thi lại( lần 2 + 3)
                     </button>
                  </h5>
               </div>

               <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                     <table class="table">
                        <tr>
                           <th>*</th>
                           <th>Tên sinh viên</th>
                           <th>Tên môn học</th>
                           <th>Điểm thi</th>
                           <th>Lần thi</th>
                        </tr>
                        <?php
                        $svtl = Thongke::sinhVienThiLai();
                        $tk = 1;
                        while ($row = $svtl->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                           <tr>
                              <td><?= $tk++ ?></td>
                              <td><?= $row['hoten'] ?></td>
                              <td><?= $row['tenmonhoc'] ?></td>
                              <td><?= $row['diemso'] ?></td>
                              <td><?= $row['lanthi'] ?></td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                     <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Điểm của SV có điểm từ 8 trở lên với điều kiện thi lần 1
                     </button>
                  </h5>
               </div>
               <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">

                     <table class="table">
                        <tr>
                           <th>*</th>
                           <th>Tên sinh viên</th>
                           <th>Tên môn học</th>
                           <th>Điểm thi</th>
                           <th>Lần thi</th>
                        </tr>
                        <?php
                        $dsv = Thongke::diemSinhVienTren();
                        $tkdsv = 1;
                        while ($row = $dsv->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                           <tr>
                              <td><?= $tkdsv++ ?></td>
                              <td><?= $row['hoten'] ?></td>
                              <td><?= $row['tenmonhoc'] ?></td>
                              <td><?= $row['diemso'] ?></td>
                              <td><?= $row['lanthi'] ?></td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                     <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Điểm thi của sv có điểm dưới 5
                     </button>
                  </h5>
               </div>
               <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">

                     <table class="table">
                        <tr>
                           <th>*</th>
                           <th>Tên sinh viên</th>
                           <th>Tên môn học</th>
                           <th>Điểm thi</th>
                           <th>Lần thi</th>
                        </tr>
                        <?php
                        $svdn = Thongke::diemSinhVienDuoi();
                        $tkddn = 1;
                        while ($row = $svdn->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                           <tr>
                              <td><?= $tkddn++ ?></td>
                              <td><?= $row['hoten'] ?></td>
                              <td><?= $row['tenmonhoc'] ?></td>
                              <td><?= $row['diemso'] ?></td>
                              <td><?= $row['lanthi'] ?></td>
                           </tr>
                        <?php } ?>
                     </table>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                     <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Điểm trung bình của sv cho các môn học được sắp xếp từ cao xuống thấp
                     </button>
                  </h5>
               </div>
               <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-parent="#accordion">
                  <div class="card-body">

                     <table class="table">
                        <tr>
                           <th>*</th>
                           <th>Tên sinh viên</th>
                           <th>Tên môn học</th>
                           <th>Điểm thi</th>
                           <th>Lần thi</th>
                        </tr>
                        <?php
                        $sv = Sinhvien::index();
                        $mh = Monhoc::index();
                        // $dtb = [];
                        foreach ($sv as $aSV) {
                           foreach ($mh as $aMH) {
                              $dtb[] = Thongke::diemTrungBinh($aSV['masv'], $aMH['mamonhoc']);
                              // echo "<pre>";
                              // while ($row = $dtb->fetch(PDO::FETCH_ASSOC)) {
                              //    echo "<pre>";
                              // print_R($dtb);
                              // }
                              // foreach ($dtb as $asd) {
                              //    echo "<pre>";
                              //    print($asd);
                              // }
                           }
                        }
                        foreach ($dtb as $asd) {
                           echo "<pre>";
                           print_r($asd);
                        }
                        ?>

                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php
require_once '../temp/footer.php';
?>
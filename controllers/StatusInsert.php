<?php

namespace Controllers;

class StatusInsert
{
   public static function insertErr()
   {
      return "<script>
               alert('Vui lòng nhập đủ dữ liệu');
            </script>";
   }
   public static function errNumber()
   {
      return "<script>
               alert('Số điện thoại phải là 10 số');
            </script>";
   }
   public static function insertSucc()
   {
      return "<script>
               alert('Thêm sinh viên thành công');
            </script>";
   }
}

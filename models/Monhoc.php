<?php

namespace Models;

use Controllers\CheckCharacter;
use Controllers\Session;
use PDO;

class Monhoc
{
    use CheckCharacter;

    public static function showAll($sql)
    {
        $pre = Database::getConnect()->prepare($sql);
        $pre->execute();
        if ($pre) {
            return $pre;
        } else {
            return false;
        }
    }


    public function add($sql)
    {
        $tenmonhoc = isset($_POST['tenmonhoc']) ? $this->check_character($_POST['tenmonhoc']) : null;
        $sotinchi = isset($_POST['sotinchi']) ? $this->check_character($_POST['sotinchi']) : null;
        if (!empty($tenmonhoc) && !empty($sotinchi) && isset($_POST['add_subject'])) {
            if (!is_numeric($sotinchi) || $sotinchi > 10) {
                session_start();
                Session::setSession('errInsert', "<script>alert('Số tín chỉ phải là số và bé hơn 10');</script>");
                header("location: ../views/monhoc/create.php");
                exit();
            }
            //  $sql = "INSERT INTO monhoc(tenmonhoc, sotinchi) VALUES(:tenmonhoc, :sotinchi)";
            $pre = Database::getConnect()->prepare($sql);
            $pre->bindParam(':tenmonhoc', $tenmonhoc, PDO::PARAM_STR);
            $pre->bindParam(':sotinchi', $sotinchi, PDO::PARAM_STR);
            $pre->execute();
            if ($pre) {
                session_start();
                Session::setSession('succInsert', "<script>alert('Thêm môn học thành công');</script>");
            } else {
                return false;
            }
        } else {
            session_start();
            Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
        }
    }

    public function upgrade($data, $sql)
    {
        $id = isset($_POST['mamonhoc']) ? $this->check_character($data['mamonhoc']) : null;
        $tenmonhoc = isset($_POST['tenmonhoc']) ? $this->check_character($data['tenmonhoc']) : null;
        $sotinchi = isset($_POST['sotinchi']) ? $this->check_character($data['sotinchi']) : null;
        if (!empty($tenmonhoc) && !empty($sotinchi) && isset($_POST['update_subject'])) {
            if (!is_numeric($sotinchi) || $sotinchi > 10 || $sotinchi < 1) {
                session_start();
                Session::setSession('errInsert', "<script>alert('Số tín chỉ phải là số và bé hơn 10');</script>");
                header("location: ../views/monhoc/index.php");
                exit();
            }
            // $sql = "UPDATE monhoc SET tenmonhoc=:tenmonhoc, sotinchi=:sotinchi WHERE mamonhoc=:id";
            $pre = Database::getConnect()->prepare($sql);
            $pre->bindParam(':tenmonhoc', $tenmonhoc, PDO::PARAM_STR);
            $pre->bindParam(':sotinchi', $sotinchi, PDO::PARAM_STR);
            $pre->bindParam(':id', $id, PDO::PARAM_INT);
            $pre->execute();
            if ($pre) {
                session_start();
                Session::setSession('succInsert', "<script>alert('Sữa môn học thành công');</script>");
            } else {
                return false;
            }
        } else {
            session_start();
            Session::setSession('errInsert', "<script>alert('Vui lòng nhập đủ dữ liệu');</script>");
        }
    }

       public function destroy($id, $sql)
       {
        //   $sql = "DELETE FROM monhoc WHERE mamonhoc=:id";
          $pre = Database::getConnect()->prepare($sql);
          $pre->bindParam(':id', $id, PDO::PARAM_INT);
          $pre->execute();
          if ($pre) {
             session_start();
             Session::setSession("succDelete", "<script>alert('Xóa môn học thành công');</script>");
          }
       }
}

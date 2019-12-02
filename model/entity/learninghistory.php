<?php
class LearningHistory
{
    var $id;
    var $yearFrom;
    var $yearTo;
    var $schoolName;
    var $schoolAddress;
    var $idStudent;
    function __construct(
        $id,
        $yearFrom,
        $yearTo,
        $schoolName,
        $schoolAddress,
        $idStudent
    ) {
        $this->id = $id;
        $this->yearFrom = $yearFrom;
        $this->yearTo = $yearTo;
        $this->schoolName = $schoolName;
        $this->schoolAddress = $schoolAddress;
        $this->idStudent = $idStudent;
    }
    static function getList($idStudent)
    {
        $rs = array();
        for ($i = 0; $i < 5; $i++) {
            array_push($rs, new LearningHistory(
                $i,
                2001 + $i,
                2002 + $i,
                "Phan Bội Châu " . $i,
                "Huế",
                $idStudent
            ));
        }
        return $rs;
    }
    static function getListFromFile($idStudent)
    {
        $lines = file("../resource/learninghistory.txt", FILE_IGNORE_NEW_LINES);
        $rs = array();
        foreach ($lines as $key => $value) {
            $arr = explode("#", $value);
            if ($arr[5] == $idStudent)
                array_push($rs, new LearningHistory(
                    $arr[0],
                    $arr[1],
                    $arr[2],
                    $arr[3],
                    $arr[4],
                    $arr[5]
                ));
        }
        return $rs;
    }
    static function getListFromDB($idStudent){
        //b1: mo ket noi voi DB
        $conn = new mysqli('localhost', 'user_hoang', '12345', 'quanlysinhvien');
        $conn->set_charset("utf8");
        if($conn->connect_error){
            die('kết nối thất bại' . $conn->connect_error);
        }else{
            //echo 'kết nối thành công';
            }
        //b2:thao tac voi DB
          $query = "SELECT * FROM quatrinhhoctap WHERE masinhvien='$idStudent'";
          $result = $conn->query($query);
          $rs = array();
          if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                array_push($rs, new LearningHistory(
                    $row["ma"],
                    $row["tunam"],
                    $row["dennam"],
                    $row["tentruong"],
                    $row["diachitruong"],
                    $row["masinhvien"]
                ));
              }
          }
        //b3:Dong ket noi voi DB
         $conn->close();
         return $rs;
    }
    static function getListFromDBMa($id){
        //b1: mo ket noi voi DB
        $conn = new mysqli('localhost', 'user_hoang', '12345', 'quanlysinhvien');
        $conn->set_charset("utf8");
        if($conn->connect_error){
            die('kết nối thất bại' . $conn->connect_error);
        }else{
            //echo 'kết nối thành công';
            }
        //b2:thao tac voi DB
          $query = "SELECT * FROM quatrinhhoctap WHERE ma ='$id'";
          $result = $conn->query($query);
          $rs = array();
          if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                array_push($rs, new LearningHistory(
                    $row["ma"],
                    $row["tunam"],
                    $row["dennam"],
                    $row["tentruong"],
                    $row["diachitruong"],
                    $row["masinhvien"]
                ));
              }
          }
        //b3:Dong ket noi voi DB
         $conn->close();
         return $rs;
    }
    static function pagination_qtht($idStudent){
        //b1:ket noi db
        $conn = new mysqli('localhost', 'user_hoang', '12345', 'quanlysinhvien');
        $conn->set_charset("utf8");
        if($conn->connect_error){
            die('kết nối thất bại' . $conn->connect_error);
        }else{
            echo 'kết nối thành công';
            }
        //b2:tim tong so records
        $sql1 = "SELECT COUNT(ma) AS TOTAL FROM quatrinhhoctap WHERE masinhvien='$idStudent'";
        $results = $conn->query($sql1);
        $row = mysqli_fetch_assoc($results);
        $total_records = $row['total'];
        //b3:tim limit va current page
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        //$current_page = 2;
        $limit = 5;
        //b4:tinh toan total_page va start
         //tong so trang
         $total_page = ceil($total_records / $limit);
         //gioi han current_page trong khoang 1 den total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
       //b5: tim start
         $start = ($current_page - 1) * $limit;
         //b6: co start va limit roi thi tien hanh truy van
         $sql2 = "SELECT * FROM quatrinhhoctap WHERE masinhvien = '$idStudent' LIMIT $start,$limit ";
         $result = $conn->query($sql2);
         $rs = array();
         if($result->num_rows>0){
             while($row = $result->fetch_assoc()){
               array_push($rs, new LearningHistory(
                   $row["ma"],
                   $row["tunam"],
                   $row["dennam"],
                   $row["tentruong"],
                   $row["diachitruong"],
                   $row["masinhvien"]
               ));
             }
         }
        //Dong ket noi voi DB
          $conn->close();
          return $rs;

         
    
    }
    //ham tim kiem
   static function getListFromSearch_qtht($search){
	 //b1: mo ket noi voi DB
     $conn = new mysqli('localhost', 'user_hoang', '12345', 'quanlysinhvien');
     $conn->set_charset("utf8");
     if($conn->connect_error){
         die('kết nối thất bại' . $conn->connect_error);
     }else{
        echo 'kết nối thành công';
        }
	$sql = "SELECT * FROM quatrinhhoctap WHERE diachitruong LIKE '%$search%'";
    $result = $conn->query($sql);
    $rs = array();
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
          array_push($rs, new LearningHistory(
              $row["ma"],
              $row["tunam"],
              $row["dennam"],
              $row["tentruong"],
              $row["diachitruong"],
              $row["masinhvien"]
          ));
        }
    }
  //b3:Dong ket noi voi DB
   $conn->close();
   return $rs;
   //var_dump($rs);
   }
}

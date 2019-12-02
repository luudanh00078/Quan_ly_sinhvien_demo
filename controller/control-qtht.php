<?php
//bien ket noi toan cuc
global $conn ;
//ham ket noi DB
function connect_db (){
   global $conn;
   //neu chua ket noi thi ket noi
   if(!$conn){
    $conn = mysqli_connect('localhost', 'user_hoang', '12345', 'quanlysinhvien') or die ('Cant not connect to database');
    //thiết lập font chữ kết nối 
    mysqli_set_charset($conn, 'utf8');
   } 
}
//ham ngat ket noi DB
function disconnect_db(){
	//goi toi bien toan cuc $conn 
	global $conn;
	//neu da ket noi thi ngat ket noi 
	if($conn){
		mysqli_close($conn);
	}
}
//ham them quatrinhhoctap
function add_qtht( $qtht_tunam, $qtht_dennam, $qtht_tentruong, $qtht_diachitruong, $qtht_masinhvien){
	//gọi tới biến toàn cục 
	global $conn;
	//hàm kết nối 
	connect_db();
	//chống SQL ịjnection 
	
	$qtht_tunam = addslashes($qtht_tunam);
    $qtht_dennam = addslashes( $qtht_dennam);
    $qtht_tentruong = addslashes( $qtht_tentruong);
    $qtht_diachitruong = addslashes($qtht_diachitruong);
    $qtht_masinhvien = addslashes( $qtht_masinhvien);


	//câu truy vấn sql 
	$sql = " INSERT INTO quatrinhhoctap(tunam, dennam, tentruong, diachitruong, masinhvien) VALUES 
	        ('$qtht_tunam ', '$qtht_dennam', '$qtht_tentruong', '$qtht_diachitruong', '$qtht_masinhvien') ";
	//Thực hiện câu truy vấn 
	$query = mysqli_query($conn, $sql);
	return $query;
   }
//ham sua quatrinhhoctap
function edit_qtht($qtht_ma, $qtht_tunam, $qtht_dennam, $qtht_tentruong, $qtht_diachitruong){
	 //hoi toi bien toan cuc
	 global $conn;
	 //ham ket noi
	 connect_db();
	 //chong sql injection
	$qtht_ma = addslashes($qtht_ma);
	$qtht_tunam = addslashes($qtht_tunam);
    $qtht_dennam = addslashes( $qtht_dennam);
    $qtht_tentruong = addslashes( $qtht_tentruong);
	$qtht_diachitruong = addslashes($qtht_diachitruong);
	//câu truy vấn 
	$sql = " UPDATE quatrinhhoctap SET 
	 tunam = '$qtht_tunam',
	 dennam = '$qtht_dennam',
	 tentruong  = '$qtht_tentruong',
	 diachitruong = '$qtht_diachitruong'
	WHERE ma = $qtht_ma ";
	//thực hiện câu truy vấn 
	$query = mysqli_query($conn, $sql);
	return $query;
 }
 //ham xoa qua trinh hoc tap theo ma
 function delete_qtht($qtht_ma){
	//gọi tơi biến toàn cục $conn
	global $conn;
	//hàm kết nối 
	connect_db();
	//câu truy vấn 
	$sql = " DELETE FROM quatrinhhoctap
	         WHERE ma = $qtht_ma ";
	//thực hiện câu truy vấn
	$query = mysqli_query($conn, $sql);
	return $query ;
}
//ham tim kiem
function search_qtht($search){
	// global $conn;
	// connect_db();
	// $sql = "SELECT * FROM quatrinhhoctap WHERE diachitruong LIKE '%$search%'";
	// $result = $conn->query($sql);
	// $rs = array();
	// if($result->num_rows>0){
	// 	while($row = $result->fetch_assoc()){
	// 	  array_push($rs, new LearningHistory(
	// 		  $row["ma"],
	// 		  $row["tunam"],
	// 		  $row["dennam"],
	// 		  $row["tentruong"],
	// 		  $row["diachitruong"],
	// 		  $row["masinhvien"]
	// 	  ));
	// 	}
	// }
  //b3:Dong ket noi voi DB
   //$conn->close();
   //return $rs;

}
//ham phan trang
function pagination_qtht(){
	//b1:ket noi db
	global $conn;
	connect_db();
	//b2:tim tong so records
	$sql1 = "SELECT COUNT(ma) AS TOTAL FROM quatrinhhoctap";
	$result = mysqli_query($conn, $sql1);
	$row = mysqli_fetch_assoc($result);
	$total_records = $row['total'];
	//b3:tim limit va current page
	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
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
	 $sql2 = "SELECT * FROM quatrinhhoctap LIMIT $start,$limit";
	 $result = mysqli_query($conn,$sql2);
	 

}



?>
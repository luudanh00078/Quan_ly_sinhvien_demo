<?php 
require_once("control-qtht.php");
//var_dump($_SERVER);
if ($_SERVER['REQUEST_METHOD']=='POST') {
	//var_dump($_POST['id']);
	$data['ma'] = $_POST["id"];
	$data['tunam'] = isset($_POST["txtTuNam"]) ? $_POST["txtTuNam"] :"";
	
    $data['dennam'] = isset($_POST["txtDenNam"]) ? $_POST["txtDenNam"] :"";
    $data['tentruong'] = isset($_POST["txtTruong"]) ? $_POST["txtTruong"] :"";
    $data['diachitruong'] = isset($_POST["txtNoiHoc"]) ? $_POST["txtNoiHoc"] :"";
    $data['masinhvien'] = isset($_POST["txtMaSV"]) ? $_POST["txtMaSV"] :"";
	edit_qtht($data['ma'], $data['tunam'], $data['dennam'], $data['tentruong'], $data['diachitruong']);
    header("Location: ../view/QuaTrinhHocTap.php?rs=success");
   }
   disconnect_db();

   

	//ghifile	
	// Hàm thêm dòng
			// function add_line($url_data,$str,$position){
			// 	$contents = file($url_data, FILE_IGNORE_NEW_LINES);
			// 	if($position > sizeof($contents)) {
			// 			$position = sizeof($contents) + 1;
			// 		}
			// 	array_splice($contents, $position-1, 0, array($str));
			// 	$contents = implode("\n", $contents);
			// 	file_put_contents($url_data, $contents);
			// 	}
		// Hàm xóa dòng
			// function remove_line($url_data, $lineNum){
			// 	$arr = file($url_data);
			// 	if($lineNum > sizeof($arr))
			// 	{
			// 		exit;
			// 		}
			// 			unset($arr["$lineNum"]);
			// 			if (!$fp = fopen($url_data, 'w+'))
			// 			{
			// 				print "Cannot open file ($url_data)";
			// 				exit;
			// 				}
			// 					if($fp)
			// 					{
			// 					foreach($arr as $line) {
			// 						fwrite($fp,$line); 
			// 					}
			// 				fclose($fp);
			// 			}
			// 			echo "done";
			//     }
        // $str = "1#".$_POST["txtTuNam"]."#".$_POST["txtDenNam"]."#".$_POST["txtTruong"]."#".$_POST["txtNoiHoc"]."#101\n";
		// // $str = "1$".$_POST["txtTuNam"]."$".$_POST["txtDenNam"]."$".$_POST["txtTruong"]."$".$_POST["txtNoiHoc"]."$101";
		// $line = $_POST['id'];
		// $url_data = '../resource/learninghistory.txt';
		// add_line($url_data,$str,$line);
		// remove_line($url_data,$line);
		//hàm sửa sinh vien 

?>
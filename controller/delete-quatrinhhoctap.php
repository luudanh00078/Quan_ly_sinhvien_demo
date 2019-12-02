<?php 
require_once("control-qtht.php");
if ($_SERVER['REQUEST_METHOD']=='GET') {
	
	$qtht_ma = ($_GET['id']);
	//var_dump($qtht_ma);
	
	if($qtht_ma){
	delete_qtht($qtht_ma);
	}	
	
    header("Location: ../view/QuaTrinhHocTap.php?rs=delete");
		// // Hàm xóa dòng
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
		// 	}
        // $line = $_GET['id'];
        // //var_dump($line);
		// $url_data = '../resource/learninghistory.txt';
		// remove_line($url_data,$line);
		// header("Location: ../view/quatrinhhoctap.php?rs=delete");
   }
   disconnect_db();
?>
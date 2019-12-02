  
<?php 
require_once("control-qtht.php");
//add qua trinh hoc tap

if ($_SERVER['REQUEST_METHOD']=='POST') {
    //    $str = "1#".$_POST["txtTuNam"]."#".$_POST["txtDenNam"]."#".$_POST["txtTruong"]."#".$_POST["txtNoiHoc"]."#101\n";
    //    $fp = fopen('../resource/learninghistory.txt','a');
    //    fwrite($fp,$str);
    //    fclose($fp);
    //    header("Location: ../view/quatrinhhoctap.php");
    //lay data
    $data['tunam'] = isset($_POST["txtTuNam"]) ? $_POST["txtTuNam"] :"";
    $data['dennam'] = isset($_POST["txtDenNam"]) ? $_POST["txtDenNam"] :"";
    $data['tentruong'] = isset($_POST["txtTruong"]) ? $_POST["txtTruong"] :"";
    $data['diachitruong'] = isset($_POST["txtNoiHoc"]) ? $_POST["txtNoiHoc"] :"";
    $data['masinhvien'] = isset($_POST["txtMaSV"]) ? $_POST["txtMaSV"] :"";
   
    //validate thong tin
    //insert
    add_qtht($data['tunam'], $data['dennam'], $data['tentruong'], $data['diachitruong'], $data['masinhvien']);
    header("Location: ../view/QuaTrinhHocTap.php?rs=success");
}
disconnect_db();

?>

<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learninghistory.php");
// $rsMockData = LearningHistory::getList("102T1011010");
// $rsFromFile = LearningHistory::getListFromFile("101");
$rsFromDB = LearningHistory::getListFromDB("101");
//$rsFromDBPagination = LearningHistory::pagination_qtht("101");
//var_dump($rsFromDBPagination);
?>
<!-- Edit qua trinh hoc tap -->
<div>
<?php
//var_dump($_GET);
    if (isset($_GET['id'])) {
        // if (filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 0)) && $_GET['id']>0) {
            $ma = $_GET['id'];
            $rsFromDBMa = LearningHistory::getListFromDBMa("$ma");
            //foreach ($rsFromDB as $key => $value) {
            foreach ($rsFromDBMa as $value) {
                //if ($id ==$_GET['id']) {
                    ?>
                    <form method="POST" action="../controller/edit-quatrinhhoctap.php">
                        <div class="form-data">
                            <div class="form-group">
                                <label>Từ năm</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y")?>" name="txtTuNam" value="<?php echo $value->yearFrom; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Đến năm</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y") ?>" name="txtDenNam" value="<?php echo $value->yearTo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Trường</label>
                                <input class="form-control" type="text" min="1" max="12" name="txtTruong" value="<?php echo $value->schoolName; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nơi học</label>
                                <input class="form-control" type="text" name="txtNoiHoc" value="<?php echo $value->schoolAddress; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Ma SV</label>
                                <input class="form-control" type="text" name="txtMaSV" value="<?php echo $value->idStudent; ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <a class="btn btn-secondary" href="QuaTrinhHocTap.php">Hủy</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                    </form>
                    <?php 
                //}
            }
            ?>
        
            <?php
        // }else { 
        //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //         <i class="fas fa-question-circle"></i>
        //         <strong>Lỗi :</strong> ID không hợp lệ !~
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //         </button>
        //         </div>';
        //     }
    }
        
    ?> 

  
</div>
<div>
    <?php
    //seach
    if(isset($_REQUEST['ok'])){
        $search = addslashes($_GET['search']);

        if(empty($search)){
            echo 'Yêu cầu nhập dữ liệu vào ô trống';
        }else{
            $rsFromDBSearch = LearningHistory::getListFromSearch_qtht("$search");
            
            foreach ($rsFromDBSearch as $value) {
            ?>
            <div class="table-responsive">
		      <table class="table table-hover table-bordered">
                <thead class="thead-dark">
				  <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Từ năm</th>
                        <th scope="col">Đến năm</th>
                        <th scope="col">Trường</th>
                        <th scope="col">Nơi học</th>
                        <th scope="col">Thao tác</th>
				  </tr>
                 </thead>
                 <tbody>
                        <tr>
                                        <th scope="row"><?php echo $value->id; ?></th>
                                        <td><?php echo $value->yearFrom; ?></td>
                                        <td><?php echo $value->yearTo; ?></td>
                                        <td><?php echo $value->schoolName; ?></td>
                                        <td><?php echo $value->schoolAddress; ?></td>
                                        <td>
                                            <a href="QuaTrinhHocTap.php?id=<?php echo $row["ma"]; ?>" class="btn btn-outline-success mr-3">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                            <button onclick='remove(<?php echo $row["ma"]; ?>)' class='btn btn-outline-danger'><i class="fas fa-trash"></i> Xóa</button>

                                        </td>
                                </tr>
                 </tbody>
              </table>
            </div>

            <?php 
            }
        }
    }
    
    ?>

</div>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
                <form class="form-inline md-form mr-auto mb-4" action="QuaTrinhHocTap.php" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <input class="btn aqua-gradient btn-rounded btn-sm my-0" name="ok" type="submit" value="search">
                </form>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i> Thêm</button>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Từ năm</th>
					<th scope="col">Đến năm</th>
					<th scope="col">Trường</th>
					<th scope="col">Nơi học</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
                        <?php 
                            //b1:ket noi db
                            $conn = new mysqli('localhost', 'user_hoang', '12345', 'quanlysinhvien');
                            $conn->set_charset("utf8");
                            if($conn->connect_error){
                                die('kết nối thất bại' . $conn->connect_error);
                            }else{
                                //echo 'kết nối thành công';
                                }
                            //b2:tim tong so records
                            $sql1 = "SELECT COUNT(ma) AS total FROM quatrinhhoctap ";
                            $results = $conn->query($sql1);
                            $row = mysqli_fetch_assoc($results);
                            $total_records = $row['total'];
                            //var_dump($total_records);
                            //b3:tim limit va current page
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            //var_dump($current_page);
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
                            //var_dump($start);
                            //b6: co start va limit roi thi tien hanh truy van
                            $sql2 = "SELECT * FROM quatrinhhoctap LIMIT $start,$limit ";
                            $result = $conn->query($sql2);
                            $rs = array();
                            if($result->num_rows>0){
                                while($row = $result->fetch_assoc()){
                                    //var_dump($row);
                                // array_push($rs, new LearningHistory(
                                //     $row["ma"],
                                //     $row["tunam"],
                                //     $row["dennam"],
                                //     $row["tentruong"],
                                //     $row["diachitruong"],
                                //     $row["masinhvien"]
                                // ));
                               // }
                                // return $rs;
                            //}
                            //Dong ket noi voi DB
                            //$conn->close();
                            
                      
                        //hien thi 
                        //$stt = 0;
                        //foreach($rs as $key => $value){
                            //$stt++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo  $row["ma"]; ?></th>
                                <td><?php echo $row["tunam"]; ?></td>
                                <td><?php echo $row["dennam"]; ?></td>
                                <td><?php echo $row["tentruong"]; ?></td>
                                <td><?php echo $row["diachitruong"]; ?></td>
                                <td>
                                    <a href="QuaTrinhHocTap.php?id=<?php echo $row["ma"]; ?>" class="btn btn-outline-success mr-3">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <button onclick='remove(<?php echo $row["ma"]; ?>)' class='btn btn-outline-danger'><i class="fas fa-trash"></i> Xóa</button>

                                </td>
                        </tr>
                         <?php
                        }
                    }
                        ?>
                        
                    </tbody>
        </table>
        <?php
                 if ($current_page > 1 && $total_page > 1){
                    echo '<a href="QuaTrinhHocTap.php?page='.($current_page-1).'">Prev</a> | ';
                }
                 
                // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page){
                        echo '<span>'.$i.'</span> | ';
                    }
                    else{
                        echo '<a href="QuaTrinhHocTap.php?page='.$i.'">'.$i.'</a> | ';
                    }
                }
                 
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1){
                    echo '<a href="QuaTrinhHocTap.php?page='.($current_page+1).'">Next</a> | ';
                }
        ?>
	</div>
		<!-- Modal Thêm quá trình học tập-->
	<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="hihi" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="titleDiaLog">Thêm quá trình học tập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
				<div class="modal-body">
					<form method="POST" action="../controller/add-quatrinhhoctap.php">
						<div class="form-data">
							<div class="form-group">
								<label>Từ năm</label>
								<input class="form-control" type="number" min="1990" max="<?php  echo date("Y")?>" name="txtTuNam" value="" required>
							</div>
							<div class="form-group">
								<label>Đến năm</label>
								<input class="form-control" type="number" min="1990" max="<?php  echo date("Y") ?>" name="txtDenNam" value="" required>
							</div>
							<div class="form-group">
								<label>Trường</label>
								<input class="form-control" type="text" min="1" max="50" name="txtTruong" value="" required>
							</div>
							<div class="form-group">
								<label>Nơi học</label>
								<input class="form-control" type="text" name="txtNoiHoc" value="" required>
                            </div>
                            <div class="form-group">
								<label>Mã SV</label>
								<input class="form-control" type="text" name="txtMaSV" value="" required>
							</div>
						</div>                                  
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<input type="submit" class="btn btn-success" value="Thêm">
				</form>
			</div>
		</div>
	</div>
	<!-- Kết thúc Modal Thêm quá trình học tập -->
</div>
<script>
    function remove(id){
    var del=confirm("Bạn có thực sự muốn xóa không ?");
    if (del==true){
        window.location.href="../controller/delete-quatrinhhoctap.php?id="+id;
    }
}
</script>
<?php
include_once("footer.php"); ?>
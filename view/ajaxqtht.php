<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learninghistory.php");
$rsMockData = LearningHistory::getList("102T1011010");
$rsFromFile = LearningHistory::getListFromFile("101");

?>
<!-- Sua qua trinh hoc tap -->
<div>
<?php
//var_dump($_GET);
    if (isset($_GET['id'])) {
        if (filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 0)) && $_GET['id']>0) {
            $id = 0;
            foreach ($rsFromFile as $key => $value) {
                $id++;
                if ($id==$_GET['id']) {
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
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <a class="btn btn-secondary" href="QuaTrinhHocTap.php">Hủy</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                    </form><?php 
                }
            }
            ?>
        
            <?php
        }else { 
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-question-circle"></i>
                <strong>Lỗi :</strong> ID không hợp lệ !~
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
    }
        
    ?> 

  
</div>
<div class="container-fluid">
	<div class="table-responsive">
         <h1>Test Ajax</h1>
         <button id="ajaxButton" onclick="testAjax();">Goi Ajax</button>
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus-circle"></i> Thêm</button>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Từ năm</th>
					<th scope="col">Đến năm</th>
					<th scope="col">Lớp</th>
					<th scope="col">Nơi học</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody id="content">
                     
                        
            </tbody>
		</table>
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
								<input class="form-control" type="text" min="1" max="12" name="txtTruong" value="" required>
							</div>
							<div class="form-group">
								<label>Nơi học</label>
								<input class="form-control" type="text" name="txtNoiHoc" value="" required>
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
    function testAjax(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200){

                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","runajaxqtht.php?name=LuuDanh", true);
        xhttp.send();
        //document.getElementById("contentAjax").innerHTML = "<h2>XIn chao</h2>"
    }
    //testAjax();
</script>
<?php
include_once("footer.php"); ?>
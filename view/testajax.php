<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>
<h1>Test Ajax</h1>
<button id="ajaxButton" onclick="testAjax();">Goi Ajax</button>
<div id="contentAjax">

</div>
<?php
include_once("footer.php"); ?>
<script>
  function testAjax(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200){
            var user = JSON.parse(this.responseText);
            var element = document.getElementById("contentAjax");
            if(user==null)
               element.innerHTML="Khong co du lieu";
            var str = "<ul>";
            str += "<li>";
            str += "User name: " + user.userName;
            str += "</li>";
            str += "<li>";
            str += "Password: " + user.passWord;
            str += "</li>";
            str += "<li>";
            str += "Full name: " + user.fullName;
            str += "</li>";

            str += "<ul>";
            element.innerHTML = str;

            //document.getElementById("contentAjax").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET","runajax.php?name=LuuDanh", true);
    xhttp.send();
      //document.getElementById("contentAjax").innerHTML = "<h2>XIn chao</h2>"
  }
</script>
<?php
session_start();

$conn=mysqli_connect("localhost","root","zz1077","webstudy");

$username = $_SESSION['id'];
$userpw = $_SESSION['pwd'];
$title = $_POST['title'];
$content = $_POST['text'];
$date = date('Y-m-d H:i:s');

$sql="
INSERT INTO board
(title,content,id,pwd,date)
VALUES(
	 '$title',
	 '$content',
   '$username',
   '$userpw',
	 '$date'
  )
  ";

$result=mysqli_query($conn, $sql);
   if($result==false){
     echo '오류가 발생하였습니다.';
   }
   else{
     ?>
     <script>
     alert("글 등록이 성공적으로 완료되었습니다. 환영합니다!");
     location.replace("./mymyblog.php")

     </script>
     <?php
   }
?>

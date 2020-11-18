<?php
session_start();

$conn=mysqli_connect("localhost","root","zz1077","webstudy") or die("mysql connect error");
$id = $_POST['id']; $pwd = $_POST['pwd'];
$query="select * from member where id='{$_POST['id']}';";
$result=$conn->query($query);

if(mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);

  if($row['pwd']==$pwd){
    $_SESSION['id']=$id;
    $_SESSION['pwd']=$pwd;
      ?>
      <script>
      alert("로그인 성공.");
      location.replace("./index.php")
      </script>
<?php
    }
    else{?>
      <script>
      alert("비밀번호를 잘못 입력하셨습니다.");
      location.replace("./index.php")
      </script>
      <?php
    }
}
else{
  ?>
  <script>
  alert("존재하지 않는 아이디입니다.");
  location.replace("./index.php")
  </script>
<?php
}
?>

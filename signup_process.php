<?php
$conn=mysqli_connect("localhost","root","zz1077","webstudy") or die("mysql connect error");
$sql="
INSERT INTO member
(id,pwd,name,email)
VALUES(
   '{$_POST['id']}',
   '{$_POST['pwd']}',
   '{$_POST['name']}',
   '{$_POST['email']}'
  )
  ";
if ($_POST['id']=='' or $_POST['pwd']=='' or $_POST['name']=='' or $_POST['email']==''){
  ?>
  <script>
  alert("회원 정보를 모두 입력해주세요.");
  location.replace("./signup.html")
  </script>
  <?php
}
else{
  $query="select * from member where id='{$_POST['id']}' or email='{$_POST['email']}';";
  // $result_check=$conn->query($query);
  $result_check=mysqli_query($conn, $query) or die("query error 중복체크");
  if (mysqli_fetch_assoc($result_check)>=1){?>
      <script>
      alert("이미 가입한 회원입니다. 본인의 아이디나 이메일로 가입된 회원이 이미 존재합니다.");
      location.replace("./signup.html")
      </script>
  <?php
  }
  else {
    $result=mysqli_query($conn, $sql) or die("query errorㅇㅇ");
       if($result==false){
         echo '오류가 발생하였습니다.';
       }
       else{
         ?>
         <script>
         alert("회원가입이 완료되었습니다. 환영합니다!");
         </script>
         <input type="button" value="메인으로" onclick="location.href='index.php'" style="float:left;">
         <?php
       }
      mysqli_close($conn);
  }
}
?>

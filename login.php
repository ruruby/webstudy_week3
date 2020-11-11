<?php
session_start();

$setid='swing'; $setpw='11111';
$id = $_POST['id']; $pw = $_POST['pw'];

if ($id==$setid){
  if($pw==$setpw){
    $_SESSION['id']=$id;
    ?>
    <script>
      alert("로그인 성공!")
      location.replace("./index.php")
      // $_SESSION['id']=$id;
      // header("locaion:localhost/index.php");
      // location.replace("./index.php")
    </script>
    <?php
  }
  else {
    ?>
    <script>
      alert("로그인 실패!")
      location.replace("./login.html")
    </script>
    <?php
  }
}
else {
  ?>
  <script>
    alert("로그인 실패!")
    location.replace("./login.html")
  </script>
  <?php
}
?>

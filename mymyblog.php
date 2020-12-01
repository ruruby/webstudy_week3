<?php
session_start();
$conn=mysqli_connect("localhost","root","zz1077","webstudy");
$user=$_SESSION["id"];
 ?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>My Blog</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area">

<?php echo "<h1> $user 의 블로그</h1>";
// echo $_COOKIE['id']?>

  <h4>글 목록</h4>
  <FORM action="index.php" method="post" name="글 작성 페이지">
    <input type="button" value="WRITE" onclick="location.href='index.php'" style="float:right;">
    </FORM><br>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
              <th width="500">제목</th>
              <th width="200">작성자</th>
              <th width="100">날짜</th>
              <th width="100">조회수</th>
          </tr>
        </thead>
        <?php
        $query="select * from board where id='$user';";
        $result=mysqli_query($conn, $query) or die("query error");
        while($row=mysqli_fetch_array($result)){?>
          <tr>
          <td><?php echo $row['num']; ?></td>
          <td><a href='myview.php?num=<?php echo $row['num']?>'><?php echo $row['title'];?></a></td>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['date']; ?></td>
          <td><?php echo $row['hit']; ?></td>
        </tr><?php
      }?>
    </table>
  </div>
</body>
</html>
<p>
<form align="center" action="mymyblog.php" method="get">
search:
  <input type="text" name="search">
  <input type="submit">
</form>
</p>
<?php
$search = $_GET["search"];
if(isset($search)){
  $query="select * from board where title like '%".$search."%';";
  // $query="select * from nonboard where title like '%".$search."%';";

  $result=mysqli_query($conn, $query) or die("query error 발생");
  while($row=mysqli_fetch_array($result)){
    echo $row['num'];
    echo $row['title'];
    echo $row['id'];
    echo $row['date'];
    echo $row['content'];
  }
}
 ?>

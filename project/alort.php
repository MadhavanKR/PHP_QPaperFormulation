<html>
<head>
<script type=text/javascript>
function fun()
{
    alert("allortments succesful");
}
function fun1()
{
    alert("inside delete block");
}
</script>
 </head>
<body>
<form name=alort method=POST>
<?php
$link=mysqli_connect("localhost","root","","project");
$query="select * from subject";
$res=mysqli_query($link,$query);
echo "<table border=3px bordercolor=vlack cellspacing=2px cellpadding=2px";
echo "<th> <td> Subject ID </td> <td> Subject Name </td> <td> Semester </td></th>";
while($row=mysqli_fetch_row($res))
{
  echo "<tr> <td>$row[0] </td> <td>$row[1] </td> <td>$row[2] </td> <td> <input type=checkbox name=$row[0]></td></tr>";
}
echo "</table>";
echo"<br>";
echo "                    ";
echo "<input type=submit name=sub val=MakeAllortment>";

?>
</form>
</body>
</html>

<?php
if(isset($_POST["sub"]))
{
  $fid=$_GET['fid'];
  echo $fid;
  $link=mysqli_connect("localhost","root","","project");
  $query1="select sid from subject";
  $r=mysqli_query($link,$query);
  while($row=mysqli_fetch_row($r))
  {
      $temp=$row[0];
      if(isset($_POST[$row[0]]))
      {
        $query_alort="insert into teaching values($fid,'$temp')";
        $res_allort=mysqli_query($link,$query_alort);
      }
      else
      {
          
          //{
              $query_delete="delete from teaching where fid=$fid and sid='$temp'";
              $res_delete=mysqli_query($link,$query_delete);
              echo "<script type=text/javascript>","fun1();","</script>";
          //}
      }
  }
 echo "<script type=text/javascript>","fun();","</script>";
  header("location:Success.html");
}
?>
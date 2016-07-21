<html>
<head>
<script type=text/javascript>
function fun()
{
    alert("deletion successfull");
}
function fun1()
{
    alert("could not delete the faculty record, please try again");
}
</script>
</html>

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
$fid=$_GET['fid'];
$query="delete from faculty where fid=$fid";
$r=mysqli_query($link,$query);
if($r)
{
    echo "<script type=text/javascript> fun(); </script>";
}
else
{
    echo "<script type=text/javascript> fun1(); </script>";
}
?>
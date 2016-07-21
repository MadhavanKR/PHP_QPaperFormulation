<html>
<head> 
<script type=text/javascript>
function fun()
{
    alert("deletion succesfull");
}
function fail()
{
    alert("could not delete! sorry!");
}
</script>
</head>
</html>
<?php
$qno=$_GET['qno'];
$unit=$_GET['unit'];
$sid=$_GET['sid'];
$marks=$_GET['marks'];
$tabname=$marks."M";
$dqno=$qno;

$link=mysqli_connect("localhost","root","","project");
$query="delete from $tabname where unit='$unit' and qno='$qno' and sid='$sid'";
$res=mysqli_query($link,$query);

$query1="select count(*) from $tabname where unit='$unit' and sid='$sid'";
$res1=mysqli_query($link,$query1);
list($r)=mysqli_fetch_row($res1);
echo $r;
$count=0;
while($count<$r)
{
    $temp=$dqno+1;
    echo $temp;
    $query2="update $tabname set qno=$dqno where qno='$temp' and unit='$unit' and sid='$sid'";
    $query3="ALTER TABLE $tabname AUTO_INCREMENT=$temp";
    $res2=mysqli_query($link,$query2);
    $res3=mysqli_query($link,$query3);
    /*if($res)
    {
        echo "something is happening";
    }*/
    $dqno=$temp;
    $count++;
}

if($res)
{
    //echo "<script type=text/javascript>","fun();","</script>";
    header("location:viewquestions.php?unit=$unit&sid=$sid");
}
else
{
    //echo "<script type=text/javascript>","fail();","</script>";
    header("location:viewquestions.php?unit=$unit&sid=$sid");
}
?>
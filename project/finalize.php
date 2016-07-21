<html>
<head> 

</head>
<body> 
<form name=finalize action=final_finalize.php>
<?php
$sid=$_GET['sid'];
$unit=$_GET['unit'];
setcookie("unit", $unit, time() + (86400 * 30), "/");
setcookie("sid", $sid, time() + (86400 * 30), "/");

//echo $unit;
$link=mysqli_connect("localhost","root","","project");
$query="select qno,question,image,unit from 4M where sid='$sid' and unit='$unit'";
$res=mysqli_query($link,$query);
$query1="select qno,question,image,unit from 6M where sid='$sid' and unit='$unit'";
$res1=mysqli_query($link,$query1);
$query2="select qno,question,image,unit from 7M where sid='$sid' and unit='$unit'";
$res2=mysqli_query($link,$query2);
$query3="select qno,question,image,unit from 8M where sid='$sid' and unit='$unit'";
$res3=mysqli_query($link,$query3);
$query4="select qno,question,image,unit from 10M where sid='$sid' and unit='$unit'";
$res4=mysqli_query($link,$query4);

echo "<table border =3px cellspacing=3px cellpading=3px>";
echo "<tr> <th> Question </th> <th> image </th> <th> Unit </th> <th> marks </th> <th> Include </th></tr>";
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res))
{
    $name=$qno."-"."4";
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 4 </td>  <td> <input type=checkbox name=$name value='val'> </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res1))
{
    $name=$qno."-"."6";
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 6 </td> <td> <input type=checkbox name=$name> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res2))
{
    $name=$qno."-"."7";
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 7 </td> <td> <input type=checkbox name=$name></tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res3))
{
    $name=$qno."-"."8";
    echo "<tr><td> $question </td> <td> $image </td> <td> $unit </td> <td> 8 </td> <td> <input type=checkbox name=$name></tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res4))
{
    $name=$qno."-"."10";
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 10 </td> <td> <input type=checkbox name=$name></tr>";
}
echo "</table>";
?>
<br><br>
<input type=submit name=Finalize value=Finalize>
</form>
</body>
</html>

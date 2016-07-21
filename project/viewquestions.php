<html>
<head> 
<script type="text/javascript">
    function printpage()
    {

        window.print();

    }
</script>
</head>
<body> 
<form name=view onsubmit="return printpage()" method=post>
<?php
$sid=$_GET['sid'];
$unit=$_GET['unit'];
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
echo "<tr> <th> Question </th> <th> image </th> <th> Unit </th> <th> marks </th> <th colspan=2> Edit/Delete </tr>";
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res))
{
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 4 </td>
         <td> <a href=/project/edit.php?qno=$qno&unit=$unit&sid=$sid&marks=4> Edit </td> <td> <a href=/project/delete.php?qno=$qno&unit=$unit&sid=$sid&marks=4> Delete </td> </tr> ";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res1))
{
    echo "<tr> <td> $question </td> <td> $image </td> <td> $unit </td> <td> 6 </td>
<td> <a href=/project/edit.php?qno=$qno&unit=$unit&sid=$sid&marks=6> Edit </td> <td> <a href=/project/delete.php?qno=$qno&unit=$unit&sid=$sid&marks=6> Delete </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res2))
{
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 7 </td>
<td> <a href=/project/edit.php?qno=$qno&unit=$unit&sid=$sid&marks=7> Edit </td> <td> <a href=/project/delete.php?qno=$qno&unit=$unit&sid=$sid&marks=7> Delete </td></tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res3))
{
    echo "<tr><td> $question </td> <td> $image </td> <td> $unit </td> <td> 8 </td>
    <td> <a href=/project/edit.php?qno=$qno&unit=$unit&sid=$sid&marks=8> Edit </td> <td> <a href=/project/delete.php?qno=$qno&unit=$unit&sid=$sid&marks=8> Delete </td> </tr>";
}
while(list($qno,$question,$image,$unit)=mysqli_fetch_row($res4))
{
    echo "<tr>  <td> $question </td> <td> $image </td> <td> $unit </td> <td> 10 </td>
 <td> <a href=/project/edit.php?qno=$qno&unit=$unit&sid=$sid&marks=10> Edit </td> <td> <a href=/project/delete.php?qno=$qno&unit=$unit&sid=$sid&marks=10> Delete </td> </tr>";
}
echo "</table>";
?>
</form>
</body>
</html>

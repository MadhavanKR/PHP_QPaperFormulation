<html>
<head> </head>
<body>
<form name=fromAQ method=POST>
<fieldset>
<legend> Select your subjects </legend>
<?php
session_start();
$uid=$_SESSION['uid'];
$link=mysqli_connect("localhost","root","","project");
$query="select write1 from faculty where fid='$uid'";
$res=mysqli_query($link,$query);
list($write)=mysqli_fetch_row($res);
if($write==0)
{
    echo "Sorry you do not have the rights to add questions";
}
else
{
    $query="select s.sid,s.sname from subject s,faculty f,teaching t where f.fid=t.fid and t.sid=s.sid";
    $res=mysqli_query($link,$query);
    echo "<table>";
    while(list($sid,$sname)=mysqli_fetch_row($res))    
    {
        
        echo "<tr> <td> $sid </td> <td> $sname </td> <td> <a href=/project/view.php?sid=$sid> View Questions </a> </td>  </tr>"; 
    }
    echo "</table>";
}
?>
</fieldset>
</form>
</body>
</html>
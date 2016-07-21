<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
$query="select fid,fname from faculty";
$r=mysqli_query($link,$query);
echo "<table border=3px bordercolor=vlack cellspacing=2px cellpadding=2px";
echo "<th> <td> Faculty ID </td> <td> Faculty Name </td></th>";
while($row=mysqli_fetch_row($r))
{
    echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td><a href=alort.php?fid=$row[0]>alort</a> </td></tr>";
}
?>
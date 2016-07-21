<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"project");
$query="select sid,sname from subject";
$r=mysqli_query($link,$query);
echo "<table border=3px bordercolor=vlack cellspacing=2px cellpadding=2px";
echo "<th> <td> Subject ID </td> <td> Subject Name </td></th>";
while($row=mysqli_fetch_row($r))
{
    echo "<tr> <td> $row[0] </td> <td> $row[1] </td> <td><a href=view.php?sid=$row[0]>View</a> </td></tr>";
}
?>
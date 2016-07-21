<html>
<head> <title> Faculy Page </title> </head>
<?php
session_start();
$uid=$_SESSION['uid'];

echo "<frameset rows=20%,* noresize >";
echo "<frame name=f2 src=welcome.php>";
echo "<frameset cols=20%,* noresize >";
echo "<frame name=f3 src=/project/menu.php>";
echo "<frame name=f4>";
echo "</frameset>";
?>
</html>
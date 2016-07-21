<html>
<head> </head>
<body>
<form name=form1 method=POST>
<?php
session_start();
$uid=$_SESSION['uid'];

echo "<a href=/project/facultySub.php target=f4> Add questions </a>";
echo "<br> <br>  ";
echo "<a href=/project/facultysub1.php target=f4> View Question </a>";
echo "<br> <br>  ";
echo "<a href=/project/finalize_subs.php target=f4> Finalize </a>";
?>
</form>
</body>
</html>
<html>
<head>
	<title>Login Page</title>
    <script type="text/javascript">
    function invalidpwd()
    {
        //alert("here");
      document.getElementById('a').innerHTML="Invalid Faculty ID/ Password."
    }
    </script>
</head>
<body bgcolor="white" >
<center>
<hr size=10 color=black width=95%>
<h1>Bangalore Institute Of Technology,C.S.E Dept.</h1>
<hr size=10 color=black width=80%>
<h2>FACULTY LOGIN</h2>

<form name="frm" method="post" action="login_logic.php">
<fieldset>
<legend>Login</legend>
<table border="3px">
<tr><td>Faculty ID</td><td><input type="text" name="fid" required placeholder="Enter Faculty ID""/></td></tr>
<tr><td>Password</td><td><input type="password" name="pwd" required  placeholder="Type Password"/></td></tr>
</table>
<br>

<input type="submit" name="sub" /></br>
<b><font id='a' color="red" size="1"></font></b>
<br />
</fieldset>
</form>
</center>
</body>
</html>
<?php
    if(@$_GET['fail']==1)
    {
        echo "<script type=text/javascript>","invalidpwd();","</script>";
    }
?>
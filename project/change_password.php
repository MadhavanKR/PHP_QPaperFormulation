<html>
<head>
<script type=text/javascript>
function fun()
{
 
    var x=document.ChangePwd.npwd.value;
    var y=document.ChangePwd.rpwd.value;
    if(x!=y)
    {
        alert("passwords don't match!");
        return false
    }
    else
        return true;
}
function fail()
{
    alert("password change failed! please try again");
}
</script>
</head>
<body>
<form name=ChangePwd method=POST action=change_logic.php onsubmit="return fun()">
<fieldset>
<legend> Change Password </legend>
<table border=3px cellspacing=3px cellpadding=2px>
<tr> <td> Old password </td> <td> <input type=password name=opwd> </td> </tr>
<tr> <td> New password </td> <td> <input type=password name=npwd> </td> </tr>
<tr> <td> Retype New password </td> <td> <input type=password name=rpwd> </td> </tr>
<tr> <td> <input type=submit name=change value="change password"> </td> </tr>
</table>
</fieldset>
</form>
</body>
</html>

<?php
@$fail=$_GET['fail'];
if(@$fail)
    echo "<script type=text/javascript>","fail();","</script>";
?>
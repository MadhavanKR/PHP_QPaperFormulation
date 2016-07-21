<?php
     if(isset($_POST["sub"]))
    {

    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"project");
    $fid=$_POST['fid'];
    session_start();
    $_SESSION['uid']=$fid;
    $pwd=$_POST['pwd'];
    if($fid=='admin')
    {
        $qry="select * from admin where pwd='$pwd'";
        $res=mysqli_query($link,$qry);
        $flag=mysqli_num_rows($res);
        if($flag)
        {
            header("location:admin.php");
        }
        else
        {
            header("location:Login.php?fail=1");
        }
        
    }
    else
    {
        $qry="select * from faculty where fid='$fid' and password='$pwd'";
        $res=mysqli_query($link,$qry);
        $flag=mysqli_num_rows($res);
        if($flag)
        {
             $qry="select * from faculty where fid='$fid' and password='$pwd' and first='1'";
             $res=mysqli_query($link,$qry);
             $flag=mysqli_num_rows($res);
             if($flag)
             {
                header("location:changepwd.php");
             }
             else
             {
                 header("location:faculty.php?uid=$fid");
             }
         }
         else
        {
              header("location:Login.php?fail=1");      
        }
    }
}
?>
<html>
<head><title>INVALID CREDENTILAS</title></head>
<body><center><a href="Login.html" align="center"/>Go Back</a></center></body>
</html>

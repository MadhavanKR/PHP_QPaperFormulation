<?php
$link=mysqli_connect("localhost","root","","project");
@$oldpass=$_POST['opwd'];
@$newpass=$_POST['npwd'];
session_start();
$fid=$_SESSION['chuid'];
$query="update faculty set password='$newpass' where password='$oldpass' and fid=$fid";
$res=mysqli_query($link,$query);
if($res)
{
    $query1="update faculty set first=0 where fid=$fid";
    $res1=mysqli_query($link,$query1);
    if($res1)
    {
     header("location:faculty.php?chgpwd=1");
    }
}
else
{
    header("location:change_password.php?fail=1");
}
?>
<html>
<head> 
<script type=text/javascript>
function fun()
{
    alert("updation succesful");
}
</script>
</head>
</html>
<?php
$unit=$_COOKIE['unit'];
$sid=$_COOKIE['sid'];
//echo $unit,"<br>",$sid;
//echo "<br>";
$a=array("4M","6M","7M","8M","10M");
$b=array("4","6","7","8","10"); 
for($j=0;$j<5;$j++)
{    
 $link=mysqli_connect("localhost","root","","project");
 $tabname=$a[$j];
 $count_query="select count(*) from $tabname";
 $marks=$b[$j];
 $res=mysqli_query($link,$count_query);
 if($res)
 {
    list($count)=mysqli_fetch_row($res);
   // echo $count;
   // echo "<br>";
    for($i=1;$i<=$count;$i++)
    {
        $checkbox=$i."-".$marks;
  //      echo $checkbox;
  //      echo "<br>";
        $qno=$i;
        $query="update $tabname set include=1 where qno=$qno and unit=$unit and sid='$sid'";
  //      echo $query;
  //      echo "<br>";
        if(isset($_GET[$checkbox]))
        {
            //echo "checked box";
            $res1=mysqli_query($link,$query);
            if($res1)
            {
              /*  echo "updated!";
                echo "<script type=text/javascript>","fun();","</script>";*/
               // header("location:faulty.php");
            }
        }
        else
        {
            //echo "am in else block";
           $query1="update $tabname set include=0 where qno=$qno and unit=$unit and sid='$sid'";
           $res2=mysqli_query($link,$query1);
        }
       // echo "didnt get into if block";
    }
 }
}
 echo "<script type=text/javascript>","fun();","</script>";
?>
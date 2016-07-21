<html>
<head> <head>
<body>
<form name=edit method=POST>
<fieldset>
<legend> Edit Question </legend>
<?php
$link=mysqli_connect("localhost","root","","project");
$marks=$_GET['marks'];
$tabname=$marks."M";
$qno=$_GET['qno'];
$unit=$_GET['unit'];
$sid=$_GET['sid'];
$query="select question from $tabname where qno=$qno and unit=$unit and sid='$sid'";
//echo $query;
$res=mysqli_query($link,$query);
if($res)
{
 list($question)=mysqli_fetch_row($res);
 echo "<input type=textarea name=question value='$question' cols=50>";
}
echo "<select name=marks>
<option selected> --select marks-- </option>
<option>4</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>10</option>
</select>
<center>
<input type=submit name=edit value=Edit>
</center>
</fieldset>";
if(isset($_POST['edit']))
{
 $new_question=$_POST['question'];
 $new_marks=$_POST['marks'];
 $new_tabname=$new_marks."M";
 if($tabname==$new_tabname)
 {
  $query1="update $tabname set question='$new_question' where qno=$qno and unit=$unit and sid='$sid'";
  $res1=mysqli_query($link,$query1);
  if($res1)
  {
    header("location:viewquestions.php?unit=$unit&sid=$sid");
   //   echo "updation succesfull";
  }
 }
 else
 {
     $query2="delete from $tabname where unit='$unit' and qno='$qno' and sid='$sid'";
     $res2=mysqli_query($link,$query2);
     $query3="select count(*) from $tabname where unit='$unit' and sid='$sid'";
     $res3=mysqli_query($link,$query3);
     list($r)=mysqli_fetch_row($res3);
     echo "number of entries in the table =$r";
     $count=0;
     
     while($count<$r)
     {
      $temp=$qno+1;
      echo $temp;
      $query4="update $tabname set qno=$qno where qno='$temp' and unit='$unit' and sid='$sid'";
      $query5="ALTER TABLE $tabname AUTO_INCREMENT=$temp";
      $res2=mysqli_query($link,$query4);
      $res3=mysqli_query($link,$query5);
      if($res)
      {
       header("location:viewquestions.php?unit=$unit&sid=$sid");
       //  echo "something is happening";
      }
      $qno=$temp;
      $count++;
     }
     $image="nothing";
     $query6="insert into $new_tabname (question,image,unit,sid) values('$new_question','$image','$unit','$sid')";
     $res5=mysqli_query($link,$query6);
     if($res5)
     {
      header("location:viewquestions.php?unit=$unit&sid=$sid");
     }
 }
}
?>
</form>
</body>
</html>